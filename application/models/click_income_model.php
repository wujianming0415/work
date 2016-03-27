<?php
class click_income_model extends CI_Model{
  
  /**
   * @构造方法连接数据库
   */
  public function __construct(){
    
    $this->load->database();
  }
  
  public function default_data($start_date, $end_date){
  	
  	$j = 0;
  	
  	for($i = $end_date; $i >= $start_date; $i-=7*86400){
  		$query = $this->db->get_where('stat_income', array('week_time =' => $i));
  		$result = $query->result_array();
  		$size = count($result);
  		
  		$all_result[$j]['week_time'] = date('m月d日', $i)."~".date('m月d日', $i + 6*86400);
  		
  		$all_result[$j]['br_click'] = 0;
  		$all_result[$j]['br_income'] = 0;
  		$all_result[$j]['tr_click'] = 0;
  		$all_result[$j]['tr_income'] = 0;
  		$all_result[$j]['pl_click'] = 0;
  		$all_result[$j]['pl_income'] = 0;
  		$all_result[$j]['fr_click'] = 0;
  		$all_result[$j]['fr_income'] = 0;
  		$all_result[$j]['ar_click'] = 0;
  		$all_result[$j]['ar_income'] = 0;
  		$all_result[$j]['es_click'] = 0;
  		$all_result[$j]['es_income'] = 0;
  		$all_result[$j]['de_click'] = 0;
  		$all_result[$j]['de_income'] = 0;
  		$all_result[$j]['it_click'] = 0;
  		$all_result[$j]['it_income'] = 0;
  		$all_result[$j]['mx_click'] = 0;
  		$all_result[$j]['mx_income'] = 0;
  		$all_result[$j]['in_click'] = 0;
  		$all_result[$j]['in_income'] = 0;
  		$all_result[$j]['other_click'] = 0;
  		$all_result[$j]['other_income'] = 0;
  		$all_result[$j]['all_click'] = 0;
  		$all_result[$j]['all_income'] = 0;
  		
  		for($m = 0; $m < $size; $m++){
  			switch ($result[$m]['identify']) {
  				case "BR":
  					$all_result[$j]['br_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['br_income'] += $result[$m]['income'];	
  					break;
  				case "TR":
  					$all_result[$j]['tr_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['tr_income'] += $result[$m]['income'];
  					break;
  				case "PL":
  					$all_result[$j]['pl_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['pl_income'] += $result[$m]['income'];
  					break;
  				case "FR":
  					$all_result[$j]['fr_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['fr_income'] += $result[$m]['income'];
  					break;
  				case "AR":
  					$all_result[$j]['ar_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['ar_income'] += $result[$m]['income'];
  					break;
  				case "ES":
  					$all_result[$j]['es_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['es_income'] += $result[$m]['income'];
  					break;
  				case "DE":
  					$all_result[$j]['de_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['de_income'] += $result[$m]['income'];
  					break;
  				case "IT":
  					$all_result[$j]['it_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['it_income'] += $result[$m]['income'];
  					break;
  				case "MX":
  					$all_result[$j]['mx_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['mx_income'] += $result[$m]['income'];
  					break;
  				case "IN":
  					$all_result[$j]['in_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['in_income'] += $result[$m]['income'];
  					break;
  				case "Other":
  					$all_result[$j]['other_click'] += $result[$m]['click_nums'];
  					$all_result[$j]['other_income'] += $result[$m]['income'];
  					break;

  			}
  			
  		}
  		$all_result[$j]['all_click'] = $all_result[$j]['br_click']+$all_result[$j]['tr_click']+$all_result[$j]['pl_click']+$all_result[$j]['fr_click']+$all_result[$j]['ar_click']+$all_result[$j]['es_click']+$all_result[$j]['de_click']+$all_result[$j]['it_click']+$all_result[$j]['mx_click']+$all_result[$j]['in_click']+$all_result[$j]['other_click'];
  		$all_result[$j]['all_income'] = $all_result[$j]['br_income']+$all_result[$j]['tr_income']+$all_result[$j]['pl_income']+$all_result[$j]['fr_income']+$all_result[$j]['ar_income']+$all_result[$j]['es_income']+$all_result[$j]['de_income']+$all_result[$j]['it_income']+$all_result[$j]['mx_income']+$all_result[$j]['in_income']+$all_result[$j]['other_income'];
  		
  		
  		$j++;
  		
  	}
  	
    return $all_result;
  }
  
  public function set_data(){
  		
    $this->load->helper('form');
	$week_time = $this->input->post('week_time');
	$week_time = strtotime(date('Y-m-d',strtotime($week_time)-date('w',strtotime($week_time))*86400));
	$identify = $this->input->post('identify');
	$market = $this->input->post('market');
	$web_union = $this->input->post('web_union');
	$offer_name = $this->input->post('offer_name');
	$type = $this->input->post('type');
	$link = $this->input->post('link');
	$camp_id = $this->input->post('camp_id');
	$income = $this->input->post('income');
	$day_1 = $this->input->post('day_0');
	$day_2 = $this->input->post('day_1');
	$day_3 = $this->input->post('day_2');
	$day_4 = $this->input->post('day_3');
	$day_5 = $this->input->post('day_4');
	$day_6 = $this->input->post('day_5');
	$day_7 = $this->input->post('day_6');
	
    $size = count($identify);
    $is_error = TRUE;
    for($i = 0; $i < $size; $i++){
    	if($income[$i] == null ||$income[$i] == ''){
    		$income[$i] = 0;
    	}
		  $data = array(
				    'identify' => $identify[$i],
		      	'market' => $market[$i],
		      	'web_union' => $web_union[$i],
		      	'offer_name' => $offer_name[$i],
		      	'type' => $type[$i],
		      	'link' => $link[$i],
		      	'camp_id' => $camp_id[$i],
		      	'click_nums' => $day_1[$i]+$day_2[$i]+$day_3[$i]+$day_4[$i]+$day_5[$i]+$day_6[$i]+$day_7[$i],
	   		  	'income' => $income[$i],
		      	'day_1' => $day_1[$i],
		      	'day_2' => $day_2[$i],
		      	'day_3' => $day_3[$i],
		      	'day_4' => $day_4[$i],
		      	'day_5' => $day_5[$i],
		      	'day_6' => $day_6[$i],
		      	'day_7' => $day_7[$i],
		      	'week_time' => $week_time,
		      	'create_time' => time()
		  ); 
		   
      $query = $this->db->insert('stat_income', $data); 	
      if(!$query){
        $is_error = FALSE;
      }
    }
    return $is_error;
  }
  
  /**
   * @修改数据库已存在数据
   */
  public function alter(){
  	
  	$this->load->helper('form');
  	
  	$data = array(
  			'identify' => $this->input->post('identify'),
  			'market' => $this->input->post('market'),
  			'web_union' => $this->input->post('web_union'),
  			'offer_name' => $this->input->post('offer_name'),
  			'type' => $this->input->post('type'),
  			'link' => $this->input->post('link'),
  			'camp_id' => $this->input->post('camp_id'),
  			'click_nums' => $this->input->post('day_1')+$this->input->post('day_2')+$this->input->post('day_3')+$this->input->post('day_4')+$this->input->post('day_5')+$this->input->post('day_6')+$this->input->post('day_7'),
  			'income' => $this->input->post('income'),
  			'day_1' => $this->input->post('day_1'),
  			'day_2' => $this->input->post('day_2'),
  			'day_3' => $this->input->post('day_3'),
  			'day_4' => $this->input->post('day_4'),
  			'day_5' => $this->input->post('day_5'),
  			'day_6' => $this->input->post('day_6'),
  			'day_7' => $this->input->post('day_7'),
  			'update_time' => time()
  	);
  	foreach ( $data as &$value ){
  		if( $value == ''){
  			$value = null;
  		}
  	}
  	$result= $this->db->update('stat_income', $data, array('id' => $this->input->post('id')));
  	return $result;
  }
  
  /**
   * @显示可以修改的数据
   */
  public function alter_data( $week_time ){
  	
    $query = $this->db->get_where('stat_income', array('week_time =' => $week_time));
  	return $query->result_array();
  }
}
