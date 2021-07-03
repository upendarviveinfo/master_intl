<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Operator extends My_Controller {

public function __construct(){
	parent::__construct();
	auth_check(); // check login auth
	/* $this->rbac->check_module_access();
	if($this->uri->segment(3) != '')
	$this->rbac->check_operation_access();
	$this->load->model('admin/dashboard_model', 'dashboard_model'); */
	$this->load->model('admin/Operator_model', 'Operator_model');
	$this->load->model('admin/Activity_model', 'activity_model');
}

//--------------------------------------------------------------------------

public function index(){
	$this->load->view('admin/includes/_header');
	$this->load->view('admin/Operator/OperatorsList');
	$this->load->view('admin/includes/_footer');
}

public function datatable_json(){				   					   
	$records['data'] = $this->Operator_model->get_all_users();
		$data = array();
		//$i=0;
		foreach ($records['data']   as $row) 
		{  
			$status = ($row['is_active'] == 1)? 'checked': '';
			$data[]= array(
				$row['id'],
				$row['operator_title'],
				$row['travel_id'],
				$row['name'],
				$row['contact_no'],	
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['travel_id'].'" 
				id="op_'.$row['travel_id'].'"
				type="checkbox"  
				'.$status.'><label for="op_'.$row['travel_id'].'"></label>',		
				'<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/operator/edit/'.$row['travel_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/operator/delete/".$row['travel_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		 $records['data']= $data;
		echo json_encode($records);
}

public function addOperator(){
	//$this->rbac->check_operation_access(); // check opration permission
	$key = $this->input->post('key');
	if($key=='add_op')
	{
		$insert = $this->Operator_model->addOperator_db();
			$data = array('success' => false, 'msg'=> 'Form has been not submitted');
        if($insert)
		{
        	$data = array('success' => true, 'msg'=> 'Form has been submitted successfully');
        }
        echo json_encode($data);
	}
	else{
		$data['location'] = $this->Operator_model->get_location();
		$data['currency'] = $this->Operator_model->getCurrencies();
		$data['travel_id'] = $this->Operator_model->max_travelid();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/Operator/AddOperator',$data);
		$this->load->view('admin/includes/_footer');
	}
}

function change_status()
{   
	$this->Operator_model->change_status();
}

function delete($travid = 0)
{   
	$this->Operator_model->op_partial_delete($travid);
	//$this->activity_model->add_log(3);
	$this->session->set_flashdata('success', 'Operator has been deleted successfully!');
	redirect(base_url('admin/operator/login'));
}

public function edit($id = 0){
	//$this->rbac->check_operation_access(); // check opration permission
	$key = $this->input->post('key');
	$travel_id = $this->input->post('op_travel_id');
	if($key=='edit_op')
	{
		//$data = $this->security->xss_clean($data);
		$result = $this->Operator_model->edit_user($travel_id);
		$data = array('success' => false, 'msg'=> 'Not Updated');
        if($result)
		{
        	$data = array('success' => true, 'msg'=> 'Updated successfully');
        }
        echo json_encode($data);
	}
	else{
		$data['location'] = $this->Operator_model->get_location();
		$data['currency'] = $this->Operator_model->getCurrencies();
		$data['user'] = $this->Operator_model->get_user_by_id($id);
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/Operator/OperatorEdit', $data);
		$this->load->view('admin/includes/_footer');
	}
}

}
?>
