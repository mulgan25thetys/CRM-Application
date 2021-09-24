<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends MX_Controller {

	private $user_role = 0;
	public function __construct()
	{
		parent::__construct();
		$this->load->module('src');
		$this->load->module('src/table');
		$this->load->module('src/get_query');
		$this->load->module('src/req_query');
		$this->load->module('src/crud');
		if ($this->session->userdata('online') == 'Y') {
			$this->user_role = $this->session->userdata('role');
		}
	}

	function index(){
		$this->read();
	}
	//permet de faire l'affichage des données
	function read(){
		$table = 'otp';
		$lists_data = array('id','code','time','is_expired');
    	$lists_data['table'] = $this->table->load_table($table,$lists_data);

    	//traitement d'une requete dans le cas ou un formulaire a été soumis sur la page list
		
		if ($this->input->is_ajax_request()) {
			echo "<pre>";
			print_r (current_url());
			echo "</pre>";
			$page = $this->uri->segment(3);
			Modules::run('src/crud/read',$page);
		} else {
			$this->req_query->load_App_page('AUXICALL : Call','','',false,'call','lists','tpl_default',$lists_data,1);
		}		
	}
}

/* End of file Lists.php */
/* Location: ./application/modules/call/controllers/Lists.php */