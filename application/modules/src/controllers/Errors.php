<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->module('src/requests');
	}
	function index()
	{
		$this->load->view('404');
	}

}

/* End of file Errors.php */
/* Location: ./application/modules/src/controllers/Errors.php */