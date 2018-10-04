<!-- /.box-body -->
<div class="box-footer clearfix">
  <a href="javascript:void(0)" onclick="addPage()" class="btn btn-sm btn-info btn-flat pull-left">Add New Staff</a>
  <!-- <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
</div>
<!-- /.box-footer -->
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Staff List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="staff">
                <tr>
                  <th>ID</th>
                  <th>Staff Name</th>
                  <th>Designation</th>
                  <!-- <th>Joined Date</th> -->
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                <?php $sn=1; foreach ($staffList as $key => $value) { ?>
                <tr>
                  <td><?php echo $sn; ?></td>
                  <td><?php echo $value['staff_fname'].' '.$value['staff_mname'].' '.$value['staff_lname'];?></td>
                  <td><?php echo $value['staff_designation'];?></td>
                  <td><?php echo $value['staff_email'];?></td>
                  <td>
                    <a href="javascript:void(0)" onclick="">View</a> | 
                    <a href="javascript:void(0)" onclick="">Edit</a> |
                    <a href="javascript:void(0)" onclick="">Delete</a>
                  </td>
                </tr>
               <?php $sn++; } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

<script>
$(document).ready( function () {
    $('#counselor').DataTable();
} );
function addPage() {
    window.location.assign('<?php echo base_url(); ?>Staff/addNewStaff')
}
</script>
