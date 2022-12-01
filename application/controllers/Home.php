<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("ticket_model");
		$this->load->model("user_model");
		if(!$this->session->isLogin){
			redirect(base_url());
		}
	}

	public function index()
	{
		$ress['data'] = $this->user_model->getAllReportAssign()->result();
		$ress['statistik'] = $this->user_model->getAllReportStatistic()->row();

		$this->load->view('v_header');
		$this->load->view('v_home', $ress);
		$this->load->view('v_footer');
	}

	public function test()
	{
		$autoClose = $this->ticket_model->getAllTicket()->result();
		$data['close_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));
		$data['status'] = 4; //id status close

		if($autoClose){
			foreach ($autoClose as $row) {
				if($row->assign_id!=''){
					$assignment['ticket_id'] = $row->id;
					$assignment['user_id'] = $row->assign_id;
				}

				$this->ticket_model->addAssignment($assignment);
			}
		}
		print_r($autoClose);
	}

}
