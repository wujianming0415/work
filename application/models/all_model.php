<?php
class all_model extends CI_Model{
  
  /**
   * @构造方法连接数据库
   */
  public function __construct(){
    
    $this->load->database();
  }
  
  /**
   * @默认获取数据库内容，默认时间段位最近8周，若获取其他国家的内容，需按日期索引后用总数减去每个国家的数据
   */
  public function default_data($country, $time_date =''){
  	if($time_date == ''){
    	$start_date = date('Ymd', time()-105*86400);
    	$end_date = date('Ymd', time());	
    	$date_time = $start_date."-".$end_date;
  	}else{
  		$date_time = $time_date;
  	}
  	$start = strtotime(substr($date_time, 0, 8));
  	$end = strtotime(substr($date_time, 9, 16));
  	
  	if($country !== "other"){
  		$query = $this->db->get_where('stat_all',array('country =' => $country, 'remark >=' => $start, 'remark <=' => $end));
    	return $query->result_array();
  	}
  	$query = $this->db->get_where('stat_all',array('country !=' => 'ALL', 'remark >=' => $start, 'remark <=' => $end));
    $result = $query->result_array();
    $query_all = $this->db->get_where('stat_all',array('country =' => 'ALL', 'remark >=' => $start, 'remark <=' => $end));
    $all_result = $query_all->result_array();
   	$size = count($result);
   	if($size > 0){
	  	
	   	for($i=0; $i < count($all_result); $i++){
	   		
	   		$uv_week = $all_result[$i]['uv_week'];
	   		$click_nums_1 = $all_result[$i]['click_nums_1'];
	    	$click_nums_2 = $all_result[$i]['click_nums_2'];
	    	$click_nums_3 = $all_result[$i]['click_nums_3'];
	    	$click_nums_all = $all_result[$i]['click_nums_all'];
	    	$income_1 = $all_result[$i]['income_1'];
	    	$income_2 = $all_result[$i]['income_2'];
	    	$income_3 = $all_result[$i]['income_3'];
	    	$income_all = $all_result[$i]['income_all'];
	    	
	    	for($j=0; $j < $size; $j++){
	    		
	    		if($all_result[$i]['day_time'] == $result[$j]['day_time']){
	    			$uv_week -= $result[$j]['uv_week'];
	    			$click_nums_1 -= $result[$j]['click_nums_1'];
	    			$click_nums_2 -= $result[$j]['click_nums_2'];
	    			$click_nums_3 -= $result[$j]['click_nums_3'];
	    			$click_nums_all -= $result[$j]['click_nums_all'];
	    			$income_1 -= $result[$j]['income_1'];
	    			$income_2 -= $result[$j]['income_2'];
	    			$income_3 -= $result[$j]['income_3'];
	    			$income_all -= $result[$j]['income_all'];
	    			
	    		}
	    	}
	    	
	    	$count_result[$i] = array($i, 'day_time' => $all_result[$i]['day_time'], 'uv_week' => $uv_week, 'click_nums_1' => $click_nums_1, 'click_nums_2' => $click_nums_2, 'click_nums_3' => $click_nums_3, 'click_nums_all' => $click_nums_all, 'income_1' => $income_1, 'income_2' => $income_2, 'income_3' => $income_3, 'income_all' => $income_all, 'click_compare_last' => 0, 'income_compare_last' => 0, 'remark' => $all_result[$i]['remark']);
	    }
   	}else{
   		$count_result = array();
   	}
    return $count_result;
  }
  
  /**
   * @提交所查询时间段和国家的表单获取数据，并检查提交数据进行相应处理，若日期错误或者获取其他国家的数据，调用默认default_data()方法
   */
  public function get_data(){
    $this->load->helper('url');
    
  	$start_date = strtotime($this->input->post('date_time_1'));
    $end_date = strtotime($this->input->post('date_time_2'));
    $date_time = date('Ymd',$start_date)."-".date('Ymd',$end_date);
    $country = $this->input->post('country');

    if($start_date <= $end_date && ($end_date - $start_date) <= 105*86400 ){
    	return $this->default_data($country, $date_time);
    }else {
    	return $this->default_data($country);
    }
  }
}
