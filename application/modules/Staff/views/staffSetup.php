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
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-hover table-stripped table-bordered" id="staff">
          <thead>
          <tr>
            <th>ID</th>
            <th>Staff Name</th>
            <th>Designation</th>
            <th>Joined Date</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php if($staffList==0){ ?>
            <td colspan="5" align="center"><?php echo "No Records found.";?></td>
          <?php }else{ $sn=1; foreach ($staffList as $key => $value) { ?>
              <tr>
                <td><?php echo $sn; ?></td>
                <td><?php echo $value['staff_fname'].' '.$value['staff_mname'].' '.$value['staff_lname'];?></td>
                <td><?php echo $value['staff_designation'];?></td>
                <td><?php echo $value['staff_joined_date'];?></td>
                <td>
                  <input type="button" name="view" value="View" id="<?php echo $value["staff_id"]; ?>" class="btn btn-default view_data" />
                  <a href="javascript:void(0)" onclick="staffEdit('<?=$value['staff_id']; ?>')" class="btn btn-primary">Edit</a>
                  <input type="button" name="delete" value="Delete" id="<?php echo $value["staff_id"]; ?>" class="btn btn-danger delete_data"/>
                </td>
              </tr>
              <?php $sn++; }} ?>
            </tbody>
          </table>
        </div>
        <div class="modal fade" role="dialog" id="dataModal" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body" >
                <table class="table table-striped">
                  <h2>Staff Detail</h2>
                  <br>
                  <tr>
                    <img id="s_img" style="border-radius:10%; width: 120px; object-fit: cover; object-position: center;" />
                  </tr>
                  <tr>
                    <td>Full Name :</td>
                    <td id="s_name"></td>
                  </tr>
                  <tr>
                    <td>Gender :</td>
                    <td id="s_gender" style="text-transform: capitalize;"></td>
                  </tr>
                  <tr>
                    <td>Email :</td>
                    <td id="s_email"></td>
                  </tr>
                  <tr>
                    <td>Phone No. :</td>
                    <td id="s_phone"></td>
                  </tr>
                  <tr>
                    <td>Designation :</td>
                    <td id="s_desig" style="text-transform: capitalize;"></td>
                  </tr>
                  <tr>
                    <td>Permanent Address :</td>
                    <td id="s_p_address" style="text-transform: capitalize;"></td>
                  </tr>
                  <tr>
                    <td>Temporary Address :</td>
                    <td id="s_t_address" style="text-transform: capitalize;"></td>
                  </tr>
                  <tr>
                    <td>Joined Date :</td>
                    <td id="s_joined_date"></td>
                  </tr>
                  <tr>
                    <td>Role :</td>
                    <td id="s_role_name"></td>
                  </tr>
                </table>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-flat" id="closeModal"/>Close</button>
                </div>
              </div><!-- end content -->
            </div><!-- end modal dialog -->
          </div><!-- end modal -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>

  <script>
    $(document).ready(function(){
      $('#staff').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
      });

      $('.delete_data').click(function(){
        var staff_id = $(this).attr("id");
        console.log(staff_id);
        
        if (confirm('Are you sure?')) {
          $.ajax({
            url: 'Staff/deleteStaffById/'+staff_id,
            type: 'delete',
            error: function(){
              alert('Record cannot be deleted');
            },
            success: function(data){
              $("#"+staff_id).remove();
              alert("Record deleted successfully");
            }
          });
        }
      });

      $('.view_data').click(function(){
        var staff_id = $(this).attr("id");

        $.ajax({
          url: 'Staff/getStaffDetailById/'+staff_id,
          method: "post",
          data:{},
          success:function(data){
            var obj=JSON.parse(data);

            if ((obj.staff_photo=="" || obj.staff_photo==null) && obj.staff_gender=='male') {
              $('#s_img').attr('src', '<?php echo base_url();?>assets/images/male.jpg');
            } else if((obj.staff_photo=="" || obj.staff_photo==null) && obj.staff_gender=='female'){
              $('#s_img').attr('src', '<?php echo base_url();?>assets/images/female.jpg'); 
            }else{
              $('#s_img').attr('src', '<?php echo base_url();?>upload/staffphoto/'+obj.staff_photo);
            }
            $('#s_name').html(obj.staff_fname+" "+obj.staff_mname+" "+obj.staff_lname);
            $('#s_gender').html(obj.staff_gender);
            $('#s_email').html(obj.staff_email);
            $('#s_desig').html(obj.staff_designation);
            $('#s_phone').html(obj.staff_phone);
            $('#s_p_address').html(obj.staff_p_address);
            $('#s_t_address').html(obj.staff_t_address);
            $('#s_joined_date').html(obj.staff_joined_date);
            $('#s_role_name').html(obj.role_name);
            $('#dataModal').modal("show");
          }
        });
      });
      $('#dataModal').on('click','#closeModal', function(){
        $('#dataModal').modal('toggle');
      });
    });
    function addPage() {
      window.location.assign('<?php echo base_url(); ?>Staff/addNewStaff')
    }

    function staffEdit(staffId){
      window.location.assign('Staff/editStaff/'+staffId);
    }
  </script>
