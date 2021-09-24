<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_v1 extends MX_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('default/public_html');
		$this->load->module('auth_v1');
	}

}

/* End of file Template_v1 */
/* Location: ./application/modules/template_v1/controllers/Template_v1 */