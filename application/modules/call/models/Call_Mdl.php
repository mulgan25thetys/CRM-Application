<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_Mdl extends CI_Model {

	protected $user='';
	protected $manager = 0;
	protected $role = 0;
	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('online' ) != null) {
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
	function get_agents_name(){
		$this->db->select('pseudo');
		$this->db->from($this->getTable('user'));
		$this->db->where('manager',$this->manager);
		return $this->db->get();
	}
	//permet de retoruner 
	function fetch_details($limit='',$start,$table)
	{	
		$this->db->select("*");
		$this->db->from($this->getTable($table));
		if (in_array($table, array('campaign'))) {//si c'est une table campaign
			if ($this->role == 31) {//si c'est un administrateur
				$agentnames = $this->get_agents_name();//recuperations du nom des agents 
				$names = array();
				foreach ($agentnames->result() as $value) {
					array_push($names, $value->pseudo);//inserer les noms des agents dans un tableaux
				}
				$this->db->where_in('author',$names);//executer la condition
			}else{
				$this->db->where('author',$this->user);
			}
		}
		else if($table == 'user'){//si c'est la table user
			$this->db->where('manager',$this->manager);
		}
		$this->db->order_by("id","DESC");
		$this->db->limit($limit,$start);
		return $this->db->get();
	}
}

/* End of file Call_Mdl.php */
/* Location: ./application/modules/call/models/Call_Mdl.php */