<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MX_Controller {

	private $url = '';
	private $user_role = 0;
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Mdl_menu');
		$this->load->module('src/get_query');

		$this->url = $this->get_query->get_URl();
		if ($this->session->userdata('online') == 'Y') {
			$this->user_role = $this->session->userdata('role');
		}
	}

	function check_user_menu($query){
		$new_menu = array();
		if ($this->user_role != 3) {
			for ($i=0; $i < count($query); $i++) { 
				if($query[$i]['page'] == 'agents'){
					unset($query[$i]);
					$new_menu = $query;
				} 
			}
		}else{
			$new_menu = $query;
		}
		return $new_menu;
	}

	//retourner le menu par defaut qui sont les modules
	function get_default_Menu($defaultpage=''){
		$query = $this->Mdl_menu->getMenus_items();
       	$Outside_default_menu = "";

       	if ($query->num_rows() > 0) {
       		$Outside_default_menu.= '<nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
       			<ul class="nav navbar-nav">';
       		    foreach ($query->result() as $value) {
       		    	//Activer un desactiver un menu par defaut
       		    	if($value->parent_id == 0 && $value->title != 'Settings'){	
       		    		switch ($value->status) {
       		    				case 1:
       		    						$Outside_default_menu.=$this->active_default_menu($value->title,$value->page,$value->icon,$defaultpage);
       		    					break;
       		    				case 0:
       		    					$Outside_default_menu.=$this->inactive_default_menu($value->title,$value->icon);
       		    					break;
       		    				
       		    				default:
       		    				        $Outside_default_menu.=$this->inactive_default_menu($value->title,$value->icon);
       		    					break;
       		    			}	
					}
       		    }
       			$Outside_default_menu.='</ul>';
       			$Outside_default_menu.='<form class="navbar-form navbar-left form-search" role="search">
 				<div class="form-group">
 					<input type="text"  placeholder="search" />
 				</div>

 				<button type="button" class="btn btn-mini btn-info2">
 					<i class="ace-icon fa fa-search icon-only bigger-110"></i>
 				</button>
 			</form>';
       			$Outside_default_menu.='</nav>';
       	} else {
       		$Outside_default_menu = '<div class="alert alert-info">Aucun menu existant!</div>';
       	}
       	return $Outside_default_menu;
	}

	//retourner un defaut menu activé
	function active_default_menu($title,$page,$icon,$defaultpage){
		$output='';
		if ($this->url[0] && $this->url[0] == $page.'') {
    		$output.='<li class="active"><a class="navigation" href="';
    	} else {
    		$output.='<li ><a href="';
    	}
		if($page != null){
			$output.=base_url().$page."/".$defaultpage;
	    }else{
	    	$output.="#";
	    }
		$output.='"><i class="ace-icon fa fa-'.$icon.'"></i>  '.$title.'</a></li>';
		return $output;
	}

	//retoune un defaut menu desactivé
	function inactive_default_menu($title,$icon){
		$output='';
		$output.='<li ><a class="navigation" style="color: currentColor;
								  cursor: not-allowed;
								  opacity: 0.5;
								  text-decoration: none;" href="';
		$output.="#";
		$output.='"><i class="ace-icon fa fa-'.$icon.'"></i>  '.$title.'</a></li>';
		return $output;
	}

	//retourne le sous menu d'un menu 
	function get_sub_default_menu($parent='',$parentid=''){
		$query = $this->Mdl_menu->get_sub_menu($parentid);
       	$Outside_sub_menu     = "";
       	if ($query->num_rows()> 0) {
       		
       		$submenu = $this->check_user_menu($query->result_array());
       		$Outside_sub_menu.='<ul class="nav nav-list">';
       			foreach($submenu as $value) {
       				if ($this->url[1] == $value['page']) {
       					$Outside_sub_menu.='<li class="hover active"><a class="navigation" href="';
       					$this->session->set_flashdata('page_active', $value['title']);
       				}else{
       					$Outside_sub_menu.='<li class="hover"><a href="';
       				}
					if($value['page'] != null){
						// 
						$Outside_sub_menu.=base_url().$parent.'/'.$value['page'];
                    }else{
                    	$Outside_sub_menu.="#";
                    }

					$Outside_sub_menu.='"><i class="menu-icon fa fa-'.$value['icon'].'"></i>
					    <span class="menu-text">'.$value['title'].'</span></a><b class="arrow"></b>';
                    $Outside_sub_menu.= $this->get_sub_menu($value['id']);
					$Outside_sub_menu.='</li>';
       			}
       		$Outside_sub_menu.=$this->getCredit_Cart();
       		$Outside_sub_menu.='</ul>';
       	}else {
       		$Outside_sub_menu = '<div class="alert alert-info">Aucun sous menu existant!</div>';
       	}
       	return $Outside_sub_menu;
	}

	//retourner le bloc de credit utilisateur
	function getCredit_Cart(){
		$creditcart ='';	
		$creditcart.='<div 
       				style=" 
       					position:absolute;
       					background:green; 
       					color:white;
       					right:0;
       					height=100px;
       					width=20px;
       					display:flex;
       					align-items:center;
       					padding:15px 15px 30px 15px;
       					font-size:17px;
       				" 
       			>Credit :0,00 €</div>';
		return $creditcart;
	}

	//retourne le sous menu d'un sous menu en cas de menu deroulant
	function get_sub_menu($parentid){
		$query = $this->Mdl_menu->get_sub_menu($parentid);
       	$sub_menu = "";

       	if ($query->num_rows() > 0) {
       		$sub_menu.='<ul class="submenu">';
       		foreach ($query->result() as $value) {
       			$sub_menu.='<li class="hover"><a class="navigation" href="';
       			if($value->page != null){
       				$sub_menu.=base_url()."auth/".$value->page;
       			}
   				else{
                	$sub_menu.="#";
                }
       			$sub_menu.='"><i class="menu-icon fa fa-caret-right"></i>';
       			$sub_menu.=$value->title;
       			$sub_menu.='</a><b class="arrow"></b></li>';
       		}
       		$sub_menu.='</ul>';
       	}
       	return $sub_menu;
	}

	//retourne le menu de la configuration (paramétres)
	function get_config_menu($parent='',$parentid=''){
		$query = $this->Mdl_menu->get_sub_menu($parentid);
       	$Outside_sub_menu     = "";
       	if ($query->num_rows()> 0) {
       		
       		$submenu = $this->check_user_menu($query->result_array());
       		$Outside_sub_menu.='<ul class="nav nav-list">';
       			foreach($submenu as $value) {
       				if ($this->url[2] == $value['page']) {
       					$Outside_sub_menu.='<li class="hover active"><a class="navigation" href="';
       					$this->session->set_flashdata('page_active', $value['title']);
       				}else{
       					$Outside_sub_menu.='<li class="hover"><a class="navigation" href="';
       				}
					if($value['page'] != null){
						// 
						$Outside_sub_menu.=base_url().'settings/'.$parent.'/'.$value['page'];
                    }else{
                    	$Outside_sub_menu.="#";
                    }

					$Outside_sub_menu.='"><i class="menu-icon fa fa-'.$value['icon'].'"></i>
					    <span class="menu-text">'.$value['title'].'</span></a><b class="arrow"></b>';
                    $Outside_sub_menu.= $this->get_sub_menu($value['id']);
					$Outside_sub_menu.='</li>';
       			}
       		$Outside_sub_menu.='</ul>';
       	}else {
       		$Outside_sub_menu = '<div class="alert alert-info">Aucun sous menu existant!</div>';
       	}
       	return $Outside_sub_menu;
	}
}


/* End of file Custommenu.php */
/* Location: ./application/modules/custommenu/controllers/Custommenu.php */