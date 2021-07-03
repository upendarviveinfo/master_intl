<?php defined('BASEPATH') OR exit('No direct script access allowed');
class serviceCreation extends My_Controller {

public function __construct(){
	parent::__construct();
	auth_check(); // check login auth
	$this->load->model('admin/serviceCreation_m', 'serviceCreation_m');
	$this->load->model('admin/serviceActiveDeacive', 'serviceActiveDeacive');
}
//--------------------------------------------------------------------------
public function index(){
	$data['models'] = $this->serviceCreation_m->get_busModel();
	$data['service_types'] = $this->serviceCreation_m->get_serviceType();
	$data['operators'] = $this->serviceCreation_m->get_operator_from_db();
	$this->load->view('admin/includes/_header');
	$this->load->view('admin/bus/serviceCreationView',$data);
	$this->load->view('admin/includes/_footer');
}
public function Getrouteshalts()
{
 $halts = $this->input->post('halts');
 $getroutes = $this->serviceCreation_m->getAllCity();
 echo'<script> 
	 $(".from_city").select2( {
	   placeholder: "Select City"
	 });
	 </script>
	<table class="table table-bordered" style="text-align:center">
	   <tr><th style="text-align:center">City Order</th><th style="text-align:center">City Name</th>
	   <!--th style="text-align:center">City Order</!--th><th-- style="text-align:center">City Name</th--></tr>';
	   $k=0;
	for($i=1; $i<=$halts; $i++)
	{
		/*if($k%2==0)
		{
			echo'<tr>';
		}*/
		   echo'<tr><td><input type="text" style=" width:20px; border-style:none;"  id="stageorder'.$i.'" value="'.$i.'" readonly/></td>
		           <input type="hidden" id="stage_order'.$i.'" value="'.$i.'"/>
		   <td height="30">
			<select style=" width:200px; border-style:none;" id="city_id' . $i . '" class="from_city">
					<option value="0">-- Select --</option>';
					foreach($getroutes->result() as $row)
					{
					echo' <option value="'.$row->id.'">'.$row->name.' </option>';
					}
		  echo'</select></td><tr>';
		  /* if($k%2!=0)
		   {
			echo'<tr>';
		  }
		  $k++;*/
	}
	echo'</table>
	 <table align="center">
	   <tr> 
		<td>
		  <button type="button" class="btn btn-primary" onclick="getroutecombinations()">Get Route Combintions</button>
	   </td>
	  </tr>
	 </table>';
}
public function Getroutescombinations()
{
	$getroutescomb = $this->serviceCreation_m->Getroutescombinations_m();
	 return $getroutescomb;
}
function Displayroutedetails()
{
	$getroutes = $this->serviceCreation_m->Displayroutedetails_m();
	 return $getroutes;
}
function GetBuslayouttype()
{
	$getroutes = $this->serviceCreation_m->GetBuslayouttype_m();
	 return $getroutes;
}
function saveBusDetails()
{
	$getroutes = $this->serviceCreation_m->saveBusDetails_m();
	 return $getroutes;
}

function activeDeactive()
{
	$this->load->view('admin/includes/_header');
	$data['operators'] = $this->serviceCreation_m->get_operator_from_db();
	$this->load->view('admin/bus/serviceActiveDeactiveView',$data);
	$this->load->view('admin/includes/_footer');
}
function getService()
{
	/*$res = $this->serviceActiveDeacive->getServicesDb();
	 return $res;*/
       $records['data'] = $this->serviceActiveDeacive->getServicesDb();
		$data = array();
		foreach ($records['data']   as $row) 
		{  
			$data[]= array(
				$row['service_num'],
				$row['service_name'],
				$row['is_active'],		
			);
		}
		 $records['data']= $data;
		echo json_encode($records);
	}
}

?>