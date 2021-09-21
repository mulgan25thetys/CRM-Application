<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_form extends CI_Model {

   function get_Table($table=null)
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
   function get_TableFields($table='')
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

/* End of file Form_model.php */
/* Location: ./application/modules/Form_bluid/models/Form_model.php */