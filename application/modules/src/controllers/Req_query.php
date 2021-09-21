<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Req_query extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_src');
		$this->load->module('template');
		$this->load->module('src/menu');
		$this->load->module('src/get_query');
	}

	function redirect_to_page($module='',$page=''){
		 if ($module != '') {
		 	redirect(base_url().$module.'/'.$page,'refresh');
		 } else {
		 	redirect(base_url(),'refresh');
		 }
	}
	function load_App_page($title,$subtitle='',$next_form='',$forgot_password,$module,$view_file,$tpl,$datapage='',$submenu=''){

		$data['table'] 	   = $this->mdl_src->getTable('user');
		$data['title'] 	   = $title;
		$data['subtitle']  = $subtitle;
		$data['next_form']     = $next_form;
		$data['forgot_password'] = $forgot_password;
		$data['module']    =  $module;
		$data['view_file'] = $view_file;
		$data['menu']      = $this->menu->get_default_Menu('dashboard');
		if($submenu == '')
			$data['sub_menu']  = '';
		else{
			$parent_page = $this->get_query->get_URl()[0];
		    $menuid=$this->mdl_src->get_menu_id($parent_page);
		    if ($menuid == $submenu) {
		    	$data['sub_menu'] = $this->menu->get_sub_default_menu($parent_page,$submenu);
		    }else{
		    	$data['sub_menu'] = '<div class="alert alert-info">Veuillez définir les sous menus!</div>';
		    }
			$data['parent_page'] = $parent_page;
		}
		$data['datapage'] = $datapage;
		
        echo $this->template->$tpl($data);
	}

	function home($value='')
	{
		$this->load_App_page('AUXICALL : CRM','','',false,'src','home','tpl_default');
	}
	//permet de faire une statistique sur les données d'une table
	function statistique($value='')
	{
		if ($this->input->is_ajax_request()) {
			$nbr_total = $this->mdl_src->count_all($_GET['table']);
			$message   = $this->switch_table_stats_message($_GET['table']);
			$nbr_actif = $this->mdl_src->getStatistique($_GET['table']);
			$data = array('table'=> $_GET['table'],'nbr_total' => $nbr_total, 'nbr_actif'=> $message.' '.$nbr_actif.'/'.$nbr_total);
			echo json_encode($data);
		} else {
			echo '<h2>No direct script access allowed</h2>';
		}
		
	}
	//permet de personnaliser le message afficher en fonction des tables
	function switch_table_stats_message($table){
		$output ='';
		switch ($table) {
			case 'user':
				$output.='Connecté';
				break;
			default:
				$output.='<a style="color: #77C646;" href="'.base_url().'call/'.$table.'">Active</a>';
				break;
		}
		return $output;
	}
	

	
	  
}

/* End of file Src.php */
/* Location: ./application/modules/src/controllers/Src.php */