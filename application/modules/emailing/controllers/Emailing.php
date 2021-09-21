<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailing extends MX_Controller {

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
		$this->req_query->load_App_page('AUXICALL : E-Mailing','','',false,'emailing','dashboard','tpl_default',$dashboard_data,3);
	}

}

/* End of file Emaling.php */
/* Location: ./application/modules/emailing/controllers/Emaling.php */