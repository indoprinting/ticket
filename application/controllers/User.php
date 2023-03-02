<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("ticket_model");
		if(!$this->session->isLogin){
			redirect(base_url());
		}
	}

	public function index()
	{
		$query = $this->user_model->getAllUser();

		$ress['data'] = $query->result();

		$this->load->view('v_header');
		$this->load->view('v_user', $ress);
		$this->load->view('v_footer');
	}

	public function show()
	{
		
	}

	public function create()
	{
		$ress['department'] = $this->ticket_model->getDepartment()->result();
		$ress['roles'] 		= $this->user_model->getRoles()->result();

		$this->load->view('v_header');
		$this->load->view('v_adduser', $ress);
		$this->load->view('v_footer');
	}

	public function store()
	{
		$data = $_POST;
		$data['status'] = 1;
		$data['created_by'] = $this->session->userID;

		$insert1 = $this->ticket_model->addTicket($data);

		$history['ticket_id'] = $insert1;
		$history['user_id']	  = $this->session->userID;
		$history['message']   = 'Create new ticket';

		$insert2 = $this->ticket_model->addHistory($history);
		
		if($insert1>0){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Ticket successfully created');
			redirect('ticket');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Ticket failed to be created');
			redirect('ticket');
		}
		
	}

	public function edit($id)
	{
		$ress['ticket'] 	= $this->ticket_model->getTicketById($id)->row();
		$ress['subject'] 	= $this->ticket_model->getSubject()->result();
		$ress['department'] = $this->ticket_model->getDepartment()->result();
		$ress['division'] 	= $this->ticket_model->getDivision()->result();
		$ress['assign'] 	= $this->ticket_model->getAssign()->result();
		$ress['priority'] 	= $this->ticket_model->getPriority()->result();
		$ress['equipment'] 	= $this->ticket_model->getEquipment()->result();
		$ress['worker'] 	= $this->ticket_model->getStatusWorker()->result();
		$ress['creator'] 	= $this->ticket_model->getStatusCreator()->result();
		$ress['reply'] 		= $this->ticket_model->getReply($id)->result();
		$ress['history'] 	= $this->ticket_model->getHistory($id)->result();

		$this->load->view('v_header');
		$this->load->view('v_editticket', $ress);
		$this->load->view('v_footer');
		
	}

	public function update($id)
	{
		if ($_POST['assign_id']!='' && $_POST['status']!=''){
			$data 	= $_POST;
			$assign = $this->ticket_model->getAssignName($_POST['assign_id'])->name;
			$status	= $this->ticket_model->getStatusName($_POST['status'])->name;

			if ($_POST['status']=='4' || $_POST['status']=='5') { //if status close or cancel
				$data['close_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));
			}

			$history['ticket_id'] = $id;
			$history['user_id']	  = $this->session->userID;
			$history['message']   = 'assign ticket to '.$assign.' and change status to '.$status;

			$update = $this->ticket_model->editTicket($id, $data);
			$insert = $this->ticket_model->addHistory($history);

			if($update){
				$this->session->set_flashdata('status','success');
				$this->session->set_flashdata('message','Ticket successfully updated');
				redirect('ticket/edit/'.$id);
			} else {
				$this->session->set_flashdata('status','danger');
				$this->session->set_flashdata('message','Ticket failed to be updated');
				redirect('ticket/edit/'.$id);
			}

		} elseif ($_POST['assign_id']!=''){
			$data['assign_id'] 	= $_POST['assign_id'];

			if(isset($_POST['priority'])){
				$data['priority'] 	= $_POST['priority'];
			}

			$assign = $this->ticket_model->getAssignName($_POST['assign_id'])->name;

			$history['ticket_id'] = $id;
			$history['user_id']	  = $this->session->userID;
			$history['message']   = 'assign ticket to '.$assign;

			$update = $this->ticket_model->editTicket($id, $data);
			$insert = $this->ticket_model->addHistory($history);

			if($update){
				$this->session->set_flashdata('status','success');
				$this->session->set_flashdata('message','Ticket successfully updated');
				redirect('ticket/edit/'.$id);
			} else {
				$this->session->set_flashdata('status','danger');
				$this->session->set_flashdata('message','Ticket failed to be updated');
				redirect('ticket/edit/'.$id);
			}

		} elseif ($_POST['status']!=''){
			$data['status'] 	= $_POST['status'];

			if(isset($_POST['priority'])){
				$data['priority'] 	= $_POST['priority'];
			}
			
			$status	= $this->ticket_model->getStatusName($_POST['status'])->name;

			if ($_POST['status']=='4' || $_POST['status']=='5') { //if status close or cancel
				$data['close_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));
			}

			$history['ticket_id'] = $id;
			$history['user_id']	  = $this->session->userID;
			$history['message']   = 'change status to '.$status;

			$update = $this->ticket_model->editTicket($id, $data);
			$insert = $this->ticket_model->addHistory($history);

			if($update){
				$this->session->set_flashdata('status','success');
				$this->session->set_flashdata('message','Ticket successfully updated');
				redirect('ticket/edit/'.$id);
			} else {
				$this->session->set_flashdata('status','danger');
				$this->session->set_flashdata('message','Ticket failed to be updated');
				redirect('ticket/edit/'.$id);
			}

		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Something went wrong, please try again');
			redirect('ticket/edit/'.$id);
		}
	}

	public function destroy()
	{
		
	}

	public function changepass()
	{
		$this->load->view('v_header');
		$this->load->view('v_changepass');
		$this->load->view('v_footer');
	}

	public function updatePass($id)
	{
		$data['password'] = password_hash($_POST['newpass'], PASSWORD_DEFAULT);

		$update = $this->user_model->editUser($id, $data);

		if($update){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Change Password successfully');
			redirect('user/changepass');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Wrong Old Password');
			redirect('user/changepass');
		}

	}

	public function getnotif($id)
	{
		$all 	= $this->user_model->getAllNotif($id)->result();
		$new 	= $this->user_model->getNewNotif($id)->num_rows();
		$html 	= '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i>';

		if($new>0){
			$html 	.= '<span class="label label-lightred notif-new">'.$new.'</span>';
		}

		$html 	.= '</a><ul class="dropdown-menu pull-right message-ul">';
		
		$counter = 0;
		foreach ($all as $row) {
			// $row = $all[$i];
			$bg = '';
			if ($row->is_read==0){
				$bg = 'style="background-color: lightcyan;"';
			}
			$html 	.= '<li '.$bg.'><a href="'.base_url().$row->url.'?b=assignticket"><div class="details"><div class="name">'.$row->from_name.'</div><div class="message">'.$row->message.'</div></div></a></li>';
			$counter++;
			if($counter==5){
				break; 
			}
		}					

		$html 	.= '<li><a href="'.base_url().'user/notification" class="more-messages">See all notification<i class="fa fa-arrow-right"></i></a></li></ul>';

		echo $html;
	}

	public function readnotif($id)
	{
		$all 	= $this->user_model->readAllNotif($id);
		
		echo $html;
	}

	public function notification()
	{
		$ress['notif'] = $this->user_model->getAllNotif($this->session->userID)->result();

		$this->load->view('v_header');
		$this->load->view('v_notification', $ress);
		$this->load->view('v_footer');
	}



}
