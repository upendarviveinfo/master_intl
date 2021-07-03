<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <script src="<?= base_url()?>assets/dist/js/plugins/jquery/jquery.validate.js"></script> 
  <style>
   .error{ color:red; } 
  </style>
</head>
  
<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
	<div class="card card-default">
	<div class="card-header">
		<div class="d-inline-block">
			<h3 class="card-title"> <i class="fa fa-plus"></i>
			<?= trans('add_new_layout') ?> </h3>
		</div> 
	</div>
	
	<div class="card-body"> 
		<form  name="get_layout" method="post" id="get_layout" action="javascript:void(0)">
		<div class="form-group">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<label for="bus_type" class="control-label"><?= trans('bus_type') ?></label>
						<select name="bustype" id="bustype" class="form-control">
							<option value="" >--select--</option>
							<?php
								if($bus_type->num_rows() > 0)
								{
									foreach($bus_type->result() as $row)
									{ ?>
									<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
									<?php
									}
								}
							?>
						</select>
					</div>
					<div class="col-sm-6">
						<label for="no_of_seats" class="control-label"><?= trans('no_of_seats') ?></label>
						<select name="seats" id="seats" class="form-control">
							<option value="" >--select--</option>
							<?php
								for($i = 1; $i <= 90; $i++)
								{?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
								}
							?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group" id="ros" style="display:none">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<label for="no_of_rows" class="control-label"><?= trans('no_of_rows') ?></label>
						<select name="rows" id="rows" class="form-control">
							<option value="" >--select--</option>
							<?php
								for($i = 1; $i <= 10; $i++)
								{?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
								}
							?>
						</select>
					</div>
					<div class="col-sm-4">
						<label for="no_of_cols" class="control-label"><?= trans('no_of_cols') ?></label>
						<select name="cols" id="cols" class="form-control">
							<option value="" >--select--</option>
							<?php
								for($i = 1; $i <= 30; $i++)
								{?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
								}
							?>
						</select>
					</div>
				</div>
				
			</div>
		</div>
		<div class="form-group" id="ld_rows" style="display:none">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<label for="lower_deck_rows" class="control-label"><?= trans('lower_deck_rows') ?></label>
						<select name="lower_rows" id="lower_rows" class="form-control">
							<option value="" >--select--</option>
							<?php
								for($i = 1; $i <= 6; $i++)
								{?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
								}
							?>
						</select>
					</div>
					<div class="col-sm-2">
						<label for="lower_deck_cols" class="control-label"><?= trans('lower_deck_cols') ?></label>
						<select name="lower_cols" id="lower_cols" class="form-control">
							<option value="" >--select--</option>
							<?php
								for($i = 1; $i <= 30; $i++)
								{?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
								}
							?>
						</select>
					</div>
					<div class="col-sm-2">
						<label for="upper_deck_rows" class="control-label"><?= trans('upper_deck_rows') ?></label>
						<select  name="upper_rows" id="upper_rows" class="form-control">
							<option value="" >--select--</option>
							<?php
								for($i = 1; $i <= 6; $i++)
								{?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
								}
							?>
						</select>
					</div>
					<div class="col-sm-2">
						<label for="upper_deck_cols" class="control-label"><?= trans('upper_deck_cols') ?></label>
						<select name="upper_cols" id="upper_cols" class="form-control">
							<option value="" >--select--</option>
							<?php
								for($i = 1; $i <= 30; $i++)
								{?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
								}
							?>
						</select>
					</div>
					<div class="col-sm-2">
						<label for="gangway_row" class="control-label"><?= trans('gangway_row') ?></label>
						<select name="grow" id="grow" class="form-control">
							<option value="" >--select--</option>
							<?php
								for($i = 3; $i <= 5; $i++)
								{?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php
								}
							?>
						</select>
					</div>
					<div class="col-md-2">
				     <button type="submit" name ="submit" id="send_form" class="btn btn-primary"><?= trans('get_layout') ?></button>
			       </div>
				</div>
			</div>
		</div>
		<!-- <div class="form-group" id="ld_cols" style="display:none">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>
		<div class="form-group" id="ud_rows" style="display:none">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>
		<div class="form-group" id="ud_cols" style="display:none">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>
		<div-- class="form-group">
			
		</div-->	
		<div class="form-group">
			<div class="col-md-12" id="layout_db">&nbsp;</div>
		</div>
		</form>
	</div>
		<!-- /.box-body -->
	</div>
</section> 
</div>

<script type="text/javascript">
$("#document").ready(function()
{
	$("#bustype").change(function()
	{
		var bustype = $("#bustype").val();			
		
		if(bustype == 1)//sleeper
		{			
			$("#ld_rows").show();
			$("#ld_cols").show();
			$("#ud_rows").show();
			$("#ud_cols").show();
			$("#ros").hide();
			$("#cos").hide();
		}
		if(bustype == 2)//seater
		{			
			$("#ld_rows").hide();
			$("#ld_cols").hide();
			$("#ud_rows").hide();
			$("#ud_cols").hide();
			$("#ros").show();
			$("#cos").show();
		}
		if(bustype == 3)//seater/sleeper
		{			
			$("#ld_rows").show();
			$("#ld_cols").show();
			$("#ud_rows").show();
			$("#ud_cols").show();
			$("#ros").hide();
			$("#cos").hide();
		}		
	});
});
</script>
<script>
if ($("#get_layout").length > 0) 
{
	$("#get_layout").validate(
	{
		rules: 
		{
			bustype: {
				required: true,
			},
			seats: {
				required: true,
			},
			rows: {
				required: true,
			},
			cols: {
				required: true,
			},
			lower_rows: {
				required: true,
			},
			lower_cols: {
				required: true,
			},
			upper_rows: {
				required: true,
			},
			upper_cols: {
				required: true,
			},
			grow: {
				required: true,
			},	    
		},
		messages: 
		{
			
		},

		submitHandler: function(form) 
		{
			$('#send_form').html('Sending..');
			var bustype = $("#bustype").val();
			var seats = $("#seats").val();
			var rows = $("#rows").val();
			var cols = $("#cols").val();
			var lower_rows = $("#lower_rows").val();
			var lower_cols = $("#lower_cols").val();
			var upper_rows = $("#upper_rows").val();
			var upper_cols = $("#upper_cols").val();
			var grow = $("#grow").val();

			$.post('<?=base_url("admin/layout/getLayout")?>',
			{
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
				bustype: bustype,
				seats: seats,
				rows: rows,
				cols: cols,
				lower_rows: lower_rows,
				lower_cols: lower_cols,
				upper_rows: upper_rows,
				upper_cols: upper_cols,
				grow: grow,
			},
			function(response)
			{
				alert(response);
				console.log(response);
				console.log(response.success);
				$('#send_form').html('Submit');
				$("#layout_db").html(response);

			});
		}
	})
}
</script>
<script>
function checkdata()
{
	var bustype = $("#bustype").val();
	var seats = $("#seats").val();
	var rows = $("#rows").val();
	var cols = $("#cols").val();
	var lower_rows = $("#lower_rows").val();
	var lower_cols = $("#lower_cols").val();
	var upper_rows = $("#upper_rows").val();
	var upper_cols = $("#upper_cols").val();
	var chkcnt = $('.chkbox:checked').length;
	var isValid = true;
	var i = 1;
	var j = 1;
	var lower_seat_no = "";
	var upper_seat_no = "";
	var lower_rowcols = "";
	var upper_rowcols = "";
	var lower_type = "";
    
	if(bustype == "")
	{
		alert("Please Select Bus Type");
		$("#bustype").focus();
		return false;
	}
	if(seats == "")
	{
		alert("Please Select Seats");
		$("#seats").focus();
		return false;
	}
	if(bustype == 1 && lower_rows == "")
	{
		alert("Please Select Lower Deck Rows");
		$("#lower_rows").focus();
		return false;
	}
	if(bustype == 1 && lower_cols == "")
	{
		alert("Please Select Lower Deck Cols");
		$("#lower_cols").focus();
		return false;
	}
	if(bustype == 1 && upper_rows == "")
	{
		alert("Please Select Upper Deck Rows");
		$("#upper_rows").focus();
		return false;
	}
	if(bustype == 1 && upper_cols == "")
	{
		alert("Please Select Upper Deck Cols");
		$("#upper_cols").focus();
		return false;
	}	
	if(bustype == 2 && rows == "")
	{
		alert("Please Select Rows");
		$("#rows").focus();
		return false;
	}	
	if(bustype == 2 && cols == "")
	{
		alert("Please Select Cols");
		$("#cols").focus();
		return false;
	}
	if(bustype == 3 && lower_rows == "")
	{
		alert("Please Select Lower Deck Rows");
		$("#lower_rows").focus();
		return false;
	}
	if(bustype == 3 && lower_cols == "")
	{
		alert("Please Select Lower Deck Cols");
		$("#lower_cols").focus();
		return false;
	}
	if(bustype == 3 && upper_rows == "")
	{
		alert("Please Select Upper Deck Rows");
		$("#upper_rows").focus();
		return false;
	}
	if(bustype == 3 && upper_cols == "")
	{
		alert("Please Select Upper Deck Cols");
		$("#upper_cols").focus();
		return false;
	}
	if(chkcnt < seats)
	{				
		alert("Seats Count Mismatch in the layout");
		$("#seats").focus();
		return false;
	}		 
	else
	{
		if(bustype == 1)
		{
			for(i = 1;i <= lower_rows;i++)
			{
				for(j = 1;j <= lower_cols;j++)
				{				
					if($('#lchk'+i+'-'+j).is(":checked"))
					{
						$('#ltxt'+i+'-'+j).removeAttr("disabled");
						if($('#ltxt'+i+'-'+j).val() == "")
						{
							alert("Please Provide values for Lower Deck Textboxes");
							$('#ltxt'+i+'-'+j).focus();
							return false;
						}
						else
						{
							if(lower_seat_no == "")
							{
								lower_seat_no = $('#ltxt'+i+'-'+j).val();
								lower_rowcols = i+'-'+j;
							}
							else
							{
								lower_seat_no = lower_seat_no +'#'+ $('#ltxt'+i+'-'+j).val();
								lower_rowcols = lower_rowcols +'#'+ i+'-'+j;
							}
						}
					}
					else
					{
						$('#ltxt'+i+'-'+j).attr("disabled" , "disabled");
					}									
				}
			}
		
			for(i = 1;i <= upper_rows;i++)
			{
				for(j = 1;j <= upper_cols;j++)
				{				
					if($('#uchk'+i+'-'+j).is(":checked"))
					{
						$('#utxt'+i+'-'+j).removeAttr("disabled");
						if($('#utxt'+i+'-'+j).val() == "")
						{
							alert("Please Provide values for Upper Deck Textboxes");
							$('#utxt'+i+'-'+j).focus();
							return false;
						}
						else
						{
							if(upper_seat_no == "")
							{
								upper_seat_no = $('#utxt'+i+'-'+j).val();
								upper_rowcols = i+'-'+j;
							}
							else
							{
								upper_seat_no = upper_seat_no +'#'+ $('#utxt'+i+'-'+j).val();
								upper_rowcols = upper_rowcols +'#'+ i+'-'+j;
							}
						}
					}	
					else
					{
						$('#utxt'+i+'-'+j).attr("disabled" , "disabled");
					}
				}	
			}	
		}
		
		if(bustype == 2)
		{
			for(i = 1;i <= rows;i++)
			{
				for(j = 1;j <= cols;j++)
				{				
					if($('#lchk'+i+'-'+j).is(":checked"))
					{
						$('#ltxt'+i+'-'+j).removeAttr("disabled");
						if($('#ltxt'+i+'-'+j).val() == "")
						{
							alert("Please Provide values for Lower Deck Textboxes");
							$('#ltxt'+i+'-'+j).focus();
							return false;
						}
						else
						{
							if(lower_seat_no == "")
							{
								lower_seat_no = $('#ltxt'+i+'-'+j).val();
								lower_rowcols = i+'-'+j;
							}
							else
							{
								lower_seat_no = lower_seat_no +'#'+ $('#ltxt'+i+'-'+j).val();
								lower_rowcols = lower_rowcols +'#'+ i+'-'+j;
							}
						}
					}
					else
					{
						$('#ltxt'+i+'-'+j).attr("disabled" , "disabled");
					}					
				}
			}
		}
		
		if(bustype == 3)
		{
			for(i = 1;i <= lower_rows;i++)
			{
				for(j = 1;j <= lower_cols;j++)
				{				
					if($('#lchk'+i+'-'+j).is(":checked"))
					{
						$('#ltxt'+i+'-'+j).removeAttr("disabled");
													
						if($('#ltxt'+i+'-'+j).val() == "")
						{
							alert("Please Provide values for Lower Deck Textboxes");
							$('#ltxt'+i+'-'+j).focus();
							return false;
						}
						else
						{
							var ltxt = $('#ltxt'+i+'-'+j).val();
							
							if($('#slchk'+i+'-'+j).is(":checked") && $('#blchk'+i+'-'+j).is(":checked"))
							{
								alert("Please Select either Seat or Berth for "+ltxt+" value");							
								return false;
							}						
							else if($('#slchk'+i+'-'+j).is(":checked") || $('#blchk'+i+'-'+j).is(":checked"))
							{
								if(lower_type == "")
								{
									if($('#slchk'+i+'-'+j).is(":checked"))
									{
										lower_type = $('#slchk'+i+'-'+j).val();
									}
									else
									{
										lower_type = $('#blchk'+i+'-'+j).val();
									}		
								}
								else
								{
									if($('#slchk'+i+'-'+j).is(":checked"))
									{
										lower_type = lower_type +'#'+ $('#slchk'+i+'-'+j).val();
									}
									else
									{
										lower_type = lower_type +'#'+ $('#blchk'+i+'-'+j).val();
									}					
								}
								
								if(lower_seat_no == "")
								{
									lower_seat_no = $('#ltxt'+i+'-'+j).val();
									lower_rowcols = i+'-'+j;
								}
								else
								{
									lower_seat_no = lower_seat_no +'#'+ $('#ltxt'+i+'-'+j).val();
									lower_rowcols = lower_rowcols +'#'+ i+'-'+j;
								}
							}
							else
							{
								alert("Please Select either Seat or Berth for "+ltxt+" value");							
								return false;
							}								
						}
					}	
					else
					{
						$('#ltxt'+i+'-'+j).attr("disabled" , "disabled");
						
					}
				}	
			}
			
			for(i = 1;i <= upper_rows;i++)
			{
				for(j = 1;j <= upper_cols;j++)
				{				
					if($('#uchk'+i+'-'+j).is(":checked"))
					{
						$('#utxt'+i+'-'+j).removeAttr("disabled");
						if($('#utxt'+i+'-'+j).val() == "")
						{
							alert("Please Provide values for Upper Deck Textboxes");
							$('#utxt'+i+'-'+j).focus();
							return false;
						}
						else
						{
							if(upper_seat_no == "")
							{
								upper_seat_no = $('#utxt'+i+'-'+j).val();
								upper_rowcols = i+'-'+j;
							}
							else
							{
								upper_seat_no = upper_seat_no +'#'+ $('#utxt'+i+'-'+j).val();
								upper_rowcols = upper_rowcols +'#'+ i+'-'+j;
							}
						}
					}	
					else
					{
						$('#utxt'+i+'-'+j).attr("disabled" , "disabled");
					}
				}	
			}	
		}
		
		if(bustype == 2)
  		{
	  		var return_val = checkTextBoxes(lower_seat_no); //checks duplicate seat names
  		}
  		else
  		{
  			var return_val = checkTextBoxes(lower_seat_no); //checks duplicate seat names'
			  alert(return_val);
			if(return_val != 'duplicate')
			{
  				var return_val2 = checkTextBoxes(upper_seat_no); //checks duplicate seat names
				  alert("upper"+return_val2);
			}	
  		}

		if((return_val != 'duplicate' && bustype == 2) || (return_val != 'duplicate' && bustype != 2 && return_val2 != 'duplicate'))//no duplications
  		{						
			if(bustype != 2)
			{
				var lower = new Array();
        		var upper = new Array();
				
				lower = lower_seat_no.split("#");
        		upper = upper_seat_no.split("#");
		        
				for(var i = 0; i<lower.length; i++)
				{
            		for(var j=0; j<upper.length; j++)
					{
            			if(lower[i] === upper[j] && (lower[i]!= 'GY' || upper[j]!='GY'))
						{
            				alert('Lowedeck seat ('+lower[i]+') and Upperdeck seat ('+upper[j]+') names should not be same!');
            				i=0;
            				j=0;
            				return false;
          				}
       				}
     			}
			}
			var r = confirm("Are sure,you want add layout!!");
            if (r == true)
            {
                $('#save').val('please wait...');
                $('#save').attr("disabled", true);

				$.post('<?=base_url("admin/layout/insertlayout")?>',
				{
				    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
					bustype : $("#bustype").val(),
					seats : $("#seats").val(),
					rows : $("#rows").val(),
					cols : $("#cols").val(),
					lower_rows : $("#lower_rows").val(),
					lower_cols : $("#lower_cols").val(),
					upper_rows : $("#upper_rows").val(),
					upper_cols : $("#upper_cols").val(),
					chkcnt : chkcnt,
					lower_seat_no : lower_seat_no,
					lower_rowcols : lower_rowcols,
					upper_seat_no : upper_seat_no,
					upper_rowcols : upper_rowcols,
					lower_type : lower_type
				},function(res)
				{			
					alert(res);
					if(res == 1)
					{
						$('#save').val('Save Layout');
						$('#save').attr("disabled", false);
						alert("Layout Inserted Successfully");
						window.location = "<?php echo base_url('admin/layout');?>";
					}	
					else 
					{
						$('#save').val('Save Layout');
						$('#save').attr("disabled", false);
						alert("Layout Not Inserted");
					}		
				});
		    }
		}
		else
		{
			alert('Seat names should not be same!');
			return false;
		}								
	}	
}

function checkTextBoxes(seat_no)
{
	alert(seat_no);
	var lower = new Array();
	var i, j, n;
	lower = seat_no.split("#");
	n = lower.length;

	// to ensure the fewest possible comparisons
	for (i=0; i<n; i++)
	{ // outer loop uses each item i at 0 through n
		//alert(i);
		if(lower[i]=='gy')
		{
			
		}
		else
		{
			for (j=i+1; j<=n; j++)
			{ // inner loop only compares items j at i+1 to n			
				//alert(j);
				//alert("i : "+lower[i]);
				//alert("j : "+lower[j]);
				if (lower[i] == lower[j])
				{ 
					if(lower[i].toUpperCase()=='GY' && lower[j].toUpperCase()=='GY') return "";
					return "duplicate";
					break;
				}				
			}
		}
	}			
}

</script>
</body>
</html>
