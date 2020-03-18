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
    
    <!--<hr style="border-color:#3C8DBC; width:98%; border-width:2px;">-->

     <!-- Main content -->
    <section class="content">
    
    	<div class="box box-primary">
            <!--<div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
            	
                <div class="row">
                  <div class="col-md-12">
                    
                    <h1>Ajax file Upload with jQuery + Codeigniter + Bootstrap</h1>
                
                    <form action="<?php echo site_url("uploads/upload") ?>" id="form-upload">            
                      <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-paperclip"></i> Select file</span><span class="fileinput-exists"><i class="glyphicon glyphicon-repeat"></i> Change</span><input type="file" name="file[]" multiple id="file"></span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove"></i> Remove</a>
                        <a href="#" id="upload-btn" class="input-group-addon btn btn-success fileinput-exists"><i class="glyphicon glyphicon-open"></i> Upload</a>
                      </div>
                    </form>
                
                    <!-- <progress id="progress-bar" max="100" value="0"></progress> -->
                    <div class="progress" style="display:none;">
                      <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                        20%
                      </div>
                    </div>
                    
                  </div>               
                </div>
                
                
                <ul class="list-group"></ul>
                
                
                
                
            </div>
       </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('includes/footer');?>
  
</div>
<!-- ./wrapper -->

<?php echo $this->load->view('includes/scripts');?>

<!-- page script -->