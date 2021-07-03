<?php

class Layout_model extends CI_Model{
	
	function get_bus_types()
	{
		$this->db->select('*');
		$this->db->where('is_active',1);
		return $this->db->get('master_buses_type');
	}

	public function getLayout_db() 
	{
		$bustype = $this->input->post('bustype');
		$rows = $this->input->post('rows');
		$cols = $this->input->post('cols');
		$lower_rows = $this->input->post('lower_rows');
		$lower_cols = $this->input->post('lower_cols');
		$upper_rows = $this->input->post('upper_rows');
		$upper_cols = $this->input->post('upper_cols');
		$grow = $this->input->post('grow');

		echo '<form method="post" id="Checkform">';
		if ($bustype == 1) 
		{
			echo '<table border="0" cellspacing="1" cellpadding="1">
					<tr>
						<td colspan="' . $lower_cols . '">Lower Deck</td>
					</tr>';
					for ($i = 1; $i <= $lower_rows; $i++) 
					{
						echo '<tr>';
						for ($j = 1; $j <= $lower_cols; $j++)
						{
							echo '<td>
									  <input onchange="document.getElementById(\'ltxt' . $i . '-' . $j . '\').disabled=!this.checked;" class="chkbox" type="checkbox" name="lchk' . $i . '-' . $j . '" id="lchk' . $i . '-' . $j . '" checked="checked"/>
								  	  <input type="text" name="ltxt' . $i . '-' . $j . '" id="ltxt' . $i . '-' . $j . '" value="" size="1">
								  </td>';	
						}
						echo "</tr>";
					}
			echo "</table><br /> <br />";
			echo '<table border="0" cellspacing="1" cellpadding="1">
					<tr>
						<td colspan="' . $upper_cols . '">Upper Deck</td>
					</tr>';
					for ($i = 1; $i <= $upper_rows; $i++) 
					{
						echo '<tr>';
						for ($j = 1; $j <= $upper_cols; $j++) 
						{
							echo '<td>
									 <input onchange="document.getElementById(\'utxt' . $i . '-' . $j . '\').disabled=!this.checked;" class="chkbox" type="checkbox" name="uchk' . $i . '-' . $j . '" id="uchk' . $i . '-' . $j . '" checked="checked"/>
									 <input type="text" name="utxt' . $i . '-' . $j . '" id="utxt' . $i . '-' . $j . '" value="" size="1">
								 </td>';
						}
						echo "</tr>";
					}
			echo "</table>";
		} 
		else if ($bustype == 2) 
		{
			echo '<table border="0" cellspacing="1" cellpadding="1">
					<tr>
						<td colspan="' . $cols . '">Lower Deck</td>
					</tr>';
					for ($i = 1; $i <= $rows; $i++) 
					{
						echo '<tr>';
						for ($j = 1; $j <= $cols; $j++) 
						{
								echo '<td>
										  <input onchange="document.getElementById(\'ltxt' . $i . '-' . $j . '\').disabled=!this.checked;" class="chkbox" type="checkbox" name="lchk' . $i . '-' . $j . '" id="lchk' . $i . '-' . $j . '" checked="checked"/>
										  <input type="text" name="ltxt' . $i . '-' . $j . '" id="ltxt' . $i . '-' . $j . '" value="" size="1">
									 </td>';
						}
						echo "</tr>";
					}
			echo "</table>";
		} 
		else if ($bustype == 3) 
		{
			echo '<table border="0" cellspacing="1" cellpadding="1">
					<tr>
						<td colspan="' . $lower_cols . '">Lower Deck</td>
					</tr>';
					for ($k = 1; $k <= $lower_rows; $k++) 
					{
						echo '<tr>';
						for ($l = 1; $l <= $lower_cols; $l++) 
						{
							echo '<td>
									  <input class="lchkbox" type="checkbox" name="slchk' . $k . '-' . $l . '" id="slchk' . $k . '-' . $l . '" value="L:s"/> S 
							          <input class="lchkbox" type="checkbox" name="blchk' . $k . '-' . $l . '" id="blchk' . $k . '-' . $l . '" value="L:b"/> B <br />
									  <input onchange="document.getElementById(\'ltxt' . $k . '-' . $l . '\').disabled=!this.checked;" class="chkbox" type="checkbox" name="lchk' . $k . '-' . $l . '" id="lchk' . $k . '-' . $l . '" checked="checked"/>
									  <input type="text" name="ltxt' . $k . '-' . $l . '" id="ltxt' . $k . '-' . $l . '" value="" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							      </td>';	
						}
						echo "</tr>";
					}
			echo "</table><br /> <br />";
			echo '<table border="0" cellspacing="1" cellpadding="1">
					<tr>
						<td colspan="' . $upper_cols . '">Upper Deck</td>
					</tr>';
					for ($i = 1; $i <= $upper_rows; $i++) 
					{
						echo '<tr>';
						for ($j = 1; $j <= $upper_cols; $j++)
						{
							echo '<td>
									<input onchange="document.getElementById(\'utxt' . $i . '-' . $j . '\').disabled=!this.checked;" class="chkbox" type="checkbox" name="uchk' . $i . '-' . $j . '" id="uchk' . $i . '-' . $j . '" checked="checked"/>
									<input type="text" name="utxt' . $i . '-' . $j . '" id="utxt' . $i . '-' . $j . '" value="" size="1">
							      </td>';
						}
						echo "</tr>";
					}
			echo "</table>";
		}
		echo '</form>';
		echo '<br /><input type="button" name="Save" id="save" value="Save Layout" onclick="return checkdata()" style="padding:5px 15px;" />';
	}

	public function insertlayout_db() {
        $bustype = $this->input->post('bustype');
        $seats = $this->input->post('seats');
        $rows = $this->input->post('rows');
        $cols = $this->input->post('cols');
        $lower_rows = $this->input->post('lower_rows');
        $lower_cols = $this->input->post('lower_cols');
        $upper_rows = $this->input->post('upper_rows');
        $upper_cols = $this->input->post('upper_cols');
        $chkcnt = $this->input->post('chkcnt');
        $lower_seat_no1 = $this->input->post('lower_seat_no');
        $lower_rowcols1 = $this->input->post('lower_rowcols');
        $upper_seat_no1 = $this->input->post('upper_seat_no');
        $upper_rowcols1 = $this->input->post('upper_rowcols');
        $lower_type1 = $this->input->post('lower_type');

        $lower_seat_no2 = explode('#', $lower_seat_no1);
        $lower_rowcols2 = explode('#', $lower_rowcols1);
        $upper_seat_no2 = explode('#', $upper_seat_no1);
        $upper_rowcols2 = explode('#', $upper_rowcols1);
        $lower_type2 = explode('#', $lower_type1);
		
		$sql1 = $this->db->query("insert into master_layouts(bus_type_id)
			                     values('$bustype')");
		$layout_ids = $this->db->insert_id();

        if ($bustype == 1) {
            for ($l = 0; $l < count($lower_seat_no2); $l++) {
                $lower_seat_no = $lower_seat_no2[$l];

                $lower_rowcols = explode('-', $lower_rowcols2[$l]);

                $lower_row = $lower_rowcols[0];
                $lower_col = $lower_rowcols[1];

                if ($lower_rows == 1 || $lower_rows == 2) {
                    $window = 1;
                } else if ($lower_rows == 4) {
                    if ($lower_row == 1 || $lower_row == 4) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                } else if ($lower_rows == 5) {
                    if ($lower_row == 1 || $lower_row == 5) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                }

                $seat_type = "L";
                $is_ladies = 0;
                
			   $sql2 = $this->db->query("insert into master_layouts_txn(master_layout_id,seat_name,row,col,seat_type,window,is_ladies)
			           values('$layout_ids','$lower_seat_no','$lower_row','$lower_col','$seat_type','$window','$is_ladies')");
			   
            }

            for ($u = 0; $u < count($upper_seat_no2); $u++) {
                $upper_seat_no = $upper_seat_no2[$u];

                $upper_rowcols = explode('-', $upper_rowcols2[$u]);

                $upper_row = $upper_rowcols[0];
                $upper_col = $upper_rowcols[1];

                if ($upper_rows == 1 || $upper_rows == 2) {
                    $window = 1;
                } else if ($upper_rows == 4) {
                    if ($upper_row == 1 || $upper_row == 4) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                } else if ($upper_rows == 5) {
                    if ($upper_row == 1 || $upper_row == 5) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                }

                $seat_type = "U";
                $is_ladies = 0;
                
				$sql3 = $this->db->query("insert into master_layouts_txn(master_layout_id,seat_name,row,col,seat_type,window,is_ladies)
			            values('$layout_ids','$upper_seat_no','$upper_row','$upper_col','$seat_type','$window','$is_ladies')");
            }
        } else if ($bustype == 2) {
            for ($l = 0; $l < $chkcnt; $l++) {
                $lower_seat_no = $lower_seat_no2[$l];

                $lower_rowcols = explode('-', $lower_rowcols2[$l]);

                $lower_row = $lower_rowcols[0];
                $lower_col = $lower_rowcols[1];

                if ($rows == 1) {
                    $window = 1;
                }
                if ($rows == 2 || $rows == 3) {
                    if ($lower_row == 1) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                } else if ($rows == 4) {
                    if ($lower_row == 1 || $lower_row == 4) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                } else if ($rows == 5) {
                    if ($lower_row == 1 || $lower_row == 5) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                } else {
                    $window = 0;
                }

                $seat_type = "s";
                $is_ladies = 0;
                
			   $sql2 = $this->db->query("insert into master_layouts_txn(master_layout_id,seat_name,row,col,seat_type,window,is_ladies)
			           values('$layout_ids','$lower_seat_no','$lower_row','$lower_col','$seat_type','$window','$is_ladies')");
            }
        } else if ($bustype == 3) {

            for ($l = 0; $l < count($lower_seat_no2); $l++) {
                $lower_seat_no = $lower_seat_no2[$l];

                $lower_rowcols = explode('-', $lower_rowcols2[$l]);

                $lower_row = $lower_rowcols[0];
                $lower_col = $lower_rowcols[1];

                if ($lower_rows == 1 || $lower_rows == 2) {
                    $window = 1;
                } else if ($lower_rows == 4) {
                    if ($lower_row == 1 || $lower_row == 4) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                } else if ($lower_rows == 5) {
                    if ($lower_row == 1 || $lower_row == 5) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                }

                $seat_type = $lower_type2[$l];
                $is_ladies = 0;
                
				$sql2 = $this->db->query("insert into master_layouts_txn(master_layout_id,seat_name,row,col,seat_type,window,is_ladies)
			           values('$layout_ids','$lower_seat_no','$lower_row','$lower_col','$seat_type','$window','$is_ladies')");
            }

            for ($u = 0; $u < count($upper_seat_no2); $u++) {
                $upper_seat_no = $upper_seat_no2[$u];

                $upper_rowcols = explode('-', $upper_rowcols2[$u]);

                $upper_row = $upper_rowcols[0];
                $upper_col = $upper_rowcols[1];

                if ($upper_rows == 1 || $upper_rows == 2) {
                    $window = 1;
                } else if ($upper_rows == 4) {
                    if ($upper_row == 1 || $upper_row == 4) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                } else if ($upper_rows == 5) {
                    if ($upper_row == 1 || $upper_row == 5) {
                        $window = 1;
                    } else {
                        $window = 0;
                    }
                }

                $seat_type = "U";
                $is_ladies = 0;
                
				$sql3 = $this->db->query("insert into master_layouts_txn(master_layout_id,seat_name,row,col,seat_type,window,is_ladies)
			            values('$layout_ids','$upper_seat_no','$upper_row','$upper_col','$seat_type','$window','$is_ladies')");
            }
        }
		if ($bustype == 1) {
		  $sqlsu = $this->db->query("select max(row) as mrow,max(col) as mcol, count(seat_type) as ubseats from master_layouts_txn where master_layout_id='$layout_ids' and seat_name!='GY' and seat_type='U'");
		  foreach($sqlsu->result() as $u){
			  $upperdeck_cnt = $u->ubseats;
			  $mrow = $u->mrow;
			  $mcol = $u->mcol;
		  }
		  $sqlsl = $this->db->query("select max(row) as mrow,max(col) as mcol, count(seat_type) as lbseats from master_layouts_txn where master_layout_id='$layout_ids' and seat_name!='GY' and seat_type='L'");
		  foreach($sqlsl->result() as $l){
			  $lowerdeck_cnt = $l->lbseats;
			  $mrow = $l->mrow;
			  $mcol = $l->mcol;
		  }
		  $seat_cnt = $lowerdeck_cnt+$upperdeck_cnt;
		}
		else if ($bustype == 2) {
			$sqlc = $this->db->query("select max(row) as mrow,max(col) as mcol, count(seat_type) as seats from master_layouts_txn where master_layout_id='$layout_ids' and seat_name!='GY' and seat_type='s'");
			foreach($sqlc->result() as $row)
			{
				$seat_cnt = $row->seats;
				$mrow = $row->mrow;
				$mcol = $row->mcol;
			}
		}
		else{
         $sqlssu = $this->db->query("select max(row) as mrow,max(col) as mcol, count(seat_type) as ssubseats from master_layouts_txn where master_layout_id='$layout_ids' and seat_name!='GY' and seat_type='U'");
		  foreach($sqlssu->result() as $u){
			  $upperdeck_cnt = $u->ssubseats;
			  $mrow = $u->mrow;
			  $mcol = $u->mcol;
		  }
		  $sqlssl = $this->db->query("select max(row) as mrow,max(col) as mcol, count(seat_type) as sslbseats from master_layouts_txn where master_layout_id='$layout_ids' and seat_name!='GY' and (seat_type='L:s' or seat_type='L:b') ");
		  foreach($sqlssl->result() as $l){
			  $lowerdeck_cnt = $l->sslbseats;
			  $mrow = $l->mrow;
			  $mcol = $l->mcol;
        }
			$seat_cnt = $lowerdeck_cnt+$upperdeck_cnt;
		}
		
		$sql4 = $this->db->query("update master_layouts set max_row='$mrow',max_col='$mcol',seat_cnt='$seat_cnt',lowerdeck_cnt='$lowerdeck_cnt',upperdeck_cnt='$upperdeck_cnt' where layout_id='$layout_ids' ");
        if (($sql1 && $sql4) && ($sql2 || $sql3 )) {
            echo '1';
        } else {
            echo '0';
        }
    }

	function get_operators(){
		$this->db->select('*');
		$this->db->where('is_active',1);
		return $this->db->get('registered_operators');
	}

	function get_layout(){
		$query = $this->db->query('select mbt.name,ml.layout_id,ml.bus_type_id,ml.seat_cnt from master_layouts ml, master_buses_type mbt where ml.bus_type_id=mbt.id and ml.is_active=1 and mbt.is_active=1');
		return $query;
	}

	public function get_layout_db()
	{
        $layout_id = $this->input->post('layout_id');
		$query = $this->db->query("select mbt.name as busTypeName from master_layouts ml, master_buses_type mbt where ml.layout_id='$layout_id' and ml.bus_type_id=mbt.id and ml.is_active=1 and mbt.is_active=1");
		foreach ($query->result() as $bustype) 
		{
			$seating_type = $bustype->busTypeName;
		}

		if($seating_type=='seater')
		{
			//getting max of row and col from master_layouts
			$sql1 =" select max(row) as mrow,max(col) as mcol from master_layouts_txn where  master_layout_id='$layout_id' and is_active='1'";
			$sq = $this->db->query($sql1);
			foreach ($sq->result() as $row1) 
			{
				$rows = $row1->mrow;
				$cols = $row1->mcol;
			}
		
			echo "<table border='0' cellpadding='10' cellspacing='4'>";
			for ($i = 1; $i <= $rows ; $i++) 
			{
				echo '<tr>';
				for ($j = 1; $j <= $cols; $j++) 
				{
					$sql2 = "select seat_name from master_layouts_txn where row='$i' and col='$j' and master_layout_id='$layout_id' and is_active='1'";
					$sql3 = $this->db->query($sql2);
					foreach ($sql3->result() as $row2) 
					{
						$seat_name = $row2->seat_name;
					}
					//if ($seat_name != "" && $seat_name != "GY") {
						if ($seat_name != "" ) 
						{
							if ($seat_name == "GY" )
							{
								echo '<td align="center" width="30" height="30" style="border:#666666 solid 0px"></td>';
							}
							else
							{
								echo "<td class='seaterseats'>$seat_name</td>";
							}
						} 
						else 
						{
							echo '<td width="40">&nbsp;</td>';
						}
				}
				echo "</tr>";
				unset($seat_name);
			}
			echo "</table>";
		}
		else if ($seating_type == 'sleeper') 
		{
			$sql4 = "select max(row) as upper_rows,max(col) as upper_cols from master_layouts_txn where seat_type='U' and master_layout_id='$layout_id' and is_active='1'";
			$sqsl = $this->db->query($sql4);
			foreach ($sqsl->result() as $row2) 
			{
				$upper_rows = $row2->upper_rows;
				$upper_cols = $row2->upper_cols;
			}
			echo "<table>
					<tr>
						<td><span style='font-size:14px; font-weight:bold;'>Upper Deck</span></td><td width='100'></td> 
						<td><span style='font-size:14px; font-weight:bold;'>Lower Deck</span></td>
					</tr>
					<tr>
						<td><table border='0' cellpadding='10' cellspacing='4'>";
						for ($i = 1; $i <= $upper_rows; $i++) 
						{
							echo '<tr>';
							for ($j = 1 ; $j <=$upper_cols ; $j++) 
							{
								$sql5 = "select seat_name from master_layouts_txn where row='$i' and col='$j' and seat_type='U' and master_layout_id='$layout_id' and is_active='1'";
								$sql3 = $this->db->query($sql5);
								foreach ($sql3->result() as $row2) 
								{
									$seat_name = $row2->seat_name;
								}
								if ($seat_name != "") 
								{
									if ($seat_name == "GY" ) 
									{
										echo '<td align="center" width="50" height="30"></td>';
									}
									else
									{
										echo "<td class='horizontal_sleeper_seats'>$seat_name</td>";
									}
								} 
								else 
								{
									echo '<td>&nbsp;</td>';
								}
							unset($seat_name);
							}
							echo "</tr>";
						}
						echo "</table></td><td width='100'></td><td>";
			
			$sql6 = "select max(row) as lower_rows,max(col) as lower_cols from master_layouts_txn  where seat_type='L' and master_layout_id='$layout_id' and is_active='1'";
			$sq = $this->db->query($sql6);
			foreach ($sq->result() as $row1) 
			{
				$lower_rows = $row1->lower_rows;
				$lower_cols = $row1->lower_cols;
			}
			echo '<table border="0" cellspacing="1" cellpadding="1"  align="center" style="padding-top:10px;padding-bottom:10px;">';
			for ($i = 1; $i <=$lower_rows ; $i++) 
			{
				echo '<tr>';
				for ($j = 1; $j <=$lower_cols ; $j++) 
				{
					$sql7 = " select seat_name from master_layouts_txn where row='$i' and col='$j' and seat_type='L' and master_layout_id='$layout_id' and is_active='1'";
					$sql3 = $this->db->query($sql7);
 
					foreach ($sql3->result() as $row2)
					{
						$seat_name = $row2->seat_name;
					}
					if ($seat_name != "") 
					{
						if($seat_name == "GY")
						{
							echo '<td align="center" width="50" height="30"></td>';
						}
						else
						{
							echo "<td class='horizontal_sleeper_seats'>$seat_name</td>";
						}
					} 
					else 
					{
						echo '<td>&nbsp;</td>';
					}
		 		unset($seat_name);
				}
				echo "</tr>";
			}
			echo "</table></td></tr></table>";
		}//else if(sleeper)	
		//getting sleeperSeater Layout
		else if ($seating_type == 'seatersleeper') 
		{
			$sql8 = "select max(row) as upper_rows,max(col) as upper_cols from master_layouts_txn where seat_type='U' and master_layout_id='$layout_id' and is_active='1'";
			$sq = $this->db->query($sql8);
			foreach ($sq->result() as $row1) {
				$upper_rows = $row1->upper_rows;
				$upper_cols = $row1->upper_cols;
			}
			echo"<table>
					<tr>
						<td><span style='font-size:14px; font-weight:bold;'>Upper Deck</span></td><td width='100'></td> 
						<td><span style='font-size:14px; font-weight:bold;'>Lower Deck</span></td>
					</tr>
					<tr>
					<td> <table border='0' cellpadding='10' cellspacing='4'>";
					for ($i = 1; $i <=$upper_rows ; $i++) 
					{
						echo '<tr>';
						for ($j = 1; $j <= $upper_cols ; $j++) 
						{
							$sql9="select seat_name from master_layouts_txn where row='$i' and col='$j' and seat_type='U' and master_layout_id='$layout_id'";
							$sql3 = $this->db->query($sql9);
		
							foreach ($sql3->result() as $row2)
							{
								$seat_name = $row2->seat_name;
							}
								if ($seat_name != "") 
								{
									if($seat_name == "GY")
									{
										echo '<td align="center" width="50" height="30"></td>';
									}
									else
									{
										echo "<td class='horizontal_seater_sleeper_seats'>$seat_name</td>";
									}
								} 
								else 
								{
									echo '<td width="40">&nbsp;</td>';
								}
						}
						echo "</tr>";
				     unset($seat_name);
					}
			echo "</table> <td width='100'></td><td>";
 
			$sq8 ="select max(row) as lower_rows,max(col) as lower_cols from master_layouts_txn where master_layout_id='$layout_id'  and (seat_type='L:s' or seat_type='L:b') and is_active='1' ";
			$sq = $this->db->query($sq8);
			foreach ($sq->result() as $row1) {
				$lower_rows = $row1->lower_rows;
				$lower_cols = $row1->lower_cols;
			}
		
			echo '<table border="0" cellspacing="1" cellpadding="1">';
			for ($k = 1; $k <= $lower_rows; $k++) 
			{
				echo '<tr>';
				for ($l = 1; $l <= $lower_cols; $l++) 
				{
					$sq9 = "select seat_name from master_layouts_txn where row='$k' and col='$l' and master_layout_id='$layout_id' and (seat_type='L:s' or seat_type='L:b')";
					$sql3 = $this->db->query($sq9);
 
					foreach ($sql3->result() as $row2) 
					{
						$seat_name = $row2->seat_name;
					}
						if ($seat_name != "") 
						{
							if( $seat_name == "GY")
							{
								echo '<td align="center" width="50" height="30"></td>';
							}
							else
							{
								echo "<td class='horizontal_seater_sleeper_seats'>$seat_name</td>";
							}
						} 
						else 
						{
							echo '<td width="40">&nbsp;</td>';
						}
				}
			echo "</tr>";
			unset($seat_name);
			}
			echo "</table></td></tr></table>";
		}//else if($lid[1]=='seatersleeper')
	}

	public function map_layout_db()
	{
		$layout_id = $this->input->post('layout_id');
		$operator_id = $this->input->post('operator_id');
		$insert = $this->db->query("insert into master_operator_layout_mapping(travel_id,layout_id)values('$operator_id','$layout_id')");
		if ($insert) 
		{
			echo '1';
		} 
		else 
		{
			echo '0';
		}
	}
}
?>
