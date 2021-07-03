<?php
	class Operator_model extends CI_Model{

		public function addOperator_db(){
			$data = array(
				'operator_title' => $this->input->post('op_title'),
				'user_name' => $this->input->post('op_username'),
				'password' => $this->input->post('op_pwd'),
				'firm_type' => $this->input->post('op_firmtype'),
				'name' => $this->input->post('op_name'),
				'address' => $this->input->post('op_address'),
				'location' => $this->input->post('op_location'),
				'contact_no' => $this->input->post('op_contact_no'),
				'email_id' => $this->input->post('email'),
				'is_active' => $this->input->post('status'),
				'travel_id' => $this->input->post('op_travel_id'),
				'fwd' => $this->input->post('op_forword_booking_dates'),
				//'cancellation_terms' => $this->input->post('op_cancellation_terms'),
				'admin_username' => $this->input->post('op_admin_username'),
				'admin_password' => $this->input->post('op_admin_pwd'),
				'sender_id' => $this->input->post('op_sender_id'),
				'is_api_sms' => $this->input->post('op_is_api_sms'),
				'other_contact' => $this->input->post('op_other_contact_number'),
				'tkt_no' => $this->input->post('op_ticket_number'),
				'op_url' => $this->input->post('op_url'),
				'central_agent' => $this->input->post('op_central_agent'),
				/* 'op_currency' => $this->input->post('op_currency'),
				'op_conversion_base_amount' => $this->input->post('op_conversion_base_amount'), */
				);
				//print_r($data); 
			$insert = $this->db->insert('registered_operators', $data);
			if ($insert) 
			{
				return true;
			} 
			else 
			{
				return false;
			}
		}

		public function get_all_users(){
			$this->db->select('*');
			$this->db->where('is_active!=',2);
			return $this->db->get('registered_operators')->result_array();
		}
		public function max_travelid() {
			$this->db->select('max(travel_id) as travel_id');
			$tr=$this->db->get('registered_operators');
			foreach($tr->result() as $r)
			{
		     return $travel_id=$r->travel_id+1;
			}

		}
		public function get_user_by_id($id){
			$query = $this->db->get_where('registered_operators', array('travel_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_user($travel_id){

			$data = array(
				'operator_title' => $this->input->post('op_title'),         
				'user_name' => $this->input->post('op_username'),
				'password' => $this->input->post('op_pwd'),                    
				'firm_type' => $this->input->post('op_firmtype'),
				'name' => $this->input->post('op_name'),                      
				'address' => $this->input->post('op_address'),
				'location' => $this->input->post('op_location'),         
				'contact_no' => $this->input->post('op_contact_no'),
				'email_id' => $this->input->post('email'),            
				'pan_no' => $this->input->post('op_pan_number'),
				'bank_name' => $this->input->post('op_bank_name'),		  
				'bank_account_no' => $this->input->post('op_bank_ac_no'),
				'ifsc_code' => $this->input->post('op_bank_ifsc_code'),        
				'mode' => $this->input->post('op_mode'),
				'is_active' => $this->input->post('status'),          
				'date' => $this->input->post('op_update_date'),
				'ip' => $this->input->post('ip'),               
				'fwd' => $this->input->post('op_forword_booking_dates'),
				/*'username' => $this->input->post('cancellation_terms'),*/
				'rid' => $this->input->post('R_id'),
				'admin_username' => $this->input->post('op_admin_username'),      
				'admin_password' => $this->input->post('op_admin_pwd'),
				'access_type' => $this->input->post('op_access_type'),      
				'bill_type' => $this->input->post('bill_type'),
				'bill_amt' => $this->input->post('bill_amount'),     
				 /* 'username' => $this->input->post('agent_cancellation_terms'), */
				'sender_id' => $this->input->post('op_sender_id'),         
				'is_api_sms' => $this->input->post('op_is_api_sms'),
				'other_contact' => $this->input->post('op_other_contact_number'),
				'tkt_no' => $this->input->post('op_ticket_number'),
				'op_url' => $this->input->post('op_url'),            
				'op_email' => $this->input->post('op_email'),
				'live_date' => $this->input->post('live_date'),         
				'central_agent' => $this->input->post('op_central_agent'),
				/*'sms_gateway' => $this->input->post('sms_gateway')*/
			);
			$this->db->where('travel_id', $travel_id);
			$this->db->update('registered_operators', $data);
			return true;
		}

		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('travel_id', $this->input->post('id'));
			$this->db->update('registered_operators');
		}

		function op_partial_delete($travid)
		{		
			$this->db->set('is_active', 2);
			$this->db->where('travel_id', $travid);
			$this->db->update('registered_operators');
		}

		function get_location()
		{
			$this->db->select('*');
			$this->db->where('is_active',1);
			return $this->db->get('master_cities');
		}

		function getCurrencies()
		{
			$this->db->select('*');
			$this->db->where('is_active',1);
			return $this->db->get('master_cities');
		}

	}

?>
