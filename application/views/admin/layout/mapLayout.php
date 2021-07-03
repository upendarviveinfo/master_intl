<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <script src="<?= base_url()?>assets/dist/js/plugins/jquery/jquery.validate.js"></script> 
  <style>
   .error{ color:red; }

	.sleeper,.seater_sleeper{
	width: 30px;
	height: 50px;
	background-color: #E4E4E4; 
	font-size:16px; 
	border: 1px solid #999999;
	text-align:center;
	margin: 0 6px 0 0;
	}
	.seaterseats{
	width: 30px;
	height: 30px;
	background-color: #E4E4E4; 
	font-size:16px; 
	border: 1px solid #999999;
	text-align:center;
	margin: 0 6px 5px 0;
	}
	.horizontal_seater_sleeper_seats,.horizontal_sleeper_seats
	{
		width: 50px;
		height: 30px;
		background-color: #E4E4E4; 
		font-size:16px; 
		border: 1px solid #999999;
		text-align:center;
		margin: 0 6px 0 0;
	}
	hr.new1 {
			border-top: 2px dashed #bce8f1;
		}
	.groove{border-style: groove;} 
	.content-wrapper{
		overflow: auto;
		}
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
			<?= trans('map_layout') ?> </h3>
		</div> 
	</div>
	
	<div class="card-body"> 
		<form  name="get_layout1" method="post" id="get_layout1" action="javascript:void(0)">
		<div class="form-group">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<label for="layout" class="control-label"><?= trans('layout') ?></label>
						<select name="layout_id" id="layout_id" class="form-control" onchange="getLayout()">
							<option value="" >--select--</option>
							<?php
								if($layouts->num_rows() > 0)
								{
									foreach($layouts->result() as $row)
									{ ?>
									<option value="<?php echo $row->layout_id;?>"><?php echo $row->name;?>(<?php echo $row->seat_cnt;?>)</option>
									<?php
									}
								}
							?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12" id="layout_db">&nbsp;</div>
		</div>
		<div class="form-group">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<label for="operator" class="control-label"><?= trans('operator') ?></label>
						<select name="operator_id" id="operator_id" class="form-control">
							<option value="" >--select--</option>
							<?php
								if($operators->num_rows() > 0)
								{
									foreach($operators->result() as $row)
									{ ?>
									<option value="<?php echo $row->id;?>"><?php echo $row->operator_title;?></option>
									<?php
									}
								}
							?>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" name ="submit" id="send_form" class="btn btn-primary"><?= trans('get_layout') ?></button>
			</div>
		</div>	
		</form>
	</div>
		<!-- /.box-body -->
	</div>
</section> 
</div>

<script type="text/javascript">
function getLayout()
{
		var layout_id = $("#layout_id").val();
		if(layout_id=="")
		{
			$("#layout_db").hide();
		}			
		else
		{
			$.post('<?=base_url("admin/layout/getLayoutDB")?>',
			{
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
			  layout_id: layout_id,
			},
			function(response)
			{
				//alert(response);
				//console.log(response);
				//console.log(response.success);
				//$('#send_form').html('Submit');
				$("#layout_db").html(response);

			});
		}
}
</script>
<script>
if ($("#get_layout1").length > 0) 
{
	$("#get_layout1").validate(
	{
		rules: 
		{
			operator_id: {
				required: true,
			},
			layout_id: {
				required: true,
			},  
		},
		messages: 
		{
			
		},

		submitHandler: function(form) 
		{
			$('#send_form').html('Sending..');
			var operator_id = $("#operator_id").val();
			var layout_id = $("#layout_id").val();
			//alert(operator_id+","+layout_id);
			$.post('<?=base_url("admin/layout/mapLayoutDB")?>',
			{
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
				operator_id: operator_id,
				layout_id: layout_id,
			},
			function(response)
			{
				//alert(response);
				console.log(response);
				//console.log(response.success);
				if(response==1)
				{
					$('#send_form').html('Submit');
					alert("Layout Mapped Successfully");
					window.location = "<?php echo base_url('admin/layout/mapLayout');?>";
				}
				else
				{
					$('#send_form').html('Submit');
					alert("Layout Not Mapped");
				}

			});
		}
	})
}
</script>
</body>
</html>
