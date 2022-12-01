<?php

class Payroll_model extends CI_Model 
{



	public function editPayroll($id, $data) 
	{
		return $this->db->where("id", $id)->update("sallary_sheet", $data);
	}

	public function getPayroll()
	{
		return $this->db->select("*")->get("sallary_sheet");
	}

		public function getEmployee()
	{
		return $this->db->select("*")->get("employee");
	}

		public function getJobtitle()
	{
		return $this->db->select("*")->get("jobtitle");
	}

	public function getSop()
	{
		return $this->db->select("*")->get("payroll_subjects");
	}

	public function getViolation()
	{
		return $this->db->select("*")->get("payroll_violation");
	}



	public function getBagian()
	{
		return $this->db->select("*")->get("divisions");
	} 

	public function getCompany()
	{
		return $this->db->select("*")->get("company");
	} 


  public function getHro()
	{
		return $this->db->select("*")->get("payroll_hro");
	}

   public function getMgr()
	{
		return $this->db->select("*")->get("payroll_mgr");
	}

   public function getIc()
	{
		return $this->db->select("*")->get("payroll_ic");
	}

   public function getAr()
	{
		return $this->db->select("*")->get("payroll_ar");
	}

	public function getUpemployee()
	{
		return $this->db->select("*")->get("employee");
	}

	public function addHro($data1)
	{
		$this->db->insert_batch("payroll_hro", $data1);
	}

	public function addMgr($data1)
	{
		$this->db->insert_batch("payroll_mgr", $data1);
	}

	public function addIc($data1)
	{
		$this->db->insert_batch("payroll_ic", $data1);
	}

	public function addAr($data1)
	{
		$this->db->insert_batch("payroll_ar", $data1);
	}

	public function addUpemployee($data1)
	{
		$this->db->insert_batch("employee", $data1);
	}

	public function addEmployee($data)
	{
		$this->db->insert("employee", $data);
		return $this->db->insert_id();
	}
	
	public function editEmployee($id, $data) 
	{
		return $this->db->where("id", $id)->update("employee", $data);
	}


		public function deleteEmployee($id) 
	{
		return $this->db->where("id", $id)->delete("employee");
	}


		public function addViolation($data)
	{
		$this->db->insert("payroll_violation", $data);
		return $this->db->insert_id();
	}
	
	public function editViolation($id, $data) 
	{
		return $this->db->where("id", $id)->update("payroll_violation", $data);
	}

	public function deleteViolation($id) 
	{
		return $this->db->where("id", $id)->delete("payroll_violation");
	}

    public function getRekap()
	{
		return $this->db->select("pin,nama,div_name,norek,total,total,(total*1.1) as thptoerp")->get("sallary_sheet");
	}

	public function getAll()
	{
		return $this->db->select("*")->get("sallary_sheet");
	}

	public function getPayrollslip($username)
	{
		return $this->db->select("*")->where("pin", $username)->get("sallary_sheet");
	}

	public function isiSheet($var1,$var2)
	{
		
		return $this->db->query("INSERT into sallary_sheet (pin,begin_date,end_date,nama,job_title,div_name,company,norek,basic,allowance,pulsa,bpjs,hari_kerja,penalty,total)
		        SELECT pin,'".$var1."','".$var2."',nama,job_title,div_name,company,norek,basic,allowance,pulsa,bpjs,daywork,penalty, 
		        (basic+allowance+pulsa+bpjs) FROM employee");
	}

	public function hapusSheet()
	{
		return $this->db->query("TRUNCATE sallary_sheet");

	}

	public function hapusPoin()
	{
		return $this->db->query("TRUNCATE payroll_reward");

	}

		public function hapusPoinviolation()
	{
		return $this->db->query("TRUNCATE payroll_violationtot");

	}

	public function isiPoin($var1,$var2)
	{
		return $this->db->query("INSERT into payroll_reward (pin, nama, bonus_poin,bonus_rp,penalty_poin,penalty_rp)
		        SELECT users.username, users.name, SUM(IF( tickets.done_date < tickets.due_date, tickets.point, 0)) as bonus_poin,SUM(IF( tickets.done_date < tickets.due_date, tickets.point, 0)*10000) as bonus_rp,SUM(IF( tickets.done_date > date_add(tickets.due_date, interval 2 day), tickets.point, 0)) as penalty_poin, -SUM(IF( tickets.done_date > date_add(tickets.due_date, interval 2 day), tickets.point, 0)*10000) as penalty_rp FROM tickets LEFT JOIN users ON users.id = tickets.assign_id WHERE tickets.assign_id != '' and tickets.done_date>='".$var1."' and tickets.done_date <='".$var2."' GROUP BY tickets.assign_id");
	}

public function isiPoinviolation($var1,$var2)
	{
		return $this->db->query("INSERT into payroll_violationtot (pin, poin)
		 SELECT pin,sum(poin) FROM payroll_violation WHERE date_violation>='".$var1."' and date_violation <='".$var2."' GROUP BY pin");
		
	}


	public function IsiPoinkesallary()
	{
		
		return $this->db->query("UPDATE sallary_sheet s, payroll_reward p 
		 SET s.reward_poin=p.bonus_rp, s.penalty_poin=p.penalty_rp WHERE s.pin=p.pin");
	}

	public function IsiHrokesallary()
	{
		
		return $this->db->query("UPDATE sallary_sheet s, payroll_hro p 
		 SET s.absent_qty=p.absen, s.late_qty=p.late, s.violation_qty=p.violation, s.overtime_qty=p.overtime,
		 s.absent_rp=p.absen*((s.basic+s.allowance)/s.hari_kerja),s.late_rp=p.late*s.penalty,
		 s.overtime_rp=p.overtime*(s.basic/s.hari_kerja),s.violation_rp=p.violation*s.penalty WHERE s.pin=p.pin");
	}

	public function IsiMgrkesallary()
	{
		
		return $this->db->query("UPDATE sallary_sheet s, payroll_mgr p 
		 SET s.bonus=p.bonus, s.design=p.desain WHERE s.pin=p.pin");
	}

	public function IsiIckesallary()
	{
		
		return $this->db->query("UPDATE sallary_sheet s, payroll_ic p 
		 SET s.counter=p.counter, s.paper=p.paper, s.waste=p.waste WHERE s.pin=p.pin");
	}

	public function IsiArkesallary()
	{
		
		return $this->db->query("UPDATE sallary_sheet s, payroll_ar p 
		 SET s.dp=p.dp, s.rs=p.rs, s.debt=p.debt WHERE s.pin=p.pin");
	}

	public function IsiTotalkesallary()
	{
		
		return $this->db->query("UPDATE sallary_sheet  
		 	SET total = basic+allowance+pulsa+bpjs+absent_rp+late_rp+
            violation_rp+overtime_rp+reward_poin+penalty_poin+bonus+design+
            counter+paper+waste+dp+rs+debt");
	}



   public function IsiPoinkesallary1()
	{
		
		return $this->db->query("UPDATE sallary_sheet s, payroll_violationtot p 
		 SET s.violation_qty=p.poin, s.violation_rp=p.poin*s.penalty, s.total=(s.basic+s.allowance+s.pulsa+s.bpjs+s.reward_poin+s.penalty_poin+s.violation_rp) WHERE s.pin=p.pin");
	}

}

?>