<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custompage extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->module('src/tableau');
		$this->load->module('src/get_query');
		$this->load->module('src/req_query');
		//verifier la connexion
		$this->get_query->check_cnx();
	}

	function index()
	{
		$this->view();
	}

	function view($value='')
	{
		$data = array(
			'url' => uri_string()
		);
		$this->req_query->load_App_page('AUXICALL','','',false,'src','home','tpl_default','',0);
	}

}

/* End of file Custompage.php */
/* Location: ./application/modules/custompage/controllers/Custompage.php */