<!-- /.box-body -->
<div class="box-header with-border">
    <h3 class="box-title">Province</h3>
  </div>
<div class="box-footer clearfix">
  <a href="javascript:void(0)" onclick="addProvincePage()" class="btn btn-sm btn-info btn-flat rollovericons"/>Add Province</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="javascript:void(0)" onclick="viewProvincePage()" class="btn btn-sm btn-info btn-flat rollovericons"/>View All Province</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>

<div class="box-header with-border">
    <h3 class="box-title">District</h3>
  </div>
<div class="box-footer clearfix">
<a href="javascript:void(0)" onclick="addDistrictPage()" class="btn btn-sm btn-info btn-flat rollovericons"/>Add District</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="javascript:void(0)" onclick="viewDistrictPage()" class="btn btn-sm btn-info btn-flat rollovericons"/>View All District</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>

<div class="box-header with-border">
    <h3 class="box-title">Municipality</h3>
  </div>
<div class="box-footer clearfix">
  <a href="javascript:void(0)" onclick="addMunicipalityPage()" class="btn btn-sm btn-info btn-flat rollovericons"/>Add Municipality</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="javascript:void(0)" onclick="viewMunicipalityPage()" class="btn btn-sm btn-info btn-flat rollovericons"/>View All Municipality</a>
</div>

<script>
    function addProvincePage() {
      window.location.assign('<?php echo base_url(); ?>Location/addNewProvince')
    }

    function addDistrictPage(){
      window.location.assign('<?php echo base_url(); ?>Location/addNewDistrict');
    }

    function addMunicipalityPage(){
      window.location.assign('<?php echo base_url(); ?>Location/addNewMunicipality');
    }
    function viewProvincePage() {
      window.location.assign('<?php echo base_url(); ?>Location/viewProvince')
    }

    function viewDistrictPage(){
      window.location.assign('<?php echo base_url(); ?>Location/viewDistrict');
    }

    function viewMunicipalityPage(){
      window.location.assign('<?php echo base_url(); ?>Location/viewMunicipality');
    }
</script>
<style>
.rollovericons a{
    margin: 10px;
}
</style>