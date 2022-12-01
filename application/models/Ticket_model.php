<?php

class Ticket_model extends CI_Model 
{
	public function getAllTicket() 
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->where_not_in('tickets.status', [4, 5])
			->order_by('tickets.id', 'DESC')
			->get("tickets");
	}

	public function getMyTicket($userId) 
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->where("tickets.created_by", $userId)
			->where_not_in('tickets.status', [4, 5])
			->order_by('tickets.id', 'DESC')
			->get("tickets");
	}

	public function getAssignTicket($userId) 
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->join('ticket_assignments ta', 'tickets.id = ta.ticket_id', 'left')
			->where('ta.user_id', $userId)
			->where_not_in('tickets.status', [4, 5])
			->group_by('tickets.id')
			->order_by('tickets.id', 'DESC')
			->get("tickets");
	}

	public function getDepartmentTicket($deptId=0) 
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->where('tickets.department_id', $deptId)
			->where_not_in('tickets.status', [4, 5])
			->order_by('tickets.id', 'DESC')
			->get("tickets");
	}

	public function getLocationTicket($deptId=0) 
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->where('tickets.division_id', $deptId)
			->where_not_in('tickets.status', [4, 5])
			->order_by('tickets.id', 'DESC')
			->get("tickets");
	}

	public function getHistoryTicket($userId) 
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->where_in('tickets.status', [4, 5])
			->group_start()
				->where('tickets.assign_id', $userId)
				->or_where("tickets.created_by", $userId)
			->group_end()
			->order_by('tickets.id', 'DESC')
			->get("tickets");
	}

	public function getTicketById($id)
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name, t.name as part_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->join('sparepart t', 'tickets.part_code = t.part_code', 'left')
			->where("tickets.id", $id)
			->get("tickets");
	}

	public function getAllsubjects() 
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->order_by('tickets.id', 'DESC')
			->get("tickets");
	}

	public function getbysubjects($bd,$ed,$subject) 
	{
		return $this->db->select("tickets.*, u1.name as created_name, u2.name as assigned_name, d1.name as department_name, d2.name as location_name, p.name as priority_name, s.name as status_name, e.name as equip_name, sp.name as part_name")
			->join('users u1', 'tickets.created_by = u1.id', 'left')
			->join('users u2', 'tickets.assign_id = u2.id', 'left')
			->join('departments d1', 'tickets.department_id = d1.id', 'left')
			->join('departments d2', 'tickets.division_id = d2.id', 'left')
			->join('ticket_priorities p', 'tickets.priority = p.id', 'left')
			->join('ticket_statuses s', 'tickets.status = s.id', 'left')
			->join('equipments e', 'tickets.equip_code = e.code', 'left')
			->join('sparepart sp', 'tickets.part_code = sp.part_code', 'left')
			->where("date(tickets.created_date) >=",$bd)
			->where("date(tickets.created_date) <=",$ed)
			->where("tickets.subject",$subject)
			->order_by('tickets.id', 'DESC')
			->get("tickets");
	}

	public function addTicket($data) 
	{
		$this->db->insert("tickets", $data);
		return $this->db->insert_id();
	}

	public function editTicket($id, $data) 
	{
		return $this->db->where("id", $id)->update("tickets", $data);
	}

	public function deleteTicket($id) 
	{
		return $this->db->where("id", $id)->delete("tickets");
	}

	public function getSubject()
	{
		return $this->db->select("*")->get("ticket_subjects");
	}

	public function getDepartment()
	{
		return $this->db->select("*")->get("departments");
	}

	public function getDivision()
	{
		return $this->db->select("*")->get("divisions");
	}

	public function getAssign()
	{
		return $this->db->select("*")->where("roles_id !=", "99")->where("id !=", "1")->get("users");
	}

	public function getPriority()
	{
		return $this->db->select("*")->get("ticket_priorities");
	}

	public function getEquipment()
	{
		return $this->db->select("equipments.*, d1.name as department_name")
			->join('departments d1', 'equipments.department_id = d1.id', 'left')
			->get("equipments");
	}

	public function getEquipByDept($deptId)
	{
		return $this->db->select("*")->where("department_id", $deptId)->get("equipments");
	}

	public function getPartBySubject()
	{
		return $this->db->select("*")->get("sparepart");
		//return $this->db->select("*")->where("subject_id", $subjectId)->get("sparepart");
	}

	public function getTakePart($subid)
	{
		
		return $this->db->select("*")->where("jenis", $subid)->get("sparepart");
	}

	public function getStatusWorker()
	{
		return $this->db->select("*")->where("code", "1")->get("ticket_statuses");
	}

	public function getStatusCreator()
	{
		return $this->db->select("*")->where("code", "2")->get("ticket_statuses");
	}

	public function getReply($ticket_id)
	{
		return $this->db->select("ticket_replies.*, u1.name as user_name")
			->join('users u1', 'ticket_replies.user_id = u1.id', 'left')
			->where("ticket_id", $ticket_id)
			->order_by('ticket_replies.id', 'DESC')
			->get("ticket_replies");
	}

	public function getHistory($ticket_id)
	{
		return $this->db->select("ticket_histories.*, u1.name as user_name")
			->join('users u1', 'ticket_histories.user_id = u1.id', 'left')
			->where("ticket_id", $ticket_id)
			->order_by('ticket_histories.id', 'DESC')
			->get("ticket_histories");
	}

	public function getAssignName($id)
	{
		return $this->db->select("name")->where("id", $id)->get("users")->row();
	}

	public function getStatusName($id)
	{
		return $this->db->select("name")->where("id", $id)->get("ticket_statuses")->row();
	}

	public function getpriorityName($id)
	{
		return $this->db->select("name")->where("id", $id)->get("ticket_priorities")->row();
	}

	public function addHistory($data) 
	{
		$this->db->insert("ticket_histories", $data);
		return $this->db->insert_id();
	}

	public function addReply($data) 
	{
		$this->db->insert("ticket_replies", $data);
		return $this->db->insert_id();
	}

	public function getAutoClose() 
	{
		return $this->db->select("*")
			->where("auto_close", 1)
			->where('close_date is NULL', NULL, FALSE)
			->where("done_date <", date('Y-m-d H:i:s', strtotime("-2 days")))
			->where("status", 3)
			->get("tickets");
	}

	public function addAssignment($data) 
	{
		$this->db->insert("ticket_assignments", $data);
		return $this->db->insert_id();
	}

	public function getPenalty()
	{
		return $this->db->select("*")
		->order_by('assign_id', 'ASC')
		->order_by('date_penalty', 'ASC')
		->get("ticket_penalty");
	}

	public function getPenaltytot()
	{
		return $this->db->select("date_penalty,assign_id,pin,name,sum(ttl_ticket) as ttl_ticket,5000 as penalty,sum(total) as total")
		->group_by('assign_id')
		->order_by('total', 'DESc')
		->get("ticket_penalty");
	}

}

?>