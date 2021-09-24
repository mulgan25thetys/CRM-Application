<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billings extends MX_Controller {

	private $user_role = 0;
	private $menuid = 0;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_settings');

		$this->load->module('src');
		$this->load->module('src/table');
		$this->load->module('src/get_query');
		$this->load->module('src/req_query');
		$this->load->module('src/crud');
		if ($this->session->userdata('online') == 'Y') {
			$this->user_role = $this->session->userdata('role');
		}

		$this->menuid = $this->mdl_settings->get_menu_id('billings');
	}

	function invoices()
	{
		$invoice_data['table_analytic'] = array('campaign','user');
		$this->req_query->load_App_page('AUXICALL : Billings','','',false,'settings','billings/invoices','tpl_settings',$invoice_data,$this->menuid);
	}

	function faq(){
		$invoice_data['table_analytic'] = array('campaign','user');
		$this->req_query->load_App_page('AUXICALL : Billings','','',false,'settings','billings/faq','tpl_settings',$invoice_data,$this->menuid);
	}

}

/* End of file Billings.php */
/* Location: ./application/modules/settings/controllers/Billings.php */