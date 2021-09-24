<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MX_Controller {

    function __construct()
    {
    	parent::__construct();
  
    	$this->load->model('mdl_form');
    	$this->load->module('src/req_query');
    	$this->load->module('src/get_query');
    }

    //chargement du formulaire
	function load_form($tablename=null,$dataform,$type)
	{
		$output='';
			
			if (is_array($dataform) && count($dataform) > 0) {
				
				$attributs = array('role'=>'form','class'=>'form-horizontal','id'=>$type.'_'.$tablename);

				$output.='';
				//initialisation du formulaire en creant le formulaire puis les champs inputs
			 	$output.=$this->init_form($attributs,$tablename,$dataform,$type);
			 	$output.="";
			} elseif($dataform == 'all'){
				$dataform = $this->mdl_form->get_TableFields($tablename);
				
				$attributs = array('role'=>'form','class'=>'form-horizontal','id'=>$type.'_'.$tablename);

				$output.='';
				//initialisation du formulaire en creant le formulaire puis les champs inputs
			 	$output.=$this->init_form($attributs,$tablename,$dataform,$type,3);
			 	$output.="";
			}else {
				$output="Aucune donnée existante!";
			}
        return $output;
	}
	//function de creation du formulaire
	private function init_form($attr,$table,$query_fields,$type,$limit=''){
		$output= '';
		$output.=form_open('src/crud/'.$type,$attr);//debut du formulaire
		$output.='<input type="hidden" name="table" value="'.$table.'">';
		
		if($limit != ''){
		    for ($i=1; $i < $limit; $i++) {//parcourir le tableau des champs du formulaire 

					$output.='<fieldset>';
	                $output.='<label  for="'.$query_fields[$i].'">'.ucfirst(str_replace('_', ' ',$query_fields[$i])).'</label>';
	                $output.=$this->switch_fields_form($query_fields[$i],$type);
	                $output.="</fieldset>";           
			}
			if ($limit < count($query_fields)) {
				$output.='<a href="#" style="display:inline-block;margin-top:5px;margin-bottom:10px;" class="chevron-form_rest"><i style="color:#393939" class="ace-icon fa fa-chevron-down"></i></a>';
				$output.='<div id="form_rest" style="display:none;">';
						for ($i>$limit; $i < count($query_fields); $i++) { 
							if($query_fields[$i] == 'author'){
			                	unset($query_fields[$i]);
			                }else{
							$output.='<fieldset>';
			                $output.='<label  for="'.$query_fields[$i].'">'.ucfirst(str_replace('_', ' ',$query_fields[$i])).'</label>';
			                $output.=$this->switch_fields_form($query_fields[$i],$type);
			                $output.="</fieldset>"; }
						}
				$output.='</div>';
			}
		}else{
			for ($i=1; $i < count($query_fields); $i++) {//parcourir le tableau des champs du formulaire 
					if($query_fields[$i] == 'author'){
	                	unset($query_fields[$i]);
	                }else{
						$output.='<fieldset>';
		                $output.='<label  for="'.$query_fields[$i].'">'.ucfirst(str_replace('_', ' ',$query_fields[$i])).'</label>';
		                $output.=$this->switch_fields_form($query_fields[$i],$type);
		                $output.="</fieldset>"; }         
			}
		}		
		$output.='</br>';
		$output.='<button type="submit" class="btn btn-success btn_submit_'.$table.'">Save '.$table.'</button>';
		$output.=form_close();//fin du formulaire
		return $output;
	}

	//retourn le format adapter a chacun des champs d'une table
	private function switch_fields_form($field,$type){
		$output='';

		if(array_keys(explode('_', $field),'date') || array_keys(explode('_', $field),'time')){
			$output.='<div class="input-group"><input type="text" '.$this->set_id_value($field,$type).' name="'.$field.'" class="form-control date-timepicker1" /><span class="input-group-addon"><i class="fa fa-clock-o bigger-110"></i></span></div>';
		}else if(in_array($field, array('allow_inbound_blended','force_reset_leads_on_hopper'))){
			$output.='<select name="'.$field.'" class="form-control" id="form-field-select">
			    		<option value="Y">Y</option>
			    		<option value="N">N</option>
			    	</select>';

		}else if(in_array($field, array('recording','answering_machine_detection'))){
			$output.='<label><input type="checkbox" value="on" offval="off" name="'.$field.'" '.$this->set_id_value($field,$type).' class="ace ace-switch ace-switch-3" /> <span class="lbl middle"></span></label>';

		}else{
		switch ($field) {//switcher les champs du form et faire un rendu selon les type de champs
			case 'author':
				unset($field);
				break;
			case 'description':
	    		$output.='<textarea name="'.$field.'" '.$this->set_id_value($field,$type).' placeholder="'.$field.'" class="form-control " '.$this->set_field_value($field).'></textarea>';
	    		break;
	    	case 'dial_method':
	    		$output.='<select name="'.$field.'" class="form-control" id="form-field-select-1">
			    		<option value="inbound">Inbound</option>
			    		<option value="outbound">Outbound</option>
			    	</select>';
	    		break;
	    	case 'active':
	    		$output.='<select name="'.$field.'" class="form-control" id="form-field-select">
			    		<option value="Y">Actif</option>
			    		<option value="N">Inactif</option>
			    	</select>';
	    		break;
	    	case 'role':
	    		$output.='<select name="'.$field.'" class="form-control" id="form-field-select">
		    		<option value="1">Client</option>
		    		<option value="2">Agent</option>
		    		<option value="3">Administrateur</option>
		    	</select>';
	    		break;
    		case 'active_dual_status':
    		$output.='<select name="'.$field.'" class="form-control" id="form-field-select">
		    		<option value="Y">No answer</option>
		    		<option value="NA">No answer autoDial</option>
		    		<option value="A">Answering machine</option>
		    		<option value="AA">Answering machine auto</option>
		    		<option value="DROP">Agent not avaible</option>
		    		<option value="B">Busy</option>
		    		<option value="NEW">New lead</option>
		    	</select>';
    		break;
	    	case 'password':
	    		$output.='<input type="password" '.$this->set_id_value($field,$type).' name="'.$field.'" placeholder="'.$field.'" class="form-control '.$field.'" '.$this->set_field_value($field).'/>';
	    		break;
	    	case 'email':
	    		$output.='<input type="email" '.$this->set_id_value($field,$type).' name="'.$field.'" placeholder="'.$field.'" class="form-control '.$field.'" '.$this->set_field_value($field).'/>';
	    		break;
	    	default:
	    		$output.='<input type="text" '.$this->set_id_value($field,$type).' name="'.$field.'" placeholder="'.$field.'" class="form-control '.$field.'" '.$this->set_field_value($field).'/><p class="message_'.$field.'"></p>';
	    		break;
	   		}
	   	}
	    return $output;	
	}

	//retoune la valeur a afficher dans les champs de saisie si le formulaire est soumis affiche les valuers des champs recuperer dans le $_POST  
	private function set_field_value($field){
		$output = '';
     	if (isset($_POST[$field])) {//verifier si ce champs en question a été envoyé en post
      		$output.= 'value="'.$_POST[$field].'"';
      	}
     	return $output;
	}
	//permet d'ajouter in id au champs du formulaire pour la modification
	private function set_id_value($field,$type){
		$output = "";
		if ($type == 'edit') {
			$output.= 'id="'.$field.'"';
		}
		return $output;
	}
}

/* End of file Form_build.php */
/* Location: ./application/modules/Form_bluid/controllers/Form_build.php */
