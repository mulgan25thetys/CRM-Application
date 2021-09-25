<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_query extends MX_Controller {

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
			redirect('auth/login','refresh');
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
}

/* End of file Get_query.php */
/* Location: ./application/modules/src/controllers/Get_query.php */