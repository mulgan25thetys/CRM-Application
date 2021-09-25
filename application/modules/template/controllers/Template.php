<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->module('src/get_query');
        
    }
    function tpl_default($data=null)
    {
        //verifier la connexion
        $this->get_query->check_cnx();
    	$this->load->view('theme_default/public_html',$data,FALSE);
    }
    function tpl_settings($data=null)
    {
        //verifier la connexion
        $this->get_query->check_cnx();
    	$this->load->view('theme_settings/public_html',$data,FALSE);
    }
	function tpl_auth($data=null)
	{
		$this->load->view('theme_auth/public_html',$data,FALSE);
	}

}

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */