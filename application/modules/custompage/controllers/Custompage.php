<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custompage extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->module('src/table');
		$this->load->module('src/getters');
		$this->load->module('src/requests');
		//verifier la connexion
		$this->getters->check_cnx();
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
		if ($data['url'] !== "") {
			if (!function_exists($data['url'])) {
			//$datapage['']
				$this->session->set_flashdata('page_active', 'Error 404');
				$this->requests->load_App_page('Page not found!','','',false,'src','404','tpl_default','',0);
			}else{
				echo "<pre>";
				print_r ($data['url']);
				echo "</pre>";
			} 
		} else {
			$this->session->set_flashdata('page_active', 'Dashboard');
			$this->requests->load_App_page('AUXICALL','','',false,'src','home','tpl_default','',0);
		}
		
	}

}

/* End of file Custompage.php */
/* Location: ./application/modules/custompage/controllers/Custompage.php */