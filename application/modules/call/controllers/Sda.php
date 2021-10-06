<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sda extends MX_Controller {

	private $user_role = 0;
	public function __construct()
	{
		parent::__construct();
		$this->load->module('src');
		$this->load->module('src/table');
		$this->load->module('src/getters');
		$this->load->module('src/requests');
		$this->load->module('src/crud');
		if ($this->session->userdata('online') == 'Y') {
			$this->user_role = $this->session->userdata('role');
		}
	}

	function index()
	{
		$dashboard_data['type'] = 'Analyse décisionnel';
		$dashboard_data['data1'] ='Number SDA 5555-55555-555';
		$this->requests->load_App_page('AUXICALL : Call','','',false,'call','sda','tpl_default',$dashboard_data,1);
	}

}

/* End of file Sda.php */
/* Location: ./application/modules/call/controllers/Sda.php */