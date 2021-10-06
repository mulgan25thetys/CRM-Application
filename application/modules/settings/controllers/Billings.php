<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billings extends MX_Controller {

	private $user_role = 0;
	private $menuid = 0;
	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_settings');

		$this->load->module('src');
		$this->load->module('src/table');
		$this->load->module('src/getters');
		$this->load->module('src/requests');
		$this->load->module('src/crud');
		if ($this->session->userdata('online')) {
			$this->user_role = $this->session->userdata('role');
		}

		$this->menuid = $this->mdl_settings->get_menu_id('billings');
	}

	function invoices()
	{
		$invoice_data['table_analytic'] = array('campaign','user');
		$this->requests->load_App_page('AUXICALL : Billings','','',false,'settings','billings/invoices','tpl_settings',$invoice_data,22);
	}

	function faq(){
		$invoice_data['table_analytic'] = array('campaign','user');
		$this->requests->load_App_page('AUXICALL : Billings','','',false,'settings','billings/faq','tpl_settings',$invoice_data,22);
	}

}

/* End of file Billings.php */
/* Location: ./application/modules/settings/controllers/Billings.php */