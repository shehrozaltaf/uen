<body class="hold-transition skin-red sidebar-mini">
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
    
    
    <section class="content">
      <div class="box box-danger">
        <div class="box-header with-border"><h3 class="box-title">Key Indicators</h3></div>
        <div class="box-body">
          
          <div class="row">

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $lhws->num_rows();?></h3>
                  <p><strong>Listed LHWs</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $hh_visited->num_rows();?></h3>
                  <p><strong>Households Visited</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
             <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $pregnancies;?></h3>
                  <p><strong>Pregnancies in Last 3 Months</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $deliveries;?></h3>
                  <p><strong>Deliveries in Last 3 Months</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $newborns;?></h3>
                  <p><strong>Newborns in Last 3 Months</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $children;?></h3>
                  <p><strong>Children in Last 3 Months</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $mwras;?></h3>
                  <p><strong>MWRAs in Last 3 Months</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $vhc_visited;?></h3>
                  <p><strong>VHC Visited</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $wsg_visited;?></h3>
                  <p><strong>WSG Visited</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->



            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $neonatal_deaths;?></h3>
                  <p><strong>Neonatal Deaths</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $child_deaths_diarrhea;?></h3>
                  <p><strong>Child Deaths (Diarrhea)</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $child_deaths_cough;?></h3>
                  <p><strong>Child Deaths (Cough)</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
          </div>
        </div>
        <div class="box-footer"></div>
      </div>

    </section>
    
    
  </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('includes/footer');?>

</div>
<!-- ./wrapper -->
<?php echo $this->load->view('includes/scripts');?>
<?php //echo $this->load->view('includes/scripts2');?>
<!-- page script -->
<script src="<?php echo base_url();?>assets/charts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/charts/highcharts-3d.js"></script>
<!--<script src="https://code.highcharts.com/highcharts-3d.js"></script>-->
<script src="<?php echo base_url();?>assets/charts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/charts/data.js"></script>
<script src="<?php echo base_url();?>assets/charts/drilldown.js"></script>
<script>
$(function(){

});
</script>