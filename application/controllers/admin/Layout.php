<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Layout extends My_Controller {

public function __construct(){
	parent::__construct();
	auth_check(); // check login auth
	/* $this->rbac->check_module_access();
	if($this->uri->segment(3) != '')
	$this->rbac->check_operation_access();
	$this->load->model('admin/dashboard_model', 'dashboard_model'); */
	$this->load->model('admin/Layout_model', 'Layout_model');
	$this->load->model('admin/Activity_model', 'activity_model');
}

//--------------------------------------------------------------------------

public function index(){
	$data['bus_type'] = $this->Layout_model->get_bus_types();
	$this->load->view('admin/includes/_header');
	$this->load->view('admin/layout/addNewLayout',$data);
	$this->load->view('admin/includes/_footer');
}

public function getLayout(){
	$data = $this->Layout_model->getLayout_db();
    return $data;
}

public function insertlayout(){
	$data = $this->Layout_model->insertlayout_db();
	return $data;
}

public function mapLayout(){
	$data['operators'] = $this->Layout_model->get_operators();
	$data['layouts'] = $this->Layout_model->get_layout();
	$this->load->view('admin/includes/_header');
	$this->load->view('admin/layout/mapLayout',$data);
	$this->load->view('admin/includes/_footer');
}

public function getLayoutDB() {
	$data = $this->Layout_model->get_layout_db();
	return $data;
}

public function mapLayoutDB() {
	$data = $this->Layout_model->map_layout_db();
	return $data;
}

}
?>
