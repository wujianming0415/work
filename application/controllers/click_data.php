<?php
class click_data extends CI_Controller{

  public function __construct(){

    parent::__construct();
    $this->load->model('click_model');
  
  }
  
  /**
   * @默认显示页面，获取数据库内容后，对其中存在自然周的数据进行周统计
   */
  public function index($news=''){
	$data['country'] = $this->input->post('country');
	if(!$data['country']){
		$data['country'] = "ALL";
	}
    $data['result'] = $this->click_model->default_data($data['country']);
    	
    $data['news'] = $news;
    $size = count($data['result']);
	if($size > 0){
		foreach ( $data['result'] as $key => $value ){
	    	$date_time[$key] = $value['date_time'];
	    }
	    array_multisort($date_time, SORT_DESC, $data['result'], SORT_DESC);
		$data['date_time'] = array(date('Y-m-d', $data['result'][$size-1]['date_time']), date('Y-m-d', $data['result'][0]['date_time']));
		
	    $j = 0;
	    for($i = 0; $i < $size; $i++ ){
	    	
	    	if(count($data['result'])-$i >6){
		    	if(date('w', $data['result'][$i]['date_time']) == 6 && $data['result'][$i+6]['date_time'] == ($data['result'][$i]['date_time']-6*86400)){
		    		
		    		$data['view'][$j]['date_time'] = date('m-d',$data['result'][$i+6]['date_time'])."—".date('m-d', $data['result'][$i]['date_time']);
		    		$active_week = $data['result'][$i]['active_daily']+$data['result'][$i+1]['active_daily']+$data['result'][$i+2]['active_daily']+$data['result'][$i+3]['active_daily']+$data['result'][$i+4]['active_daily']+$data['result'][$i+5]['active_daily']+$data['result'][$i+6]['active_daily'];
		    		$data['view'][$j]['active_daily'] = $active_week;
		    		$click_week_1 = $data['result'][$i]['click_nums_1']+$data['result'][$i+1]['click_nums_1']+$data['result'][$i+2]['click_nums_1']+$data['result'][$i+3]['click_nums_1']+$data['result'][$i+4]['click_nums_1']+$data['result'][$i+5]['click_nums_1']+$data['result'][$i+6]['click_nums_1'];
		    		$data['view'][$j]['click_nums_1'] = $click_week_1;
		    		$click_week_2 = $data['result'][$i]['click_nums_2']+$data['result'][$i+1]['click_nums_2']+$data['result'][$i+2]['click_nums_2']+$data['result'][$i+3]['click_nums_2']+$data['result'][$i+4]['click_nums_2']+$data['result'][$i+5]['click_nums_2']+$data['result'][$i+6]['click_nums_2'];
		    		$data['view'][$j]['click_nums_2'] = $click_week_2;
		    		$click_week_3 = $data['result'][$i]['click_nums_3']+$data['result'][$i+1]['click_nums_3']+$data['result'][$i+2]['click_nums_3']+$data['result'][$i+3]['click_nums_3']+$data['result'][$i+4]['click_nums_3']+$data['result'][$i+5]['click_nums_3']+$data['result'][$i+6]['click_nums_3'];
		    		$data['view'][$j]['click_nums_3'] = $click_week_3;
		    		$click_week_all = $data['result'][$i]['click_nums_all']+$data['result'][$i+1]['click_nums_all']+$data['result'][$i+2]['click_nums_all']+$data['result'][$i+3]['click_nums_all']+$data['result'][$i+4]['click_nums_all']+$data['result'][$i+5]['click_nums_all']+$data['result'][$i+6]['click_nums_all'];
		    		$data['view'][$j]['click_nums_all'] = $click_week_all;
		    		$data['view'][$j]['remark'] = '1';
		    		
		    		$j++;
		    	}
	    	}
	    	
	    	$data['view'][$j++] = $data['result'][$i];
	    }
	}else{
		$data['date_time'] = array(date('Y-m-d', time()-15*86400),date('Y-m-d', time()));
		$data['view'] = array();
	}
    $title['title'] = "各模块点击统计汇总";
    $this->load->view('templates/header',$title);
    $this->load->view('pages/click.php',$data);
    $this->load->view('templates/footer');

  }
  
  /**
   * @查询显示页面，根据输入条件，处理后获取相应数据库内容后，对其中存在自然周的数据进行周统计
   */
  public function view($news=''){
	$this->load->helper('form');
	if(!($this->input->post('date_time_1') && $this->input->post('date_time_2'))){
		return $this->index();
	}
	$data['news'] = $news;
	$data['result'] = $this->click_model->get_data();
	$size = count($data['result']);
	if($size > 0){
		foreach ( $data['result'] as $key => $value ){
    		$date_time[$key] = $value['date_time'];
    	}
    	array_multisort($date_time, SORT_DESC, $data['result'], SORT_DESC);
		$data['date_time'] = array(date('Y-m-d', $data['result'][$size-1]['date_time']), date('Y-m-d', $data['result'][0]['date_time']));
	
		$j = 0;
	    for($i = 0; $i < $size; $i++ ){
	    	
	    	if(count($data['result'])-$i >6){
		    	if(date('w', $data['result'][$i]['date_time']) == 6 && $data['result'][$i+6]['date_time'] == ($data['result'][$i]['date_time']-6*86400)){
		    		
		    		$data['view'][$j]['date_time'] = date('m-d',$data['result'][$i+6]['date_time'])."—".date('m-d', $data['result'][$i]['date_time']);
		    		$active_week = $data['result'][$i]['active_daily']+$data['result'][$i+1]['active_daily']+$data['result'][$i+2]['active_daily']+$data['result'][$i+3]['active_daily']+$data['result'][$i+4]['active_daily']+$data['result'][$i+5]['active_daily']+$data['result'][$i+6]['active_daily'];
		    		$data['view'][$j]['active_daily'] = $active_week;
		    		$click_week_1 = $data['result'][$i]['click_nums_1']+$data['result'][$i+1]['click_nums_1']+$data['result'][$i+2]['click_nums_1']+$data['result'][$i+3]['click_nums_1']+$data['result'][$i+4]['click_nums_1']+$data['result'][$i+5]['click_nums_1']+$data['result'][$i+6]['click_nums_1'];
		    		$data['view'][$j]['click_nums_1'] = $click_week_1;
		    		$click_week_2 = $data['result'][$i]['click_nums_2']+$data['result'][$i+1]['click_nums_2']+$data['result'][$i+2]['click_nums_2']+$data['result'][$i+3]['click_nums_2']+$data['result'][$i+4]['click_nums_2']+$data['result'][$i+5]['click_nums_2']+$data['result'][$i+6]['click_nums_2'];
		    		$data['view'][$j]['click_nums_2'] = $click_week_2;
		    		$click_week_3 = $data['result'][$i]['click_nums_3']+$data['result'][$i+1]['click_nums_3']+$data['result'][$i+2]['click_nums_3']+$data['result'][$i+3]['click_nums_3']+$data['result'][$i+4]['click_nums_3']+$data['result'][$i+5]['click_nums_3']+$data['result'][$i+6]['click_nums_3'];
		    		$data['view'][$j]['click_nums_3'] = $click_week_3;
		    		$click_week_all = $data['result'][$i]['click_nums_all']+$data['result'][$i+1]['click_nums_all']+$data['result'][$i+2]['click_nums_all']+$data['result'][$i+3]['click_nums_all']+$data['result'][$i+4]['click_nums_all']+$data['result'][$i+5]['click_nums_all']+$data['result'][$i+6]['click_nums_all'];
		    		$data['view'][$j]['click_nums_all'] = $click_week_all;
		    		$data['view'][$j]['remark'] = '1';
		    		
		    		$j++;
		    	}
	    	}    	
	    	$data['view'][$j++] = $data['result'][$i];
	    }
	}else{
		$data['date_time'] = array(date('Y-m-d', time()-15*86400),date('Y-m-d', time()));
		$data['view'] = array();
	}
	$data['country'] = $this->input->post('country');
	
	$title['title'] = "各模块点击统计汇总";
    $this->load->view('templates/header',$title);
    $this->load->view('pages/click.php', $data);
    $this->load->view('templates/footer');
  }
  
  /**
   * @插入数据页面，验证表单输入的数据，调用回调函数，对合法数据插入数据库，跳转单数据显示页面，否则返回输入页面，并显示错误信息
   */
  public function update()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $nums_1 = array(
    	$this->input->post('active_daily_1'),
    	$this->input->post('active_daily_2'),
    	$this->input->post('active_daily_3'),
    	$this->input->post('active_daily_4'),
    	$this->input->post('active_daily_5'),
    	$this->input->post('active_daily_6'),
    	$this->input->post('active_daily_7')
    	);
    $nums_2 = array_unique($nums_1);
    if(count($nums_2) == 1 && in_array('', $nums_2)){
    	
    	$this->form_validation->set_rules('is_null', '输入信息不能为空', 'callback_data_check');
    }else{
    	$this->form_validation->set_rules('is_null', 'Success', 'callback_data_check');
    
   		if(!$this->click_model->set_data()){
    		$this->form_validation->set_rules('is_null', '数据已存在', 'callback_data_check');
    	}
    }
    if ($this->form_validation->run() === FALSE){
    	
    	$title['title'] = "各模块点击统计汇总";
    	$this->load->view('templates/header',$title);
    	$this->load->view('pages/click_update.php');
      	$this->load->view('templates/footer');
      
    }
    else{
    	$title['title'] = "各模块点击统计汇总";
    	$this->load->view('templates/header',$title);
    	$this->load->view('pages/click_update.php');
    	$this->load->view('templates/footer');
    }
  }
  
 public function alter()
  {
    $this->load->helper('form');
    
    if($this->input->post('active_daily') == '' || $this->input->post('active_daily')==null){
    	$news = '修改数据不能为空!';
    	$this->index($news);
    }else{
    	if($this->click_model->alter_data()){
    		$news = '修改成功!';
    	}else {
    		$news = '修改失败!';
    	}
	    $this->index($news);
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
}
