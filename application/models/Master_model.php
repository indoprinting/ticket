<?php

class Master_model extends CI_Model 
{

	public function addDepartment($data)
	{
		$this->db->insert("departments", $data);
		return $this->db->insert_id();
	}

	public function editDepartment($id, $data) 
	{
		return $this->db->where("id", $id)->update("departments", $data);
	}

	public function deleteDepartment($id) 
	{
		return $this->db->where("id", $id)->delete("departments");
	}

	public function addSubject($data)
	{
		$this->db->insert("ticket_subjects", $data);
		return $this->db->insert_id();
	}

	public function editSubject($id, $data) 
	{
		return $this->db->where("id", $id)->update("ticket_subjects", $data);
	}

	public function deleteSubject($id) 
	{
		return $this->db->where("id", $id)->delete("ticket_subjects");
	}

	public function addEquipment($data)
	{
		$this->db->insert("equipments", $data);
		return $this->db->insert_id();
	}

	public function editEquipment($id, $data) 
	{
		return $this->db->where("id", $id)->update("equipments", $data);
	}

	public function deleteEquipment($id) 
	{
		return $this->db->where("id", $id)->delete("equipments");
	}

	public function getCategory()
	{
		return $this->db->select("knowledge_categories.*, k2.name as parent_name")
			->join("knowledge_categories k2", 'knowledge_categories.parent_id = k2.id', 'left')
			->get("knowledge_categories");
	}

	public function getParentCategory()
	{
		return $this->db->select("*")->where('parent_id', 0)->get("knowledge_categories");
	}

	public function getChildCategory($parenrtId)
	{
		return $this->db->select("*")->where('parent_id', $parenrtId)->get("knowledge_categories");
	}

	public function addCategory($data)
	{
		$this->db->insert("knowledge_categories", $data);
		return $this->db->insert_id();
	}

	public function editCategory($id, $data) 
	{
		return $this->db->where("id", $id)->update("knowledge_categories", $data);
	}

	public function deleteCategory($id) 
	{
		return $this->db->where("id", $id)->delete("knowledge_categories");
	}

	public function getKnowledge()
	{
		return $this->db->select("knowledge_bases.*, k1.name as cat_name, k2.name as sub_name")
			->join("knowledge_categories k1", 'knowledge_bases.category_id = k1.id', 'left')
			->join("knowledge_categories k2", 'knowledge_bases.sub_category_id = k2.id', 'left')
			->get("knowledge_bases");
	}

	public function getKnowledgeById($id)
	{
		return $this->db->select("*")->where("id",$id)->get("knowledge_bases");
	}

	public function getKnowledgeByCategory($catId, $subId)
	{
		return $this->db->select("*")->where("category_id",$catId)->where("sub_category_id",$subId)->get("knowledge_bases");
	}

	public function addKnowledge($data)
	{
		$this->db->insert("knowledge_bases", $data);
		return $this->db->insert_id();
	}

	public function editKnowledge($id, $data) 
	{
		return $this->db->where("id", $id)->update("knowledge_bases", $data);
	}

	public function deleteKnowledge($id) 
	{
		return $this->db->where("id", $id)->delete("knowledge_bases");
	}

	public function getSopsubject()
	{
		return $this->db->select("*")->get("payroll_subjects");
	}

	public function addSopsubject($data)
	{
		$this->db->insert("payroll_subjects", $data);
		return $this->db->insert_id();
	}

	public function editSopsubject($id, $data) 
	{
		return $this->db->where("id", $id)->update("payroll_subjects", $data);
	}

	public function deleteSopsubject($id) 
	{
		return $this->db->where("id", $id)->delete("payroll_subjects");
	}

}

?>