<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->module('src/table');
		$this->load->module('src/getters');
		$this->load->module('src/requests');
		$this->load->module('src/crud');
	}

	function index()
	{
		$this->dashboard();
	}
	function dashboard($value='')
	{
		$dashboard_data['type'] = 'Analyse décisionnel';
		$dashboard_data['data1'] ='info campagne';
		$dashboard_data['campagne_link'] = 'campaign';
		$this->requests->load_App_page('AUXICALL : E-Mailing','','',false,'emailing','dashboard','tpl_default',$dashboard_data,3);
	}

}

/* End of file Emaling.php */
/* Location: ./application/modules/emailing/controllers/Emaling.php */