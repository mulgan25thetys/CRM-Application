<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_Mdl extends CI_Model {

	protected $user='unknown';
	protected $manager = 0;
	protected $role = 0;
	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('online' ) == 'Y') {
			$this->user = $this->session->userdata('username');
			$this->manager = $this->session->userdata('id');
			$this->role = $this->session->userdata('role');
		}
	}
	//permet de retourner le nom de la table si elle existe
    function getTable($table)
	{
		if($this->db->table_exists($table))
		{
			return $table;
		}
		else{
			$this->session->set_flashdata('error','Table '.$table.' does not exists!');
			return false;
		}
	}
	function get_menu_id($menuLink=''){
       $query=$this->db->where('page',$menuLink)->get($this->getTable('menu'));
       if ($query->num_rows() > 0) {
       	  foreach ($query->result() as  $value) {
       	  	return $value->id;
       	  }
       } else {
       	 return '';
       }
       
	}
	//permet de compter le nombre d'enregistrement d'une table
	function count_all($table){
		$plus = 0;
		switch ($table) {
			case 'user':
				$query = $this->db->where('manager',$this->manager)->get($this->getTable($table));
				$plus = 1;
				break;
			case 'otp':
				$query = $this->db->get($this->getTable($table));
				break;
			default:
				$query = $this->db->where('author',$this->user)->get($this->getTable($table));
				break;
		}
		return $query->num_rows()+$plus; //retourner le nombre
	}
	//permet de retoruner 
	function fetch_details($limit='',$start,$table)
	{	
		$this->db->select("*");
		$this->db->from($this->getTable($table));
		if (in_array($table, array('campaign'))) {
			if ($this->role == 13) {
					$this->db->select('pseudo');
					$this->db->from($this->getTable('user'));
					$this->db->where('manager',$this->manager);
				$agentname = $this->db->get();
				$name = array();
				foreach ($agentname->result() as $value) {
					array_push($name, $value->pseudo);
				}
				$where = $name;
			}else{
				$where = array($this->user);
			}
			
			$this->db->where_in('author',$where);
		}
		if($table == 'user'){
			$this->db->where('manager',$this->manager);
		}
		$this->db->order_by("id","DESC");
		$this->db->limit($limit,$start);
		return $this->db->get();
	}
}

/* End of file Call_Mdl.php */
/* Location: ./application/modules/call/models/Call_Mdl.php */