<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">New Staff Form</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <!-- form start -->
      <form class="form-horizontal" action="<?php echo base_url();?>/Counselor/addNewStaff" method="posts">
        <div class="box-body">
          <div class="form-group">
            <label for="fname" class="col-sm-2 control-label">First Name</label>

            <div class="col-sm-10">
              <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
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
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
              <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Phone No.</label>

            <div class="col-sm-10">
              <input type="text" name="phoneno" class="form-control" id="phoneno" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="Designation" class="col-sm-2 control-label">Designation</label>

            <div class="col-sm-10">
              <input type="text" name="designation" class="form-control" id="designation" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Joined Date</label>

            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="paddress" class="col-sm-2 control-label">Permanent Address</label>

            <div class="col-sm-10">
              <textarea class="form-control" name="paddress" rows="3" placeholder="Enter ..."></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="taddress" class="col-sm-2 control-label">Temporary Address</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="taddress" rows="3" placeholder="Enter ..."></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="role" class="col-sm-2 control-label">Role</label>

            <div class="col-sm-10">
              <select class="form-control" name="role">
                <option value="">option 1</option>
                <option value="">option 2</option>
                <option value="">option 3</option>
                <option value="">option 4</option>
                <option value="">option 5</option>
              </select>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" name="add_new_staff" class="btn btn-primary">Add</button>
          <button type="submit" name="cancel" id="cancel" class="btn btn-default pull-right">Cancel</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>