<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getters extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_src'); 
	}

	function get_URl()
	{
		return @explode('/', uri_string());
	}

    function check_cnx(){
		$online = $this->session->userdata('online');
		if ($online == null && $online !='Y') {
			redirect('auth/logout','refresh');
		}
    }

    function get_token(){
    	if ($this->input->is_ajax_request()) {
    		echo json_encode(array('token'=>$this->security->get_csrf_hash()));
    	}
    }

    function get_Table_fields($table='')
    {
    	switch ($table) {
    		case 'campaign':
    			$tablefields = array('id','campaign_id','name','dial_method','active');
    			break;
    		case 'otp':
    			$tablefields = array('id','code','time','is_expired');
    			break;
    		case 'user':
    			$tablefields = array('id','role','email','pseudo','tel_mobile','online');
    			break;
    		default:
    			$tablefields = array();
    			break;
    	}
    	return $tablefields;
    }

  //   function get_Menu(){

  //   	return array(
  //   	array
  //       (
  //           'id' => 1,
  //           'parent_id' => 0,
  //           'title' => 'Call',
  //           'page' => 'call',
  //           'icon' => 'phone',
  //           'status' => 1
  //       ),array
  //       (
  //           'id' => 2,
  //           'parent_id' => 0,
  //           'title' => 'SMS',
  //           'page' => 'sms',
  //           'icon' => 'commenting',
  //           'status' => 1
  //       ),array
  //       (
  //           'id' => 3,
  //           'parent_id' => 0,
  //           'title' => 'E-mailing',
  //           'page' => 'emailing',
  //           'icon' => 'envelope',
  //           'status' => 1
  //       ),array
  //       (
  //           'id' => 15,
  //           'parent_id' => 10,
  //           'title' => 'User Profile',
  //           'page' => 'account',
  //           'icon' => 'caret-right',
  //           'status' => 0
  //       ),array
  //       (
  //           'id' => 18,
  //           'parent_id' => 10,
  //           'title' => 'Login & Register',
  //           'page' => '',
  //           'icon' => 'caret-right',
  //           'status' => 0
  //       ),array
  //       (
  //           'id' => 19,
  //           'parent_id' => 10,
  //           'title' => 'FAQ',
  //           'page' =>'' ,
  //           'icon' => 'caret-right',
  //           'status' => 0
  //       ),array
  //       (
  //           'id' => 21,
  //           'parent_id' => 0,
  //           'title' => 'Settings',
  //           'page' => 'settings',
  //           'icon' => 'cog',
  //           'status' => 1
  //       ),array
  //       (
  //           'id' => 22,
  //           'parent_id' => 21,
  //           'title' => 'Billings',
  //           'page' => 'billings',
  //           'icon' => 'barcode',
  //           'status' => 1
  //       )

		// );
  //   }

  //   function get_SubMenu($value='')
  //   {	
  //   	$submenu = array();
	 //    	switch ($value) {
	 //    		case 1:
	 //    		$submenu=array (array
		// 	        (
		// 	            'id' => 4,
		// 	            'parent_id' => 1,
		// 	            'title' => 'Dashboard',
		// 	            'page' => 'dashboard',
		// 	            'icon' => 'tachometer',
		// 	            'status' => 0
		// 	        ),array
		// 	        (
		// 	            'id' => 5,
		// 	            'parent_id' => 1,
		// 	            'title' => 'Call history',
		// 	            'page' => 'history',
		// 	            'icon' => 'desktop',
		// 	            'status' => 0
		// 	        ),array
		// 	        (
		// 	            'id' => 7,
		// 	            'parent_id' => 1,
		// 	            'title' => 'Campaign',
		// 	            'page' => 'campaign',
		// 	            'icon' => 'tasks',
		// 	            'status' => 0
		// 	        ),array
		// 	        (
		// 	            'id' => 8,
		// 	            'parent_id' => 1,
		// 	            'title' => 'Lists',
		// 	            'page' => 'lists',
		// 	            'icon' => 'list-alt',
		// 	            'status' => 0
		// 	        ),array
		// 	        (
		// 	            'id' => 9,
		// 	            'parent_id' => 1,
		// 	            'title' => 'SDA',
		// 	            'page' => 'sda',
		// 	            'icon' => 'tag',
		// 	            'status' => 0
		// 	        ),array
		// 	        (
		// 	            'id' => 20,
		// 	            'parent_id' => 1,
		// 	            'title' => 'Agents',
		// 	            'page' => 'agents',
		// 	            'icon' => 'users',
		// 	            'status' => 0
		// 	        ));
	 //    			break;
	 //    		case 2:
	 //    			$submenu = array(
	 //    					array
		// 			        (
		// 			            'id' => 11,
		// 			            'parent_id' => 2,
		// 			            'title' => 'Dashboard',
		// 			            'page' => 'dashboard',
		// 			            'icon' => 'tachometer',
		// 			            'status' => 0
		// 			        ),array
		// 			        (
		// 			            'id' => 12,
		// 			            'parent_id' => 2,
		// 			            'title' => 'Sms history',
		// 			            'page' => 'history',
		// 			            'icon' => 'desktop',
		// 			            'status' => 0
		// 			        ),array
		// 			        (
		// 			            'id' => 16,
		// 			            'parent_id' => 2,
		// 			            'title' => 'Campaign',
		// 			            'page' => 'campaign',
		// 			            'icon' => 'tasks',
		// 			            'status' => 0
		// 			        )
	 //    			);
	 //    			break;
	 //    		case 3:
	 //    			$submenu = array(
	 //    				array
		// 			        (
		// 			            'id' => 13,
		// 			            'parent_id' => 3,
		// 			            'title' => 'Dashboard',
		// 			            'page' => 'dashboard',
		// 			            'icon' => 'tachometer',
		// 			            'status' => 0
		// 			        ),array
		// 			        (
		// 			            'id' => 14,
		// 			            'parent_id' => 3,
		// 			            'title' => 'E-Mailing history',
		// 			            'page' => 'history',
		// 			            'icon' => 'desktop',
		// 			            'status' => 0
		// 			        ),array
		// 			        (
		// 			            'id' => 17,
		// 			            'parent_id' => 3,
		// 			            'title' => 'Campaign',
		// 			            'page' => 'campaign',
		// 			            'icon' => 'tasks',
		// 			            'status' => 0
		// 			        )
	 //    			);
	 //    			break;
	 //    		case 22:
	 //    			$submenu = array(
	 //    				array
		// 		        (
		// 		            'id' => 23,
		// 		            'parent_id' => 22,
		// 		            'title' => 'Invoices',
		// 		            'page' => 'invoices',
		// 		            'icon' => 'tag',
		// 		            'status' => 1
		// 		        ),array
		// 		        (
		// 		            'id' => 24,
		// 		            'parent_id' => 22,
		// 		            'title' => 'Services',
		// 		            'page' => 'services',
		// 		            'icon' => 'bookmark-o',
		// 		            'status' => 1
		// 		        ),array
		// 		        (
		// 		            'id' => 25,
		// 		            'parent_id' => 22,
		// 		            'title' => 'FAQ',
		// 		            'page' => 'faq',
		// 		            'icon' => 'pencil-square-o',
		// 		            'status' => 1
		// 		        ),array
		// 		        (
		// 		            'id' => 26,
		// 		            'parent_id' => 22,
		// 		            'title' => 'Configurations',
		// 		            'page' => '',
		// 		            'icon' => 'cogs',
		// 		            'status' => 1
		// 		        )
	 //    			);
	 //    			break;
	 //    		case 26:
	 //    			$submenu = array(
	 //    				array
		// 		        (
		// 		            'id' => 27,
		// 		            'parent_id' => 26,
		// 		            'title' => 'Type of billings',
		// 		            'page' => 'config?page=type-billing',
		// 		            'icon' => 'cog',
		// 		            'status' => 1
		// 		        ),array
		// 		        (
		// 		            'id' => 28,
		// 		            'parent_id' => 26,
		// 		            'title' => 'Payements  mode',
		// 		            'page' => 'config?page=payements-mode',
		// 		            'icon' => 'cog',
		// 		            'status' => 1
		// 		        )
	 //    			);
	 //    			break;
	 //    		default :
	 //    			$submenu = array();
	 //    		break;
	 //    	}
	 //    return $submenu;
  //   }
}

/* End of file Get_query.php */
/* Location: ./application/modules/src/controllers/Get_query.php */