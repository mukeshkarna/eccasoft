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
                <a href="javascript:void(0)" onclick="counselorDetail('<?=$value['c_id']; ?>')" class="btn btn-default">View</a> 
                <a href="javascript:void(0)" onclick="counselorEdit('<?=$value['c_id']; ?>')" class="btn btn-primary">Edit</a>
                <a href="javascript:void(0)" onclick="counselorDelete('<?=$value['c_id']; ?>')" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            <?php $sn++; } ?>
          </table>
          <div class="modal fade" role="dialog" id="counselor_detail_modal" >
            <div class="modal-dialog">
              <div class="modal-content">
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
      $('#counselor').DataTable();

      $('#counselor_detail_modal').on('click','#closeModal', function(){
        $('#counselor_detail_modal').modal('toggle');
      });
    });

    function counselorDetail(counselorId){
      window.location.assign('Counselor/getCounselorDetailById/'+counselorId, true).then(function(responseData){
        $('#counselor_detail_modal .modal-content').html(responseData);
        $('#counselor_detail_modal').modal('show');
      },function(error){
        $('#counselor_detail_modal .modal-content').html(' ');
      });
    }

    function counselorEdit(purchaseId){
      window.redirect('Counselor/editCounselor/'+purchaseId);
    }

    function addPage() {
      window.location.assign('<?php echo base_url(); ?>Counselor/addNewCounselor')
    }
  </script>
