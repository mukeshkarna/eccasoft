<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>/Counselor/addNewCounselor" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="firstname" class="col-sm-2 control-label">First Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
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
                  </div>
                </div>
                <div class="form-group">
                  <label for="ctccode" class="col-sm-2 control-label">CTC Code</label>

                  <div class="col-sm-10">
                    <input type="text" name="ctc_code" class="form-control" id="ctccode" placeholder="CTC Code">
                  </div>
                </div>
                <div class="form-group">
                  <label for="dob" class="col-sm-2 control-label">Date of Birth</label>

                  <div class="col-sm-10">
                    <input type="text" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
                  </div>
                </div>
                <div class="form-group">
                  <label for="paddress" class="col-sm-2 control-label">Permanent Address</label>

                  <div class="col-sm-10">
                  <textarea class="form-control" rows="3" placeholder="Enter Permanent Address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="taddress" class="col-sm-2 control-label">Temporary Address</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" rows="3" placeholder="Enter Temporary Address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Phone No.</label>

                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="phone" placeholder="Phone No.">
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
                  </div>
                </div>
                <div class="form-group">
                  <label for="qualification" class="col-sm-2 control-label">Qualification</label>

                 <div class="col-sm-10">
                    <select class="form-control" name="ctc_year">
                      <option value="">Select Qualification</option>
                      <option value="master">Master</option>
                      <option value="bachelor">Bachelor</option>
                      <option value="10+2">10+2</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pass" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="pass" class="form-control" id="password" placeholder="Password">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="add_new_counselor" class="btn btn-primary">Add</button>
                <button type="submit" name="cancel" class="btn btn-default pull-right">Cancel</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
</div>