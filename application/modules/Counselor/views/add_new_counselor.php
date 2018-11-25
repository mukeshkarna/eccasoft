<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">New Counselor Form</h3>
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
      <form class="form-horizontal" action="<?php echo base_url();?>Counselor/addNewCounselor" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">User Photo</label>

            <div class="col-sm-5">
              <input type="file" name="user_photo" class="form-control" id="userphoto" size="1024000" accept="image/jpeg,image/png,image/jpg">
              <?php echo form_error('user_photo'); ?>

              File Size: Not more than 1MB <br> 
              File Format: JPG, JPEG, PNG  
            </div> 
          </div>
          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">First Name</label>

            <div class="col-sm-10">
              <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
              <?php echo form_error('fname'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="middlename" class="col-sm-2 control-label">Middle Name</label>

            <div class="col-sm-10">
              <input type="text" name="mname" class="form-control" id="mname" placeholder="Middle Name">
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Last Name</label>

            <div class="col-sm-10">
              <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
              <?php echo form_error('lname'); ?>
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
            <label for="ctccode" class="col-sm-2 control-label">CTC Code</label>

            <div class="col-sm-10">
              <input type="text" name="ctc_code" class="form-control" id="ctccode" placeholder="CTC Code">
              <?php echo form_error('ctc_code'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="dob" class="col-sm-2 control-label">Date of Birth</label>

            <div class="col-sm-10">
              <div class="date">
               <input type="text" name="dob" class="form-control pull-right" id="datepicker" placeholder="Date of Birth">
               <?php echo form_error('dob'); ?>
             </div>
           </div>
         </div>
         <div class="form-group">
          <label for="paddress" class="col-sm-2 control-label">Permanent Address</label>

          <div class="col-sm-10">
            <textarea class="form-control" name="paddress" rows="3" placeholder="Enter Permanent Address"></textarea>
            <?php echo form_error('paddress'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="taddress" class="col-sm-2 control-label">Temporary Address</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="taddress" rows="3" placeholder="Enter Temporary Address"></textarea>
            <?php echo form_error('taddress'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>

          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            <?php echo form_error('email'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">Phone No.</label>
          <div class="col-sm-10">
           <input type="text" name="phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Phone No.">
         </div>
       </div>
       <div class="form-group">
        <label for="ctcyear" class="col-sm-2 control-label">CTC Year</label>

        <div class="col-sm-10">
          <select class="form-control" name="ctc_year">
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
        <label for="ctcmonth" class="col-sm-2 control-label">CTC Month</label>

        <div class="col-sm-10">
          <select class="form-control" name="ctc_month">
            <option value="">Select Month</option>
              <option value="jan">January</option>;
              <option value="feb">February</option>;
              <option value="mar">March</option>;
              <option value="apr">April</option>;
              <option value="may">May</option>;
              <option value="jun">June</option>;
              <option value="jul">July</option>;
              <option value="aug">August</option>;
              <option value="sep">September</option>;
              <option value="oct">October</option>;
              <option value="nov">November</option>;
              <option value="dec">December</option>;
          </select>
          <?php echo form_error('ctc_month'); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="qualification" class="col-sm-2 control-label">Qualification</label>

        <div class="col-sm-10">
          <select class="form-control" name="qualification">
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
      <input type="submit" name="add_new_counselor" class="btn btn-primary" value="Add">
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
    window.location.assign('<?php echo base_url(); ?>/Counselor')
  }) ;
</script>