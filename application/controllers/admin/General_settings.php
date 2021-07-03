<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General_settings extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
		$this->rbac->check_module_access();
	}

	//-------------------------------------------------------------------------
	// General Setting View
	public function index()
	{
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/includes/_footer');
	}

	

}

?>	