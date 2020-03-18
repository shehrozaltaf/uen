<style>

img {
    width: 800px; /* You can set the dimensions to whatever you want */
    height: 800px;
    object-fit: cover;
}

.chart {
  width: 100%; 
  min-height: 450px;
  padding:8px;
}


#custom_carousel .item {

    color:#000;
    background-color:#fff;
    padding:20px 0;
}
#custom_carousel .controls{
    overflow-x: auto;
    overflow-y: hidden;
    padding:0;
    margin:0;
    white-space: nowrap;
    text-align: center;
    position: relative;
    background:#ddd
}
#custom_carousel .controls li {
    display: table-cell;
    width: 1%;
    max-width:90px
}
#custom_carousel .controls li.active {
    background-color:#eee;
    border-top:3px solid #428BCA;
	border-bottom:3px solid #428BCA;
}
#custom_carousel .controls a small {
    overflow:hidden;
    display:block;
    font-size:10px;
    margin-top:5px;
    font-weight:bold
}


#myCarousel .nav a small
{
    display: block;
	padding-bottom:30px;
}
#myCarousel .nav
{
    background: #eee;
}
.nav-justified > li > a
{
    border-radius: 0px;
}
.nav-pills>li[data-slide-to="0"].active a { background-color: #16a085; }
.nav-pills>li[data-slide-to="1"].active a { background-color: #e67e22; }
.nav-pills>li[data-slide-to="2"].active a { background-color: #2980b9; }
.nav-pills>li[data-slide-to="3"].active a { background-color: #8e44ad; }
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

 	  <!-- Small boxes (Stat box) -->
      <div class="row">

         <div class="col-lg-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php //echo count($districts);?></h3>

              <p><strong>UEN Implementation</strong></p>
            </div>
            <div class="icon">
              <i class="ion ion-android-map"></i>
            </div>
            <a href="<?php echo base_url();?>uen/implementation" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
         <div class="col-lg-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php //echo count($users);?></h3>

              <p><strong>UEN Trials</strong></p>
              
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url();?>uen/trials" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
         
        
      </div>
      <!-- /.row -->      
      <!-- Main row -->
      
      
      
              
              
      <!--<div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
        
        <div class="carousel-inner">
        
        
            <div class="item active">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3"><img src="<?php //echo base_url();?>files/sliders/logo.png" class="img-responsive"></div>
                        <div class="col-md-9">
                            <h2>UMEED-E-NAU</h2>
                            <p>Supporting women and girls in pakistan scaling up empowerment and care strategies to address health and survival.</p>
                        </div>
                    </div>
                </div>            
            </div> 
            
            
            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3"><img src="<?php //echo base_url();?>files/sliders/logo.png" class="img-responsive"></div>
                        <div class="col-md-9">
                            <h2>Project Title</h2>
                            <p>Project Description......</p>
                        </div>
                    </div>
                </div>            
            </div> 
            
            
            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3"><img src="<?php //echo base_url();?>files/sliders/logo.png" class="img-responsive"></div>
                        <div class="col-md-9">
                            <h2>Project Title</h2>
                            <p>Project Description......</p>
                        </div>
                    </div>
                </div>           
            </div> 
        
        
        </div>
        
        <div class="controls">
            <ul class="nav">
                <li data-target="#custom_carousel" data-slide-to="0" class="active"><a href="#"><img src="<?php //echo base_url();?>files/sliders/logo.png" width="50px" height="50px"><small>Umeed-e-Nau</small></a></li>
                <li data-target="#custom_carousel" data-slide-to="1"><a href="#"><img src="<?php //echo base_url();?>files/sliders/logo.png" width="50px" height="50px"><small>Umeed-e-Nau</small></a></li>
                <li data-target="#custom_carousel" data-slide-to="2"><a href="#"><img src="<?php //echo base_url();?>files/sliders/logo.png" width="50px" height="50px"><small>Umeed-e-Nau</small></a></li>
            </ul>
        </div>
    </div>-->
      
      
      
      <div class="row">

        
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pictures</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner">
                  
                  <div class="item active">
                    <img src="<?php echo base_url();?>trainings/1.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/2.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/3.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/4.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/5.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/6.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/7.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/8.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/9.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/10.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/11.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/12.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/13.jpeg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/14.jpeg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/16.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/17.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/18.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/19.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/20.jpg">
                  </div>
                  
                  <div class="item">
                    <img src="<?php echo base_url();?>trainings/21.jpg">
                  </div>
                  
                
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col 6 -->
        
        
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Location Map</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
                <img class="img-responsive" src="<?php echo base_url();?>files/maps/map.png" alt="Photo">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
                  
      </div>
      
      
      <!-- Row 4 Start -->
      <!--<div class="row">
        
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">
              <div id="trainees_by_level" style="height: 400px; margin: 0 auto;"></div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">
              <div id="trainees_by_quarters" style="height: 400px; margin: 0 auto;"></div>
            </div>
          </div>
        </div>
        
      </div>-->
      <!-- Row 4 End -->
      
      
      
      
      
      
      
      
      <!-- Row 4 Start -->
      <!--<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
              <div id="lineChart" style="height: 250px; margin: 0 auto;"></div>
            </div>
          </div>
        </div>
      </div>-->
      <!-- Row 4 End -->
      
      
      <!-- Row 4 Start -->
      <div class="row">
        
        <!--<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
              <div id="trainees_by_designation" style="height: 500px; margin: 0 auto;"></div>
            </div>
          </div>
        </div>-->
        
      </div>
      <!-- Row 4 End --> 
      
      
      
      <!-- Row 2 Start -->
      <!--<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3>Center of Excellence Project Covered Distrcits</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
                <div id="map" class="chart" style="height:325px;">
                	<?php //echo $districts_map['js']; ?>
					<?php //echo $districts_map['html']; ?>
                </div>
            </div>
          </div>
        </div>
      </div>-->
      <!-- Row 2 End -->

      
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
$(function () {


	$('#custom_carousel').on('slide.bs.carousel', function (evt) {
      $('#custom_carousel .controls li.active').removeClass('active');
      $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    })
	
	
	
	$('#myCarousel').carousel({
    	interval:   4000
	});
	
	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});


	// Create the chart
    $('#trainees_by_level').highcharts({
        chart: {
            type: 'column',
			options3d: {
				enabled: true,
			}
        },
        title: {
            text: 'Trainees By Level and Designation'
        },
        xAxis: {
            type: 'category'
        },
		
		yAxis: {
        	min: 0,
    	},

        legend: {
            enabled: true
        },

        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                }
            }
        },

        credits: {
      		enabled: false
  		},
		
		series: [{
            name: 'Target',
            color: '#ff2163',
            data: [{
                name: 'Community',
                y: <?php echo $t_b_level[0]['target']?>,
                drilldown: 'c1'
            }, {
                name: 'Facility',
                y: <?php echo $t_b_level[1]['target']?>,
                drilldown: 'f1'
            }]
        }, {
            name: 'Acheived',
            color: '#0c7ae2',
            data: [{
                name: 'Community',
                y: <?php echo $t_b_level[0]['acheived']?>,
                drilldown: 'c2'
            }, {
                name: 'Facility',
                y: <?php echo $t_b_level[1]['acheived']?>,
                drilldown: 'f2'
            }]
        }],
        drilldown: {
            _animation: {
                duration: 2000
            },
            series: [{
                id: 'c1',
                name: 'Target',
                data: [
                    ['<?php echo $t_b_level2[0]['hcp']?>', <?php echo $t_b_level2[0]['target']?>],
                    ['<?php echo $t_b_level2[1]['hcp']?>', <?php echo $t_b_level2[1]['target']?>]
                ]
            }, {
                id: 'f1',
                name: 'Target',
                data: [
                    ['<?php echo $t_b_level3[0]['hcp']?>', <?php echo $t_b_level3[0]['target']?>],
                    ['<?php echo $t_b_level3[1]['hcp']?>', <?php echo $t_b_level3[1]['target']?>]
                ]
            },{
                id: 'c2',
                name: 'Acheived',
                data: [
                    ['<?php echo $t_b_level2[0]['hcp']?>', <?php echo $t_b_level2[0]['acheived']?>],
                    ['<?php echo $t_b_level2[1]['hcp']?>', <?php echo $t_b_level2[1]['acheived']?>]
                ]
            }, {
                id: 'f2',
                name: 'Acheived',
                data: [
                    ['<?php echo $t_b_level3[0]['hcp']?>', <?php echo $t_b_level3[0]['acheived']?>],
                    ['<?php echo $t_b_level3[1]['hcp']?>', <?php echo $t_b_level3[1]['acheived']?>]
                ]
            }]
        }
    });
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Create the chart
    $('#trainees_by_quarters').highcharts({
        chart: {
            type: 'column',
			options3d: {
				enabled: true,
			}
        },
        title: {
            text: 'Trainees By Level, Quarters and Designation'
        },
        xAxis: {
            type: 'category'
        },

        legend: {
            enabled: true
        },
		
		credits: {
      		enabled: false
  		},

        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                }
            }
        },

		series: 
		[
			{name: 'Target',   color: '#ff2163', data: [{name: 'Community', y: <?php echo $dd1->target;?>, drilldown: 'c1'}, {name: 'Facility', y: <?php echo $dd2->target;?>, drilldown: 'f1'}]},
			{name: 'Acheived', color: '#0c7ae2', data: [{name: 'Community', y: <?php echo $dd1->acheived;?>, drilldown: 'c2'},  {name: 'Facility', y: <?php echo $dd2->acheived;?>, drilldown: 'f2'}]}
		],
        
		
		
		drilldown: 
		{
            series: 
			[
				
				
				{id: 'c1', name: 'Target',   data: [<?php $a = 1; foreach($dd3->result() as $d3){ ?>{name: '<?php echo $d3->Y."|Q".$d3->Q?>', y: <?php echo $d3->target;?>, drilldown: 'w<?php echo $d3->Q.$a;?>'}, <?php $a++;} ?>]},
				
				{id: 'c2', name: 'Acheived', data: [<?php $b = 1; foreach($dd3->result() as $d3){ ?>{name: '<?php echo $d3->Y."|Q".$d3->Q?>', y: <?php echo $d3->acheived;?>, drilldown: 'x<?php echo $d3->Q.$b;?>'}, <?php $b++;} ?>]},
				
				
				{id: 'f1', name: 'Target',   data: [<?php $c = 1; foreach($dd4->result() as $d4){ ?>{name: '<?php echo $d4->Y."|Q".$d4->Q?>', y: <?php echo $d4->target;?>, drilldown: 'y<?php echo $d4->Q.$c;?>'}, <?php $c++;} ?>]},
				
				{id: 'f2', name: 'Acheived', data: [<?php $d = 1; foreach($dd4->result() as $d4){ ?>{name: '<?php echo $d4->Y."|Q".$d4->Q?>', y: <?php echo $d4->acheived;?>, drilldown: 'z<?php echo $d4->Q.$d;?>'}, <?php $d++;} ?>]},
				
				
				
				
				
				
				<?php $this->load->model('districts_model'); $w = 1; foreach($dd3->result() as $d3){ ?>
				{id: 'w<?php echo $d3->Q.$w;?>', name: 'Target', data: [<?php $query1 = $this->districts_model->_custom_query("SELECT hcp,
	sum(target) AS target,
	sum(acheived) AS acheived
FROM db11t01_trainings
WHERE t_level = 'Community' and datepart(quarter, date_of_training) = $d3->Q and SUBSTRING(CONVERT(varchar, date_of_training), 1, 4) = $d3->Y
GROUP BY hcp"); foreach($query1->result() as $q1){?>{name: "<?php echo $q1->hcp;?>", y:<?php echo $q1->target;?>}, <?php } ?>]},
				<?php $w++;} ?>
				
				
				<?php $x = 1; foreach($dd3->result() as $d3){ ?>
				{id: 'x<?php echo $d3->Q.$x;?>', name: 'Acheived', data: [<?php $query2 = $this->districts_model->_custom_query("SELECT hcp,
	sum(target) AS target,
	sum(acheived) AS acheived
FROM db11t01_trainings
WHERE t_level = 'Community' and datepart(quarter, date_of_training) = $d3->Q and SUBSTRING(CONVERT(varchar, date_of_training), 1, 4) = $d3->Y
GROUP BY hcp"); foreach($query2->result() as $q2){?>{name: "<?php echo $q2->hcp;?>", y:<?php echo $q2->acheived;?>}, <?php } ?>]},
				<?php $x++;} ?>
				
				
				
				
				<?php $y = 1; foreach($dd4->result() as $d4){ ?>
				{id: 'y<?php echo $d4->Q.$y;?>', name: 'Target', data: [<?php $query3 = $this->districts_model->_custom_query("SELECT hcp,
	sum(target) AS target,
	sum(acheived) AS acheived
FROM db11t01_trainings
WHERE t_level = 'Facility' and datepart(quarter, date_of_training) = $d4->Q and SUBSTRING(CONVERT(varchar, date_of_training), 1, 4) = $d4->Y
GROUP BY hcp"); foreach($query3->result() as $q3){?>{name: "<?php echo $q3->hcp;?>", y:<?php echo $q3->target;?>}, <?php } ?>]},
				<?php $y++;} ?>
				
				
				<?php $z = 1; foreach($dd4->result() as $d4){ ?>
				{id: 'z<?php echo $d4->Q.$z;?>', name: 'Acheived', data: [<?php $query4 = $this->districts_model->_custom_query("SELECT hcp,
	sum(target) AS target,
	sum(acheived) AS acheived
FROM db11t01_trainings
WHERE t_level = 'Facility' and datepart(quarter, date_of_training) = $d4->Q and SUBSTRING(CONVERT(varchar, date_of_training), 1, 4) = $d4->Y
GROUP BY hcp"); foreach($query4->result() as $q4){?>{name: "<?php echo $q4->hcp;?>", y:<?php echo $q4->acheived;?>}, <?php } ?>]},
				<?php $z++;} ?>
				
				
				
				/*{id: 'q21', name: 'Acheived', data: [{name: "LHS", y:40}, ]},
				{id: 'q12', name: "Target", data: [{name: "LHS", y:100}, ]},
				{id: 'q22', name: "Acheived", data: [{name: "LHS", y:400}, ]},
				
				
				
				
				{id: 'q31', name: 'Target', data: [{name: "MTs", y:1000}, ]},
				{id: 'q41', name: 'Acheived', data: [{name: "MTs", y:4000}, ]},
				{id: 'q32', name: "Target", data: [{name: "MTs", y:10000}, ]},
				{id: 'q42', name: "Acheived", data: [{name: "MTs", y:40000}, ]}*/
			]
        }
		
		
    });














    
	/*Highcharts.chart('trainees_by_designation', {
   chart: {
        type: 'column',
    },

    title: {
        text: 'Trainees Distribution By HCP'
    },

    xAxis: {
        categories: [<?php //echo "'".$hcps_array[0]['district']."'";?>, <?php //echo "'".$hcps_array[1]['district']."'";?>, <?php //echo "'".$hcps_array[2]['district']."'";?>, <?php //echo "'".$hcps_array[3]['district']."'";?>, <?php //echo "'".$hcps_array[4]['district']."'";?>, <?php //echo "'".$hcps_array[5]['district']."'";?>, <?php //echo "'".$hcps_array[6]['district']."'";?>, <?php //echo "'".$hcps_array[7]['district']."'";?>],
		
		title: {
            text: 'Districts'
        }
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
		max:100,
        title: {
            text: 'Trainees'
        }
    },

    legend: {
        shadow: false
    },
    tooltip: {
        shared: false
    },
    plotOptions: {
        column: {
            grouping: false,
            shadow: false,
            borderWidth: 0
        }
    },
	
	credits: {
      enabled: false
  	},

    series: [{
        name: 'Total LHS',
        color: '#df76e6',
        data: [<?php //echo $hcps_array[0]['LHS_total'];?>, <?php //echo $hcps_array[1]['LHS_total'];?>, <?php //echo $hcps_array[2]['LHS_total'];?>, <?php //echo $hcps_array[3]['LHS_total'];?>, <?php //echo $hcps_array[4]['LHS_total'];?>, <?php //echo $hcps_array[5]['LHS_total'];?>, <?php //echo $hcps_array[6]['LHS_total'];?>, <?php //echo $hcps_array[7]['LHS_total'];?>],
		pointPadding: 0.4,
        pointPlacement: -0.3
    }, {
        name: 'Trained LHS',
        color: '#58115d',
        data: [<?php //echo $hcps_array[0]['LHS_trained'];?>, <?php //echo $hcps_array[1]['LHS_trained'];?>, <?php //echo $hcps_array[2]['LHS_trained'];?>, <?php //echo $hcps_array[3]['LHS_trained'];?>, <?php //echo $hcps_array[4]['LHS_trained'];?>, <?php //echo $hcps_array[5]['LHS_trained'];?>, <?php //echo $hcps_array[6]['LHS_trained'];?>, <?php //echo $hcps_array[7]['LHS_trained'];?>],
		pointPadding: 0.4,
        pointPlacement: -0.3
    }, {
        name: 'Total LHW',
        color: '#74f886',
        data: [<?php //echo $hcps_array[0]['LHW_total'];?>, <?php //echo $hcps_array[1]['LHW_total'];?>, <?php //echo $hcps_array[2]['LHW_total'];?>, <?php //echo $hcps_array[3]['LHW_total'];?>, <?php //echo $hcps_array[4]['LHW_total'];?>, <?php //echo $hcps_array[5]['LHW_total'];?>, <?php //echo $hcps_array[6]['LHW_total'];?>, <?php //echo $hcps_array[7]['LHW_total'];?>],
		pointPadding: 0.4,
        pointPlacement: -0.1,
    }, {
        name: 'Trained LHW',
        color: '#056813',
        data: [<?php //echo $hcps_array[0]['LHW_trained'];?>, <?php //echo $hcps_array[1]['LHW_trained'];?>, <?php //echo $hcps_array[2]['LHW_trained'];?>, <?php //echo $hcps_array[3]['LHW_trained'];?>, <?php //echo $hcps_array[4]['LHW_trained'];?>, <?php //echo $hcps_array[5]['LHW_trained'];?>, <?php //echo $hcps_array[6]['LHW_trained'];?>, <?php //echo $hcps_array[7]['LHW_trained'];?>],
		pointPadding: 0.4,
        pointPlacement: -0.1,
    }
	
	
	, {
        name: 'Total Master Trainers',
        color: '#a1d1f5',
        data: [<?php //echo $hcps_array[0]['MT_total'];?>, <?php //echo $hcps_array[1]['MT_total'];?>, <?php //echo $hcps_array[2]['MT_total'];?>, <?php //echo $hcps_array[3]['MT_total'];?>, <?php //echo $hcps_array[4]['MT_total'];?>, <?php //echo $hcps_array[5]['MT_total'];?>, <?php //echo $hcps_array[6]['MT_total'];?>, <?php //echo $hcps_array[7]['MT_total'];?>],
		pointPadding: 0.4,
        pointPlacement: 0.1,
    }
	
	, {
        name: 'Trained Master Trainers',
        color: '#1470b6',
        data: [<?php //echo $hcps_array[0]['MT_trained'];?>, <?php //echo $hcps_array[1]['MT_trained'];?>, <?php //echo $hcps_array[2]['MT_trained'];?>, <?php //echo $hcps_array[3]['MT_trained'];?>, <?php //echo $hcps_array[4]['MT_trained'];?>, <?php //echo $hcps_array[5]['MT_trained'];?>, <?php //echo $hcps_array[6]['MT_trained'];?>, <?php //echo $hcps_array[7]['MT_trained'];?>],
		pointPadding: 0.4,
        pointPlacement: 0.1,
    }
	
	
	
	
	]
});*/







<!-- Chart 2-->

// -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  //var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  //var pieChart       = new Chart(pieChartCanvas);
  //var PieData        = [
    //{
      //value    : <?php //echo $pieChart[0]['trained'];?>,
	  //color    : '#00a65a',
      //highlight: '#00a65a',
      //label    : 'Trained'
    //},
    //{
      //value    : <?php //echo $pieChart[0]['remaining'];?>,
      //color    : '#f56954',
      //highlight: '#f56954',
      //label    : 'Remaining'
    //}
  //];
  //var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    //segmentShowStroke    : true,
    // String - The colour of each segment stroke
    //segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    //segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    //percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    //animationSteps       : 100,
    // String - Animation easing effect
    //animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    //animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    //animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    //responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    //maintainAspectRatio  : false,
    // String - A legend template
    //legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    //tooltipTemplate      : '<%=value %> <%=label%>'
  //};
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  //pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------
  
  
  
  <!-- Third Chart -->
  
	Highcharts.chart('lineChart', {
		chart: {
			type: 'spline',
			options3d: {
				enabled: true,
			}
		},
		title: {
			text: 'Average Marks'
		},
		xAxis: {
			categories: [<?php foreach($lineChart->result() as $row){echo "'Training $row->id (".$row->name.")',";}?>]
		},
		yAxis: {
			title: {
				text: 'Marks Obtained'
			},
			labels: {
				formatter: function () {
					return this.value;
				}
			}
		},
		tooltip: {
			crosshairs: true,
			shared: true,
			valueSuffix: '%'
		},
		plotOptions: {
			spline: {
				marker: {
					radius: 4,
					lineColor: '#666666',
					lineWidth: 1
				}
			}
		},
		credits: {
		  enabled: false
		},
		series: [{
			name: 'Posttest Result',
			marker: {
				symbol: 'square'
			},
			data: [<?php foreach($lineChart->result() as $row1){echo $row1->posttest.",";}?>]
	
		}, {
			name: 'Pretest Result',
			marker: {
				symbol: 'diamond'
			},
			data: [<?php foreach($lineChart->result() as $row1){echo $row1->pretest.",";}?>]
		}, {
			name: 'Variance',
			marker: {
				symbol: 'circle'
			},
			data: [<?php foreach($lineChart->result() as $row1){echo $row1->posttest - $row1->pretest.",";}?>]
		}]
	});


 
	
});
</script>