<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends MX_Controller {

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

	function index(){
		$history_data = array('id','campaign_id','name','description');
		$history_data['table'] = $this->table->load_history_table('campaign',$history_data);
		$this->requests->load_App_page('AUXICALL : Call','','',false,'call','history','tpl_default',$history_data,1);
	}

}

/* End of file History.php */
/* Location: ./application/modules/call/controllers/History.php */