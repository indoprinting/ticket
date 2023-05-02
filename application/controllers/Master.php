<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Master extends CI_Controller {



	public function __construct() 

	{

		parent::__construct();

		$this->load->model("ticket_model");

		$this->load->model("master_model");

		if(!$this->session->isLogin){

			redirect_to(base_url());

		}

	}



	public function index()

	{



	}



	public function department()

	{

		$query = $this->ticket_model->getDepartment();



		$ress['data'] = $query->result();



		$this->load->view('v_header');

		$this->load->view('v_department', $ress);

		$this->load->view('v_footer');

	}



	public function adddept()

	{

		$data = $_POST;

		$insert = $this->master_model->addDepartment($data);



		if($insert>0){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Department successfully created');

			redirect_to('master/department');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Department failed to be created');

			redirect_to('master/department');

		}

	}



	public function editdept($id)

	{

		$data = $_POST;

		$update = $this->master_model->editDepartment($id, $data);



		if($update){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Department successfully updated');

			redirect_to('master/department');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Department failed to be updated');

			redirect_to('master/department');

		}

	}



	public function deletedept($id)

	{

		$data = $_POST;

		$delete = $this->master_model->deleteDepartment($id);



		if($delete){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Department successfully deleted');

			redirect_to('master/department');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Department failed to be deleted');

			redirect_to('master/department');

		}

	}







	public function subject()

	{

		$query = $this->ticket_model->getSubject();



		$ress['data'] = $query->result();



		$this->load->view('v_header');

		$this->load->view('v_subject', $ress);

		$this->load->view('v_footer');

	}



	public function addsubject()

	{

		$data = $_POST;

		$insert = $this->master_model->addSubject($data);



		if($insert>0){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Ticket Subject successfully created');

			redirect_to('master/subject');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Ticket Subject failed to be created');

			redirect_to('master/subject');

		}

	}



	public function editsubject($id)

	{

		$data = $_POST;

		$update = $this->master_model->editSubject($id, $data);



		if($update){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Ticket Subject successfully updated');

			redirect_to('master/subject');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Ticket Subject failed to be updated');

			redirect_to('master/subject');

		}

	}



	public function deletesubject($id)

	{

		$data = $_POST;

		$delete = $this->master_model->deleteSubject($id);



		if($delete){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Ticket Subject successfully deleted');

			redirect_to('master/subject');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Ticket Subject failed to be deleted');

			redirect_to('master/subject');

		}

	}



	public function equipment()

	{

		$query = $this->ticket_model->getEquipment();



		$ress['data'] = $query->result();

		$ress['department'] = $this->ticket_model->getDepartment()->result();



		$this->load->view('v_header');

		$this->load->view('v_equipment', $ress);

		$this->load->view('v_footer');

	}



	public function addequipment()

	{

		$data = $_POST;

		$insert = $this->master_model->addEquipment($data);



		if($insert>0){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Equipment successfully created');

			redirect_to('master/equipment');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Equipment failed to be created');

			redirect_to('master/equipment');

		}

	}



	public function editequipment($id)

	{

		$data = $_POST;

		$update = $this->master_model->editEquipment($id, $data);



		if($update){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Equipment successfully updated');

			redirect_to('master/equipment');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Equipment failed to be updated');

			redirect_to('master/equipment');

		}

	}



	public function deleteequipment($id)

	{

		$data = $_POST;

		$delete = $this->master_model->deleteEquipment($id);



		if($delete){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Equipment successfully deleted');

			redirect_to('master/equipment');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Equipment failed to be deleted');

			redirect_to('master/equipment');

		}

	}



	public function category()

	{

		$query = $this->master_model->getCategory();



		$ress['data'] = $query->result();

		$ress['parent'] = $this->master_model->getParentCategory()->result();



		$this->load->view('v_header');

		$this->load->view('v_category', $ress);

		$this->load->view('v_footer');

	}



	public function addcategory()

	{

		$data = $_POST;

		$insert = $this->master_model->addCategory($data);



		if($insert>0){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Category successfully created');

			redirect_to('master/category');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Category failed to be created');

			redirect_to('master/category');

		}

	}



	public function editcategory($id)

	{

		$data = $_POST;

		$update = $this->master_model->editCategory($id, $data);



		if($update){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Category successfully updated');

			redirect_to('master/category');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Category failed to be updated');

			redirect_to('master/category');

		}

	}



	public function deletecategory($id)

	{

		$data = $_POST;

		$delete = $this->master_model->deleteCategory($id);



		if($delete){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Category successfully deleted');

			redirect_to('master/category');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Category failed to be deleted');

			redirect_to('master/category');

		}

	}



	public function knowledge()

	{

		$query = $this->master_model->getKnowledge();



		$ress['data'] = $query->result();

		$ress['category'] = $this->master_model->getParentCategory()->result();



		$this->load->view('v_header');

		$this->load->view('v_knowledge', $ress);

		$this->load->view('v_footer');

	}



	public function addknowledge()

	{

		$data = $_POST;

		$insert = $this->master_model->addKnowledge($data);



		if($insert>0){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Knowledge base successfully created');

			redirect_to('master/knowledge');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Knowledge base failed to be created');

			redirect_to('master/knowledge');

		}

	}



	public function editknowledge($id)

	{

		$data = $_POST;

		$update = $this->master_model->editKnowledge($id, $data);



		if($update){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Knowledge base successfully updated');

			redirect_to('master/knowledge');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Knowledge base failed to be updated');

			redirect_to('master/knowledge');

		}

	}



	public function deleteknowledge($id)

	{

		$data = $_POST;

		$delete = $this->master_model->deleteKnowledge($id);



		if($delete){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Knowledge base successfully deleted');

			redirect_to('master/knowledge');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Knowledge base failed to be deleted');

			redirect_to('master/knowledge');

		}

	}



	public function getSubs($parentId)

	{

		$cat = $this->master_model->getChildCategory($parentId)->result();



		$html = '<option value="">-- Select Sub Category --</option>';



		foreach ($cat as $row) {

			$html .= '<option value="'.$row->id.'">'.$row->name.'</option>';

		}



		echo $html;

		

	}



	public function getknowledge($id)

	{

		$ress['knowledge'] = $this->master_model->getKnowledgeById($id)->row();



		$cat = $this->master_model->getChildCategory($ress['knowledge']->category_id)->result();



		$html = '<option value="">-- Select Sub Category --</option>';



		foreach ($cat as $row) {

			$html .= '<option value="'.$row->id.'">'.$row->name.'</option>';

		}



		$ress['subs'] = $html;



		echo json_encode($ress);

		

	}



	public function Sopsubject()

	{

		$query = $this->master_model->getSopsubject();



		$ress['data'] = $query->result();



		$this->load->view('v_header');

		$this->load->view('v_sopsubject', $ress);

		$this->load->view('v_footer');

	}

	

	public function addsopsubject()

	{

		$data = $_POST;

		$insert = $this->master_model->addSopsubject($data);



		if($insert>0){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Sop Violation Subject successfully created');

			redirect_to('master/Sopsubject');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Sop Violation Subject failed to be created');

			redirect_to('master/Sopsubject');

		}

	}



	public function editsopsubject($id)

	{

		$data = $_POST;

		$update = $this->master_model->editSopsubject($id, $data);



		if($update){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Sop Violation Subject successfully updated');

			redirect_to('master/Sopsubject');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Sop Violation Subject failed to be updated');

			redirect_to('master/Sopsubject');

		}

	}



	public function deletesopsubject($id)

	{

		$data = $_POST;

		$delete = $this->master_model->deleteSopsubject($id);



		if($delete){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Sop Violation Subject successfully deleted');

			redirect_to('master/Sopsubject');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Sop Violation Subject failed to be deleted');

			redirect_to('master/Sopsubject');

		}

	}



	



}

