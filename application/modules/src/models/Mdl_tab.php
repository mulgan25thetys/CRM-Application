<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_tab extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
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

	function get_TableValues($table=null)
	{
		return $this->db->get($this->getTable($table));
	}
	function get_TableFields($table=null)
   {
   	    
        if($this->db->table_exists($table))
        {
          $data= $this->db->list_fields($table); 
        } 
        else{
           $data= "la table n'existe pas";
        }

        return $data;
   }

}

/* End of file Model_tab.php */
/* Location: ./application/modules/tableau/models/Model_tab.php */