<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->module('src/tableau');
		$this->load->module('src/get_query');
		$this->load->module('src/req_query');
		$this->load->module('src/crud');
	}
	public function index()
	{
		$this->dashboard();
	}
	function dashboard($value='')
	{
		$dashboard_data['type'] = 'Analyse décisionnel';
		$dashboard_data['data1'] ='info campagne';
		$dashboard_data['campagne_link'] = 'campaign';
		$this->req_query->load_App_page('AUXICALL : SMS','','',false,'sms','dashboard','tpl_default',$dashboard_data,2);
	}

}

/* End of file Sms.php */
/* Location: ./application/modules/sms/controllers/Sms.php */