<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("login_model");
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function login_process()
	{
		$user = $_POST['username'];
		$pass = $_POST['password'];
		
		$data = $this->login_model->getUser($user, $pass);

		if($data && $data->num_rows() > 0){
			$user = $data->row();

			$this->session->set_userdata('isLogin', true);
			$this->session->set_userdata('userID', $user->id);
			$this->session->set_userdata('deptID', $user->department_id);
			$this->session->set_userdata('roles', $user->roles_id);
			$this->session->set_userdata('name', $user->name);
			$this->session->set_userdata('username', $user->username);

			// if($user->roles_id==1){
			// 	redirect_to('home');
			// } elseif($user->roles_id==2){
			// 	redirect_to('karyawan');
			// } if($user->roles_id==3){
			// 	redirect_to('pelanggan');
			// } 
			redirect_to('ticket');
		} else {
			$this->session->set_flashdata('message','username dan password tidak ditemukan');
			redirect_to('login');
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect_to('login');
	}

//	public function test()
//	{
//		echo date('Y-m-d H:i:s');
//	}

}
