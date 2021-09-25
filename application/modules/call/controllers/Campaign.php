<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends MX_Controller {

	private $user_role = 0;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('call_Mdl');
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

	function read(){
		$this->load->library('pagination');
			$config = array();
			$config["base_url"] ="#";
			$config["total_rows"]=$this->call_Mdl->count_all($_GET['table']);
			$config["per_page"]=5;
			$config["uri_segment"]=3;
			$config["use_page_numbers"]=TRUE;
			$config["num_tag_open"]='<li>';
			$config["num_tag_close"]='</li>';
			$config["cur_tag_open"]='<li class="active"><a href="#">';
			$config["cur_tag_close"]='</a></li>';
			$config["full_tag_open"]='<ul class="pagination">';
			$config["full_tag_close"]='</ul>';
			$config["first_tag_open"]='<li>';
			$config["first_tag_close"]='</li>';
			$config["last_tag_open"]='<li>';
			$config["last_tag_close"]='</li>'; 
			$config["next_link"]='Next';
			$config["next_tag_open"]='<li>';
			$config["next_tag_close"]='</li>';
			$config['prev_link']="Previous";
			$config["prev_tag_open"]='<li>';
			$config["prev_tag_close"]='</li>';
			$config["num_links"]=1;
			$this->pagination->initialize($config);
			$page = $this->uri->segment(4);

			$start = (intval($page) - 1 )*$config['per_page'];

			$query 	= $this->call_Mdl->fetch_details($config['per_page'],$start,$_GET['table']);
			$fields = $this->get_query->get_Table_fields($_GET['table']);
			$output = array(
				'pagination_link' => $this->pagination->create_links(),
				'data_table' => $this->crud->switch_table_row($_GET['table'],$fields,$query),
				'page' => $page
			);

			$output['token']=$this->security->get_csrf_hash();
			echo json_encode($output);
	}

}

/* End of file Campaign.php */
/* Location: ./application/modules/call/controllers/Campaign.php */