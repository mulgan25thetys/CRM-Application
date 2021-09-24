<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Auth_v1 extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdl_Auth_v1');
		$this->load->module('template_v1');
		//Do your magic here
	}
	
	 function index()
	{
		$status=$this->Mdl_Auth_v1->check_login();
		if ( $this->input->cookie('username',TRUE)&&$this->input->cookie('password',TRUE)) {
			if ($status=='success') {
				$this->session->userdata("logged_in", true);
				$this->load->view('template_v1/index');
			}
		}
		
	   $this->connection_simple();
	}
	
	function logout()
	{
		$this->session->unset_userdata('username');
		setcookie('username','',time()+3600);
	    setcookie('password','',time()+3600);
	    $this->session->sess_destroy();
	    redirect('auth_v1/index');
	}
	function connection_simple()
	{
		$this->load->library('form_validation');
		$remember=$this->input->post('remember');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		/*$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');*/
	    if($this->form_validation->run()  ) 
	    {
	    	$status=$this->Mdl_Auth_v1->check_login();
	    	if ($status=='invalid_username') {
	    		$this->session->set_flashdata('error', 'Username is invalid');
	    	}
	    	elseif ($status=='invalid_password') {
	    		$this->session->set_flashdata('error', 'password is invalid');
	    	}
	    	else {
	    			$this->session->userdata('logged_in', true);
	    			redirect('template_v1/index');
	    		 }
	    }
	    if($remember!=null)
	    {
	    	setcookie('username',$username,time()+3600);
	    	setcookie('password',$password,time()+3600);
	    }
	    $this->load->view('login');
	   // $this->logout();
	}

	function login($pseudo=null,$pwd=null)
	{
		/* si c est un result_array on met $data[id]['nom_champ']
		si cest un result $data[0]->pseudo */
		$data=$this->Mdl_Auth_v1->get_table();
		if($data->num_rows()>0)
		{
			foreach ($data as $key => $value) {
				/*echo $key"=>"$value; */
			}
			/*echo '<pre>';
			print_r($data[0]->pseudo);
			echo '</pre>';*/
		}
		else echo'table vide';
	}

}

/* End of file Auth_v1 */
/* Location: ./application/modules/auth_v1/controllers/Auth_v1 */