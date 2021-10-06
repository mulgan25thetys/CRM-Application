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
	// function check()
	// {
	// 	if( ini_get('allow_url_fopen') ) {
	// 	    die('allow_url_fopen is enabled. file_get_contents should work well');
	// 	} else {
	// 	    die('allow_url_fopen is disabled. file_get_contents would not work');
	// 	}
	// 	// $headers = get_headers(base_url().'auth/login');
	// 	// // echo "<pre>";
	// 	// // print_r ();
	// 	// // echo "</pre>";
	// 	// if ($headers[0] == 'HTTP/1.1 200 OK') {
	// 	//  	echo "<pre>";
	// 	//  	print_r ($headers);
	// 	//  	echo "</pre>";
	// 	// }

	// 	// if ($headers[0] == 'HTTP/1.1 301 Moved Permanently') {
	// 	// 	//moved or redirect page
	// 	// }
	// }
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