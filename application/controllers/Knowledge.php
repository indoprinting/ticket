<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("master_model");
		if(!$this->session->isLogin){
			redirect_to(base_url());
		}
	}

	public function index()
	{
		$cat = $this->master_model->getParentCategory()->result();
		foreach ($cat as $row) {
			$data['id'] = $row->id;
			$data['name'] = $row->name;
			$data['subs'] = $this->master_model->getChildCategory($row->id)->result();
			$datas[] = $data;
		}

		$ress['category'] = $datas;

		$this->load->view('v_header');
		$this->load->view('v_knowledge_base', $ress);
		$this->load->view('v_footer');
	}

	public function detail($id)
	{
		$cat = $this->master_model->getChildCategory($id)->result();
		foreach ($cat as $row) {
			$data['id'] = $row->id;
			$data['name'] = $row->name;
			$data['knowledge'] = $this->master_model->getKnowledgeByCategory($id, $row->id)->result();
			$datas[] = $data;
		}

		$ress['category'] = $datas;

		$this->load->view('v_header');
		$this->load->view('v_knowledge_detail', $ress);
		$this->load->view('v_footer');
	}

}
