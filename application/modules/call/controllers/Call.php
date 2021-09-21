<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends MX_Controller {

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
		$this->dashboard();
	}
	
	function dashboard()
	{
		$dashboard_data['table_analytic'] = array('campaign','user');
		$this->req_query->load_App_page('AUXICALL : Call','','',false,'call','dashboard','tpl_default',$dashboard_data,1);
	}

	function callhistory(){
		$history_data = array('id','campaign_id','name','description');
		$history_data['table'] = $this->table->load_history_table('campaign',$history_data);
		$this->req_query->load_App_page('AUXICALL : Call','','',false,'call','call history','tpl_default',$history_data,1);
	}


    function campaign(){
		// echo "<pre>";
		// print_r (intval($this->uri->segment(3)));
		// echo "</pre>";
		// exit();
    	$table = 'campaign';
    	$campaign_data = array('id','campaign_id','name','description');
    	$compaign_data['table'] = $this->table->load_table($table,$campaign_data);
		
		//traitement d'une requete dans le cas ou un formulaire a été soumis sur la page campaigne 
		$this->req_query->load_App_page('AUXICALL : Call','','',false,'call','campaign','tpl_default',$compaign_data,1);
	}

	function lists(){
		$table = 'otp';
		$lists_data = array('id','code','time','is_expired');
    	$lists_data['table'] = $this->table->load_table($table,$lists_data);

    	//traitement d'une requete dans le cas ou un formulaire a été soumis sur la page list
		
		$this->req_query->load_App_page('AUXICALL : Call','','',false,'call','lists','tpl_default',$lists_data,1);
	}

	function agents(){
		if ($this->user_role != 3) {
			http_response_code(404);
			exit();
		}
		$table = 'user';
		$agents_data = array('id','pseudo','email','role','password');
    	$agents_data['table'] = $this->table->load_table($table,$agents_data);

    	//traitement d'une requete dans le cas ou un formulaire a été soumis sur la page list
		
		$this->req_query->load_App_page('AUXICALL : Call','','',false,'call','agents','tpl_default',$agents_data,1);
	}
}

/* End of file Call.php */
/* Location: ./application/modules/call/controllers/Call.php */ 