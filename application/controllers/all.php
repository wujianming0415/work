<?php
class all extends CI_Controller{
	public function __construct(){
	
		parent::__construct();
		$this->load->model('all_model');
	
	}

	public function index(){
		
		$all['country'] = $this->input->post('country');
		if(!$all['country']){
			$all['country'] = "ALL";
		}
		$all['result'] = $this->all_model->default_data($all['country']);
			 
			
		$size = count($all['result']);
		if($size > 0){
			foreach ( $all['result'] as $key => $value ){
				$date_time[$key] = $value['remark'];
			}
			
			array_multisort($date_time, SORT_DESC, $all['result'], SORT_DESC);
			$start = strtotime(substr($all['result'][$size-1]['day_time'], 0, 8));
			$end = strtotime(substr($all['result'][0]['day_time'], 9, 16));
			
			$all['date_time'] = array(date('Y-m-d', $start), date('Y-m-d', $end));
	
			for($i = 0; $i < $size; $i++ ){
				
				$day_time = substr($all['result'][$i]['day_time'], 4, 4)."-".substr($all['result'][$i]['day_time'], 13, 4);
				$all['result'][$i]['day_time'] = $day_time;
			}
		}else{
			$all['date_time'] = array(date('Y-m-d', time()-105*86400),date('Y-m-d', time()));
			$all['result'] = array();
		}
		
		$title['title'] = "直客收入整体分析数据表";
    	$this->load->view('templates/header',$title);
		$this->load->view('pages/all.php',$all);
		$this->load->view('templates/footer');
		
		}
		
	public function view(){
		$this->load->helper('form');
		if(!($this->input->post('date_time_1') && $this->input->post('date_time_2'))){
			return $this->index();
		}
			
		$all['result'] = $this->all_model->get_data();
		
		$size = count($all['result']);
		if($size > 0){
			foreach ( $all['result'] as $key => $value ){
				$date_time[$key] = $value['remark'];
			}
				
			array_multisort($date_time, SORT_DESC, $all['result'], SORT_DESC);
			$start = strtotime(substr($all['result'][$size-1]['day_time'], 0, 8));
			$end = strtotime(substr($all['result'][0]['day_time'], 9, 16));
				
			$all['date_time'] = array(date('Y-m-d', $start), date('Y-m-d', $end));
		
			for($i = 0; $i < $size; $i++ ){
		
				$day_time = substr($all['result'][$i]['day_time'], 4, 4)."-".substr($all['result'][$i]['day_time'], 13, 4);
				$all['result'][$i]['day_time'] = $day_time;
			}
		}else{
			$all['date_time'] = array(date('Y-m-d', time()-105*86400),date('Y-m-d', time()));
			$all['result'] = array();
		}
		
		$all['country'] = $this->input->post('country');
		
		$title['title'] = "直客收入整体分析数据表";
    	$this->load->view('templates/header',$title);
		$this->load->view('pages/all.php', $all);
		$this->load->view('templates/footer');
	}
		

}
		