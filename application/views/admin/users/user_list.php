<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; <?= trans('operators_list') ?></h3>
        </div>
        <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/operator/addOperator'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?= trans('add_new_operator') ?></a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
						  <th>#<?= trans('id') ?></th>
              <th><?= trans('op_title') ?></th>
							<th><?= trans('op_id') ?></th>
              <th><?= trans('op_name') ?></th>
              <th><?= trans('op_contact_no') ?></th>
              <th><?= trans('status') ?></th>
              <th width="100" class="text-right"><?= trans('action') ?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>  
</div>


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": false,
    "ajax": "<?=base_url('admin/operator/datatable_json')?>",
    "order": [[4,'desc']],
    "columnDefs": [
		{ "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "op_id", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "op_title", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "op_name", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "op_contact_no", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "is_active", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>

<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
		id = $(this).data('id');
		console.log(id);
    $.post('<?=base_url("admin/operator/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0		
    },
    function(data){
      $.notify("Status Changed Successfully", "success");
    });
  });
</script>


