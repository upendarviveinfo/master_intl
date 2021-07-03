<?php

class serviceCreation_m extends CI_Model{
    public function get_busModel(){
      return $this->db->query("select mbm.model,mbm.bus_type_id,mbt.name from master_buses_model mbm,master_buses_type mbt where mbm.bus_type_id=mbt.id");
    }
    public function get_serviceType()
    {
        return $this->db->query("select * from master_service_types");
    }
    public function get_operator_from_db() {
        return $this->db->query("select id,operator_title from registered_operators where is_active='1' ");
    }
    public function getAllCity() {
        return $this->db->query("select id,name from master_cities where is_active='1'");
    }
    public function Getroutescombinations_m()
    {
	  $from_id = $this->input->post('from_ids');
	  $from_ids= ltrim($from_id,',') ;
	  $fromids = explode(',', $from_ids);
	  $k=0;
	  $allchk='';
	  $th='';
	  if(count($fromids)=='2')
	  {
		   $w='width=50%';
	  }
	  else
	  {
		  $w='width=100%';
          $th="<th>SELECT</th> <th>SOURCE</th><th>DESTINATION</th>";
          $allchk='<input type="checkbox"  id="allroutes" onClick="selectAll()">';
	  }
	   echo'<hr style="border-top: 1px dashed #0275d8;"><table '.$w.'>
	      <tr><th>'.$allchk.'SELECT</th><th>SOURCE</th><th>DESTINATION</th>'.$th.'
		  </tr>';
	     
       for($i=0;$i<count($fromids);$i++)
	   {
			$sql = $this->db->query("select name from master_cities where id='$fromids[$i]' ");
			  foreach($sql->result() as $v)
			   {
			      $source=$v->name;
			   }
		   for($j=$i;$j<=count($fromids)-1;$j++)
		   {
			   $sql1 = $this->db->query("select name from master_cities where id='$fromids[$j]' ");
				  foreach($sql1->result() as $v1)
				  {
					 $dest=$v1->name;
				  }
               if($source==$dest)
			   {
				   
			   }
			   else
			   {
				 if($k%2==0)
				 {
				    echo'<tr>';
				 }
				 
				echo'
				<td height="30">
				   <input type="checkbox"  class="routes_check" name="routes" id="ck' . $k . '"  value="'.$k.'"></td>
			    <td>
				 <input type="text"  size="15" id="from' . $k . '" value="' .$source. '" readonly>
				 <input type="hidden" size="15"  id="from_ids' . $k . '" value="' .$fromids[$i]. '" >
			   </td>
				<td>
				  <input type="text" size="15"  id="to' . $k . '" value="' . $dest . '" readonly>
				  <input type="hidden" size="15"  id="to_ids' . $k . '"  value="' . $fromids[$j]. '" >
				</td>&nbsp;&nbsp;';
				 if($k%2!=0)
				 {
				   echo'</tr>';
				 }
				$k++;
			   }
		   }
		}
	   echo'</table></br><table align="center"><tr><td>
		      <button type="button" class="btn btn-primary" onclick="selectedroutedetails()">Get Details</button>
		   </td></tr></table>';
    }
	function Displayroutedetails_m()
    {
	   $fids = $this->input->post('fids');
       $toids = $this->input->post('toids');
       $from_ids = explode(',', $fids);
       $to_ids = explode(',', $toids);
       $bustype = $this->input->post('busmodel');
       $opid = $this->input->post('opid');
       if(count($from_ids) > 0)
       {
           echo '<table width="100%" border="0">
		   
              <tr>
              <td>&nbsp;</td>
              <td align="center"><strong>SNO</strong></td>
              <td align="center"><strong>SOURCE </strong></td>
              <td align="center"><strong>DESTINATION</strong></td>
              <td><strong>START TIME</strong></td>
              <td><strong>ARRIVEL TIME</strong></td>
              <td><strong>JOURNEY TIME</strong></td>';
              if ($bustype == "2") {
                  echo '<td><strong>SEAT FARE </strong></td>';
              } else if ($bustype == "1") {
                  echo '<td><strong>LOWER BERTH FARE</strong></td>
                        <td><strong>UPPER BERTH FARE</strong></td>';
              } else if ($bustype == "3") {
                  echo '<td><strong>SEAT FARE </strong></td>
                        <td><strong>LOWER BERTH FARE</strong></td>
                        <td><strong>UPPER BERTH FARE</strong></td>';
              }
           echo'</tr>';
			$currency='';
          for($i=0;$i<=count($from_ids)-1;$i++)
          {
            $sql = $this->db->query("select mc1.name as from_city, mc2.name as to_city from master_cities mc1,master_cities mc2 where mc1.id='$from_ids[$i]' and mc2.id='$to_ids[$i]' ");
            foreach($sql->result() as $v)
             {
               $frm_city=$v->from_city;
               $to_city=$v->to_city;
             }
                  $hours = $this->getHour();
                  $timehrc = 'calss="hr' . $i . '"';
                  $timehrST = 'id="timehrST' . $i . '" ';//
                  $timenST = 'name="timehrST' . $i . '" ';
  
                  $timehrAT = 'id="timehrAT' . $i . '" ';
                  $timenAT = 'name="timehrAT' . $i . '" ';
                  
                  $jhours = $this->getJourneyHours();
                  $jtimehrid = 'id="jtimehr' . $i . '" ';
                  $jtimehr = 'name="jtimehr' . $i . '" ';
                  
                  $jtimemnid = 'id="jtimemn' . $i . '" ';
                  $jtimemn = 'name="jtimemn' . $i . '" ';
                  
                  $hours1 = $this->getMinutes();
  
                  $timemiST = 'id="timemST' . $i . '"';//hr min
                  $timemnST = 'name="timemST' . $i . '"';
  
                  $timemiAT = 'id="timemAT' . $i . '"';
                  $timemnAT = 'name="timemAT' . $i . '"';
  
                  $tfidST = 'id="tfmST' . $i . '" ';//am pm
                  $tfnameST = 'name="tfm' . $i . '" style="width:50px"';
  
                  $tfidAT = 'id="tfmAT' . $i . '" ';
                  $tfnameAT = 'name="tfmAT' . $i . '" style="width:50px"';
  
                  $tfv = array("AMPM" => "-select-", "AM" => "AM", "PM" => "PM");
                  
                  $from_textbox_id = 'id="from_city_id' . $i . '" ';
                  $to_textbox_id = 'id="to_city_id' . $i . '" ';
                  
                  $from_textbox_name = 'id="from_city_name' . $i . '" ';
                  $to_textbox_name = 'id="to_city_name' . $i . '" ';
      
                  $curid = 'id="currency' . $i . '" style="width:70px"';
                  $curname = 'name="currency' . $i . '"';
                  
              echo'<tr>
                   <td>&nbsp;</td>
                   <td align="center">'.($i+1).'</td><td align="center">'.$frm_city.'</td>
                   <input type="hidden" size="15"  '.$from_textbox_id.'  value="'.$from_ids[$i].'" >
                   <input type="hidden" size="15"  '.$from_textbox_name.'  value="'.$frm_city.'" >
                   <td align="center">'.$to_city.'</td>
                   <input type="hidden" size="15"  '.$to_textbox_id.'  value="'.$to_ids[$i].'" >
                   <input type="hidden" size="15"  '.$to_textbox_name.'  value="'.$to_city.'" >
                   <td>    
                   ' . form_dropdown($timenST, $hours, "","class='hr' $timehrST") . '' . form_dropdown($timemnST, $hours1, "", "class='hr' $timemiST") . '' . form_dropdown($tfnameST, $tfv, "", "class='hr'$tfidST") . '</td>
                  <td>' . form_dropdown($timenAT, $hours, "", $timehrAT) . '' . form_dropdown($timemnAT, $hours1, "", $timemiAT) . '' . form_dropdown($tfnameAT, $tfv, "", $tfidAT) . '</td>
                  <td>' . form_dropdown($jtimehr, $jhours, "", $jtimehrid) . '' . form_dropdown($jtimemn, $hours1, "", $jtimemnid) .'</td>
                ';
              if ($bustype == 2)
                  {
                   echo '<td align="center">
                   <input type="text"  name="sfare' . $i . '" id="sfare' . $i . '" style="width:70px" value="" >'.$currency.'</td>';
                  } 
               else if ($bustype == 1)
               {
                   echo '<td align="center"><input type="text" name="lbfare' . $i . '" id="lbfare' . $i . '" style="width:70px" value="" ></td>
                    <td align="center"><input type="text" name="ubfare' . $i . '" id="ubfare' . $i . '" style="width:70px" value="" >'.$currency.'</td>';
               } 
               else if ($bustype == 3)
                   {
                echo '<td align="center"><input type="text" name="sfare' . $i . '" id="sfare' . $i . '" style="width:70px" value=""></td>
                        <td align="center"><input type="text" name="lbfare' . $i . '" id="lbfare' . $i . '" style="width:70px" value=""></td>
                        <td align="center"><input type="text" name="ubfare' . $i . '" id="ubfare' . $i . '" style="width:70px" value="">'.$currency.'</td>';
                  }
              echo'</tr>';
         } 
         echo'
          <hr style="border-top: 1px dashed #0275d8;"><input type="hidden" id="fhalts" value="'.count($from_ids).'"/>
		  <table style="margin: 0px auto;"><tr><td>&nbsp;</td></tr>
          <tr>
			  <td><input  type="button"  class="btn btn-primary" name="create" id="create" value="Save Bus" align="middle" style="width:150px;height:45px" onclick="validateBus()" /></td>
		  </tr></table>';
       }
       else
        {
          echo 0;
        }
    }
	public function getHour() {
        $data = array();
        $data['HH'] = "HH";
        for ($i = 0; $i <= 12; $i++) {
            if ($i < 10)
                $i = "0" . $i;
            $data[$i] = $i;
        }
        return $data;
    }
	public function getJourneyHours() {
        $data = array();
        $data['HH'] = "HH";
        for ($i = 0; $i <= 50; $i++) {
            if ($i < 10)
                $i = "0" . $i;
            $data[$i] = $i;
        }
        return $data;
    }
    public function getMinutes() {
        $data = array();
        $data['MM'] = "MM";
        for ($i = 0; $i <= 60; $i++) {
            if ($i < 10)
                $i = "0" . $i;
            $data[$i] = $i;
        }
        return $data;
    }
    public function GetBuslayouttype_m()
    {
        $bustype = $this->input->post('busmodel');
        $op_id= $this->input->post('op_id');
        /*$query = $this->db->query('select mbt.name,ml.layout_id,ml.bus_type_id,ml.seat_cnt from master_layouts ml, master_buses_type mbt where ml.bus_type_id=mbt.id and ml.bus_type_id=2
                                     and ml.is_active=1 and mbt.is_active=1');*/
       $query=$this->db->query("select mbt.name,ml.layout_id,ml.bus_type_id,ml.seat_cnt from master_layouts ml, master_buses_type mbt,master_operator_layout_mapping molp 
       where molp.travel_id='$op_id' and ml.layout_id=molp.layout_id and ml.bus_type_id='$bustype' and mbt.id=' $bustype ' and molp.is_active=1 and ml.is_active=1 and
       mbt.is_active=1 and molp.is_active=1");
        $Tocity = '<option value="">-- Select --</option>';
		foreach($query->result() as $r) {
			$Tocity.= '<option value="'.$r->layout_id.'">'.$r->name.'('.$r->seat_cnt.')</option>';
		}
		
		echo $FromArea.'#'.$Tocity;
    }

    function saveBusDetails_m()
    {
        $travel_id = $this->input->post('op_id');
        $sname = $this->input->post('service_name');
		$service_from_id = $this->input->post('fromSoucre_id');
        $service_to_id = $this->input->post('toSoucre_id');
        $sorder = $this->input->post('sorder');
        $busmodel = $this->input->post('bus_layout_model');
        $stype = $this->input->post('service_type');
        $weeks = $this->input->post('weeks');
        $halts = $this->input->post('fhalts');
        $layout_type = $this->input->post('layout_type');
        $fids = $this->input->post('fids');
        $tids = $this->input->post('tids');
        $froms = $this->input->post('froms');
        $tos = $this->input->post('tos');
        $sfares = $this->input->post('sfares');
        $lbfares = $this->input->post('lbfares');
        $ubfares = $this->input->post('ubfares');
        $hhST = $this->input->post('hhST');
        $mmST = $this->input->post('mmST');
        $ampmST = $this->input->post('ampmST');
        $hhAT = $this->input->post('hhAT');
        $mmAT = $this->input->post('mmAT');
        $ampmAT = $this->input->post('ampmAT');
        $jtimehr = $this->input->post('jtimehr');
        $jtimemn = $this->input->post('jtimemn');
        $title = $this->input->post('title');
        $servicefrom= $this->input->post('servicefrom');
        $serviceto= $this->input->post('serviceto');
        $serviceFromTo="$servicefrom-$serviceto";

        $fids1 = explode(",", $fids);
        $tids1 = explode(",", $tids);
        $froms1 = explode(",", $froms);
        $tos1 = explode(",", $tos);
        $sfares1 = explode(",", $sfares);
        $lbfares1 = explode(",", $lbfares);
        $ubfares1 = explode(",", $ubfares);
        $hhST1 = explode(",", $hhST);
        $mmST1 = explode(",", $mmST);
        $ampmST1 = explode(",", $ampmST);
        $hhAT1 = explode(",", $hhAT);
        $mmAT1 = explode(",", $mmAT);
        $ampmAT1 = explode(",", $ampmAT);
        $jtimemn1 = explode(",", $jtimemn);
        $jtimehr1 = explode(",", $jtimehr);
        $this->db->trans_start();
         $query = $this->db->query("insert into master_buses (service_type,travel_id,bus_model_id,bus_type_id,service_route,service_name,title) 
                                                     values ('$stype','$travel_id','$busmodel','$layout_type','$serviceFromTo','$sname','$title')");
         $insert_id = $this->db->insert_id();
         $query1 = $this->db->query("insert into master_main_routes (source_id,destination_id,service_num) 
                                   values ('$service_from_id','$service_to_id','$insert_id')");
        $route_id = $this->db->insert_id();
        $stageorder = explode("#", $sorder);
        for($i=0;$i<$halts;$i++)
        {
            $from_id = $fids1[$i];
            $from_name = $froms1[$i];
            $to_id = $tids1[$i];
            $to_name = $tos1[$i];
            $searchword = '@'.$from_id;
            foreach($stageorder as $k=>$v) {
                if(preg_match("/\b$searchword\b/i", $v)) {
                    $index =$k;
                    break;
                }
            }
            $to_id = $tids1[$i];
            $searchword1 = '@'.$to_id;
            foreach($stageorder as $k=>$v) {
                if(preg_match("/\b$searchword1\b/i", $v)) {
                    $index1 =$k;
                    break;
                }
            }
           $fromcity_stage_order_id = explode("@", $stageorder[$index]);
           $tocity_stage_order_id = explode("@", $stageorder[$index1]);
           $from_city_stage_order_id = $fromcity_stage_order_id[0];
           $to_city_stage_order_id =  $tocity_stage_order_id[0];
           $start_time1 = $hhST1[$i] . ":" . $mmST1[$i] . " " . $ampmST1[$i];
                $arr_time1 = $hhAT1[$i] . ":" . $mmAT1[$i] . "" . $ampmAT1[$i];
                $d = date('H:i:s', strtotime($start_time1));
                $d1 = date('H:i:s', strtotime($arr_time1));
                $d2 = strtotime($d);
                $d3 = strtotime($d1);
                $diff = $d2 - $d3;
                $start_time = $d;
                $arr_time = $arr_time1;
               $journey_time1=$jtimehr1[$i] . ":" . $jtimemn1[$i];
               $journey_time = date('H:i:s', strtotime($journey_time1));
               $query2 = $this->db->query("insert into master_buses_stages (from_stage_id,from_stage_order,to_stage_id,to_stage_order,start_time,journey_time,arr_time,route_id,service_num) 
               values (' $from_id','$from_city_stage_order_id','$to_id','$to_city_stage_order_id',' $start_time','$journey_time','$arr_time','$route_id','$insert_id')");
        }
        $query3 = $this->db->query("insert into master_buses_layouts_mapping (service_num,layout_id) 
        values ('$insert_id','$layout_type')");
        if($query === false || $query1 === false || $query2 === false ){
            $this->db->trans_rollback();
          }
        if($this->db->trans_complete())
        {
            echo 1;
        }
        else{
            echo 2;
        }
    }
}


?>