<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_settings extends CI_Model {

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

}

/* End of file Mdl_settings.php */
/* Location: ./application/modules/settings/models/Mdl_settings.php */