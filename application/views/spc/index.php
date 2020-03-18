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
              <h3 class="box-title">Line Listing Progress</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                


                <div class="col-md-3">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->

                    <?php $total_clusters = 0; foreach($clusters_by_district->result() as $row11){ $total_clusters = $total_clusters + $row11->clusters_by_district; }?>

                    <?php if($this->users->in_group('admin') || $this->users->in_group('management')){ ?>
                    <div class="widget-user-header bg-blue">
                      <h2><?php echo $total_clusters;?></h2>
                      <h4>Total Clusters</h4>
                    </div>

                    
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">

                        <?php foreach($clusters_by_district->result() as $row22){ 
                          
                          if($row22->dist_id == 113){
                            $district11 = 'Rahim Yar Khan';
                          } else if($row22->dist_id == 123){
                            $district11 = 'Muzaffargarh';
                          } else if($row22->dist_id == 211){
                            $district11 = 'Badin';
                          } else if($row22->dist_id == 234){
                            $district11 = 'Qamber Shahdadkot';
                          } else if($row22->dist_id == 252){
                            $district11 = 'Sanghar';
                          } else if($row22->dist_id == 414){
                            $district11 = 'Lasbela';
                          } else if($row22->dist_id == 432){
                            $district11 = 'Jaffarabad';
                          } else if($row22->dist_id == 434){
                            $district11 = 'Naseerabad';
                          }  
                        ?>
                        <li><a href="#"><strong><?php echo $district11;?></strong><span class="pull-right badge bg-blue"><?php echo $row22->clusters_by_district;?></span></a></li>
                        <?php } ?>

                        <li><a href="#"><strong><?php echo "Naseerabad";?></strong><span class="pull-right badge bg-blue"><?php echo '0';?></span></a></li>

                      </ul>
                    </div>
                    
                    <?php } else { ?>
                    <div class="small-box bg-blue">
                      <div class="inner">
                        <h2><?php echo $total_clusters;?></h2>
                        <strong><p>Total Clusters</p></strong>
                      </div>
                      <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
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

                    <?php if($this->users->in_group('admin') || $this->users->in_group('management')){ ?>

                    <div class="widget-user-header bg-green">
                      <h2><?php echo $gt_c;?></h2>
                      <h4>Completed Clusters</h4>
                    </div>

                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="<?php echo base_url().'spc/index/d113_c';?>"><strong>Rahim Yar Khan</strong><span class="pull-right badge bg-green"><?php echo $d113_c;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d123_c';?>"><strong>Muzaffargarh</strong><span class="pull-right badge bg-green"><?php echo $d123_c;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d211_c';?>"><strong>Badin</strong><span class="pull-right badge bg-green"><?php echo $d211_c;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d234_c';?>"><strong>Qamber Shahdadkot</strong><span class="pull-right badge bg-green"><?php echo $d234_c;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d252_c';?>"><strong>Sanghar</strong><span class="pull-right badge bg-green"><?php echo $d252_c;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d414_c';?>"><strong>Lasbela</strong><span class="pull-right badge bg-green"><?php echo $d414_c;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d432_c';?>"><strong>Jaffarabad</strong><span class="pull-right badge bg-green"><?php echo $d432_c;?></span></a></li>
                        <li><a href="#"><strong>Naseerabad</strong><span class="pull-right badge bg-green"><?php echo 0;?></span></a></li>
                      </ul>
                    </div>
                    <?php } else { ?>

                    <div class="small-box bg-green">
                      <div class="inner">
                        <h2><?php echo $gt_c;?></h2>
                        <strong><p>Completed Clusters</p></strong>
                      </div>
                      <a href="<?php echo base_url().'spc/index/c';?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
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

                    <?php if($this->users->in_group('admin') || $this->users->in_group('management')){ ?>
                    <div class="widget-user-header bg-orange">
                      <h2><?php echo $gt_ip;?></h2>
                      <h4>In Progress Clusters</h4>
                    </div>
                    
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="<?php echo base_url().'spc/index/d113_i';?>"><strong>Rahim Yar Khan</strong><span class="pull-right badge bg-orange"><?php echo $d113_ip;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d123_i';?>"><strong>Muzaffargarh</strong><span class="pull-right badge bg-orange"><?php echo $d123_ip;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d211_i';?>"><strong>Badin</strong><span class="pull-right badge bg-orange"><?php echo $d211_ip;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d234_i';?>"><strong>Qamber Shahdadkot</strong><span class="pull-right badge bg-orange"><?php echo $d234_ip;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d252_i';?>"><strong>Sanghar</strong><span class="pull-right badge bg-orange"><?php echo $d252_ip;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d414_i';?>"><strong>Lasbela</strong><span class="pull-right badge bg-orange"><?php echo $d414_ip;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d432_i';?>"><strong>Jaffarabad</strong><span class="pull-right badge bg-orange"><?php echo $d432_ip;?></span></a></li>
                        <li><a href="#"><strong>Naseerabad</strong><span class="pull-right badge bg-orange"><?php echo 0;?></span></a></li>
                      </ul>
                    </div>
                    <?php } else { ?>

                    <div class="small-box bg-orange">
                      <div class="inner">
                        <h2><?php echo $gt_ip;?></h2>
                        <strong><p>In Progress Clusters</p></strong>
                      </div>
                      <a href="<?php echo base_url().'spc/index/i';?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
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

                    <?php if($this->users->in_group('admin') || $this->users->in_group('management')){ ?>
                    <div class="widget-user-header bg-red">   
                      <h2><?php echo $gt_r;?></h2>
                      <h4>Remaining Clusters</h4>
                    </div>
                    
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">

                        <li><a href="<?php echo base_url().'spc/index/d113_r';?>"><strong>Rahim Yar Khan</strong><span class="pull-right badge bg-red"><?php echo $d113_r;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d123_r';?>"><strong>Muzaffargarh</strong><span class="pull-right badge bg-red"><?php echo $d123_r;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d211_r';?>"><strong>Badin</strong><span class="pull-right badge bg-red"><?php echo $d211_r;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d234_r';?>"><strong>Qamber Shahdadkot</strong><span class="pull-right badge bg-red"><?php echo $d234_r;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d252_r';?>"><strong>Sanghar</strong><span class="pull-right badge bg-red"><?php echo $d252_r;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d414_r';?>"><strong>Lasbela</strong><span class="pull-right badge bg-red"><?php echo $d414_r;?></span></a></li>
                        <li><a href="<?php echo base_url().'spc/index/d432_r';?>"><strong>Jaffarabad</strong><span class="pull-right badge bg-red"><?php echo $d432_r;?></span></a></li>
                        <li><a href="#"><strong>Naseerabad</strong><span class="pull-right badge bg-red"><?php echo 0;?></span></a></li>
                      </ul>
                    </div>
                    <?php } else { ?>

                    <div class="small-box bg-red">
                      <div class="inner">
                        <h2><?php echo $gt_r;?></h2>
                        <strong><p>Remaining Clusters</p></strong>
                      </div>
                      <a href="<?php echo base_url().'spc/index/r';?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
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

              <table id="get_list" class="table table-bordered table-striped table-responsive" width="100%">
                
                <thead>
                    <tr>
                      <th>District</th>
                      <th>Cluster Number</th>
                      <th>Total Structures</th>
                      <th>Residential Structures</th>
                      <th>HHs</th>
                      <th>Eligible HHs</th>
                      <th>Randomized HHs</th>
                      <th>Eligible WRAs</th>
                      <th>Collecting Tabs</th>
                      <th>Completed Tabs</th>

                      <?php 
                      
                      if(!empty($this->uri->segment(3))){
                        
                        if(strlen($this->uri->segment(3)) > 1){
                          $type = substr($this->uri->segment(3), 5, 1);
                        } else {
                          $type = $this->uri->segment(3);
                        }

                      } else {
                        $type = '';
                      }
                      
                      if($type == 'c') { ?>
                        <th width="10%">Randomize</th>
                      <?php } ?>

                    </tr>
                </thead>
                   
                <tbody>
                    
                    <?php
                    
                    foreach($get_list->result() as $row2){ 
                            
                      if($this->users->in_group('admin') || $this->users->in_group('management')){
                        $anchor = anchor("spc/systematic_randomizer/".$row2->hh02."/".$this->uri->segment(3), '<i class="fa fa-edit"></i> Randomize', 'class="btn-sm btn-primary"');
                      } else {
                        $anchor = anchor("spc/systematic_randomizer/".$row2->hh02, '<i class="fa fa-edit"></i> Randomize', 'class="btn-sm btn-primary"');
                      }      
                      
                      if($row2->enumcode == 113){
                        $district = 'Rahim Yar Khan';
                      } else if($row2->enumcode == 123){
                        $district = 'Muzaffargarh';
                      } else if($row2->enumcode == 211){
                        $district = 'Badin';
                      } else if($row2->enumcode == 234){
                        $district = 'Qamber Shahdadkot';
                      } else if($row2->enumcode == 252){
                        $district = 'Sanghar';
                      } else if($row2->enumcode == 414){
                        $district = 'Lasbela';
                      } else if($row2->enumcode == 432){
                        $district = 'Jaffarabad';
                      } else if($row2->enumcode == 434){
                        $district = 'Naseerabad';
                      }
                    ?>
                    <tr>
                      <td><?php echo $district;?></td>
                      <td><?php echo $row2->hh02;?></td>
                      <td><?php echo $row2->structures;?></td>
                      <td><?php echo $row2->residential_structures;?></td>
                      <td><?php echo $row2->households;?></td>
                      <td><?php echo $row2->eligible_households;?></td>
                      <td><?php echo $row2->randomized_households;?></td>
                      <td><?php if($row2->no_of_eligible_wras == NULL){echo 0;}else{echo $row2->no_of_eligible_wras;}?></td>
                      <td><?php echo $row2->collecting_tabs;?></td>
                      <td><?php echo $row2->completed_tabs;?></td>

                      <?php if($row2->collecting_tabs != 0 and $row2->collecting_tabs == $row2->completed_tabs) { 
                              
                              $cluster = $this->spc->query("select randomized from clusters where cluster_no = '$row2->hh02'")->row();
                      ?>
                        
                        <?php if($type == 'c') { ?>
                        <td><?php if($cluster->randomized == 0){echo $anchor;} else {
                          echo anchor("spc/make_pdf/".$row2->hh02, '<i class="fa fa-print"></i> Print', ['target' => '_blank', 'class' => 'btn-sm btn-success']);
                        }?></td>
                      <?php } } ?>

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