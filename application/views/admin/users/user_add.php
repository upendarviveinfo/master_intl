  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
             <?= trans('add_new_user') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/operator/login'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  <?= trans('users_list') ?></a>
          </div>
        </div>
        <div class="card-body">
   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/operator/addOperator'), 'class="form-horizontal"');  ?> 
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('op_title') ?></label>
										<input type="text" name="op_title" value="" class="form-control" id="op_title" placeholder="<?= trans('op_title') ?>">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('uname') ?></label>
										<input type="text" name="op_username" value="" class="form-control" id="op_username" placeholder="<?= trans('uname') ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('pwd') ?></label>
										<input type="password" name="op_pwd" value="" class="form-control" id="op_pwd" placeholder="<?= trans('pwd') ?>">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('firm_type') ?></label>
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
										<label for="username" class="control-label"><?= trans('name') ?></label>
										<input type="text" name="op_name" value="" class="form-control" id="op_name" placeholder="<?= trans('name') ?>">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('address') ?></label>
										<input type="text" name="op_address" value="" class="form-control" id="op_address" placeholder="<?= trans('address') ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('location') ?></label>
										<select name="op_location" id="op_location" class="form-control">
											<option value="0" >--select--</option>
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
										<label for="username" class=" control-label"><?= trans('contact_number') ?></label>
										<input type="text" name="op_contact_no" value="" class="form-control" id="op_contact_no" placeholder="<?= trans('contact_number') ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('email') ?></label>
										<input type="text" name="email" value="" class="form-control" id="email" placeholder="<?= trans('email') ?>">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('status') ?></label>
										<select name="status" class="form-control">
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
										<label for="username" class="control-label"><?= trans('forword_booking_dates') ?></label>
										<input type="text" name="op_forword_booking_dates" value="" class="form-control" id="op_forword_booking_dates" placeholder="<?= trans('forword_booking_dates') ?>">
									</div>
									<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('cancellation_terms') ?></label>
										<input type="text" name="op_cancellation_terms" value="" class="form-control" id="op_cancellation_terms" placeholder="<?= trans('cancellation_terms') ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
								  <div class="col-sm">
										<label for="username" class=" control-label"><?= trans('admin_uname') ?></label>
										<input type="text" name="op_admin_username" value="" class="form-control" id="op_admin_username" placeholder="<?= trans('admin_uname') ?>">
									</div>
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('admin_pwd') ?></label>
										<input type="text" name="op_admin_pwd" value="" class="form-control" id="op_admin_pwd" placeholder="<?= trans('admin_pwd') ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
								<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('sender_id') ?></label>
										<input type="text" name="op_sender_id" value="" class="form-control" id="op_sender_id" placeholder="<?= trans('sender_id') ?>">
									</div>
									<div class="col-sm">
									<label for="username" class="control-label"><?= trans('is_api_sms') ?></label>
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
										<label for="username" class=" control-label"><?= trans('other_contact_number') ?></label>
										<input type="text" name="op_other_contact_number" value="" class="form-control" id="op_other_contact_number" placeholder="<?= trans('other_contact_number') ?>">
									</div>
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('ticket_number') ?></label>
										<input type="text" name="op_ticket_number" value="" class="form-control" id="op_ticket_number" placeholder="<?= trans('ticket_number') ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container">
								<div class="row">
								<div class="col-sm">
										<label for="username" class=" control-label"><?= trans('op_url') ?></label>
										<input type="text" name="op_url" value="" class="form-control" id="op_url" placeholder="<?= trans('op_url') ?>">
									</div>
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('central_agent') ?></label>
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
										<label for="username" class=" control-label"><?= trans('currency') ?></label>
										<input type="text" name="op_currency" value="<?= $user['name']; ?>" class="form-control" id="op_currency" placeholder="">
									</div>>
									<div class="col-sm">
										<label for="username" class="control-label"><?= trans('conversion_base_amount') ?></label>
										<input type="text" name="op_conversion_base_amount" value="<?= $user['name']; ?>" class="form-control" id="op_conversion_base_amount" placeholder="">
									</div -->
								</div>
							</div>
						</div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="<?= trans('add_user') ?>" class="btn btn-primary pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
          <!-- /.box-body -->
          <!-- /.box-body -->
      </div>
    </section> 
  </div>
