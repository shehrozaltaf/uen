
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
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h5 style="font-size:13px; font-weight:bolder">Section 1: Evidence Based Practices for routine care and management of complications during labour, child birth and early post natal period as per guidelines</h5>
        
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="example1" width="100%">
                  <thead>
                  
                  
                  
                  <tr>
                    <th>S#</th>
                    <th width="45%">Indicator</th>
                    <th>Response</th>
                    <th>Reason if No</th>
                  </tr>
                  
                  </thead>
                  <tbody>
                  
                  
                  <tr>
                    <td>1.1</td>
                    <td>Routine assessment of every mother on admission, during labour and child birth and are given timely & appropriate care</td>
                    <td><?php if($hf->qa0101a == 0){echo "Not Available";} else if($hf->qa0101a == 1){echo "Yes";} else if($hf->qa0101a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0101b  === '0'){echo "NA";} else {echo $hf->qa0101b;}?></td>
                  </tr>
                  
                  <tr>
                    <td>1.2</td>
                    <td>Every Women / Newborn / Child have provide support to get immunized for their respective immunization plan as per Guideline</td>
                    <td><?php if($hf->qa0102a == 0){echo "Not Available";} else if($hf->qa0102a == 1){echo "Yes";} else if($hf->qa0102a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0102b  === '0'){echo "NA";} else {echo $hf->qa0102b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.3</td>
                    <td>Women with Pre Eclampsia / Eclampsia promptly receive appropriate intervention, as per guideline (IV Anticonvulsants and Anti-Hypertensive)</td>
                    <td><?php if($hf->qa0103a == 0){echo "Not Available";} else if($hf->qa0103a == 1){echo "Yes";} else if($hf->qa0103a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0103b  === '0'){echo "NA";} else {echo $hf->qa0103b;}?></td>
                  </tr>
                  
                  <tr>
                    <td>1.4</td>
                    <td>Women with Post-Partum Hemorrhages promptly receive appropriate intervention, as per guideline (Active Management of 3rd Stage of Labour through IV / Oral Uterotonics)</td>
                    <td><?php if($hf->qa0104a == 0){echo "Not Available";} else if($hf->qa0104a == 1){echo "Yes";} else if($hf->qa0104a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0104b  === '0'){echo "NA";} else {echo $hf->qa0104b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.5</td>
                    <td>Women with Prolong / Obstructed Labour promptly receive appropriate intervention, as per guideline (Available and Properly Filled Partograph)</td>
                    <td><?php if($hf->qa0105a == 0){echo "Not Available";} else if($hf->qa0105a == 1){echo "Yes";} else if($hf->qa0105a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0105b  === '0'){echo "NA";} else {echo $hf->qa0105b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.6</td>
                    <td>Women with Pre-Term Labour promptly receive appropriate intervention, as per guideline (IV Dexamethasone and Nifidipine)</td>
                    <td><?php if($hf->qa0106a == 0){echo "Not Available";} else if($hf->qa0106a == 1){echo "Yes";} else if($hf->qa0106a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0106b  === '0'){echo "NA";} else {echo $hf->qa0106b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.7</td>
                    <td>Women with or at risk of any infection during labour, child birth and early post natal period promptly receive appropriate intervention, as per guideline (IV Antibiotics)</td>
                    <td><?php if($hf->qa0107a == 0){echo "Not Available";} else if($hf->qa0107a == 1){echo "Yes";} else if($hf->qa0107a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0107b  === '0'){echo "NA";} else {echo $hf->qa0107b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.8</td>
                    <td>Newborns who are not breathing spontaneously receive resuscitation with bag & mask within one minute of birth (Implementation of HBB)</td>
                    <td><?php if($hf->qa0108a == 0){echo "Not Available";} else if($hf->qa0108a == 1){echo "Yes";} else if($hf->qa0108a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0108b  === '0'){echo "NA";} else {echo $hf->qa0108b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.9</td>
                    <td>Newborn with or at risk of any suspected infections (PSBI) promptly receive appropriate intervention, as per guideline</td>
                    <td><?php if($hf->qa0109a == 0){echo "Not Available";} else if($hf->qa0109a == 1){echo "Yes";} else if($hf->qa0109a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0109b  === '0'){echo "NA";} else {echo $hf->qa0109b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.10</td>
                    <td>Preterm & Small Babies receive appropriate care as per guidelines (Implementation of ECSB & ECEB Guidelines)</td>
                    <td><?php if($hf->qa0110a == 0){echo "Not Available";} else if($hf->qa0110a == 1){echo "Yes";} else if($hf->qa0110a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0110b  === '0'){echo "NA";} else {echo $hf->qa0110b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.11</td>
                    <td>Newborn receive routine care immediately after birth (Breast Feeding, CHX application and Immunization)</td>
                    <td><?php if($hf->qa0111a == 0){echo "Not Available";} else if($hf->qa0111a == 1){echo "Yes";} else if($hf->qa0111a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0111b  === '0'){echo "NA";} else {echo $hf->qa0111b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.12</td>
                    <td>Mother and Newborn receive routine post natal care (Maternal & Neonatal Danger Signs in Post Natal Period)</td>
                    <td><?php if($hf->qa0112a == 0){echo "Not Available";} else if($hf->qa0112a == 1){echo "Yes";} else if($hf->qa0112a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0112b  === '0'){echo "NA";} else {echo $hf->qa0112b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.13</td>
                    <td>Child presenting with Cough or difficult breathing promptly receive appropriate intervention, as per IMNCI guideline (Use of ARI Timer, Pulse Oximeter & Amoxil DT)</td>
                    <td><?php if($hf->qa0113a == 0){echo "Not Available";} else if($hf->qa0113a == 1){echo "Yes";} else if($hf->qa0113a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0113b  === '0'){echo "NA";} else {echo $hf->qa0113b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.14</td>
                    <td>Child presenting with diarrhea promptly receive appropriate intervention, as per IMNCI guideline (Use of Zinc DT, Lo-ORS)</td>
                    <td><?php if($hf->qa0114a == 0){echo "Not Available";} else if($hf->qa0114a == 1){echo "Yes";} else if($hf->qa0114a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0114b  === '0'){echo "NA";} else {echo $hf->qa0114b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.15</td>
                    <td>Child presenting with Possible serious bacterial infections promptly receive appropriate intervention, as per IMNCI guideline</td>
                    <td><?php if($hf->qa0115a == 0){echo "Not Available";} else if($hf->qa0115a == 1){echo "Yes";} else if($hf->qa0115a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0115b  === '0'){echo "NA";} else {echo $hf->qa0115b;}?></td>
                  </tr>
                  
                  
                  <tr>
                    <td>1.16</td>
                    <td>The Health Care Provider and Skilled Birth Attendant in respective facility receive In-Service Training on Updated Intervention / Guidelines</td>
                    <td><?php if($hf->qa0116a == 0){echo "Not Available";} else if($hf->qa0116a == 1){echo "Yes";} else if($hf->qa0116a == 2){echo "No";}?></td>
                    <td><?php if($hf->qa0116b === '0'){echo "NA";} else {echo $hf->qa0116b;}?></td>
                  </tr>
                  
                  
                  </tbody>
                  
                  <tfoot>
                  	<tr>
                    <th colspan="4"><div class="callout callout-info"><p style="font-weight:bolder">Action Plan: <?php echo $hf->qa01Ap;?></p></div></th>
                  </tr>
                  
                  </tfoot>
                  
                  
                </table>
              </div>
              <!-- /.table-responsive -->
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
	  pageLength: 100,
	  //responsive: true,
	});
});
</script>