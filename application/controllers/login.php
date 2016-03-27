<?php
class login extends CI_Controller{

	public function index(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->load->helper('url');
		if($username == 'admin' && $password == 'buzhidao'){
			$title['title'] = "菜单页面";
    		$this->load->view('templates/header',$title);
			$this->load->view('pages/menu.php');
			$this->load->view('templates/footer');
		}else{
			$title['title'] = "登录页面";
    		$this->load->view('templates/header',$title);
			$this->load->view('pages/login.php');
			$this->load->view('templates/footer');
		}
	}

}
