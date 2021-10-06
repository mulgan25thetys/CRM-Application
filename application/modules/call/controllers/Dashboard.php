<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

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
		$dashboard_data['table_analytic'] = array('campaign','user');
		$this->requests->load_App_page('AUXICALL : Call','','',false,'call','dashboard','tpl_default',$dashboard_data,1);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/modules/call/controllers/Dashboard.php */