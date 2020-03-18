<style>
.not-active {
  pointer-events: none;
  cursor: default;
  text-decoration: none;
}
</style>

<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <?php echo $this->load->view('includes/header');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php echo $this->load->view('includes/sidebar');?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $heading;?>
        <small>
			<?php if (! empty($message)) { ?>
                <div id="message">
                <?php echo $message; ?>
                </div>
            <?php } ?>  
        </small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
    

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">App Version</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="get_list" class="table table-bordered table-responsive" width="100%">
                
                <thead>
                    
                    <tr>
                      <th>Serial No</th>
                      <th>District</th>
                      <th>Device ID</th>
                      <th>Tag ID</th>
                      <th>User</th>
                      <th>App Version</th>
                      <th>Date Synced</th>
                      <th>Status</th>
                    </tr>
                
                </thead>
                   
                <tbody>
                  <?php $i = 1; foreach($get_list->result() as $row){ 
                    
                    if($row->appversion == $app_version1 or $row->appversion == $app_version2){
                      $bgcolor = '#99FFCC';
                      $status = 'Updated Version';
                    } else{
                      $bgcolor = '#FF9999';
                      $status = 'Old Version';
                    }
                    
                  ?>

                  <tr bgcolor=<?php echo $bgcolor;?>>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row->district;?></td>
                      <td><?php echo $row->deviceid;?></td>
                      <td><?php echo $row->tagid;?></td>
                      <td><?php echo $row->username;?></td>
                      <td><?php echo $row->appversion;?></td>
                      <td><?php echo $row->datee;?></td>
                      <td><?php echo $status;?></td>
                  </tr>
                  <?php $i = $i + 1; } ?>
                </tbody>
                            
                <!--<tfoot>
                  <tr>
                    <th>District</th>
                    <th>Cluster Number</th>
                    <th>Total Structures</th>
                    <th>Residential Structures</th>
                  </tr>
                </tfoot>-->
                            
              </table>

            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      
    </section>    
    
    
    
    
    
  </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('includes/footer');?>

</div>
<!-- ./wrapper -->

<?php echo $this->load->view('includes/scripts');?>

<!-- page script -->
<script>
$(document).ready(function(){
  
  $('#get_list').DataTable({
	  responsive: true,
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
    "ordering": false,
    pageLength: 10,
    });

    $('#get_list2').DataTable({
	  responsive: true,
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
    "ordering": false,
    pageLength: 10,
    });

    $('#get_list3').DataTable({
	  responsive: true,
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
    "ordering": false,
    pageLength: 10,
    });

});
</script>