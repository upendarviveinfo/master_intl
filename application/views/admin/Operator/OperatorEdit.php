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
			<h3 class="card-title"> <i class="fa fa-pencil"></i>
			&nbsp; <?= trans('edit_operator') ?> </h3>
		</div>
		<div class="d-inline-block float-right">
		<a href="<?= base_url('admin/operator'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('operators_list') ?></a>
		<a href="<?= base_url('admin/operator/addOperator'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?= trans('add_new_operator') ?></a>
		</div>
	</div>
	<div class="card-body">

		<!-- For Messages -->
		<?php //$this->load->view('admin/includes/_messages.php') ?>
		
		<?php //echo form_open(base_url('admin/Operator/edit/'.$user['id']), 'class="form-horizontal"' )?>
		<form  name="editOperator" method="post" id="editOperator" action="javascript:void(0)"> 
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_title" class="control-label"><?= trans('op_title') ?></label>
							<input type="text" name="op_title" id="op_title" value="<?= $user['operator_title']; ?>" class="form-control" placeholder="">
							<input type="hidden"  name="op_travel_id" id="op_travel_id" value="<?= $user['travel_id'] ?>" class="form-control" />
						</div>
						<div class="col-sm">
							<label for="op_username" class=" control-label"><?= trans('uname') ?></label>
							<input type="text" name="op_username" id="op_username" value="<?= $user['user_name']; ?>" class="form-control" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_pwd" class="control-label"><?= trans('pwd') ?></label>
							<input type="text" name="op_pwd" value="<?= $user['password']; ?>" class="form-control" id="op_pwd" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_firmtype" class=" control-label"><?= trans('firm_type') ?></label>
							<select class="form-control" name="op_firmtype" id="op_firmtype">
								<?php if($user['firm_type'] =="Proprietor")
								{
								?>
									<option value="Proprietor" selected="selected">Proprietor</option>
									<option value="Pvt Ltd/">Pvt Ltd/</option>
									<option value="Public Limited">Public Limited</option>
								<?php 
								}
								else if($user['firm_type'] =="Pvt Ltd/"){
								?>
								<option value="Proprietor">Proprietor</option>
									<option value="Pvt Ltd/" selected="selected">Pvt Ltd/</option>
									<option value="Public Limited">Public Limited</option>
								<?php 
								}
								else 
								{
								?>
								<option value="Proprietor">Proprietor</option>
									<option value="Pvt Ltd/">Pvt Ltd/</option>
									<option value="Public Limited" selected="selected">Public Limited</option>
								<?php 
								}
								?>
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
							<input type="text" name="op_name" value="<?= $user['name']; ?>" class="form-control" id="op_name" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_address" class=" control-label"><?= trans('address') ?></label>
							<input type="text" name="op_address" value="<?= $user['address']; ?>" class="form-control" id="op_address" placeholder="">
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
										{
										?>
										<?php if($user['location'] == $row->id) {?>
										<option value="<?php echo $row->id;?>"  selected><?php echo $row->name;?></option>
										<?php } else {  ?>
										<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
										<?php		}	
										}
									}
								?>
							</select>
						</div>
						<div class="col-sm">
							<label for="op_contact_no" class=" control-label"><?= trans('contact_number') ?></label>
							<input type="text" name="op_contact_no" value="<?= $user['contact_no']; ?>" class="form-control" id="op_contact_no" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="email" class="control-label"><?= trans('email') ?></label>
							<input type="text" name="email" value="<?= $user['email_id']; ?>" class="form-control" id="email" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_pan_number" class=" control-label"><?= trans('pan_number') ?></label>
							<input type="text" name="op_pan_number" value="<?= $user['pan_no']; ?>" class="form-control" id="op_pan_number" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_bank_name" class="control-label"><?= trans('bank_name') ?></label>
							<input type="text" name="op_bank_name" value="<?= $user['bank_name']; ?>" class="form-control" id="op_bank_name" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_bank_ac_no" class=" control-label"><?= trans('bank_ac_no') ?></label>
							<input type="text" name="op_bank_ac_no" value="<?= $user['bank_account_no']; ?>" class="form-control" id="op_bank_ac_no" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_bank_branch" class="control-label"><?= trans('branch') ?></label>
							<input type="text" name="op_bank_branch" value="<?= $user['branch']; ?>" class="form-control" id="op_bank_branch" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_bank_ifsc_code" class=" control-label"><?= trans('ifsc_code') ?></label>
							<input type="text" name="op_bank_ifsc_code" value="<?= $user['ifsc_code']; ?>" class="form-control" id="op_bank_ifsc_code" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_mode" class="control-label"><?= trans('mode') ?></label>
							<input type="text" name="op_mode" value="<?= $user['mode']; ?>" class="form-control" id="op_mode" placeholder="">
						</div>
						<div class="col-sm">
							<label for="status" class=" control-label"><?= trans('status') ?></label>
							<select name="status" id="status" class="form-control">
								<option value="1" <?= ($user['is_active'] == 1)?'selected': '' ?> >Active</option>
								<option value="0" <?= ($user['is_active'] == 0)?'selected': '' ?>>Deactive</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_update_date" class="control-label"><?= trans('date') ?></label>
							<input type="text" name="op_update_date" value="<?= $user['date']; ?>" class="form-control" id="op_update_date" placeholder="">
						</div>
						<div class="col-sm">
							<label for="ip" class=" control-label"><?= trans('ip') ?></label>
							<input type="text" name="ip" value="<?= $user['ip']; ?>" class="form-control" id="ip" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_forword_booking_dates" class="control-label"><?= trans('forword_booking_dates') ?></label>
							<input type="text" name="op_forword_booking_dates" value="<?= $user['fwd']; ?>" class="form-control" id="op_forword_booking_dates" placeholder="">
						</div>
						<div class="col-sm">
							<label for="cancellation_terms" class=" control-label"><?= trans('cancellation_terms') ?></label>
							<input type="text" name="cancellation_terms" value="<?= $user['name']; ?>" class="form-control" id="cancellation_terms" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="R_id" class="control-label"><?= trans('R_id') ?></label>
							<input type="text" name="R_id" value="<?= $user['rid']; ?>" class="form-control" id="R_id" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_admin_username" class=" control-label"><?= trans('admin_uname') ?></label>
							<input type="text" name="op_admin_username" value="<?= $user['admin_username']; ?>" class="form-control" id="op_admin_username" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_admin_pwd" class="control-label"><?= trans('admin_pwd') ?></label>
							<input type="text" name="op_admin_pwd" value="<?= $user['admin_password']; ?>" class="form-control" id="op_admin_pwd" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_access_type" class=" control-label"><?= trans('access_type') ?></label>
							<input type="text" name="op_access_type" value="<?= $user['access_type']; ?>" class="form-control" id="op_access_type" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="bill_type" class="control-label"><?= trans('bill_type') ?></label>
							<input type="text" name="bill_type" value="<?= $user['bill_type']; ?>" class="form-control" id="bill_type" placeholder="">
						</div>
						<div class="col-sm">
							<label for="bill_amount" class=" control-label"><?= trans('bill_amount') ?></label>
							<input type="text" name="bill_amount" value="<?= $user['bill_amt']; ?>" class="form-control" id="bill_amount" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="agent_cancellation_terms" class="control-label"><?= trans('agent_cancellation_terms') ?></label>
							<input type="text" name="agent_cancellation_terms" value="<?= $user['name']; ?>" class="form-control" id="agent_cancellation_terms" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_sender_id" class=" control-label"><?= trans('sender_id') ?></label>
							<input type="text" name="op_sender_id" value="<?= $user['sender_id']; ?>" class="form-control" id="op_sender_id" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_is_api_sms" class="control-label"><?= trans('is_api_sms') ?></label>
							<select name="op_is_api_sms" id="op_is_api_sms" class="form-control">
								<option value="1" <?= ($user['is_api_sms'] == 1)?'selected': '' ?>>Yes</option>
								<option value="0" <?= ($user['is_api_sms'] == 0)?'selected': '' ?>>No</option>
							</select>
						</div>
						<div class="col-sm">
							<label for="op_other_contact_number" class=" control-label"><?= trans('other_contact_number') ?></label>
							<input type="text" name="op_other_contact_number" value="<?= $user['other_contact']; ?>" class="form-control" id="op_other_contact_number" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_ticket_number" class="control-label"><?= trans('ticket_number') ?></label>
							<input type="text" name="op_ticket_number" value="<?= $user['tkt_no']; ?>" class="form-control" id="op_ticket_number" placeholder="">
						</div>
						<div class="col-sm">
							<label for="op_url" class=" control-label"><?= trans('op_url') ?></label>
							<input type="text" name="op_url" value="<?= $user['op_url']; ?>" class="form-control" id="op_url" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_email" class="control-label"><?= trans('op_email') ?></label>
							<input type="text" name="op_email" value="<?= $user['op_email']; ?>" class="form-control" id="op_email" placeholder="">
						</div>
						<div class="col-sm">
							<label for="live_date" class=" control-label"><?= trans('live_date') ?></label>
							<input type="text" name="live_date" value="<?= $user['live_date']; ?>" class="form-control" id="live_date" placeholder="">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="op_central_agent" class="control-label"><?= trans('central_agent') ?></label>
							<select name="op_central_agent" id="op_central_agent" class="form-control">
								<option value="1" <?= ($user['central_agent'] == 1)?'selected': '' ?>>Yes</option>
								<option value="0" <?= ($user['central_agent'] == 0)?'selected': '' ?>>No</option>
							</select>
						</div>
						<!-- <div class="col-sm">
							<label for="username" class=" control-label"><?= trans('live_tracking') ?></label>
							<select name="live_tracking" class="form-control">
								<option value="1" <?= ($user['is_api_sms'] == 1)?'selected': '' ?>>Yes</option>
								<option value="0" <?= ($user['is_api_sms'] == 0)?'selected': '' ?>>No</option>
							</select>
						</div> -->
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="container">
					<div class="row">
						<!--div class="col-sm">
							<label for="sms_gateway" class="control-label"><?= trans('sms_gateway') ?></label>
							<input type="text" name="sms_gateway" value="<?= $user['sms_gateway']; ?>" class="form-control" id="sms_gateway" placeholder="">
						</div>
						< <div class="col-sm">
							<label for="username" class=" control-label"><?= trans('currency') ?></label>
							<input type="text" name="username" value="" class="form-control" id="username" placeholder="">
						</div> -->
					</div>
				</div>
			</div>
			<!-- <div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<label for="username" class="control-label"><?= trans('conversion_base_amount') ?></label>
							<input type="text" name="username" value="" class="form-control" id="username" placeholder="">
						</div>
					</div>
				</div>
			</div> -->
				
		<div class="form-group">
		<div class="col-md-12">
			<button type="submit" name ="submit" id="send_form" class="btn btn-primary pull-right"><?= trans('update_operator') ?></button>
		</div>
		</div>
		</form>
		<?php //echo form_close(); ?>
	</div>
		<!-- /.box-body -->
	</div>  
</section> 
</div>
<script>
if ($("#editOperator").length > 0) 
{
	$("#editOperator").validate(
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
			op_email: {
				required: true,
				maxlength: 50,
				email: true,
			}	    
		},
		messages: 
		{
			email: {
			required: "Please enter valid email",
			email: "Please enter valid email",
			maxlength: "The email name should less than or equal to 50 characters",
			},
			op_email: {
			required: "Please enter valid email",
			op_email: "Please enter valid email",
			maxlength: "The email name should less than or equal to 50 characters",
			},
		},

		submitHandler: function(form) 
		{
			$('#send_form').html('Sending..');
			var key = 'edit_op';
			var op_title = $('#op_title').val();
			var op_username = $('#op_username').val();
			var op_pwd = $('#op_pwd').val();
			var op_firmtype = $('#op_firmtype').val();
			var op_name = $('#op_name').val();
			var op_address = $('#op_address').val();
			var op_location = $('#op_location').val();
			var op_contact_no = $('#op_contact_no').val();
			var email = $('#email').val();
			var op_pan_number = $('#op_pan_number').val();;
			var op_bank_name = $('#op_bank_name').val();;
			var op_bank_ac_no = $('#op_bank_ac_no').val();;
			var op_bank_branch = $('#op_bank_branch').val();;
			var op_bank_ifsc_code = $('#op_bank_ifsc_code').val();;
			var op_mode = $('#op_mode').val();;
			var op_update_date = $('#op_update_date').val();;
			var ip = $('#ip').val();;
			var cancellation_terms = $('#cancellation_terms').val();;
			var R_id = $('#R_id').val();;
			var op_access_type = $('#op_access_type').val();;
			var bill_type = $('#bill_type').val();;
			var bill_amount = $('#bill_amount').val();;
			var agent_cancellation_terms = $('#agent_cancellation_terms').val();;
			var op_email = $('#op_email').val();;
			var live_date = $('#live_date').val();;
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

			$.post('<?=base_url("admin/operator/edit")?>',
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
				op_pan_number: op_pan_number,
				op_bank_name: op_bank_name,
				op_bank_ac_no: op_bank_ac_no,
				op_bank_branch: op_bank_branch,
				op_bank_ifsc_code: op_bank_ifsc_code,
				op_mode: op_mode,
				op_update_date: op_update_date,
				ip: ip,
				cancellation_terms: cancellation_terms,
				R_id: R_id,
				op_access_type: op_access_type,
				bill_type: bill_type,
				bill_amount: bill_amount,
				agent_cancellation_terms: agent_cancellation_terms,
				op_email: op_email,
				live_date: live_date,
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
	
				document.getElementById("editOperator").reset(); 
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
