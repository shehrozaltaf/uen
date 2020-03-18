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
              <h3 class="box-title">Randomized Households</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="get_list" class="table table-bordered table-responsive" width="100%">
                
                <thead>
                    
                    <tr>
                      <th>Serial No</th>
                      <th>Hosuehold No</th>
                      <th>istatus</th>
                      <th>Status</th>
                    </tr>
                
                </thead>
                   
                <tbody>
                  <?php $this->load->model('master_model'); foreach($get_list->result() as $row){ 
                        
                        $get_status = $this->master_model->get_status($row->hh02, $row->hhno);

                        if($get_status == 0){
                          $status = '<span class="label label-danger">Not Collected Yet</span>';
                        } else if($get_status == 1){
                          $status = '<span class="label label-success">Completed</span>';
                        } else if($get_status == 2){
                          $status = '<span class="label label-danger">Refused</span>';
                        } else if($get_status == 3){
                          $status = '<span class="label label-danger">Permanent Closed HH</span>';
                        } else if($get_status == 4){
                          $status = '<span class="label label-danger">Temporary Closed HH</span>';
                        } else if($get_status == 5){
                          $status = '<span class="label label-danger">Postpond</span>';
                        } else if($get_status == 6){
                          $status = '<span class="label label-danger">Empty HH</span>';
                        } else if($get_status == 7){
                          $status = '<span class="label label-danger">Not Completed</span>';
                        } else if($get_status == 96){
                          $status = '<span class="label label-danger">Other</span>';
                        }
                  ?>

                    <tr>
                      <td><?php echo $row->sno;?></td>
                      <td><?php echo $row->hhno;?></td>
                      <td><?php echo $get_status;?></td>
                      <td><?php echo $status;?></td>
                  </tr>
                  <?php } ?>
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
    pageLength: 20,
    });

});
</script>