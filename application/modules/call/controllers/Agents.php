<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends MX_Controller {

	private $user_role = 0;
	public function __construct()
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

	function index(){
		if ($this->user_role != 3) {
			http_response_code(403);
			exit();
		}
		$table = 'user';
		$agents_data = array('id','pseudo','email','role','password');
    	$agents_data['table'] = $this->table->load_table($table,$agents_data);

    	//traitement d'une requete dans le cas ou un formulaire a été soumis sur la page list
		
		$this->requests->load_App_page('AUXICALL : Call','','',false,'call','agents','tpl_default',$agents_data,1);
	}
}

/* End of file Agents.php */
/* Location: ./application/modules/call/controllers/Agents.php */