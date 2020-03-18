
<body class="hold-transition skin-yellow sidebar-mini fixed">
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
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-warning">
            <!--<div class="box-header">
            <h3>SECTION 2: BACKGROUND</h3>
              <h3 class="box-title">2.4 BACKGROUND and GENERAL SIGNS AND SYMPTOMS </h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              
              <?php $total = 0; $correct = 0;?>
              
              <table id="example1" class="table table-bordered table-striped" width="100%">
                
                <thead>
                    <tr>
                      <th>S#</th>
                      <th>Indicator</th>
                      <th>DHIS</th>
                      <th>LHW Source Register</th>
                      <th>Status</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	
                	<tr>
                      <td>1</td>
                      <td>Number of ANC - 1 visit</td>
                      <td><?php echo $month->dhis_1; $total++;?></td>
                      <td><?php echo $month->sr_1;?></td>
                      <td><?php if($month->dhis_1 == $month->sr_1){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>2</td>
                      <td>Number of ANC  Revisits</td>
                      <td><?php echo $month->dhis_2; $total++;?></td>
                      <td><?php echo $month->sr_2;?></td>
                      <td><?php if($month->dhis_2 == $month->sr_2){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>3</td>
                      <td>ANC-1 women with Hb < 10 g/dl</td>
                      <td><?php echo $month->dhis_3; $total++;?></td>
                      <td><?php echo $month->sr_3;?></td>
                      <td><?php if($month->dhis_3 == $month->sr_3){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  <tr>
                      <td>4</td>
                      <td>Number of PNC-1 visits</td>
                      <td><?php echo $month->dhis_4; $total++;?></td>
                      <td><?php echo $month->sr_4;?></td>
                      <td><?php if($month->dhis_4 == $month->sr_4){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  <tr>
                      <td>6</td>
                      <td>Pregnant women given TT-2 vaccination</td>
                      <td><?php echo $month->dhis_6; $total++;?></td>
                      <td><?php echo $month->sr_6;?></td>
                      <td><?php if($month->dhis_6 == $month->sr_6){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>9</td>
                      <td>Normal Vaginal Delivery</td>
                      <td><?php echo $month->dhis_9; $total++;?></td>
                      <td><?php echo $month->sr_9;?></td>
                      <td><?php if($month->dhis_9 == $month->sr_9){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>10</td>
                      <td>Assisted Vaginal Deliveries</td>
                      <td><?php echo $month->dhis_10; $total++;?></td>
                      <td><?php echo $month->sr_10;?></td>
                      <td><?php if($month->dhis_10 == $month->sr_10){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  
                  
                  <tr>
                      <td>17</td>
                      <td>Maternal Mortality</td>
                      <td><?php echo $month->dhis_17; $total++;?></td>
                      <td><?php echo $month->sr_17;?></td>
                      <td><?php if($month->dhis_17 == $month->sr_17){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>18</td>
                      <td>Number of live births in the facility</td>
                      <td><?php echo $month->dhis_18; $total++;?></td>
                      <td><?php echo $month->sr_18;?></td>
                      <td><?php if($month->dhis_18 == $month->sr_18){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>19</td>
                      <td>Number of live births with LBW</td>
                      <td><?php echo $month->dhis_19; $total++;?></td>
                      <td><?php echo $month->sr_19;?></td>
                      <td><?php if($month->dhis_19 == $month->sr_19){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>20</td>
                      <td>Number of stillbirths in the facility</td>
                      <td><?php echo $month->dhis_20; $total++;?></td>
                      <td><?php echo $month->sr_20;?></td>
                      <td><?php if($month->dhis_20 == $month->sr_20){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
              
                  
                  <tr>
                      <td>29</td>
                      <td>Number of neonatal deaths  (28 days)</td>
                      <td><?php echo $month->dhis_29; $total++;?></td>
                      <td><?php echo $month->sr_29;?></td>
                      <td><?php if($month->dhis_29 == $month->sr_29){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>30</td>
                      <td>Number of Pneumonia cases < 5 years(OPD)</td>
                      <td><?php echo $month->dhis_30; $total++;?></td>
                      <td><?php echo $month->sr_30;?></td>
                      <td><?php if($month->dhis_30 == $month->sr_30){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>31</td>
                      <td>Number of Pneumonia cases < 5 years (Indoor)</td>
                      <td><?php echo $month->dhis_31; $total++;?></td>
                      <td><?php echo $month->sr_31;?></td>
                      <td><?php if($month->dhis_31 == $month->sr_31){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>32</td>
                      <td>Deaths due to Pneumonia among < 5 years (Indoor)</td>
                      <td><?php echo $month->dhis_32; $total++;?></td>
                      <td><?php echo $month->sr_32;?></td>
                      <td><?php if($month->dhis_32 == $month->sr_32){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>33</td>
                      <td>Number of Diarrhea/Dysentry cases < 5 years (OPD)</td>
                      <td><?php echo $month->dhis_33; $total++;?></td>
                      <td><?php echo $month->sr_33;?></td>
                      <td><?php if($month->dhis_33 == $month->sr_33){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>34</td>
                      <td>Number of Diarrhea/Dysentry cases < 5 years (Indoor)</td>
                      <td><?php echo $month->dhis_34; $total++;?></td>
                      <td><?php echo $month->sr_34;?></td>
                      <td><?php if($month->dhis_34 == $month->sr_34){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>35</td>
                      <td>Deaths due to Diarrhea/Dysentry among < 5 years (Indoor)</td>
                      <td><?php echo $month->dhis_35; $total++;?></td>
                      <td><?php echo $month->sr_35;?></td>
                      <td><?php if($month->dhis_35 == $month->sr_35){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>37</td>
                      <td>Total Paeds OPD (1-11 months)</td>
                      <td><?php echo $month->dhis_37; $total++;?></td>
                      <td><?php echo $month->sr_37;?></td>
                      <td><?php if($month->dhis_37 == $month->sr_37){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>38</td>
                      <td>Total Paeds OPD (12-59 months)</td>
                      <td><?php echo $month->dhis_38; $total++;?></td>
                      <td><?php echo $month->sr_38;?></td>
                      <td><?php if($month->dhis_38 == $month->sr_38){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  
                  
                  
                  <tr>
                      <td>44</td>
                      <td>Children < 12 months received 3rd Pentavelant vaccine</td>
                      <td><?php echo $month->dhis_44; $total++;?></td>
                      <td><?php echo $month->sr_44;?></td>
                      <td><?php if($month->dhis_44 == $month->sr_44){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>45</td>
                      <td>Children < 12 months received 1st Measles vaccine</td>
                      <td><?php echo $month->dhis_45; $total++;?></td>
                      <td><?php echo $month->sr_45;?></td>
                      <td><?php if($month->dhis_45 == $month->sr_45){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                  
                  <tr>
                      <td>46</td>
                      <td>Number of IUDs (Intra Utrine Death) in the facility</td>
                      <td><?php echo $month->dhis_delv; $total++;?></td>
                      <td><?php echo $month->sr_delv;?></td>
                      <td><?php if($month->dhis_delv == $month->sr_delv){ $correct++; ?><span class="label label-success">Matched</span><?php } else { ?><span class="label label-danger">Mismatched</span><?php } ?></td>
                  </tr>
                  
                    
                </tbody>
                
              </table>
              
              
              <div class="callout callout-warning">
                <h4>Data Accuracy = <?php echo round(($correct / $total) * 100, 2);?>%</h4>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('includes/footer');?>
  
</div>
<!-- ./wrapper -->

<?php echo $this->load->view('includes/scripts');?>

<script src="<?php echo base_url();?>assets/charts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/charts/highcharts-3d.js"></script>

<!-- page script -->
<script>
$(function () {
    
	$("#example1").DataTable({
	  dom: '<"top"B<"clear">><"bottom">',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
	  "ordering": false,
	  pageLength: 50,
	  //responsive: true,
	});
	
	/*$( "#btn-danger" ).click(function() {
		$.confirm({
			title: 'Confirm!',
			content: 'Simple confirm!',
			buttons: {
				confirm: function () {
					$.alert('Confirmed!');
				},
				cancel: function () {
					$.alert('Canceled!');
				}
			}
		});
	});*/
});
</script>

<script>
/*function ConfirmDelete(){
	
	$.confirm({
		title: 'Confirm!',
		content: 'Simple confirm!',
		buttons: {
			confirm: function () {
				$.alert('Confirmed!');
			},
			cancel: function () {
				$.alert('Canceled!');
			}
		}
	});
}*/
</script>