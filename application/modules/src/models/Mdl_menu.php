<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_menu extends CI_Model {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	//Module menu getters      
	function getTable($table='')
	{
		if ($this->db->table_exists($table)) {
			return $table;
		}
		else{
			$this->session->set_flashdata('error','Table '.$table.' does not exists!');
			return false;
		}		
	}
	function getMenus_items($value=''){
		return $this->db->get($this->getTable('menu'));
	}
	function get_sub_menu($parentid=''){
      return $this->db->where('parent_id',$parentid)->get($this->getTable('menu'));
	}
	function getParent_men($id){
		return $this->db->where('id',$id)->get($this->getTable('menu'));
	}

}

/* End of file Mdl_custommenu.php */
/* Location: ./application/modules/custommenu_v2/models/Mdl_custommenu.php */