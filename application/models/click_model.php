<?php
class click_model extends CI_Model{
  
  /**
   * @构造方法连接数据库
   */
  public function __construct(){
    
    $this->load->database();
  }
  
  /**
   * @默认获取数据库内容，默认时间段位最近15天，若获取其他国家的内容，需按日期索引后用总数减去每个国家的数据
   */
  public function default_data($country, $start_time = '', $end_time = ''){
  	
  	if($start_time == ''||$end_time ==''){
    	$start_date = strtotime(date('Y-m-d', time()-15*86400));
    	$end_date = strtotime(date('Y-m-d', time()));	
  	}else{
  		$start_date = $start_time;
    	$end_date = $end_time;
  	}
  	if($country !== "other"){
  		$query = $this->db->get_where('stat_click',array('date_time >=' => $start_date, 'date_time <=' => $end_date, 'country =' => $country));
    	return $query->result_array();
  	}
  	$query = $this->db->get_where('stat_click',array('date_time >=' => $start_date, 'date_time <=' => $end_date, 'country !=' => 'ALL'));
    $result = $query->result_array();
    $query_all = $this->db->get_where('stat_click',array('date_time >=' => $start_date, 'date_time <=' => $end_date, 'country =' => 'ALL'));
    $all_result = $query_all->result_array();
   	$size = count($result);
   	if($size > 0){
	  	
	   	for($i=0; $i < count($all_result); $i++){
	   		$active_daily = $all_result[$i]['active_daily'];
	   		$click_nums_1 = $all_result[$i]['click_nums_1'];
	    	$click_nums_2 = $all_result[$i]['click_nums_2'];
	    	$click_nums_3 = $all_result[$i]['click_nums_3'];
	    	$click_nums_all = $all_result[$i]['click_nums_all'];
	    	for($j=0; $j < $size; $j++){
	    		
	    		if($all_result[$i]['date_time'] == $result[$j]['date_time']){
	    			$active_daily -= $result[$j]['active_daily'];
	    			$click_nums_1 -= $result[$j]['click_nums_1'];
	    			$click_nums_2 -= $result[$j]['click_nums_2'];
	    			$click_nums_3 -= $result[$j]['click_nums_3'];
	    			$click_nums_all -= $result[$j]['click_nums_all'];
	    		}
	    	}
	    	$count_result[$i] = array($i, 'date_time' => $all_result[$i]['date_time'], 'active_daily' => $active_daily, 'click_nums_1' => $click_nums_1, 'click_nums_2' => $click_nums_2, 'click_nums_3' => $click_nums_3, 'click_nums_all' => $click_nums_all, 'remark' => '');
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
    $country = $this->input->post('country');

    if($start_date <= $end_date && ($end_date - $start_date) <= 31*86400 ){
    	if($country == 'other'){
    		return $this->default_data($country, $start_date, $end_date);
    	}
    	$query = $this->db->get_where('stat_click',array('date_time >=' => $start_date, 'date_time <=' => $end_date, 'country =' => $country));
    	return $query->result_array();
    }else {
    	return $this->default_data($country);
    }
  }
  
  /**
   * @获取表单输入内容，处理后插入数据库，已存在数据不能插入
   */
  public function set_data(){
  	
    $this->load->helper('url');
    $all_data = array(
    	array($this->input->post('date_nums_7'),$this->input->post('active_daily_7'),$this->input->post('click_nums_1_7'),$this->input->post('click_nums_2_7'),$this->input->post('click_nums_3_7'),$this->input->post('country_7')),
    	array($this->input->post('date_nums_6'),$this->input->post('active_daily_6'),$this->input->post('click_nums_1_6'),$this->input->post('click_nums_2_6'),$this->input->post('click_nums_3_6'),$this->input->post('country_6')),
    	array($this->input->post('date_nums_5'),$this->input->post('active_daily_5'),$this->input->post('click_nums_1_5'),$this->input->post('click_nums_2_5'),$this->input->post('click_nums_3_5'),$this->input->post('country_5')),
    	array($this->input->post('date_nums_4'),$this->input->post('active_daily_4'),$this->input->post('click_nums_1_4'),$this->input->post('click_nums_2_4'),$this->input->post('click_nums_3_4'),$this->input->post('country_4')),
    	array($this->input->post('date_nums_3'),$this->input->post('active_daily_3'),$this->input->post('click_nums_1_3'),$this->input->post('click_nums_2_3'),$this->input->post('click_nums_3_3'),$this->input->post('country_3')),
    	array($this->input->post('date_nums_2'),$this->input->post('active_daily_2'),$this->input->post('click_nums_1_2'),$this->input->post('click_nums_2_2'),$this->input->post('click_nums_3_2'),$this->input->post('country_2')),
    	array($this->input->post('date_nums_1'),$this->input->post('active_daily_1'),$this->input->post('click_nums_1_1'),$this->input->post('click_nums_2_1'),$this->input->post('click_nums_3_1'),$this->input->post('country_1'))
    );
    
    for($i=0; $i<7; $i++){
    	if($all_data[$i][1]){
    		for($j=2; $j<5; $j++){
    			if($all_data[$i][$j] == '' || $all_data[$i][$j]== null){
    				$all_data[$i][$j] = 0;
    			}
    		}
		    $data = array(
		      'date_time' => strtotime($all_data[$i][0]),
		      'active_daily' => $all_data[$i][1],
		      'click_nums_1' => $all_data[$i][2],
		      'click_nums_2' => $all_data[$i][3],
		      'click_nums_3' => $all_data[$i][4],
		      'click_nums_all' => $all_data[$i][2] + $all_data[$i][3] + $all_data[$i][4],
		      'create_time' => time(), 
		      'country' =>  $all_data[$i][5]
		    );
		    if($data['date_time']){
				$query = $this->db->get_where('stat_click',array('date_time =' => $data['date_time'], 'country =' => $data['country']));   	
			    if(!$query->result_array()){
			    	$this->db->insert('stat_click', $data);		    		
			    }else{
			       	return FALSE;
			    }
		    }
    	}
    }
    return TRUE;
  }
  
  /**
   * @修改数据库已存在数据
   */
  public function alter_data(){
  	
    $this->load->helper('url');
    $alter_data = array(	
    	'active_daily' => $this->input->post('active_daily'),
    	'click_nums_1' => $this->input->post('click_nums_1'),
    	'click_nums_2' => $this->input->post('click_nums_2'),
    	'click_nums_3' => $this->input->post('click_nums_3'),
    	'click_nums_all' => $this->input->post('click_nums_1') + $this->input->post('click_nums_2') + $this->input->post('click_nums_3'),
    	'create_time' => time(), 
    	);
    
    $result= $this->db->update('stat_click', $alter_data, array('country' => $this->input->post('country'),'date_time' =>  strtotime($this->input->post('date_time'))));

    return TRUE;
  }
}
