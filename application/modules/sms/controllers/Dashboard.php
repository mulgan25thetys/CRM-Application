<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	private $user_role = 0;
	function __construct() 
	{
		parent::__construct();
		$this->load->module('src');
		$this->load->module('src/table');
		$this->load->module('src/getters');
		$this->load->module('src/requests');
		$this->load->module('src/crud');
		if ($this->session->userdata('online')) {
			$this->user_role = $this->session->userdata('role');
		}
	}

	function index($value='') 
	{
		$dashboard_data['type'] = 'Analyse décisionnel';
		$dashboard_data['data1'] ='info campagne';
		$dashboard_data['campagne_link'] = 'campaign';
		$this->requests->load_App_page('AUXICALL : SMS','','',false,'sms','dashboard','tpl_default',$dashboard_data,2);
	}

}

/* End of file Sms.php */
/* Location: ./application/modules/sms/controllers/Sms.php */