<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_src');
		//chargement des modules utils pour les traitements
		$this->load->module('src/getters');
		$this->load->module('src/requests');
	}
	//permet de retourner un enregistrement demandé a partir de son id
	function get_entry(){
		if ($this->input->is_ajax_request()) {
			$post = $this->input->post();
			$query = $this->mdl_src->get_entry($post['table'],$post['id']);
			if ($query != null) {
				$this->session->set_userdata('idedit', $post['id']);
				$data = array('response' => 'success','message'=> $query);//retoruner les valeurs du champs de l'enregistrement
			} else {
				$data = array('response' => 'error','message'=> 'Cet enregistrement n\'exite pas!');
			}
			$data['token']=$this->security->get_csrf_hash();
			echo json_encode($data);
		} else {
			echo "<h1>No direct script access allowed</h1>";//retourner ceci si la requete n'est pas envoyée ajax
		}
		
	}
	function check_campaign_id($value=''){
		if(empty(trim($value))){
			$this->form_validation->set_message('check_campaign_id','Veuillez indentifier votre campagne!');
			return false;
		}
		return true;
	}

	function check_name($value=''){
		if (empty(trim($value))) {
			$this->form_validation->set_message('check_name','Veuillez indiquer le nom de votre campagne!');
			return false;
		}
		return true;
	}
	function validation($posts)
	{
		foreach ($posts as $key => $value) {
			if (!in_array($key, array('description'))) {
				switch ($key) {
					case 'campaign_id':
						$this->form_validation->set_rules('campaign_id', 'campaign_id','trim|required|min_length[6]|max_length[12]|xss_clean');
						break;
					
					default:
						$this->form_validation->set_rules($key, $key, 'trim|required|xss_clean');
						break;
				}
			}
		}
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		return $this->form_validation;
	}
	//permet de faire l'insertion des données
	function insert($value='')
	{
		$data = array('response'=>'','message'=>array(),'key'=>array());
		if($this->input->is_ajax_request()) {
			$posts = $this->input->post();
			$table = $posts['table'];
			unset($posts['_ci_csrf_token']);
			unset($posts['table']);
			
			$validation = $this->validation($posts);

			if ($validation->run($this) === false) {
				foreach ($posts as $key => $value) {
					$data['message'][$key] = form_error($key);
				}
			} else {
				$data = $this->init_insert($table,$posts);
			}
			
			$data['token']=$this->security->get_csrf_hash();
			echo json_encode($data);//retour de la donnée demandé en ajax
		} else {
			echo "<h1>No direct script access allowed</h1>";
		}	
	}
	function init_insert($table,$posts){
		$data = array('response'=>'','message'=>'');
		if($this->mdl_src->insert($table,$posts)){
			$data['response'] = 'success';

		}else{ $data['response']= 'error'; $data['message']='L\'operation a echouée!';}
		return $data;
	}
	//permet de generer un id de campaign
	function get_campaign_id(){
		if ($this->input->is_ajax_request()) {
			$id = rand(100000,999999);
			echo json_encode(array('id'=>$id));
		} else {
			echo "<h1>No direct script access allowed</h1>";
		}
	}
	//permet de verifier et valider les données saisie en temps reel
	function realTime_checkValue(){
		if ($this->input->is_ajax_request()) {
			switch ($_GET['table']) {
				case 'campaign':
					$query = $this->mdl_src->get_specific_value($_GET['table'],'campaign_id');
					if($query->num_rows() >0){
						foreach ($query->result() as $value) {
							if ($_GET['value'] == $value->campaign_id) {
								$data = array('response'=> 'error','message'=>'Déja disponible!');
							}else{ $data = array('response'=> 'success','message'=>'Non disponible!'); }
						}
					}
					break;
				default:
					$data = array('response'=> 'error','message'=>'Pas de table!');
					break;
			}
			$data['token']=$this->security->get_csrf_hash();
			echo json_encode($data);
		} else {
			echo "<h1>No direct script access allowed</h1>";
		}
	}
	
	//permet de faire la modification des données
	function edit(){
		if($this->input->is_ajax_request()) {
			$posts = $this->input->post();
			$table = $posts['table'];
			unset($posts['_ci_csrf_token']);
			unset($posts['table']);
			$idedit = $this->session->userdata('idedit');
			$fields = $this->mdl_src->getTable_field($table);

			for ($i=0; $i < count($fields); $i++) { 
				if(array_keys(explode('_', $fields[$i]),'date') || array_keys(explode('_',$fields[$i]),'time')){
					$posts[$fields[$i]] = date("Y-m-d H:i:s", strtotime($posts[$fields[$i]]));
				}

				if(in_array($fields[$i],array('recording','answering_machine_detection'))){
					if (isset($posts[$fields[$i]])) {
						$posts[$fields[$i]] = "on";
					}else{
						$posts[$fields[$i]] = "off";
					}
				}
			} 
			
			if($this->mdl_src->edit($table,$idedit,$posts)){
				$data = array('response' => 'success');
				$this->session->unset_userdata('idedit');//destruction de l'id edit
			}else{ $data = array('response' => 'error', 'message' => 'L\'operation a echouée!');}
			$data['data'] = $posts;
			$data['token']=$this->security->get_csrf_hash();
			echo json_encode($data);//retour de la donnée demandé en ajax
		} else {
			echo "<h1>No direct script access allowed</h1>";
		}
	}

	//permet de faire la suppression des données
	function delete(){
		if ($this->input->is_ajax_request()) {
			$posts = $this->input->post();
			if ($this->mdl_src->delete($posts['table'],$posts['id'])) {
				$data = array('response'=>'success','message'=> 'L\'enregistrement a été supprimé!');
			} else {
				$data = array('response'=>'error','message'=> 'L\'opération a échouée!');
			}
			$data['token'] = $this->security->get_csrf_hash();
			echo json_encode($data);
		} else {
			echo "<h1>No direct script access allowed</h1>";
		}
	}

	//permet de faire une suppression mutiple
	function delete_multiple(){
		if ($this->input->is_ajax_request()) {
			$idajax = $_GET['id'];
			$iddel = explode('/', $idajax);
			$query = $this->mdl_src->deleterows($_GET['table'],$iddel);
			if ($query) {
				$data = array('response' => 'success','message'=>'( '.count($iddel).' ) ligne(s) supprimée(s)' );
			} else {
				$data = array('response' => 'error','message'=>'Une erreur est survenue' );
			}
			echo json_encode($data);
		} else { echo "<h1>No direct script access allowed</h1>";}	
	}
	function debug($value='')
	{
		echo "<pre>";
		print_r (explode('/', uri_string()));
		echo "</pre>";
	}
	//permet d'activer ou de desactiver une ligne d'une table 
	function enabledRow(){
		if ($this->input->is_ajax_request()) {
			if ($_GET['enabled'] == 1) {
				$query =  $this->mdl_src->enabledRow($_GET['table'],$_GET['id'],'y');
				if ($query) {
					$data = array('response' => 'success','message'=> $_GET['table'].'-'.$_GET['id'].' a été activé(e)','theme'=>'info');
				} else {
					$data = array('response' => 'error','message'=> 'Une erreur est survenue' );
				}
			} else if($_GET['enabled'] == 0){
				$query =  $this->mdl_src->enabledRow($_GET['table'],$_GET['id'],'n');
				if ($query) {
					$data = array('response' => 'success','message'=> $_GET['table'].'-'.$_GET['id'].' a été désactivé(e)','theme'=>'warning' );
				} else {
					$data = array('response' => 'error','message'=> 'Une erreur est survenue' );
				}
			}
			$data['token']=$this->security->get_csrf_hash();
			echo json_encode($data);
		}else {
			echo "<h1>No direct script access allowed</h1>";	
		}
	}
	//permet de faire l'affichage des données
	function read(){
		
			$this->load->library('pagination');
			$config = array();
			$config["base_url"] ="#";
			$config["total_rows"]=$this->mdl_src->count_all($_POST['table']);
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
			$page = 2;

			$start = (intval($page) - 1 )*$config['per_page'];

			$query 	= $this->mdl_src->fetch_details($config['per_page'],$start,$_POST['table']);
			$fields = $this->getters->get_Table_fields($_POST['table']);
			$output = array(
				'pagination_link' => $this->pagination->create_links(),
				'data_table' => $this->switch_table_row($_POST['table'],$fields,$query)
			);

			$output['token']=$this->security->get_csrf_hash();
			echo json_encode($output);
				
	}

	//permet de faire un recherche dans une table
	function search($value='')
	{	
		$post = $this->input->post();

		$data = array('response' => 'error','result'=>array(),'token','');
		$query 	= $this->mdl_src->search_entry($post['table'],$post['query']);
		$fields = $this->getters->get_Table_fields($post['table']);
		$data['response'] = 'success';
		$data['result']   = $this->switch_table_row($post['table'],$fields,$query);

		$data['token']=$this->security->get_csrf_hash();
		echo json_encode($data);
	}

	function get_row_detail_head(){
			return '<th class="detail-col">Details</th>';
	}
	function get_row_detail_body_col(){
			return '<td class="center"><div class="action-buttons"><a href="#" class="green bigger-140 show-details-btn" title="Show Details"><i class="ace-icon fa fa-angle-double-down"></i>
		<span class="sr-only">Details</span></a></div></td>';
	}
	function get_row_detail_body_row($user){
		return '<tr class="detail-row"><td colspan="8"> <div class="table-detail"><div class="row"><div class="col-xs-12 col-sm-2"> <div class="text-center"><img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner\'s Avatar" src="'.base_url().'assets/images/avatars/profile-pic.jpg" /> <br /><div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right"> <div class="inline position-relative"><a class="user-title-label" href="#">
	<i class="ace-icon fa fa-circle light-green"></i>&nbsp;<span class="white">'.ucfirst($user->pseudo).'</span></a></div></div></div></div><div class="col-xs-12 col-sm-7">
	<div class="space visible-xs"></div><div class="profile-user-info profile-user-info-striped"><div class="profile-info-row"><div class="profile-info-name"> Username </div><div class="profile-info-value"><span>'.$user->pseudo.'</span></div></div><div class="profile-info-row">
	<div class="profile-info-name"> Location </div><div class="profile-info-value"><i class="fa fa-map-marker light-orange bigger-110"></i><span>'.$user->adresse.'</span></div></div><div class="profile-info-row"><div class="profile-info-name"> Age </div><div class="profile-info-value">
<span>'.$user->age.'</span></div></div><div class="profile-info-row"><div class="profile-info-name"> Joined </div><div class="profile-info-value"><span>'.$user->birthday.'</span></div></div><div class="profile-info-row"><div class="profile-info-name"> Last Online </div><div class="profile-info-value"><span>3 hours ago</span></div></div><div class="profile-info-row"><div class="profile-info-name"> About Me </div><div class="profile-info-value"><span>Bio</span></div></div></div></div><div class="col-xs-12 col-sm-3"><div class="space visible-xs"></div><h4 class="header blue lighter less-margin">Send a message to '.ucfirst($user->pseudo).'</h4><div class="space-6"></div><form><fieldset><textarea class="width-100" resize="none" placeholder="Type something…"></textarea></fieldset><div class="hr hr-dotted"></div><div class="clearfix"><label class="pull-left"><input type="checkbox" class="ace" /><span class="lbl"> Email me a copy</span></label><button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">Submit<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i></button></div></form></div></div></div>
</td></tr>';
	}
	//permet de personnaliser les champs a afficher
	function switch_table_row($table,$tablefields,$query)
	{
		$output='';
		$output.='<table id="simple-table" table-name="'.$table.'" class="table table-striped dataTable">';
		$output.="<thead>";
				$output.='<tr role="row">';
				$output.= ' <th class="center">
								<label class="pos-rel"><input type="checkbox" id="checkall"  class="ace" /><span class="lbl"></span></label>
 							</th>';
 				if ($table == 'user') {
 					$output.= $this->get_row_detail_head();
 				}
	            for ($i=1; $i < count($tablefields); $i++) { 
	            	$output.='<th class="sorting" tabindex="0" aria-controls="simple-table">';
	            	$output.=ucfirst(str_replace('_', ' ',$tablefields[$i]));
					$output.="</th>";	
	            } 
	            $output.="<th>Action</th>";
				$output.="</tr>";

		$output.="</thead>";
		$output.='<tbody> ';
				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {
					$output.='<tr role="row" class="">';

		        	$output.='<td class="center"><label class="pos-rel"><input type="checkbox" value="'.$row['id'].'" class="ace checkitem" /><span class="lbl"></span></label></td>';
		        	if ($table == 'user') {
 						$output.= $this->get_row_detail_body_col();
 					}
		        	for ($i=1; $i < count($tablefields); $i++) { 
		        		$output.=$this->switch_display_value($tablefields[$i],$row);
		        	}
		        	//definition des buttons d'actions de modification et de suppresion
					$output.='<td><div class="hidden-sm hidden-xs action-buttons">
						<a class="blue" id="show" href="" value="'.$row['id'].'">
							<i class="ace-icon fa fa-search-plus bigger-130"></i>
						</a>
						<a id="edit" class="green" href="" value="'.$row['id'].'">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="red" id="delete" href="" value="'.$row['id'].'">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div> '.$this->dropdowbutton($row).' </td>';

					$output.='</tr>';

						if ($table == 'user') {
 							$output.= $this->get_row_detail_body_row($this->mdl_src->fetch_user_details($row['id']));
 						}
					}
				} else {
					$colspan = count($tablefields)+1;
					$output.='<tr ><td colspan="'.$colspan.'">Aucune donnée trouvée!</td></tr>';
				}
				
		$output.='</tbody>';
		
		$output.= '</table>';
		return $output;
	}
	function dropdowbutton($row){
		$output ='';
		$output.='<div class="hidden-md hidden-lg"><div class="inline pos-rel">
		<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto"><i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
		</button>

		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close"><li>
		<a id="show" href="" value="'.$row['id'].'" class="tooltip-info" data-rel="tooltip" title="View"><span class="blue">
			<i class="ace-icon fa fa-search-plus bigger-120"></i></span></a> </li>
        <li><a id="edit" href="" value="'.$row['id'].'"class="tooltip-success" data-rel="tooltip" title="Edit"><span class="green">
		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>
        <li><a id="delete" href="" value="'.$row['id'].'" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
			<i class="ace-icon fa fa-trash-o bigger-120"></i></span></a></li>
		</ul></div></div>';
		return $output;
	}
	//permet d'afficher les valeurs des champs d'un formulaire en fonction de leur type
	function switch_display_value($key,$value){
		$output='';
		switch ($key) {
			case 'active':
				if ($value[$key] == 'Y') {
					$output.='<td><label><input value="'.$value['id'].'" type="checkbox" checked class="ace ace-switch ace-switch-3 denabledItem" />
							<span class="lbl middle"></span></label></td>';
				}else{
					$output.='<td><label><input value="'.$value['id'].'"  type="checkbox" class="ace ace-switch ace-switch-3 enabledItem" />
							<span class="lbl middle"></span></label></td>';
				}
				break;
			case 'dial_method':
				$output.='<td><span class="label label-success arrowed-in arrowed-in-right">'.$value[$key].'</span></td>';
				break;
			case 'online':
				if ($value[$key] == 'Y') {
					$output.='<td><span class="label label-primary arrowed-in arrowed-in-right">Connecté(e)</span></td>';
				}else{
					$output.='<td><span class="label label-black arrowed-in arrowed-in-right">Déconnecté(e)</span></td>';
				}
				break;
			case 'role':
				switch ($value[$key]) {
					case 2:
						$output.='<td><span class="label label-success arrowed-in arrowed-in-right">Agent</span>
								</td>';
						break;
					case 3:
						$output.='<td><span class="label label-info arrowed-right arrowed-in">Admin</span>
								</td>';
						break;
					default:
						$output.='<td><span class="label label-warning arrowed arrowed-right">Customer</span>
								</td>';
						break;
				}
				break;
			default:
				$output.='<td>'.$value[$key].'</td>';
				break;
		}
		return $output;
	}

}

/* End of file Crud.php */
/* Location: ./application/modules/src/controllers/Crud.php */