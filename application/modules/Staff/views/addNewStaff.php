<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">New Staff Form</h3>
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
      <form class="form-horizontal" action="<?php echo base_url();?>Staff/addNewStaff" method="post">
        <div class="box-body">
        <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Staff Photo</label>

            <div class="col-sm-5">
              <input type="file" name="staff_photo" class="form-control" id="staffphoto" size="1024000" accept="image/jpeg,image/png,image/jpg">
              <p style="font-color:red;"><?php echo form_error('staff_photo'); ?></p>

              File Size: Not more than 1MB <br> 
              File Format: JPG, JPEG, PNG  
            </div> 
          </div>
          <div class="form-group">
            <label for="fname" class="col-sm-2 control-label">First Name</label>

            <div class="col-sm-10">
              <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
              <p><?=form_error('fname')?></p>
            </div>
          </div>
          <div class="form-group">
            <label for="mname" class="col-sm-2 control-label">Middle Name</label>

            <div class="col-sm-10">
              <input type="text" name="mname" class="form-control" id="mname" placeholder="Middle Name">
            </div>
          </div>
          <div class="form-group">
            <label for="lname" class="col-sm-2 control-label">Last Name</label>

            <div class="col-sm-10">
              <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
              <p><?=form_error('lname')?></p>
            </div>
          </div>
          <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">Gender</label>

            <div class="col-sm-10">
              <select class="form-control" name="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <?php echo form_error('gender'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
              <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
              <p><?=form_error('pass')?></p>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email">
              <p><?=form_error('email')?></p>
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Phone No.</label>

            <div class="col-sm-10">
              <input type="text" name="phoneno" class="form-control" id="phoneno" placeholder="Phone No." data-inputmask='"mask": "(999) 999-9999"' data-mask>
              <p><?=form_error('phoneno')?></p>
            </div>
          </div>
          <div class="form-group">
            <label for="Designation" class="col-sm-2 control-label">Designation</label>

            <div class="col-sm-10">
              <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
              <p><?=form_error('designation')?></p>
            </div>
          </div>
          <div class="form-group">
            <label for="joineddate" class="col-sm-2 control-label">Joined Date</label>

            <div class="col-sm-10">
              <div class="date">
                <input type="text" name="joineddate" class="form-control pull-right" id="datepicker" placeholder="Joined Date">
                <p><?=form_error('joineddate')?></p>
              </div>
           </div>
         </div>
         <div class="form-group">
          <label for="paddress" class="col-sm-2 control-label">Permanent Address</label>

          <div class="col-sm-10">
            <textarea class="form-control" name="paddress" rows="3" placeholder="Enter ..."></textarea>
            <p><?=form_error('paddress')?></p>
          </div>
        </div>
        <div class="form-group">
          <label for="taddress" class="col-sm-2 control-label">Temporary Address</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="taddress" rows="3" placeholder="Enter ..."></textarea>
            <p><?=form_error('taddress')?></p>
          </div>
        </div>
        <div class="form-group">
          <label for="role" class="col-sm-2 control-label">Role</label>

          <div class="col-sm-10">
            <select class="form-control" name="role">
              <option value="">Select Role .....</option>
              <?php foreach ($roleList as $key => $value) { ?>
              <option value="<?php echo $value['role_id']?>"><?php echo $value['role_name']?></option>
              <?php } ?>
            </select>
            <p><?=form_error('role')?></p>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <input type="submit" name="add_new_staff" class="btn btn-primary" value="Add">
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
  $(document).ready( function () {
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
    });
  } );
  $('.cancel').click(function(){
    window.location.assign('<?php echo base_url(); ?>/Staff')
  }) ;
</script>
<style>
p{
  color: red;
}
</style>