  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-pencil"></i>
              &nbsp; <?= trans('edit_user') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('users_list') ?></a>
            <a href="<?= base_url('admin/operator/addOperator'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?= trans('add_new_user') ?></a>
          </div>
        </div>
        <div class="card-body">
   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/users/edit/'.$user['id']), 'class="form-horizontal"' )?> 
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('op_title') ?></label>
										<input type="text" name="username" value="<?= $user['operator_title']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('uname') ?></label>
										<input type="text" name="username" value="<?= $user['user_name']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('pwd') ?></label>
										<input type="text" name="username" value="<?= $user['password']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('firm_type') ?></label>
										<select class="form-control" name="firmtype"  >
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
										<!-- <input type="text" name="username" value="<?= $user['firm_type']; ?>" class="form-control" id="username" placeholder=""> -->
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('name') ?></label>
										<input type="text" name="username" value="<?= $user['name']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('address') ?></label>
										<input type="text" name="username" value="<?= $user['address']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('location') ?></label>
										<select name="location" id="location" class="form-control">
											<option value="0" >--select--</option>
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
										<label for="username" class=" control-label"><?= trans('contact_number') ?></label>
										<input type="text" name="username" value="<?= $user['contact_no']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('email') ?></label>
										<input type="text" name="username" value="<?= $user['email_id']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('pan_number') ?></label>
										<input type="text" name="username" value="<?= $user['pan_no']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('bank_name') ?></label>
										<input type="text" name="username" value="<?= $user['bank_name']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('bank_ac_no') ?></label>
										<input type="text" name="username" value="<?= $user['bank_account_no']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('branch') ?></label>
										<input type="text" name="username" value="<?= $user['branch']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('ifsc_code') ?></label>
										<input type="text" name="username" value="<?= $user['ifsc_code']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('mode') ?></label>
										<input type="text" name="username" value="<?= $user['mode']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('status') ?></label>
										<select name="status" class="form-control">
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
										<label for="username" class="control-label"><?= trans('date') ?></label>
										<input type="text" name="username" value="<?= $user['date']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('ip') ?></label>
										<input type="text" name="username" value="<?= $user['ip']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('forword_booking_dates') ?></label>
										<input type="text" name="username" value="<?= $user['fwd']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('cancellation_terms') ?></label>
										<input type="text" name="username" value="<?= $user['name']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('R_id') ?></label>
										<input type="text" name="username" value="<?= $user['rid']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('admin_uname') ?></label>
										<input type="text" name="username" value="<?= $user['admin_username']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('admin_pwd') ?></label>
										<input type="text" name="username" value="<?= $user['admin_password']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('access_type') ?></label>
										<input type="text" name="username" value="<?= $user['access_type']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('bill_type') ?></label>
										<input type="text" name="username" value="<?= $user['bill_type']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('bill_amount') ?></label>
										<input type="text" name="username" value="<?= $user['bill_amt']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('agent_cancellation_terms') ?></label>
										<input type="text" name="username" value="<?= $user['name']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('sender_id') ?></label>
										<input type="text" name="username" value="<?= $user['sender_id']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('is_api_sms') ?></label>
										<select name="status" class="form-control">
											<option value="1" <?= ($user['is_api_sms'] == 1)?'selected': '' ?>>Yes</option>
											<option value="0" <?= ($user['is_api_sms'] == 0)?'selected': '' ?>>No</option>
										</select>
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('other_contact_number') ?></label>
										<input type="text" name="username" value="<?= $user['other_contact']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('ticket_number') ?></label>
										<input type="text" name="username" value="<?= $user['tkt_no']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('op_url') ?></label>
										<input type="text" name="username" value="<?= $user['op_url']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('op_email') ?></label>
										<input type="text" name="username" value="<?= $user['op_email']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('live_date') ?></label>
										<input type="text" name="username" value="<?= $user['live_date']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('central_agent') ?></label>
										<select name="status" class="form-control">
											<option value="1" <?= ($user['central_agent'] == 1)?'selected': '' ?>>Yes</option>
											<option value="0" <?= ($user['central_agent'] == 0)?'selected': '' ?>>No</option>
										</select>
									</div>
									<!-- <div class="col-sm">
										<label for="username" class=" control-label"><?= trans('live_tracking') ?></label>
										<select name="status" class="form-control">
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
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('sms_gateway') ?></label>
										<input type="text" name="username" value="<?= $user['sms_gateway']; ?>" class="form-control" id="username" placeholder="">
									</div>
									<!-- <div class="col-sm">
										<label for="username" class=" control-label"><?= trans('currency') ?></label>
										<input type="text" name="username" value="<?= $user['name']; ?>" class="form-control" id="username" placeholder="">
									</div> -->
								</div>
							</div>
						</div>
						<!-- <div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('conversion_base_amount') ?></label>
										<input type="text" name="username" value="<?= $user['name']; ?>" class="form-control" id="username" placeholder="">
									</div>
								</div>
							</div>
						</div> -->
						
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="<?= trans('update_user') ?>" class="btn btn-primary pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
          <!-- /.box-body -->
      </div>  
    </section> 
  </div>
