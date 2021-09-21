<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends MX_Controller {

	private $module;
    private $page;
	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_tab');
    	$this->load->module('src/form');
    	$this->load->module('src/get_query');
    	
	}
	//retourne les champs a afficher 
	private function generate_table_fields($array_fields,$table){
    	if ($array_fields != '' && count($array_fields) != 0) {
    		$result = array_diff($array_fields, $table);
    		if (count($result) == 0) {
    			return $array_fields;
    		} else {
    			return $table;
    		}
    	} else {
    		return $table;
    	}
    }

    //chargement du Table
	function load_table($table='',$array_fields='')
	{	
		$query=$this->mdl_tab->get_TableFields($table);
		$usetablefields = $this->generate_table_fields($array_fields,$query);
		$count=count($usetablefields);
		$output='';

		$output.='<div class="form-group" style="position:absolute;display:inline margin-bottom:10px; right:12px; top:8px;">';
	
 		$output.= '</div>';
 		$output.= '<div class="widget-box position-relative" id="widget-box-1"><div class="widget-header">
					<h5 class="widget-title">'.$this->switch_table_name($table).'</h5>
					<div class="widget-toolbar"><a href="#" title="New '.$this->switch_table_name($table).'" style="margin-right:5px;" id="launchModal" data-action="add"><i class="ace-icon fa fa-plus"></i></a><a href="#" class="reload" title="Reload"><i class="ace-icon fa fa-refresh"></i></a></div>
					</div>';

		$output.='<div class="widget-body" style="box-sizing:border-box;"><div class="widget-main">';
		$output.= form_open('src/crud/search',array('id'=>'form_search','style'=>'margin-bottom:10px;'));
 		$output.='<input type="text" name="search-data" placeholder="search" id="search_data"/>';
 		$output.= form_close();
 		$output.= form_open('src/crud/read',array('id'=>'table_show'));
		$output.='<div class="table-responsive" id="table_paginate" table-name="'.$table.'"></div>';
		$output.= form_close();
		$output.='<div style="margin-top:10px;" align="left">
        			<button id="delete_multiple" style="display:none;" class="btn btn-white btn-warning btn-bold">
					<i class="ace-icon fa fa-trash-o bigger-120 orange"></i>Delete</button>
				</div>';
		$output.='<div style="margin-top:10px;" align="right" id="pagination_link"></div>';
		$output.='</div></div>';

		$output.='<div class="widget-box-overlay" style="display:none; font-size: 25px;"><i style="position: absolute;left: 50%;top: 20%;transform: translate(-50%,-50%);" class="ace-icon fa fa-spinner fa-spin white bigger-125"></i></div>';

		$output.='</div>';

        //initier un modal contenant le formulaire d'insertion ou de modification de la table courante
        $output.=$this->get_ModalForm($table,$usetablefields);
        $output.=$this->confirm_modal();
        //buttons de suppression  multiple
        
		return $output;
	}
	//initialisation des formulaire modal
	function get_ModalForm($table,$fields){
		$output='';//initilisation du variable de sortie
		//si il s'agit d'un formulaire d'insertion
		$output.='<div id="InsertForm" class="modal" tabindex="-1"><div class="modal-dialog">
				<div class="modal-content"> <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">'.$this->switch_table_name($table).'</h4>
				</div>
		      <div class="modal-body">
		      	<div class="row"><div class="col-xs-12">
		        '.$this->form->load_form($table,$fields,'insert')/*appel du formulaire*/.'
		      </div></div></div>
		    </div>
		  </div>
		</div>';//si il s'agit d'un formulaire de modification
		$output.='<div id="EditForm" class="modal" tabindex="-1"><div class="modal-dialog">
				<div class="modal-content"> <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">'.$this->switch_table_name($table).'</h4>
				</div>
		      <div class="modal-body">
		      	<div class="row"><div class="col-xs-12">
		        '.$this->form->load_form($table,'all','edit')/*appel du formulaire*/.'
		      </div></div></div>
		    </div>
		  </div>
		</div>';
		$output.='<div id="ShowForm" class="modal" tabindex="-1"><div class="modal-dialog">
				<div class="modal-content"> <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">'.$this->switch_table_name($table).'</h4>
				</div>
		      <div class="modal-body">
		      	<div class="row"><div class="col-xs-12">
		        '.$this->showRecord($table)/*appel du formulaire*/.'
		      </div></div></div>
		    </div>
		  </div>
		</div>';
		return $output;
	}
	function showRecord($table)
	{
		$output ='';
		$fields = $this->mdl_tab->get_TableFields($table);
		for ($i=1; $i < count($fields); $i++) { 
			$output .= '<h5>'.str_replace('_', ' ', ucfirst($fields[$i])).' :</h5>';
			$output .= '<p style="background-color:#dff0d8;" id="show'.$fields[$i].'"></p>';
		}
		$output.='<br/>';
		return $output;
	}

	//permet de faire l'historique des actions realiser sur une table
	function load_history_table($table,$array_fields)
	{
		$query=$this->mdl_tab->get_TableFields($table);
		$usetablefields = $this->generate_table_fields($array_fields,$query);
		$count=count($usetablefields);
		$output='';

		$output.='<div style="position:absolute;right:12px;bottom:-45px;" align="right" id="pagination_link"></div>';

		$output.='<div style="margin-bottom:10px;" ></div>';
		$output.='<div class="form-group" style="display:inline margin-bottom:10px; right:12px; top:8px;">
 					<input type="text" name="search-data" placeholder="search" id="search_data"/>
 				</div>';
 	
		$output.='<div class="table-responsive" id="table_paginate" table-name="'.$table.'"></div>';
        //buttons de suppression multiple
       
        $output.='<div style="position:absolute;left:12px;" align="left">
        			<button id="delete_multiple" class="btn btn-white btn-warning btn-bold">
					<i class="ace-icon fa fa-trash-o bigger-120 orange"></i>Delete</button>
				</div>';
		return $output;
	}

	function confirm_modal($value='')
	{
		$output = '';
		$output.= '<div id="dialog-confirm" class="hide">
					<div class="alert alert-info bigger-110">
					Voulez-vous vraiment annuler cette opération!
					</div>

					<div class="space-6"></div>

					<p class="bigger-110 bolder center grey">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
					Are you sure?
					</p>
					</div>';
		return $output;
	}
	function switch_table_name($table){
		if ($table == 'user')  {
			return 'Agent';
		}
		return $table;
	}
}

/* End of file Table.php */
/* Location: ./application/modules/Table/controllers/Table.php */
