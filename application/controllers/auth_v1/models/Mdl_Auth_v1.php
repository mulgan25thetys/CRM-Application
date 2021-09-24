<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Auth_v1 extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function get_table()
	{
		  (($this->db->table_exists('user'))) ?
		  $user= $this->db->get('user')
		  : $user= 'La table n\'existe pas'; 
		  return $user;
	}
	function check_login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$query=$this->db->where('pseudo', $username)->get('user');
		/*var_dump($query);
		exit();*/
		if($query->num_rows()>0)
		{
			$row=$query->row_array();
			if ($row["password"]==$password) {
				return $status='success';
				//ou on peut mettre return ERR_NONE et de definir dans les constants
			}
			return $status='invalid_password';
			//ou return 'ERR_INVALID_PASSWORD';
		}
		else{ 
			return $status='invalid_username';
		// ou return ERR_INVALID_USERNAME;
		}
	}

}

/* End of file Mdl_Auth_v1.php */
/* Location: ./application/modules/auth_v1/models/Mdl_Auth_v1.php */