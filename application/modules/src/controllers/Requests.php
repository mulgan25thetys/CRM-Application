<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_src');
		$this->load->module('template');
		$this->load->module('src/menu');
		$this->load->module('src/getters');
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
		$data['view_file_js'] = 'src/src_js/queryCrud_js';
		$data['menu']      = $this->menu->get_default_Menu('dashboard');
		if($submenu == '')
			$data['sub_menu']  = '';
		else{
			$parent_page =($module == 'settings') ? $this->getters->get_URl()[1] : $this->getters->get_URl()[0] ;
		    if ($submenu) {
		    	if($module == 'settings'){
		    		$data['sub_menu'] = $this->menu->get_config_menu($parent_page,$submenu);
		    	}else{
		    		$data['sub_menu'] = $this->menu->get_sub_default_menu($parent_page,$submenu);
		    	}
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
	function statistic($value='')
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