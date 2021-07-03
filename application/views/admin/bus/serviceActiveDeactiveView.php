<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
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
			<h3 class="card-title"> <i class="fa fa-list"></i>
			<?= trans('service_active_deactive') ?> </h3>
		</div>
	</div>
	
	<div class="card-body"> 
        <div class="row">
                <div class="col-sm-5">
                    <label for="operator_id" class="control-label"><?= trans('operator') ?></label>
                    <select  name="operator" id="operator_id" class="form-control">
                    <option value="">--Select--</option>
                        <?php
                                if($operators->num_rows() > 0)
                                {
                                    foreach($operators->result() as $row)
                                    {
                                    ?>
                                    <option value="<?php echo $row->id;?>"><?php echo $row->operator_title;?></option>
                                    <?php
                                    }
                                }
                        ?>
                    </select>
                </div>
                <div class="col-sm-5">
                    <label for="status" class="control-label"><?= trans('Status') ?></label>
                    <select  name="operator" id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">De Active</option>
                    </select>
                </div>
                <div  class="col-sm-2" style="padding-top:30px">
                        <button type="button" class="btn btn-primary"  onclick="getServiceDetails()">Submit</button>
                </div>
            </div>
            <table id="na_datatable" class="table table-bordered table-striped" width="100%" style="display:none">
              <thead>
                <tr>
                <th>Service Number</th>
                <th>Service Name</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
           </thead>
          </table>
	</div>
	</div>
</section> 
</div>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>

 function getServiceDetails()
 {
    var operator_id=$('#operator_id').val(); status=$('#status').val();
   /* $.post("<?=base_url("admin/serviceCreation/getService")?>", 
        {
          '<?php //echo $this->security->get_csrf_token_name(); ?>' : '<?php// echo $this->security->get_csrf_hash(); ?>',
          operator_id:operator_id,
          status:status
        },function (res)
        {
           $('#serviesdata').html(res);
        });*/
        $('#na_datatable').show()
        var table=$('#na_datatable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
        "url": "<?=base_url("admin/serviceCreation/getService")?>",
        "data": {
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
        "operator_id": operator_id,
        "status":status
        }
        }
      } );



}





</script>