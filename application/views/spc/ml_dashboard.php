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
              <h3 class="box-title">Collection Progress</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                


                <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-blue">
                    <?php $target_clusters = 0; foreach($clusters_by_district->result() as $row1){ $target_clusters = $target_clusters + $row1->clusters_by_district; }?>
                      <h2><?php echo $target_clusters;?></h2>
                      <h4>Target Clusters</h4>
                    </div>

                    <?php if($this->users->in_group('admin') || $this->users->in_group('management')){ ?>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">

                        <?php foreach($clusters_by_district->result() as $row2){ 
                          
                        if($row2->dist_id == 113){
                            $district = 'Rahim Yar Khan';
                        } else if($row2->dist_id == 123){
                            $district = 'Muzaffargarh';
                        } else if($row2->dist_id == 211){
                            $district = 'Badin';
                        } else if($row2->dist_id == 234){
                            $district = 'Qamber Shahdadkot';
                        } else if($row2->dist_id == 252){
                            $district = 'Sanghar';
                        } else if($row2->dist_id == 414){
                            $district = 'Lasbela';
                        } else if($row2->dist_id == 432){
                            $district = 'Jaffarabad';
                        } else if($row2->dist_id == 434){
                            $district = 'Naseerabad';
                        }
                        
                        ?>
                        <li><a href="#"><strong><?php echo $district;?></strong><span class="pull-right badge bg-blue"><?php echo $row2->clusters_by_district;?></span></a></li>
                        <?php } ?>

                        <li><a href="#"><strong><?php echo "Naseerabad";?></strong><span class="pull-right badge bg-blue"><?php echo '0';?></span></a></li>

                      </ul>
                    </div>
                    <?php } ?>

                  </div>
                  <!-- /.widget-user -->
                </div>
                <!-- /.col -->


                <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-orange">
                    <?php $randomized_c = 0; foreach($randomized_clusters->result() as $row3){ $randomized_c = $randomized_c + $row3->randomized_c; }?>
                      <h2><?php echo $randomized_c;?></h2>
                      <h4>Randomized Clusters</h4>
                    </div>

                    <?php if($this->users->in_group('admin') || $this->users->in_group('management')){ ?>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">

                        <?php foreach($randomized_clusters->result() as $row4){ 
                          
                        if($row4->dist_id == 113){
                            $district2 = 'Rahim Yar Khan';
                        } else if($row4->dist_id == 123){
                            $district2 = 'Muzaffargarh';
                        } else if($row4->dist_id == 211){
                            $district2 = 'Badin';
                        } else if($row4->dist_id == 234){
                            $district2 = 'Qamber Shahdadkot';
                        } else if($row4->dist_id == 252){
                            $district2 = 'Sanghar';
                        } else if($row4->dist_id == 414){
                            $district2 = 'Lasbela';
                        } else if($row4->dist_id == 432){
                            $district2 = 'Jaffarabad';
                        } else if($row4->dist_id == 434){
                            $district2 = 'Naseerabad';
                        }
                          
                        ?>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/rc_d'.$row4->dist_id;?>"><strong><?php echo $district2;?></strong><span class="pull-right badge bg-orange"><?php echo $row4->randomized_c;?></span></a></li>
                        <?php } ?>

                        <li><a href="#"><strong><?php echo "Naseerabad";?></strong><span class="pull-right badge bg-orange"><?php echo '0';?></span></a></li>

                      </ul>
                    </div>
                    <?php } ?>

                  </div>
                  <!-- /.widget-user -->
                </div>
                <!-- /.col -->


                <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-green">
                      <h2><?php echo $cc_total;?></h2>
                      <h4>Completed Clusters</h4>
                    </div>
                    
                    <?php if($this->users->in_group('admin') || $this->users->in_group('management')){ ?>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/cc_d113';?>"><strong>Rahim Yar Khan</strong><span class="pull-right badge bg-green"><?php echo $cc_d113;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/cc_d123';?>"><strong>Muzaffargarh</strong><span class="pull-right badge bg-green"><?php echo $cc_d123;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/cc_d211';?>"><strong>Badin</strong><span class="pull-right badge bg-green"><?php echo $cc_d211;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/cc_d234';?>"><strong>Qamber Shahdadkot</strong><span class="pull-right badge bg-green"><?php echo $cc_d234;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/cc_d252';?>"><strong>Sanghar</strong><span class="pull-right badge bg-green"><?php echo $cc_d252;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/cc_d414';?>"><strong>Lasbela</strong><span class="pull-right badge bg-green"><?php echo $cc_d414;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/cc_d432';?>"><strong>Jaffarabad</strong><span class="pull-right badge bg-green"><?php echo $cc_d432;?></span></a></li>
                        <li><a href="#"><strong>Naseerabad</strong><span class="pull-right badge bg-green"><?php echo 0;?></span></a></li>
                      </ul>
                    </div>
                    <?php } ?>

                  </div>
                  <!-- /.widget-user -->
                </div>
                <!-- /.col -->



                <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-red">
                      <h2><?php echo $rc_total;?></h2>
                      <h4>Remaining Clusters</h4>
                    </div>
                    
                    <?php if($this->users->in_group('admin') || $this->users->in_group('management')){ ?>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/ic_d113';?>"><strong>Rahim Yar Khan</strong><span class="pull-right badge bg-red"><?php echo $rc_d113;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/ic_d123';?>"><strong>Muzaffargarh</strong><span class="pull-right badge bg-red"><?php echo $rc_d123;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/ic_d211';?>"><strong>Badin</strong><span class="pull-right badge bg-red"><?php echo $rc_d211;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/ic_d234';?>"><strong>Qamber Shahdadkot</strong><span class="pull-right badge bg-red"><?php echo $rc_d234;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/ic_d252';?>"><strong>Sanghar</strong><span class="pull-right badge bg-red"><?php echo $rc_d252;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/ic_d414';?>"><strong>Lasbela</strong><span class="pull-right badge bg-red"><?php echo $rc_d414;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/ml_dashboard/ic_d432';?>"><strong>Jaffarabad</strong><span class="pull-right badge bg-red"><?php echo $rc_d432;?></span></a></li>
                        <li><a href="#"><strong>Naseerabad</strong><span class="pull-right badge bg-red"><?php echo 0;?></span></a></li>
                      </ul>
                    </div>
                    <?php } ?>

                  </div>
                  <!-- /.widget-user -->
                </div>
                <!-- /.col -->



                
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->






      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List of Clusters</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="get_list" class="table table-bordered table-responsive" width="100%">
                
                <thead>
                    <tr>
                      <th>District</th>
                      <th>Cluster Number</th>
                      <th>Total Structures</th>
                      <th>Residential Structures</th>
                      <th>Total Households</th>
                      <th>Eligible Households</th>
                      <th>Randomized Households</th>
                      <th>Collected Households</th>
                      <th>Status</th>

                    </tr>
                </thead>
                   
                <tbody>
                    
                    <?php
                    
                    foreach($get_list->result() as $row5){ 
                            
                      if($row5->enumcode == 113){
                        $district = 'Rahim Yar Khan';
                      } else if($row5->enumcode == 123){
                        $district = 'Muzaffargarh';
                      } else if($row5->enumcode == 211){
                        $district = 'Badin';
                      } else if($row5->enumcode == 234){
                        $district = 'Qamber Shahdadkot';
                      } else if($row5->enumcode == 252){
                        $district = 'Sanghar';
                      } else if($row5->enumcode == 414){
                        $district = 'Lasbela';
                      } else if($row5->enumcode == 432){
                        $district = 'Jaffarabad';
                      } else if($row5->enumcode == 434){
                        $district = 'Naseerabad';
                      }

                      if(($row5->eligible_households > 20 and $row5->randomized_households < 20 and $row5->randomized_households != 0) || $row5->randomized_households > 20){
                        $bgcolor = '#E74C3C';
                      } else {
                        $bgcolor = '';
                      }

                      if($row5->randomized_households > 0) {
                        
                        if($row5->collected_households == 0){
                          $status = '<span class="label label-danger">Pending</span>';
                        } else if($row5->collected_households > 0 and $row5->randomized_households > $row5->collected_households){
                          $status = '<span class="label label-info">In Progress</span>';
                        } else {
                          $status = '<span class="label label-success">Completed</span>';
                        }

                      } else {
                        $status = '<span class="label label-warning">Not Randomized</span>'; 
                      }

                    ?>

                    <tr bgcolor="<?php echo $bgcolor;?>">
                      <td><?php echo $district;?></td>
                      <td><?php echo $row5->hh02;?></td>
                      <td><?php echo $row5->structures;?></td>
                      <td><?php echo $row5->residential_structures;?></td>
                      <td><?php echo $row5->households;?></td>
                      <td><?php echo $row5->eligible_households;?></td>
                      <td><strong><a href="<?php echo base_url().'spc/randomized_households/'.$row5->hh02;?>" class="name" target="_blank"><?php echo $row5->randomized_households;?></a></strong></td>
                      <td><strong><a href="<?php echo base_url().'spc/collected_households/'.$row5->hh02;?>" class="name" target="_blank"><?php echo $row5->collected_households;?></a></strong></td>

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
    });

});
</script>