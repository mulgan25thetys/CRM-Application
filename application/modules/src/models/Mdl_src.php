<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_src extends CI_Model {

	protected $user='';
	protected $manager = 0;
	protected $role = 0;
	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('online') != null && $this->session->userdata('online') == 'Y') {
			$this->user = $this->session->userdata('username');
			$this->manager = $this->session->userdata('manager');
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

	//permet de retourner les champs d'une table
	function getTable_field($table){
		return $this->db->list_fields($this->getTable($table));
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
	//per
	function get_entries($table)
	{
		$query = $this->db->where('author',$this->user)->get($this->getTable($table));
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return 0;
	}
	//permet de recuperer un enregistrement a partir de son id
	function get_entry($table,$id='')
	{	
		if (!in_array($table,array('user','otp'))) {
			$query = $this->db->where(array('id' => $id,'author'=> $this->user))->get($this->getTable($table));
		}else{
			$query = $this->db->get($this->getTable($table));
		}
		if($query->num_rows() > 0){
			return $query->row();
		}
		return null;
	}
	//permet de recuperer specifiquement tous les valeurs des champs passer en parametres
	function get_specific_value($table,$specific_value)
	{
		$this->db->select($specific_value);
		$this->db->from($this->getTable($table));
		return $this->db->get();
	}

	//permet de retoruner 
	function fetch_details($limit='',$start,$table)
	{	
		$this->db->select("*");
		$this->db->from($this->getTable($table));
		if (in_array($table, array('campaign'))) {
			if ($this->role == 3) {
				$agentname = $this->db->select('pseudo')->from($this->getTable('user'))->where('manager',$this->manager)->get();
				$where = array('author'=>$this->user,'author'=>$agentname->row()->pseudo);
			}else{
				$where = array('author'=>$this->user);
			}
			
			$this->db->where($where);
		}
		if($table == 'user'){
			$this->db->where('manager',$this->manager);
		}
		$this->db->order_by("id","DESC");
		$this->db->limit($limit,$start);
		return $this->db->get();
	}
	function fetch_user_details($id='')
	{
		return $this->db->where('id',$id)->get($this->getTable('user'))->row();
	}
	function search_entry($table,$value='')
	{
		//permet de chercher de un enregistrment 
		if ($value != '') {
			$fields = $this->getTable_field($this->getTable($table));
			$this->db->select("*");
			$this->db->from($this->getTable($table));
			for ($i=0; $i < count($fields); $i++) { 
				$this->db->or_like($fields[$i],$value);
				$this->db->where('author',$this->user);
			}
		}
		return $this->db->get();
	}

	//permet d'inserer un enregistrement dans une table
	function insert($table,$data=''){
		if (!in_array($table,array('user','otp'))) {
			$dataIst = array_merge($data,array('author'=>$this->user));
		}else{
			$dataIst = $data;
		}
		
		return $this->db->insert($this->getTable($table),$dataIst);
	}
    
    //permet de modifier un enregistrement d'une table
    function edit($table,$id,$data=''){
    	if (!in_array($table,array('user','otp'))) {
			return $this->db->where(array('id' => $id,'author'=> $this->user))->update($this->getTable($table),$data);
		}else{
			return $this->db->where('id',$id)->update($this->getTable($table),$data);
		}
    	
    }

    //permet de supprimer un enregistrement d'une table
	function delete($table,$id){
		if (!in_array($table,array('user','otp'))) {
			return $this->db->where(array('id' => $id,'author'=> $this->user))->delete($this->getTable($table));
		}else{
			return $this->db->where('id',$id)->delete($this->getTable($table));
		}
	}
	//permet de faire une suppression mutiple
	function deleterows($table,$idrows)
	{
		if (!in_array($table,array('user','otp'))) {
			return $this->db->where_in('id',$idrows)->where('author',$this->user)->delete($this->getTable($table));
		}else{
			return $this->db->where_in('id',$idrows)->delete($this->getTable($table));
		}
		
	}

	//permet d'activer ou de desactiver une ligne en fonction du type
	function enabledRow($table,$id,$type){
		$where = array('id' => $id,'author'=> $this->user);
		if ($type == 'y') {
			$this->db->set(array('active'=>'Y'));
			return $this->db->where($where)->update($this->getTable($table));
		} else if($type == 'n'){
			$this->db->set(array('active'=>'N'));
			return $this->db->where($where)->update($this->getTable($table));
		}	
	}
	//permet de retourner les données statistiques d'une table
	function getStatistique($table){
		switch ($table) {
			case 'campaign':
				$where = array('active' => 'Y','author'=> $this->user);
				$query = $this->db->where($where)->get($this->getTable($table));
				break;
			case 'user':
				$query = $this->db->where('online','Y')->get($this->getTable($table));
				break;
			default:
				$query=array();
				break;
		}
		return $query->num_rows();
	}
	
}


/* End of file src_Mdl.php */
/* Location: ./application/modules/src_v2/models/src_Mdl.php */