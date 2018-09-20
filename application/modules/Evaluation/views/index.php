<!-- /.box-body -->
<div class="box-footer clearfix">
  <a href="javascript:void(0)" onclick="newEvaluation()" class="btn btn-sm btn-info btn-flat pull-left">Add New Counselor</a>
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
                <tr>
                  <td>1</td>
                  <td>Mukesh Karna</td>
                  <td>2012</td>
                  <td>3234</td>
                  <td>
                    <a href="javascript:void(0)" onclick="">View</a> | 
                    <a href="javascript:void(0)" onclick="">Edit</a> |
                    <a href="javascript:void(0)" onclick="">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Mukesh Karna</td>
                  <td>2012</td>
                  <td>3234</td>
                  <td>
                    <a href="javascript:void(0)" onclick="">View</a> | 
                    <a href="javascript:void(0)" onclick="">Edit</a> |
                    <a href="javascript:void(0)" onclick="">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Mukesh Karna</td>
                  <td>2012</td>
                  <td>3234</td>
                  <td>
                    <a href="javascript:void(0)" onclick="">View</a> | 
                    <a href="javascript:void(0)" onclick="">Edit</a> |
                    <a href="javascript:void(0)" onclick="">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Mukesh Karna</td>
                  <td>2012</td>
                  <td>3234</td>
                  <td>
                    <a href="javascript:void(0)" onclick="">View</a> | 
                    <a href="javascript:void(0)" onclick="">Edit</a> |
                    <a href="javascript:void(0)" onclick="">Delete</a>
                  </td>
                </tr>
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
function newEvaluation() {
    window.location.assign('<?php echo base_url(); ?>Evaluation/newEvaluation')
}
</script>
