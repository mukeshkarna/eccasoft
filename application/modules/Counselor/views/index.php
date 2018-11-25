<!-- /.box-body -->
<div class="box-footer clearfix">
  <a href="javascript:void(0)" onclick="addPage()" class="btn btn-sm btn-info btn-flat pull-left"/>Add New Counselor</a>
</div>
<!-- /.box-footer -->
<?php if ($this->session->flashdata('success')) { ?>
  <div class="box-body">
    <div class="alert alert-info fade in">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $this->session->flashdata('success'); ?>
    </div>
  </div>
<?php } elseif ($this->session->flashdata('error')) { ?>
  <div class="alert alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('error'); ?>
  </div>
<?php } ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Counselors List</h3>
      </div>
      <div class="box-body">
        <!-- /.box-header -->
        <table class="table table-hover table-striped table-bordered" id="counselor_tbl">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Name</th>
              <th>CTC Year</th>
              <th>CTC Code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($counselorList==0)
              { ?>
                <td colspan="5" align="center"><?php echo "No Records found.";?></td>
                <?php 
              }else{ 
                $sn=1; 
                foreach ($counselorList as $key => $value) { ?>
                  <tr id="<?php echo $value['c_id'];?>">
                    <td><?php echo $sn;?></td>
                    <td><?php echo $value['c_fname'].' '.$value['c_mname'].' '.$value['c_lname'];?></td>
                    <td><?php echo $value['c_ctc_year'];?></td>
                    <td><?php echo $value['c_code'];?></td>
                    <td>
                      <input type="button" name="view" value="View" id="<?php echo $value["c_id"]; ?>" class="btn btn-default view_data" />
                      <a href="javascript:void(0)" onclick="counselorEdit('<?=$value['c_id']; ?>')" class="btn btn-primary">Edit</a>
                      <input type="button" name="delete" value="Delete" id="<?php echo $value["c_id"]; ?>" class="btn btn-danger delete_data"/>
                    </td>
                  </tr>
                  <?php 
                  $sn++; 
                } 
              }?>
            </tbody>
          </table>
        </div>
        <div class="modal fade" role="dialog" id="dataModal" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body" >
                <table class="table table-striped">
                  <h2>Counselor Detail</h2>
                  <br>
                  <tr>
                    <img id="c_img" style="border-radius:10%; width: 120px; object-fit: cover; object-position: center;" />
                  </tr>
                  <tr>
                    <td>Full Name :</td>
                    <td id="c_name"></td>
                  </tr>
                  <tr>
                    <td>Gender :</td>
                    <td id="c_gender" style="text-transform: capitalize;"></td>
                  </tr>
                  <tr>
                    <td>Email :</td>
                    <td id="c_email"></td>
                  </tr>
                  <tr>
                    <td>CTC Year. :</td>
                    <td id="c_ctc_year" style="text-transform: capitalize;"></td>
                  </tr>
                  <tr>
                    <td>Date of Birth :</td>
                    <td id="ctc_dob"></td>
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

  <script type="text/javascript">
    $(document).ready(function(){
      $('#counselor_tbl').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
      });

      $('.delete_data').click(function(){
        var counselor_id = $(this).attr("id");
        // var id = $(this).parents("tr").attr("id");
        console.log(counselor_id);

        if (confirm('Are you sure?')) 
        {
          $.ajax({
            url: 'Counselor/deleteCounselorById/'+counselor_id,
            type: 'delete',
            error: function(){
              alert('Record cannot be deleted');
            },
            success: function(data){
              $("#"+counselor_id).remove();
              alert("Record deleted successfully");
            }
          });
        }
      });

      $('.view_data').click(function(){  
        var counselor_id = $(this).attr("id");  

        $.ajax({  
          url:'Counselor/getCounselorDetailById/'+counselor_id,  
          method:"post",  
          data:{},  
          success:function(data){  
            var obj=JSON.parse(data);

            if (obj.c_photo=="" && obj.c_gender=='male') {
              $('#c_img').attr('src', '<?php echo base_url();?>assets/images/male.jpg');
            } else if(obj.c_photo=="" && obj.c_gender=='female'){
              $('#c_img').attr('src', '<?php echo base_url();?>assets/images/female.jpg'); 
            }else{
              $('#c_img').attr('src', '<?php echo base_url();?>upload/userphoto/'+obj.c_photo);
            }
            $('#c_name').html(obj.c_fname+" "+obj.c_mname+" "+obj.c_lname);
            $('#c_gender').html(obj.c_gender);
            $('#c_email').html(obj.c_email);
            $('#c_ctc_year').html(obj.c_ctc_month+", "+obj.c_ctc_year);
            $('#ctc_dob').html(obj.c_dob);
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
