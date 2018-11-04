<!-- /.box-body -->
<div class="box-footer clearfix">
  <a href="javascript:void(0)" onclick="addPage()" class="btn btn-sm btn-info btn-flat pull-left">Add New Counselor</a>
  <!-- <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
</div>
<!-- /.box-footer -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Counselors List</h3>

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
        <table class="table table-hover" id="counselor">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>CTC Year</th>
            <th>CTC Code</th>
            <th>Action</th>
          </tr>
          <?php  $sn=1; foreach ($counselorList as $key => $value) { ?>
            <tr>
              <td><?php echo $sn;?></td>
              <td><?php echo $value['c_fname'].' '.$value['c_mname'].' '.$value['c_lname'];?></td>
              <td><?php echo $value['c_ctc_year'];?></td>
              <td><?php echo $value['c_code'];?></td>
              <td>
                <input type="button" name="view" value="View" id="<?php echo $value["c_id"]; ?>" class="btn btn-default view_data" />
                <!-- <a href="javascript:void(0)" onclick="counselorDetail('<?//=$value['c_id']; ?>')" class="btn btn-default">View</a>  -->
                <a href="javascript:void(0)" onclick="counselorEdit('<?=$value['c_id']; ?>')" class="btn btn-primary">Edit</a>
                <a href="javascript:void(0)" onclick="counselorDelete('<?=$value['c_id']; ?>')" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            <?php $sn++; } ?>
          </table>
          <div class="modal fade" role="dialog" id="dataModal" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body" >
                  <table class="table table-striped">
                    <h2>Counselor Detail</h2>
                    <br>
                    <tr>
                      <td>Counselor ID :</td>
                      <td id="c_id"></td>
                    </tr>
                    <tr>
                      <td>Full Name :</td>
                      <td id="c_name"></td>
                    </tr>
                    <tr>
                      <td>Email :</td>
                      <td id="c_email"></td>
                    </tr>
                    <tr>
                      <td>CTC Year. :</td>
                      <td id="c_ctc_year"></td>
                    </tr>
                    <tr>
                      <td>CTC Code :</td>
                      <td id="ctc_code"></td>
                    </tr>
                    <tr>
                      <td>Permanent Address :</td>
                      <td id="paddress" style="text-transform: capitalize;"></td>
                    </tr>
                    <tr>
                      <td>Temporary Address :</td>
                      <td id="taddress" style="text-transform: capitalize;"></td>
                    </tr>
                    <tr>
                      <td>Phone No. :</td>
                      <td id="phone"></td>
                    </tr>
                    <tr>
                      <td>Qualification :</td>
                      <td id="qualification" style="text-transform: capitalize;"></td>
                    </tr>
                  </table>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" id="closeModal">Close</button>
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


    <script type="text/javascript">
      $(document).ready(function(){
        // $('#counselor').DataTable();

        $('.view_data').click(function(){  
          var counselor_id = $(this).attr("id");  
          // alert(counselor_id);
          $.ajax({  
            url:'Counselor/getCounselorDetailById/'+counselor_id,  
            method:"post",  
            data:{},  
            success:function(data){  
              console.log(data);
              var x= data;
              var obj=JSON.parse(x);

              $('#c_id').html(obj.c_id);
              $('#c_name').html(obj.c_fname+" "+obj.c_mname+" "+obj.c_lname);
              $('#c_email').html(obj.c_email);
              $('#c_ctc_year').html(obj.c_ctc_year);
              $('#ctc_code').html(obj.c_code);
              $('#paddress').html(obj.c_p_address);
              $('#taddress').html(obj.c_t_address);
              $('#phone').html(obj.c_phone);
              $('#qualification').html(obj.c_qualification);
             // $('#counselor_detail_modal').html();  
             $('#dataModal').modal("show");  
           }  
         });  
        }); 

        $('#dataModal').on('click','#closeModal', function(){
          $('#dataModal').modal('toggle');
        });
      });

      function counselorEdit(counselorId){
        window.location.assign('Counselor/editCounselor/'+counselorId);
      }

      function addPage() {
        window.location.assign('<?php echo base_url(); ?>Counselor/addNewCounselor')
      }
    </script>
