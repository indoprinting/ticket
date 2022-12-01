<?php

class User_model extends CI_Model 
{

	public function getAllUser() 
	{
		return $this->db->select("users.*, d.name as department_name, r.name as role_name")
			->join('departments d', 'users.department_id = d.id', 'left')
			->join('roles r', 'users.roles_id = r.id', 'left')
			->where("users.id !=", "1")
			->get("users");
	}

	public function getUserById($id)
	{
		return $this->db->select("*")
			->where("id", $id)
			->get("users");
	}

	public function getUserByDept($dept_id)
	{
		return $this->db->select("*")
			->where("department_id", $dept_id)
			->get("users");
	}

	public function editUser($id, $data) 
	{
		return $this->db->where("id", $id)->update("users", $data);
	}

	public function getRoles()
	{
		return $this->db->select("*")->get("roles");
	}

	public function addNotif($data)
	{
		$this->db->insert("notifications", $data);
		return $this->db->insert_id();
	}

	public function getAllNotif($userId)
	{
		return $this->db->select("notifications.*, u1.name as from_name")
			->where("user_id", $userId)
			->join('users u1', 'notifications.from_id = u1.id', 'left')
			->order_by('notifications.id', 'DESC')
			->get("notifications");
	}

	public function getNewNotif($userId)
	{
		return $this->db->select("*")
			->where("user_id", $userId)
			->where("is_read", 0)
			->order_by('id', 'DESC')
			->get("notifications");
	}

	public function readAllNotif($userId)
	{
		return $this->db->where("user_id", $userId)->update("notifications", array('is_read' => 1));
	}

	public function getAllReportAssign() 
	{
		$sql = "SELECT users.name, SUM(IF( tickets.status = '1' or tickets.status = '6', 1, 0)) as open, SUM(IF( tickets.status = '2', 1, 0)) as progress, SUM(IF( tickets.due_date < '".date('Y-m-d H:i:s')."' and tickets.done_date IS NULL, 1, 0)) as overdue, SUM(IF( tickets.done_date != '', 1, 0)) as done FROM tickets LEFT JOIN users ON users.id = tickets.assign_id WHERE tickets.assign_id != '' GROUP BY tickets.assign_id ORDER BY open DESC";

		$results = $this->db->query($sql);
		
		return $results;
	}

	public function getAllReportStatistic() 
	{
		$sql = "SELECT SUM(IF( tickets.status = '1' or tickets.status = '6', 1, 0)) as open, SUM(IF( tickets.status = '2', 1, 0)) as progress, SUM(IF( tickets.due_date < '".date('Y-m-d H:i:s')."' and tickets.done_date IS NULL, 1, 0)) as overdue, SUM(IF( tickets.done_date != null, 1, 0)) as done FROM tickets LEFT JOIN users ON users.id = tickets.assign_id WHERE tickets.assign_id != '' ";

		$results = $this->db->query($sql);

		return $results;
	}

	// query get performance bonus & pinalty
	// SELECT users.name, SUM(IF( tickets.done_date < tickets.due_date, tickets.point, 0)) as bonus, SUM(IF( tickets.done_date < date_add(tickets.due_date, interval 2 day) and tickets.done_date > tickets.due_date, tickets.point, 0)) as no_bonus, SUM(IF( tickets.done_date > date_add(tickets.due_date, interval 2 day), tickets.point, 0)) as pinalty, SUM(IF( tickets.due_date < date_add(now(), interval 2 day) and tickets.done_date IS NULL, tickets.point, 0)) as overdue FROM tickets LEFT JOIN users ON users.id = tickets.assign_id WHERE tickets.assign_id != '' GROUP BY tickets.assign_id ORDER BY name DESC

}

?>