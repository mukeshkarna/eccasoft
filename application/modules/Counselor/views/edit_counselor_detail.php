<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Counselor Form</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <!-- form start -->
      <form class="form-horizontal" action="<?php echo base_url();?>Counselor/editNewCounselor" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">First Name</label>

            <div class="col-sm-10">
              <input type="text" name="fname" value="<?php echo $counselorDtl['c_fname']; ?>" class="form-control" id="fname" placeholder="First Name">
              <?php echo form_error('fname'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="middlename" class="col-sm-2 control-label">Middle Name</label>

            <div class="col-sm-10">
              <input type="text" name="mname" class="form-control" value="<?php echo $counselorDtl['c_mname']; ?>" id="mname" placeholder="Middle Name">
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Last Name</label>

            <div class="col-sm-10">
              <input type="text" name="lname" class="form-control" value="<?php echo $counselorDtl['c_lname']; ?>" id="lname" placeholder="Last Name">
              <?php echo form_error('lname'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="ctccode" class="col-sm-2 control-label">CTC Code</label>

            <div class="col-sm-10">
              <input type="text" name="ctc_code" class="form-control" value="<?php echo $counselorDtl['c_code']; ?>" id="ctccode" placeholder="CTC Code">
              <?php echo form_error('ctc_code'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="dob" class="col-sm-2 control-label">Date of Birth</label>

            <div class="col-sm-10">
              <div class="date">
               <input type="text" name="dob" class="form-control pull-right" value="<?php echo $counselorDtl['c_dob']; ?>" id="datepicker" placeholder="Date of Birth">
               <?php echo form_error('dob'); ?>
             </div>
           </div>
         </div>
         <div class="form-group">
          <label for="paddress" class="col-sm-2 control-label">Permanent Address</label>

          <div class="col-sm-10">
            <textarea class="form-control" name="paddress" rows="3" placeholder="Enter Permanent Address"><?php echo $counselorDtl['c_p_address']; ?></textarea>
            <?php echo form_error('paddress'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="taddress" class="col-sm-2 control-label">Temporary Address</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="taddress" rows="3" placeholder="Enter Temporary Address"><?php echo $counselorDtl['c_t_address']; ?></textarea>
            <?php echo form_error('taddress'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>

          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" value="<?php echo $counselorDtl['c_email']; ?>" id="email" placeholder="Email">
            <?php echo form_error('email'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">Phone No.</label>
          <div class="col-sm-10">
             <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $counselorDtl['c_phone']; ?>" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Phone No.">
          </div>
        </div>
        <div class="form-group">
          <label for="ctcyear" class="col-sm-2 control-label">CTC Year</label>

          <div class="col-sm-10">
            <select class="form-control ctcyear" name="ctc_year">
              <option value="">Select Year</option>
              <?php 
              for ($i=1987; $i <= Date('Y'); $i++) { 
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
              ?>
            </select>
            <?php echo form_error('ctc_year'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="qualification" class="col-sm-2 control-label">Qualification</label>

          <div class="col-sm-10">
            <select class="form-control qua" name="qualification">
              <option value="">Select Qualification</option>
              <option value="master">Master</option>
              <option value="bachelor">Bachelor</option>
              <option value="10+2">10+2</option>
            </select>
            <?php echo form_error('qualification'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="pass" class="col-sm-2 control-label">Password</label>

          <div class="col-sm-10">
            <input type="password" name="pass" class="form-control" id="password" placeholder="Password">
            <?php echo form_error('pass'); ?>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <input type="submit" name="edit_counselor" class="btn btn-primary" value="Edit">
        <input type="submit" name="cancel" onclick="cancel()" class="btn btn-default pull-right" value="Cancel">
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
      $('.ctcyear').val('<?=$counselorDtl['c_ctc_year'];?>');
      $('.qua').val('<?=$counselorDtl['c_qualification'];?>');

} );
function cancel() {
    window.location.assign('<?php echo base_url(); ?>Template/')
}
</script>