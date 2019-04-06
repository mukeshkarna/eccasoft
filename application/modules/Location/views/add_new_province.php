<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">New Province Form</h3>
  </div>

  <?php if ($this->session->flashdata('error')) { ?>
  <div class="alert alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('error'); ?>
  </div>
<?php } ?>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <!-- form start -->
      <form class="form-horizontal" action="<?php echo base_url();?>Location/addNewProvince" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="province_name" class="col-sm-2 control-label">Province Name</label>

            <div class="col-sm-4">
              <input type="text" name="province_name" class="form-control" id="mname" placeholder="Province Name">
            </div>
          </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <input type="submit" name="add_new_province" class="btn btn-primary" value="Add">
      <input type="button" name="cancel" class="btn btn-default pull-right cancel" value="Cancel">
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<!-- /.row -->
</div>
<!-- /.box-body -->
</div>
<script>
  $('.cancel').click(function(){
    window.location.assign('<?php echo base_url(); ?>/Location')
  }) ;
</script>