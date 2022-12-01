<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Allticket extends CI_Controller {

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
		$query = $this->ticket_model->getAllTicket();

		$ress['data'] = $query->result();

		$this->load->view('v_header');
		$this->load->view('v_allticket', $ress);
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
		$this->load->view('v_addallticket', $ress);
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
				redirect('ticket');
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
			redirect('allticket');
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Ticket failed to be created');
			redirect('allticket');
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
		$this->load->view('v_editallticket', $ress);
		$this->load->view('v_footer');
		
	}

	public function update($id)
	{
		
		$data  		= [];
		$history 	= [];
		$notif 		= [];
		$reply 		= [];
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
				redirect('allticket/edit/'.$id);
	        }
		}

		if (isset($_POST['status']) && $_POST['status']!='')  {
			$data['status'] = $_POST['status'];
			$status	= $this->ticket_model->getStatusName($_POST['status'])->name;

			if (isset($_POST['status']) && $_POST['status']=='4' || $_POST['status']=='5') { //if status close or cancel
				$data['close_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));
			}

			if (isset($_POST['status']) && $_POST['status']=='3') { //if status done
				$data['done_date'] = date('Y-m-d H:i:s', strtotime(TO_LOCAL_TIME));

				$notif['from_id']	= $this->session->userID;
				$notif['url']		= 'ticket/edit/'.$id;
				$notif['message']	= "completed your ticket";
				$notif['user_id']	= $ticket->created_by;
				$this->user_model->addNotif($notif);
			}

			if (isset($_POST['status']) && $_POST['status']=='6') { //if status re open
				$data['done_date'] = NULL;
			}

			if(isset($_POST['status']) && $_POST['status'] != $ticket->status) {
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
		
			if (isset($_POST['status']) && $_POST['due_date']!='') {
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
			
		if (isset($_POST['part_qty']) && $_POST['part_qty']!='')  {
			$data['part_qty'] = $_POST['part_qty'];
		}
		
		if (isset($_POST['reply']) && $_POST['reply']!='') {
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

		if (isset($_POST['assign_id']) && $_POST['assign_id']!='') {
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

		if($update){
			$this->session->set_flashdata('status','success');
			$this->session->set_flashdata('message','Ticket successfully updated');
			redirect('allticket/edit/'.$id);
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','Ticket failed to be updated');
			redirect('allticket/edit/'.$id);
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
			redirect('allticket/edit/'.$id);
		} else {
			$this->session->set_flashdata('status','danger');
			$this->session->set_flashdata('message','You failed to reply a message');
			redirect('allticket/edit/'.$id);
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

	// Export ke excel
	public function export()
	{
		$data = $this->ticket_model->getAllTicket()->result();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Intranet Ticketing')
		// ->setLastModifiedBy('Andoyo - Java Web Medi')
		->setTitle('All Ticket');
		// ->setSubject('Office 2007 XLSX Test Document')
		// ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		// ->setKeywords('office 2007 openxml php')
		// ->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'Created Date')
		->setCellValue('B1', 'Ticket Subject')
		->setCellValue('C1', 'Ticket Description')
		->setCellValue('D1', 'Department')
		->setCellValue('E1', 'Assigned to')
		->setCellValue('F1', 'Priority')
		->setCellValue('G1', 'Due Date')
		->setCellValue('H1', 'Created by')
		->setCellValue('I1', 'Location')
		->setCellValue('J1', 'Status')
		->setCellValue('K1', 'Eqp Code')
		->setCellValue('L1', 'Point')
		->setCellValue('M1', 'Done Date')
		->setCellValue('N1', 'Rating')
		->setCellValue('O1', 'Time Span')
		->setCellValue('P1', 'Comment')
		;

		// Miscellaneous glyphs, UTF-8
		$i=2; foreach($data as $row) {
			$timeSpan = '-';
			if($row->close_date!='') {
				$datetime1 = new DateTime($row->created_date);
			    $datetime2 = new DateTime($row->done_date);
			    
			    $interval = $datetime1->diff($datetime2);
			    
				$timeSpan = $interval->format('%d Days %h Hours');
			}

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, date('Y-m-d H:i', strtotime($row->created_date)))
		->setCellValue('B'.$i, $row->subject)
		->setCellValue('C'.$i, $row->description)
		->setCellValue('D'.$i, $row->department_name)
		->setCellValue('E'.$i, $row->assigned_name)
		->setCellValue('F'.$i, $row->priority_name)
		->setCellValue('G'.$i, date('Y-m-d H:i', strtotime($row->due_date)))
		->setCellValue('H'.$i, $row->created_name)
		->setCellValue('I'.$i, $row->location_name)
		->setCellValue('J'.$i, $row->status_name)
		->setCellValue('K'.$i, $row->equip_code)
		->setCellValue('L'.$i, $row->point)
		->setCellValue('M'.$i, ($row->done_date!='') ? date('Y-m-d H:i', strtotime($row->done_date)) : '')
		->setCellValue('N'.$i, $row->rating)
		->setCellValue('O'.$i, $timeSpan)
		->setCellValue('P'.$i, $row->notes);
		$i++;
		}
											
		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Report all Ticket '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
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

	

}
