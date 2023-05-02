<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Ticket extends CI_Controller {



	public function __construct() 

	{

		parent::__construct();

		$this->load->model("ticket_model");

		$this->load->model("user_model");

		if(!$this->session->isLogin){

			redirect_to(base_url());

		}

	}



	public function index()

	{

		$autoClose = $this->ticket_model->getAutoClose()->result();

		$data['close_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));

		$data['status'] = 4; //id status close



		if($autoClose){

			foreach ($autoClose as $row) {

				$update = $this->ticket_model->editTicket($row->id, $data);

			}

		}



		$query = $this->ticket_model->getMyTicket($this->session->userID);



		$ress['data'] = $query->result();

		$ress['titlebox'] = 'My Ticket Data';



		$this->load->view('v_header');

		$this->load->view('v_ticket', $ress);

		$this->load->view('v_footer');

	}



	public function assignTicket()

	{

		$autoClose = $this->ticket_model->getAutoClose()->result();

		$data['close_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));

		$data['status'] = 4; //id status close



		if($autoClose){

			foreach ($autoClose as $row) {

				$update = $this->ticket_model->editTicket($row->id, $data);

			}

		}

		

		$query = $this->ticket_model->getAssignTicket($this->session->userID);



		$ress['data'] = $query->result();

		$ress['titlebox'] = 'Assign Ticket Data';



		$this->load->view('v_header');

		$this->load->view('v_ticket', $ress);

		$this->load->view('v_footer');

	}



	public function departmentTicket()

	{

		$query = $this->ticket_model->getDepartmentTicket($this->session->deptID);



		$ress['data'] = $query->result();

		$ress['titlebox'] = 'Department Ticket Data';



		$this->load->view('v_header');

		$this->load->view('v_ticket', $ress);

		$this->load->view('v_footer');

	}



	public function locationTicket()

	{

		$query = $this->ticket_model->getLocationTicket($this->session->deptID);



		$ress['data'] = $query->result();

		$ress['titlebox'] = 'Location Ticket Data';



		$this->load->view('v_header');

		$this->load->view('v_ticket', $ress);

		$this->load->view('v_footer');

	}





	public function historyTicket()

	{

		$query = $this->ticket_model->getHistoryTicket($this->session->userID);



		$ress['data'] = $query->result();

		$ress['titlebox'] = 'History Ticket Data';



		$this->load->view('v_header');

		$this->load->view('v_ticket', $ress);

		$this->load->view('v_footer');

	}



	public function reportbySubject()



	{

		$ress = [];

        if(isset($_POST['subject'])){

        	$bd = $_POST['begin_date'];

			$ed = $_POST['end_date'];

			$subject = $_POST['subject'];

			

		    

		    $ress['data'] = $this->ticket_model->getbysubjects($bd,$ed,$subject)->result();

		    

	     } else

	    // {$ress['data'] = $this->ticket_model->getallsubjects()->result();}

	     {

	     	$bd = '';

			$ed = '';

			$subject = '';

	     	$ress['data'] = $this->ticket_model->getbysubjects($bd,$ed,$subject)->result();

	     }

	

		$ress['subject'] = $this->ticket_model->getSubject()->result();

		$this->load->view('v_header');

		$this->load->view('v_bysubjects', $ress);

		$this->load->view('v_footer');

		

	}



	public function show()

	{

		

	}



	public function create()

	{

		$ress['subject'] 	= $this->ticket_model->getSubject()->result();

		$ress['department'] = $this->ticket_model->getDepartment()->result();

		$ress['division'] 	= $this->ticket_model->getDivision()->result();

		$ress['assign'] 	= $this->ticket_model->getAssign()->result();

		$ress['priority'] 	= $this->ticket_model->getPriority()->result();

		$ress['equipment'] 	= $this->ticket_model->getEquipByDept($this->session->deptID)->result();

		$ress['part'] 		= $this->ticket_model->getPartBySubject()->result();



		$this->load->view('v_header');

		$this->load->view('v_addticket', $ress);

		$this->load->view('v_footer');

	}



	public function store()

	{

		$data = $_POST;



		if(!empty($_FILES['attachment']['name'])){

			$new_name = time().$_FILES['attachment']['name'];

			$new_name = str_replace(' ', '_', $new_name);

			$data['attachment'] = $new_name;

	

			$config['upload_path'] = './attachment/';

			$config['allowed_types'] = '*';

			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('attachment'))

	        {

				$this->session->set_flashdata('status','success');

				$this->session->set_flashdata('message','File upload error, please try again.');

				redirect_to('ticket');

	        }

		}



		if(!isset($_POST['division_id'])){

			$data['division_id'] = $this->session->deptID;

		}

		$data['status'] = 1;

		$data['created_by'] = $this->session->userID;



		$insert1 = $this->ticket_model->addTicket($data);



		//add history

		$history['ticket_id'] = $insert1;

		$history['user_id']	  = $this->session->userID;

		$history['message']   = 'Create new ticket';



		$insert2 = $this->ticket_model->addHistory($history);

		

		//add notification ticket/edit/50 finished working on your ticket

		$notif['from_id']	= $this->session->userID;

		$notif['url']		= 'ticket/edit/'.$insert1;



		if($data['assign_id']!=''){

			$notif['message']	= 'assign ticket to you';

			$notif['user_id']	= $data['assign_id'];



			$this->user_model->addNotif($notif);



			$assignment['ticket_id'] = $insert1;

			$assignment['user_id'] = $data['assign_id'];



			$this->ticket_model->addAssignment($assignment);

		} else {

			$notif['message']	= 'create ticket to your department';

			$dept = $this->user_model->getUserByDept($data['department_id'])->result();

			foreach ($dept as $row) {

				$notif['user_id']	= $row->id;



				$this->user_model->addNotif($notif);

			}

		}



		if($insert1>0){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Ticket successfully created');

			redirect_to('ticket');

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Ticket failed to be created');

			redirect_to('ticket');

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

		$ress['equipment'] 	= $this->ticket_model->getEquipByDept($this->session->deptID)->result();

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

		

		$data  		= [];

		$history 	= [];

		$notif 		= [];

		$reply 		= [];

		$assignment	= [];

		$msgHistory	= '';

		$msgNotif	= '';

		$ticket 	= $this->ticket_model->getTicketById($id)->row();



		if(!empty($_FILES['attachment']['name'])){

			$new_name = time().$_FILES['attachment']['name'];

			$new_name = str_replace(' ', '_', $new_name);

			$reply['ticket_id'] 	= $id;

			$reply['user_id']   	= $this->session->userID;

			$reply['attachment'] 	= $new_name;

	

			$config['upload_path'] = './attachment/';

			$config['allowed_types'] = '*';

			$config['file_name'] = $new_name;

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('attachment'))

	        {

				$this->session->set_flashdata('status','success');

				$this->session->set_flashdata('message','File upload error, please try again.');

				redirect_to('ticket/edit/'.$id.'?b='.$b);

	        }

		}



		if (isset($_POST['status']) && ! empty($_POST['status']))  { // 2021-02-16 09:30, Patched by Riyan

			$data['status'] = $_POST['status'];

			$status	= $this->ticket_model->getStatusName($_POST['status'])->name;



			if ($_POST['status']=='4' || $_POST['status']=='5') { //if status close or cancel

				$data['close_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));

			}



			if ($_POST['status']=='3') { //if status done

				$data['done_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));



				$notif['from_id']	= $this->session->userID;

				$notif['url']		= 'ticket/edit/'.$id;

				$notif['message']	= "completed your ticket";

				$notif['user_id']	= $ticket->created_by;

				$this->user_model->addNotif($notif);

			}



			if ($_POST['status']=='6') { //if status re open

				$data['done_date'] = NULL;

			}



			if($_POST['status'] != $ticket->status) {

				$msgHistory .= 'change status to '.$status;

			}



		}

		

		if (isset($_POST['priority'])) {

			if ($_POST['priority']!='')  {

				$data['priority'] = $_POST['priority'];

				$prior = $this->ticket_model->getpriorityName($_POST['priority'])->name;



				if($_POST['priority'] != $ticket->priority) {

					if($msgHistory!=''){

						$msgHistory .= ' and ';

					}

					if($msgNotif!=''){

						$msgNotif .= ' and ';

					}

					$msgHistory .= 'change priority to '.$prior;

					$msgNotif 	.= 'change priority to '.$prior;

				}

			}

		}

		

		if (isset($_POST['due_date'])) {

			if ($_POST['due_date']!='') {

				$data['due_date'] = $_POST['due_date'];



				if($_POST['due_date'] != $ticket->due_date) {

					if($msgHistory!=''){

						$msgHistory .= ' and ';

					}

					if($msgNotif!=''){

						$msgNotif .= ' and ';

					}

					$msgHistory .= 'change due date to '.$data['due_date'];

					$msgNotif 	.= 'change due date to '.$data['due_date'];

				}

			}

		}



		if (isset($_POST['part_qty']) && ! empty($_POST['part_qty']))  { // 2021-02-16 09:31, Patched by Riyan

			$data['part_qty'] = $_POST['part_qty'];

		}

		

		if (isset($_POST['reply']) && ! empty($_POST['reply'])) { // 2021-02-16 09:31, Patched by Riyan

			$data['last_reply_by'] 		= $this->session->userID;

			$data['last_reply_date'] 	= date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));

			$data['notes'] 				= $_POST['reply'];



			if($msgHistory!=''){

				$msgHistory .= ' and ';

			}

			$msgHistory .= 'reply a message';



			$reply['ticket_id'] 	= $id;

			$reply['user_id']   	= $this->session->userID;

			$reply['message']   	= $_POST['reply'];

		}



		if (isset($_POST['assign_id']) && ! empty($_POST['assign_id'])) {

			$data['assign_id'] = $_POST['assign_id'];

			$assign = $this->ticket_model->getAssignName($_POST['assign_id'])->name;



			if ($_POST['assign_id'] != $ticket->assign_id) {

				if($msgHistory!=''){

					$msgHistory .= ' and ';

				}

				if($msgNotif!=''){

					$msgNotif .= ' and ';

				}

				$msgHistory .= 'change assigment to '.$assign;

				$msgNotif 	.= 'assign ticket to you';



				$assignment['ticket_id'] = $id;

				$assignment['user_id'] = $_POST['assign_id'];



				$this->ticket_model->addAssignment($assignment);

			}



			if($msgNotif!='') {

				$notif['from_id']	= $this->session->userID;

				$notif['url']		= 'ticket/edit/'.$id;

				$notif['message']	= $msgNotif;

				$notif['user_id']	= $data['assign_id'];

				$this->user_model->addNotif($notif);

			}

		}



		if($msgHistory!='') {

			$history['ticket_id'] = $id;

			$history['user_id']	  = $this->session->userID;

			$history['message']   = $msgHistory;

			$this->ticket_model->addHistory($history);

		}



		if(isset($reply['ticket_id'])){

			$this->ticket_model->addReply($reply);

		}



		$update = $this->ticket_model->editTicket($id, $data);



		if(isset($_GET['b'])) {

			$b=$_GET['b'];

		} else {

			$b='index';

		}



		if($update){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','Ticket successfully updated');

			redirect_to('ticket/edit/'.$id.'?b='.$b);

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','Ticket failed to be updated');

			redirect_to('ticket/edit/'.$id.'?b='.$b);

		}



	}



	public function destroy()

	{

		

	}



	public function reply($id)

	{

		$data['ticket_id'] 	= $id;

		$data['user_id']   	= $this->session->userID;

		$data['message']   	= $_POST['reply'];



		$note['last_reply_by'] 		= $this->session->userID;

		$note['last_reply_date'] 	= date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));

		$note['notes'] 				= $_POST['reply'];



		$insert = $this->ticket_model->addReply($data);

		$update = $this->ticket_model->editTicket($id, $note);



		if($insert>0){

			$this->session->set_flashdata('status','success');

			$this->session->set_flashdata('message','You successfully reply a message');

			redirect_to('ticket/edit/'.$id);

		} else {

			$this->session->set_flashdata('status','danger');

			$this->session->set_flashdata('message','You failed to reply a message');

			redirect_to('ticket/edit/'.$id);

		}

	}



	public function rating($id)

	{

		$data = $_POST;



		$update = $this->ticket_model->editTicket($id, $data);



		if($update){

			$ret['status'] = 'success';

			$ret['message'] = 'Ticket successfully rated';

			echo json_encode($ret);

		} else {

			$ret['status'] = 'danger';

			$ret['message'] = 'Ticket failed to be rated';

			echo json_encode($ret);

		}

	}



	public function deptEquip($deptId)

	{

		$equip = $this->ticket_model->getEquipByDept($deptId)->result();



		$html = '<option value="">-- Select Equip Code --</option>';



		foreach ($equip as $row) {

			$html .= '<option value="'.$row->code.'">'.$row->code.' - '.$row->name.'</option>';

		}



		echo $html;

		

	}



	public function subjPart($subid)

	{

		$part = $this->ticket_model->getTakePart($subid)->result();



		$html = '<option value="">-- Select Part Code --</option>';



		foreach ($part as $row) {

			$html .= '<option value="'.$row->part_code.'">'.$row->part_code.' - '.$row->name.'</option>';

		}



		echo $html;

		

	}





	public function getPenalty()

	{

	    $ress['data'] = $this->ticket_model->getPenalty()->result();



		$this->load->view('v_header');

		$this->load->view('v_penaltyticket', $ress);

		$this->load->view('v_footer');

	}



    public function getPenaltytot()

	{

	    $ress['data'] = $this->ticket_model->getPenaltytot()->result();



		$this->load->view('v_header');

		$this->load->view('v_penaltytickettot', $ress);

		$this->load->view('v_footer');

	}



}

