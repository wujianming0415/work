<?php
class click_income extends CI_Controller{
	
	public function __construct(){
	
		parent::__construct();
		$this->load->model('click_income_model');
	
	}

	public function index($start_time = '', $end_time = ''){
		
		if($start_time == ''||$end_time == ''){
			$start_date = strtotime(date('Y-m-d', time()-56*86400))-date('w',strtotime(date('Y-m-d', time()-56*86400)))*86400;
			$end_date = strtotime(date('Y-m-d', time()))-date('w',strtotime(date('Y-m-d', time())))*86400;
		}else{
			$start_date = $start_time;
			$end_date = $end_time;
		}
		
		$all['result'] = $this->click_income_model->default_data($start_date, $end_date);	
		$all['date_time'] = array(date('Y-m-d', $start_date), date('Y-m-d', $end_date));
		//var_dump($all['result']);
		
		//average;
		$all['total']['br_click'] = 0;
		$all['total']['br_income'] = 0;
		$all['total']['tr_click'] = 0;
		$all['total']['tr_income'] = 0;
		$all['total']['pl_click'] = 0;
		$all['total']['pl_income'] = 0;
		$all['total']['fr_click'] = 0;
		$all['total']['fr_income'] = 0;
		$all['total']['ar_click'] = 0;
		$all['total']['ar_income'] = 0;
		$all['total']['es_click'] = 0;
		$all['total']['es_income'] = 0;
		$all['total']['de_click'] = 0;
		$all['total']['de_income'] = 0;
		$all['total']['it_click'] = 0;
		$all['total']['it_income'] = 0;
		$all['total']['mx_click'] = 0;
		$all['total']['mx_income'] = 0;
		$all['total']['in_click'] = 0;
		$all['total']['in_income'] = 0;
		$all['total']['other_click'] = 0;
		$all['total']['other_income'] = 0;
		$all['total']['all_click'] = 0;
		$all['total']['all_income'] = 0;
		
		$size = count( $all['result'] );
		for($i = 0; $i < $size; $i++){
			$all['total']['br_click'] += $all['result'][$i]['br_click'];
			$all['total']['br_income'] += $all['result'][$i]['br_income'];
			$all['total']['tr_click'] += $all['result'][$i]['tr_click'];
			$all['total']['tr_income'] += $all['result'][$i]['tr_income'];
			$all['total']['pl_click'] += $all['result'][$i]['pl_click'];
			$all['total']['pl_income'] += $all['result'][$i]['pl_income'];
			$all['total']['fr_click'] += $all['result'][$i]['fr_click'];
			$all['total']['fr_income'] += $all['result'][$i]['fr_income'];
			$all['total']['ar_click'] += $all['result'][$i]['ar_click'];
			$all['total']['ar_income'] += $all['result'][$i]['ar_income'];
			$all['total']['es_click'] += $all['result'][$i]['es_click'];
			$all['total']['es_income'] += $all['result'][$i]['es_income'];
			$all['total']['de_click'] += $all['result'][$i]['de_click'];
			$all['total']['de_income'] += $all['result'][$i]['de_income'];
			$all['total']['it_click'] += $all['result'][$i]['it_click'];
			$all['total']['it_income'] += $all['result'][$i]['it_income'];
			$all['total']['mx_click'] += $all['result'][$i]['mx_click'];
			$all['total']['mx_income'] += $all['result'][$i]['mx_income'];
			$all['total']['in_click'] += $all['result'][$i]['in_click'];
			$all['total']['in_income'] += $all['result'][$i]['in_income'];
			$all['total']['other_click'] += $all['result'][$i]['other_click'];
			$all['total']['other_income'] += $all['result'][$i]['other_income'];
			$all['total']['all_click'] += $all['result'][$i]['all_click'];
			$all['total']['all_income'] += $all['result'][$i]['all_income'];
			
		}
		
		$title['title'] = "直客点击和收入数据显示";
    	$this->load->view('templates/header',$title);
		$this->load->view('pages/click_income.php',$all);
		$this->load->view('templates/footer');
		
	}
	
	public function view(){
		$this->load->helper('form');
	
		$start_time = $this->input->post('date_time_1');
		$end_time = $this->input->post('date_time_2');
		if($start_time == ''||$end_time ==''){
			$this->index();
		}else{
			$start_date = strtotime($start_time)-date('w',strtotime( $start_time ))*86400;
			$end_date = strtotime($end_time)-date('w',strtotime($end_time))*86400;
	
			if($start_date <= $end_date && ($end_date - $start_date) <= 56*86400 ){
				$this->index($start_date, $end_date);
			}else {
				$this->index();
			}
		}
	}
	
	public function update(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$week_time = $this->input->post('week_time');
		$save_data = $this->input->post('save_data');
		
		if($save_data == 'save'){
			if(!$this->click_income_model->set_data()){
				$news = "保存失败!";
			}else{
				$news = "Success!";
			}
			return $this->alter_view( $news );
		}else{
			if( $week_time == null || $week_time =='' ){
				$week_time =date('Y-m-d', time());
				$week_time = strtotime(date('Y-m-d',strtotime($week_time)-(date('w',strtotime($week_time))+14)*86400));
				$time_stamps = $week_time+7*86400;
				$all['week_time'] = date('Y-m-d', $time_stamps);
				for($i = 1; $i < 7; $i++){
					$time = $week_time+($i+7)*86400;
					$time_stamps = $time_stamps.",".$time;
				}
				
				$all['view'] = $this->click_income_model->alter_data($week_time);
				$size = count($all['view']);
				for($i = 0; $i < $size; $i++){
					foreach ( $all['view'][$i] as $key=>$value ){
						if( $value == null){	
							$all['view'][$i][$key] = '';
						} 
					}
					$link[] = $all['view'][$i]['link'];
				}
				if(isset($link)){
					$short_links = implode(',',$link);
				}else{
					$short_links = '';
				}
				$params = array('short_links' => $short_links, 'time_stamps' => $time_stamps);
				
				$i=3;
        		if($i--){
					$str_1 = $this->curl_link($params);
					
       			}
				$array = json_decode($str_1, true);
				$times = explode(",", $time_stamps);
				
				for($i = 0; $i < $size; $i++){
					$start = date('Y-m-d', $times[0]);
					$end = date('Y-m-d', $times[6]);
					$camp_id = $all['view'][$i]['camp_id'];
					$url = 'http://admin.adplus.goo.mx/getdata/get_camp_data?camp_id='.$camp_id.'&'.'start='.$start.'&'.'end='.$end;
					$str_2 = $this->curl_campid($url);
					$str_2 = str_replace('<br/>', ',' ,$str_2);
					$str_2 = explode(",", $str_2);
					foreach ($str_2 as $key=>$item){
						if($item != null && $item !=''){
							$tmp = explode("|", $item);
							$res[$key] = $tmp[1];
						}
					}
							
					$all['view'][$i]['day_1']=$array[$all['view'][$i]['link']][$times[0]] + $res[0];
					$all['view'][$i]['day_2']=$array[$all['view'][$i]['link']][$times[1]] + $res[1];
					$all['view'][$i]['day_3']=$array[$all['view'][$i]['link']][$times[2]] + $res[2];
					$all['view'][$i]['day_4']=$array[$all['view'][$i]['link']][$times[3]] + $res[3];
					$all['view'][$i]['day_5']=$array[$all['view'][$i]['link']][$times[4]] + $res[4];
					$all['view'][$i]['day_6']=$array[$all['view'][$i]['link']][$times[5]] + $res[5];
					$all['view'][$i]['day_7']=$array[$all['view'][$i]['link']][$times[6]] + $res[6];
					
				}
	
			}else{
				$week_time = strtotime(date('Y-m-d',strtotime($week_time)-(date('w',strtotime($week_time)))*86400));
				$new_week = strtotime(date('Y-m-d',time()-date('w',time())*86400))+7*86400;
				
				if($week_time > $new_week || $week_time == $new_week){
	
					$this->form_validation->set_rules('is_null', '日期选择错误', 'callback_data_check');
					$all['view'] = array();
					$all['week_time'] = date('Y-m-d', $week_time);
				
				}else{
					$all['view'] = $this->click_income_model->alter_data($week_time);
					if(count($all['view']) > 0){
						$all['week_time'] = date('Y-m-d', $week_time);
						$this->form_validation->set_rules('is_null', '数据已存在', 'callback_data_check');
					}else{
						$week_time = strtotime(date('Y-m-d', $week_time-14*86400));
						$time_stamps = $week_time+7*86400;
						$all['week_time'] = date('Y-m-d', $time_stamps);
						for($i = 1; $i < 7; $i++){
							$time = $week_time+($i+7)*86400;
							$time_stamps = $time_stamps.",".$time;
						}
						$all['view'] = $this->click_income_model->alter_data($week_time);
						$size = count($all['view']);
						for($i = 0; $i < $size; $i++){
							foreach ( $all['view'][$i] as $key=>$value ){
								if( $value == null){	
									$all['view'][$i][$key] = '';
								} 
							}
							$link[] = $all['view'][$i]['link'];
						}
						
						if(isset($link)){
							$short_links = implode(',',$link);
						}else{
							$short_links = '';
						}
						$params = array('short_links' => $short_links, 'time_stamps' => $time_stamps);
						$str=$this->curl_link($params);
						$array = json_decode($str, true);
						$times = explode(",", $time_stamps);
						$res = array();
						for($i = 0; $i < $size; $i++){
							
							$start = date('Y-m-d', $times[0]);
							$end = date('Y-m-d', $times[6]);
							$camp_id = $all['view'][$i]['camp_id'];
							$url = 'http://admin.adplus.goo.mx/getdata/get_camp_data?camp_id='.$camp_id.'&'.'start='.$start.'&'.'end='.$end;
							$str_2 = $this->curl_campid($url);
							$str_2 = str_replace('<br/>', ',' ,$str_2);
							$str_2 = explode(",", $str_2);
							foreach ($str_2 as $key=>$item){
								if($item != null && $item !=''){
									$tmp = explode("|", $item);
									$res[$key] = $tmp[1];
								}
							}
							
							$all['view'][$i]['day_1']=$array[$all['view'][$i]['link']][$times[0]] + $res[0];
							$all['view'][$i]['day_2']=$array[$all['view'][$i]['link']][$times[1]] + $res[1];
							$all['view'][$i]['day_3']=$array[$all['view'][$i]['link']][$times[2]] + $res[2];
							$all['view'][$i]['day_4']=$array[$all['view'][$i]['link']][$times[3]] + $res[3];
							$all['view'][$i]['day_5']=$array[$all['view'][$i]['link']][$times[4]] + $res[4];
							$all['view'][$i]['day_6']=$array[$all['view'][$i]['link']][$times[5]] + $res[5];
							$all['view'][$i]['day_7']=$array[$all['view'][$i]['link']][$times[6]] + $res[6];
							
						}
						
						$this->form_validation->set_rules('is_null', '保存之前，请再次确认', 'callback_data_check');
					}
				}
			}
		}
		if ($this->form_validation->run() === FALSE){
	
			$title['title'] = "直客点击和收入数据输入";
    		$this->load->view('templates/header',$title);
			$this->load->view('pages/click_income_update.php', $all);
			$this->load->view('templates/footer'); 
	
		}
	
	}
	
	public function alter_view($news = '', $week_time = '')
	{
		$this->load->helper('form');
    if($week_time == ''){
      $week_time = $this->input->post('week_data');
      if( $week_time == null || $week_time ==null){
        $week_time =date('Y-m-d', time());
      }
    }

		$week_time = strtotime(date('Y-m-d',strtotime($week_time)-date('w',strtotime($week_time))*86400));
		
		$all['view'] = $this->click_income_model->alter_data($week_time);
		$all['week_time'] = date('Y-m-d', $week_time);
		$all['news'] = $news;
		
		$title['title'] = "直客点击和收入完整数据";
		$this->load->view('templates/header',$title);
		$this->load->view('pages/click_income_alter.php' ,$all);
		$this->load->view('templates/footer');
	}
	
	public function alter()
	{
		$this->load->helper('form');
		$week_time = $this->input->post('week_time');

		if($this->input->post('market') == '' || $this->input->post('market')==null){
			$news = '修改数据不能为空!';
			$this->alter_view($news);
		}else{
			if($this->click_income_model->alter()){
				$news = '修改成功!';
			}else {
    			$news = '修改失败!';
    		}
			$this->alter_view($news, $week_time);
		}
	}
	
	/**
	 * @回调函数显示，相应错误信息
	 */
	public function data_check($str){
		 
		if ($str === null ||$str ===''){
			$this->form_validation->set_message('data_check', ' %s !');
			return FALSE;
		}else {
			return TRUE;
		}
	}

  public function curl_link($params){
		
		
		
		$ch_ = curl_init("http://goo.mx/goo/get_multi_click");
		
		curl_setopt($ch_, CURLOPT_HEADER, 0);
		
		curl_setopt($ch_, CURLOPT_RETURNTRANSFER , 1 );
		
		
		curl_setopt($ch_, CURLOPT_SSL_VERIFYPEER, 0);
		
		curl_setopt($ch_, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
		
		curl_setopt($ch_, CURLOPT_POST, true);
		
		//curl_setopt($ch_, CURLOPT_TIMEOUT, Curl::time_);
		
		if ($params) {
		
			curl_setopt($ch_, CURLOPT_POSTFIELDS, http_build_query($params));
		
		}
		
		$body_=curl_exec($ch_);
		
		if ($body_ === false) {
		
			echo "CURL Error: " . curl_error($ch_);
		
			return false;
		}
		
		curl_close($ch_);
		return $body_;
	}
	
	public function curl_campid( $url ){
		$ch_ = curl_init($url);
	
		curl_setopt($ch_, CURLOPT_HEADER, 0);
		curl_setopt($ch_, CURLOPT_RETURNTRANSFER , 1 );
		curl_setopt($ch_, CURLOPT_URL, $url);
		curl_setopt($ch_, CURLOPT_TIMEOUT, 5);
		if (strpos($url, 'https') === 0) {
		    curl_setopt($ch_, CURLOPT_SSL_VERIFYHOST, 0);
		    curl_setopt($ch_, CURLOPT_SSL_VERIFYPEER, 0);
		}
		$body_=curl_exec($ch_);
		if ($body_ === false) {
		    echo "CURL Error: " . curl_error($ch_);
		    return false;
		}
		curl_close($ch_);
		return $body_;
	}


}
