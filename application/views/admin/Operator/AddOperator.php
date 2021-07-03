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
			<?= trans('add_new_operator') ?> </h3>
		</div>
		<div class="d-inline-block float-right">
		<a href="<?= base_url('admin/operator'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  <?= trans('operators_list') ?></a>
		</div>
	</div>
	
	<div class="card-body"> 
		<form  name="op_registration" method="post" id="op_registration" action="javascript:void(0)">
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_title" class="control-label"><?= trans('op_title') ?></label>
							<input type="text" name="op_title" value="" class="form-control" id="op_title" placeholder="<?= trans('op_title') ?>">
						</div>
						<div class="col-sm">
							<label for="op_username" class=" control-label"><?= trans('uname') ?></label>
							<input type="text" name="op_username" value="" class="form-control" id="op_username" placeholder="<?= trans('uname') ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_pwd" class="control-label"><?= trans('pwd') ?></label>
							<input type="password" name="op_pwd" value="" class="form-control" id="op_pwd" placeholder="<?= trans('pwd') ?>">
						</div>
						<div class="col-sm">
							<label for="op_firmtype" class=" control-label"><?= trans('firm_type') ?></label>
							<select class="form-control" name="op_firmtype" id="op_firmtype" >
									<option value="Proprietor" selected="selected">Proprietor</option>
									<option value="Pvt Ltd/">Pvt Ltd/</option>
									<option value="Public Limited">Public Limited</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_name" class="control-label"><?= trans('name') ?></label>
							<input type="text" name="op_name" value="" class="form-control" id="op_name" placeholder="<?= trans('name') ?>">
						</div>
						<div class="col-sm">
							<label for="op_address" class=" control-label"><?= trans('address') ?></label>
							<input type="text" name="op_address" value="" class="form-control" id="op_address" placeholder="<?= trans('address') ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_location" class="control-label"><?= trans('location') ?></label>
							<select name="op_location" id="op_location" class="form-control">
								<option value="" >--select--</option>
								<?php
									if($location->num_rows() > 0)
									{
										foreach($location->result() as $row)
										{ ?>
										<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
										<?php
										}
									}
								?>
							</select>
						</div>
						<div class="col-sm">
							<label for="op_contact_no" class=" control-label"><?= trans('contact_number') ?></label>
							<input type="text" name="op_contact_no" value="" class="form-control" id="op_contact_no" placeholder="<?= trans('contact_number') ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="email" class="control-label"><?= trans('email') ?></label>
							<input type="text" name="email" value="" class="form-control" id="email" placeholder="<?= trans('email') ?>">
						</div>
						<div class="col-sm">
							<label for="status" class=" control-label"><?= trans('status') ?></label>
							<select name="status" id="status" class="form-control">
								<option value="1" selected>Active</option>
								<option value="0">Deactive</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="container">
					<div class="row">
					<div class="col-sm">
							<label for="op_travel_id" class=" control-label"><?= trans('travel_id') ?></label>
							<input type="text" class="form-control"  value="<?= $travel_id ?>" placeholder="" disabled="disabled">
							<input type="hidden"  name="op_travel_id" id="op_travel_id" value="<?= $travel_id ?>" class="form-control" />
						</div>
					</div>
				</div>
			</div>
					
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_forword_booking_dates" class="control-label"><?= trans('forword_booking_dates') ?></label>
							<input type="text" name="op_forword_booking_dates" value="" class="form-control" id="op_forword_booking_dates" placeholder="<?= trans('forword_booking_dates') ?>">
						</div>
						<div class="col-sm">
							<label for="op_cancellation_terms" class=" control-label"><?= trans('cancellation_terms') ?></label>
							<input type="text" name="op_cancellation_terms" value="" class="form-control" id="op_cancellation_terms" placeholder="<?= trans('cancellation_terms') ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_admin_username" class=" control-label"><?= trans('admin_uname') ?></label>
							<input type="text" name="op_admin_username" value="" class="form-control" id="op_admin_username" placeholder="<?= trans('admin_uname') ?>">
						</div>
						<div class="col-sm">
							<label for="op_admin_pwd" class="control-label"><?= trans('admin_pwd') ?></label>
							<input type="text" name="op_admin_pwd" value="" class="form-control" id="op_admin_pwd" placeholder="<?= trans('admin_pwd') ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
					<div class="col-sm">
							<label for="op_sender_id" class=" control-label"><?= trans('sender_id') ?></label>
							<input type="text" name="op_sender_id" value="" class="form-control" id="op_sender_id" placeholder="<?= trans('sender_id') ?>">
						</div>
						<div class="col-sm">
						<label for="op_is_api_sms" class="control-label"><?= trans('is_api_sms') ?></label>
							<select name="op_is_api_sms" id="op_is_api_sms" class="form-control">
								<option value="1" selected>Yes</option>
								<option value="0" >No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
					<div class="col-sm">
							<label for="op_other_contact_number" class=" control-label"><?= trans('other_contact_number') ?></label>
							<input type="text" name="op_other_contact_number" value="" class="form-control" id="op_other_contact_number" placeholder="<?= trans('other_contact_number') ?>">
						</div>
						<div class="col-sm">
							<label for="op_ticket_number" class="control-label"><?= trans('ticket_number') ?></label>
							<input type="text" name="op_ticket_number" value="" class="form-control" id="op_ticket_number" placeholder="<?= trans('ticket_number') ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
					<div class="col-sm">
							<label for="op_url" class=" control-label"><?= trans('op_url') ?></label>
							<input type="text" name="op_url" value="" class="form-control" id="op_url" placeholder="<?= trans('op_url') ?>">
						</div>
						<div class="col-sm">
							<label for="op_central_agent" class="control-label"><?= trans('central_agent') ?></label>
							<select name="op_central_agent" id="op_central_agent" class="form-control">
								<option value="1" selected>Yes</option>
								<option value="0" >No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<!-- <div class="col-sm">
							<label for="op_currency" class=" control-label"><?= trans('currency') ?></label>
							<input type="text" name="op_currency" value="" class="form-control" id="op_currency" placeholder="">
						</div>>
						<div class="col-sm">
							<label for="op_conversion_base_amount" class="control-label"><?= trans('conversion_base_amount') ?></label>
							<input type="text" name="op_conversion_base_amount" value="" class="form-control" id="op_conversion_base_amount" placeholder="">
						</div -->
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
					<div class="col-sm alert alert-success d-none" id="msg_div">
						<span id="res_message"></span>
					</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			<div class="col-md-12">
				<button type="submit" name ="submit" id="send_form" class="btn btn-primary pull-right"><?= trans('add_operator') ?></button>
			</div>
			</div>
		</form>
	</div>
		<!-- /.box-body -->
	</div>
</section> 
</div>

<script>
if ($("#op_registration").length > 0) 
{
	$("#op_registration").validate(
	{
		rules: 
		{
			op_title: {
				required: true,
			},
			op_username: {
				required: true,
			},
			op_pwd: {
				required: true,
			},
			op_firmtype: {
				required: true,
			},
			op_name: {
				required: true,
			},
			op_address: {
				required: true,
			},
			op_location: {
				required: true,
			},
			op_contact_no: {
				required: true,
			},
			email: {
				required: true,
				maxlength: 50,
				email: true,
			},
			status: {
				required: true,
			},
			op_travel_id: {
				required: true,
			},
			op_forword_booking_dates: {
				required: true,
			},
			op_admin_username: {
				required: true,
			},
			op_admin_pwd: {
				required: true,
			},
			op_sender_id: {
				required: true,
			},
			op_is_api_sms: {
				required: true,
			},
			op_other_contact_number: {
				required: true,
			},
			op_ticket_number: {
				required: true,
			},
			op_url: {
				required: true,
			},
			op_central_agent: {
				required: true,
			},	    
		},
		messages: 
		{
			op_title: {
			required: "Please enter operator title",
			},
			op_username: {
			required: "Please enter operator username",
			},
			email: {
			required: "Please enter valid email",
			email: "Please enter valid email",
			maxlength: "The email name should less than or equal to 50 characters",
			},
		},

		submitHandler: function(form) 
		{
			$('#send_form').html('Sending..');
			var key = 'add_op';
			var op_title = $('#op_title').val();
			var op_username = $('#op_username').val();
			var op_pwd = $('#op_pwd').val();
			var op_firmtype = $('#op_firmtype').val();
			var op_name = $('#op_name').val();
			var op_address = $('#op_address').val();
			var op_location = $('#op_location').val();
			var op_contact_no = $('#op_contact_no').val();
			var email = $('#email').val();
			var status = $('#status').val();
			var op_travel_id = $('#op_travel_id').val();
			var op_forword_booking_dates = $('#op_forword_booking_dates').val();
			var op_admin_username = $('#op_admin_username').val();
			var op_admin_pwd = $('#op_admin_pwd').val();
			var op_sender_id = $('#op_sender_id').val();
			var op_is_api_sms = $('#op_is_api_sms').val();
			var op_other_contact_number = $('#op_other_contact_number').val();
			var op_ticket_number = $('#op_ticket_number').val();
			var op_url = $('#op_url').val();
			var op_central_agent = $('#op_central_agent').val();

			$.post('<?=base_url("admin/operator/addOperator")?>',
			{
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
				key: key,
				op_title : op_title,
				op_username : op_username,
				op_pwd: op_pwd,
				op_firmtype: op_firmtype,
				op_name: op_name,
				op_address: op_address,
				op_location: op_location,
				op_contact_no: op_contact_no,
				email: email,
				status: status,
				op_travel_id: op_travel_id,
				op_forword_booking_dates: op_forword_booking_dates,
				op_admin_username: op_admin_username,
				op_admin_pwd: op_admin_pwd,
				op_sender_id: op_sender_id,
				op_is_api_sms: op_is_api_sms,
				op_other_contact_number: op_other_contact_number,
				op_ticket_number: op_ticket_number,
				op_url: op_url,
				op_central_agent: op_central_agent,
			},
			function(response)
			{
				alert(response);
				console.log(response);
				console.log(response.success);
				$('#send_form').html('Submit');
				$('#res_message').html(response.msg);
				$('#res_message').show();
				$('#msg_div').removeClass('d-none');
	
				document.getElementById("op_registration").reset(); 
				setTimeout(function(){
				$('#res_message').hide();
				$('#msg_div').hide();
				},10000);
				window.location = '<?php echo base_url("admin/operator"); ?>';
			});
		}
	})
}
</script>
</body>
</html>
