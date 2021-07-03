<?php

class serviceActiveDeacive extends CI_Model{
 
    public function getServicesDb(){
        $operator_id= $this->input->post('operator_id');
        $status= $this->input->post('status');
        //$services= $this->db->query("select service_num,service_name,is_active from master_buses where travel_id='$operator_id' and is_active=' $status' ");
        $this->db->select('*');
      // $this->db->where('travel_id',$operator_id);
       // $this->db->where('is_active', $status);
        return $this->db->get('master_buses')->result_array();
}
}