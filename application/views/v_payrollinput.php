	<div class="container-fluid" id="content">
		<div id="main" style="margin-left: 0px;">
			<div class="container-fluid">
				<?php if($this->session->flashdata('message')!='') { ?>
				<div class="alert alert-<?php echo $this->session->flashdata('status'); ?> alert-dismissable" style="margin-top: 20px; margin-bottom: 0px; text-align: center;">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php } ?>
				<div class="row">
					<!-- code here -->
					<div class="col-sm-7">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-table"></i>
									Payroll Sheet
								</h3>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable dataTable-scroll-x" >
									<thead>
									<tr>
										<th>No</th>
										<th>Option</th>
										<th>Pin ID</th>
										<th>Nama</th>
										<th>Job Title</th>
										<th>Division</th>
										<th>Company</th>
										<th>Reward Poin (Rp)</th>	
										<th>Penalty Task (Rp)</th>
										<th>Absen (day)</th>		
										<th>Absen (Rp)</th>	
										<th>Late (Qty)</th>	
										<th>Penalty (Rp)</th>		
										<th>Violation (Qty)</th>	
										<th>Penalty (Rp)</th>
										<th>Overtime (Hour)</th>					
										<th>Overtime (Rp)</th>																						   
										<th>Bonus TL (Rp)</th>				
										<th>Design Fee (Rp)</th>
										<th>POD Counter (Rp)</th>						
										<th>POD Paper (Rp)</th>						
										<th>DPI Waste (Rp)</th>		
										<th>Penalty DP (Rp)</th>				
										<th>Penalty RS (Rp)</th>				
										<th>Dept (Rp)</th>						
										
									</tr>
									</thead>
									<tbody>
										<?php
											$i=1;
											foreach ($data as $row) {
										?>
										<tr>
											<td>
												<?php echo $i; ?>
											</td>
												<td>
												<button data-id="<?php echo $row->id; ?>" 
													data-basic="<?php echo $row->basic; ?>"
													data-allowance="<?php echo $row->allowance; ?>"
													data-pulsa="<?php echo $row->pulsa; ?>"
													data-bpjs="<?php echo $row->bpjs; ?>"
													data-hari_kerja="<?php echo $row->hari_kerja; ?>"
													data-penalty="<?php echo $row->penalty; ?>"
													data-absent_qty="<?php echo $row->absent_qty; ?>"
													data-absent_rp="<?php echo $row->absent_rp; ?>"
													data-late_qty="<?php echo $row->late_qty; ?>" 
													data-late_rp="<?php echo $row->late_rp; ?>" 
													data-violation_qty="<?php echo $row->violation_qty; ?>" 
													data-violation_rp="<?php echo $row->violation_rp; ?>" 
													data-overtime_qty="<?php echo $row->overtime_qty; ?>" 
													data-overtime_rp="<?php echo $row->overtime_rp; ?>" 
													data-reward_poin="<?php echo $row->reward_poin; ?>" 
													data-penalty_poin="<?php echo $row->penalty_poin; ?>"
													data-bonus="<?php echo $row->bonus; ?>" 
													data-design="<?php echo $row->design; ?>" 
													data-counter="<?php echo $row->counter; ?>" 
													data-paper="<?php echo $row->paper; ?>" 
													data-waste="<?php echo $row->waste; ?>"
													data-dp="<?php echo $row->dp; ?>"
													data-rs="<?php echo $row->rs; ?>"
													data-debt="<?php echo $row->debt; ?>"
													data-total="<?php echo $row->total; ?>"
													class="btn edit-btn" rel="tooltip" title="Input Payroll">
													<i class="fa fa-edit"></i>
												</button>
						
											</td>
											<td>
												<?php echo $row->pin; ?>
											</td>
											<td>
												<?php echo $row->nama; ?>
											</td>
											<td>
												<?php echo $row->job_title; ?>
											</td>
											<td>
												<?php echo $row->div_name; ?>
											</td>
											<td>
												<?php echo $row->company; ?>
											</td>
											<td>
												<?php echo number_format($row->reward_poin,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->penalty_poin,0,",","."); ?>
											</td>
											<td>
												<?php echo $row->absent_qty; ?>  
											</td>
											<td>
												<?php echo number_format($row->absent_rp,0,",","."); ?>
											</td>
											<td>
												<?php echo $row->late_qty; ?>
											</td>
											<td>
												<?php echo number_format($row->late_rp,0,",","."); ?>
											</td>
											<td>
												<?php echo $row->violation_qty; ?>
											</td>
											<td>
												<?php echo number_format($row->violation_rp,0,",","."); ?>
											</td>
											<td>
												<?php echo $row->overtime_qty; ?>
											</td>
											<td>
												<?php echo number_format($row->overtime_rp,0,",","."); ?>
											</td>
											
											
											<td>
												<?php echo number_format($row->bonus,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->design,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->counter,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->paper,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->waste,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->dp,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->rs,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->debt,0,",","."); ?>
											</td>

										</tr>
										<?php
											$i++; }
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-sm-5" style="display: none;" id="hilangkan">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>
									<span id="judul">Input Payroll</span>
								</h3>
							</div>
							
							<div class="box-content">
								<form action="<?php echo base_url(); ?>payroll/editpayroll" method="POST" class='form-horizontal form-validate' id="bb">
							<div class="col-sm-12">
									<div class="form-group">
									  <div class="box box-color box-bordered orange">
									     <div class="box-title">
										      <p style="height: 6px;">
										      	<i class="fa fa-table"></i>
											    Input By HRO
										      <p>					        
									    </div>
									  </div>
									</div>
							</div>

								<div class="col-sm-4">
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-4">Absen</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="absent_qty" id="absent_qty" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">Late</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="late_qty" id="late_qty" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>
									
								<div class="col-sm-4">	
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">Violation</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="violation_qty" id="violation_qty" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>

								<div class="col-sm-4">	
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">Overtime</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="overtime_qty" id="overtime_qty" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>


								<div class="col-sm-12">
								    <div class="form-group">
									  <div class="box box-color box-bordered orange">
									     <div class="box-title">
										      <p style="height: 6px;">
										      	<i class="fa fa-table"></i>
											    Input By Manager
										      <p>					        
									    </div>
									  </div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-2">Bonus TL</label>
										<div class="col-sm-10">
											<input type="text" class="form-control hitung" name="bonus" id="bonus" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-2">Design Fee</label>
										<div class="col-sm-10">
											<input type="text" class="form-control hitung" name="design" id="design" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>


								<div class="col-sm-12">
								    <div class="form-group">
									  <div class="box box-color box-bordered orange">
									     <div class="box-title">
										      <p style="height: 6px;">
										      	<i class="fa fa-table"></i>
											    Input By Internal Control
										      <p>					        
									    </div>
									  </div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">POD Counter</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="counter" id="counter" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">POD Paper</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="paper" id="paper" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">DPI Waste</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="waste" id="waste" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>


								<div class="col-sm-12">
									<div class="form-group">
									  <div class="box box-color box-bordered orange">
									     <div class="box-title">
										      <p style="height: 6px;">
										      	<i class="fa fa-table"></i>
											    Input By AR
										      <p>					        
									    </div>
									  </div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">Penalty DP</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="dp" id="dp" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">Penalty RS</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="rs" id="rs" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>	

								<div class="col-sm-4">
									<div class="form-group">	
										<label for="textfield" class="control-label col-sm-4">Debt</label>
										<div class="col-sm-8">
											<input type="text" class="form-control hitung" name="debt" id="debt" style="width:80%;" data-rule-required="false">
										</div>
									</div>
								</div>

							
								<input type="hidden" class="form-control" name="basic" id="basic" style="width:80%;"  data-rule-required="false">
								<input type="hidden" class="form-control" name="allowance" id="allowance" style="width:80%;" data-rule-required="false">
								<input type="hidden" class="form-control" name="pulsa" id="pulsa" style="width:80%;"  data-rule-required="false">
								<input type="hidden" class="form-control" name="bpjs" id="bpjs" style="width:80%;" data-rule-required="false">
								<input type="hidden" class="form-control" name="hari_kerja" id="hari_kerja" style="width:80%;" data-rule-required="false">
								<input type="hidden" class="form-control" name="penalty" id="penalty" style="width:80%;"  data-rule-required="false">
								<input type="hidden" class="form-control" name="absent_rp" id="absent_rp" style="width:80%;"  data-rule-required="false">
								<input type="hidden" class="form-control" name="late_rp" id="late_rp" style="width:80%;" data-rule-required="false">
								<input type="hidden" class="form-control" name="violation_rp" id="violation_rp" style="width:80%;"  data-rule-required="false">
								<input type="hidden" class="form-control" name="overtime_rp" id="overtime_rp" style="width:80%;" data-rule-required="false">
								<input type="hidden" class="form-control" name="reward_poin" id="reward_poin" style="width:80%;" data-rule-required="false">
								<input type="hidden" class="form-control" name="penalty_poin" id="penalty_poin" style="width:80%;" data-rule-required="false">
								<input type="hidden" class="form-control" name="total" id="total" style="width:80%;" data-rule-required="false">

								<div class="col-sm-12">
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" id="btn-submit" value="Simpan">
										<button onclick="cancel_btn()" type="button" class="btn">Cancel</button>
									</div>
								</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function cancel_btn() {
			$("#bb").attr('action', '<?php echo base_url(); ?>payroll/editpayroll');
		    $("#judul").html("Input Payroll");
		    $("#btn-submit").val("Save");
			document.getElementById("bb").reset();
			$("#hilangkan").hide();
		}

		$('.hitung').change(function(){
			var basic = $("#basic").val();
			var allowance = $("#allowance").val();
			var pulsa = $("#pulsa").val();
			var bpjs = $("#bpjs").val();
			var hari_kerja = $("#hari_kerja").val();
			var absent_qty = $("#absent_qty").val();
			var penalty = $("#penalty").val();
			var late_qty = $("#late_qty").val();
			var overtime_qty = $("#overtime_qty").val();
			var violation_qty = $("#violation_qty").val();
			var reward_poin = $("#reward_poin").val();
			var penalty_poin = $("#penalty_poin").val();

			var bonus = $("#bonus").val();
			var design = $("#design").val();
			var counter = $("#counter").val();
			var paper = $("#paper").val();
			var waste = $("#waste").val();
			var dp = $("#dp").val();
			var rs = $("#rs").val();
			var debt = $("#debt").val();



		
			var absent_rp = parseInt(absent_qty) * ((parseInt(basic)+parseInt(allowance))/parseInt(hari_kerja));
			var overtime_rp = parseInt(overtime_qty) * (parseInt(basic)/parseInt(hari_kerja));
			var late_rp = parseInt(late_qty) * parseInt(penalty);
			var violation_rp = parseInt(violation_qty) * parseInt(penalty);
			

            var total = parseInt(basic)+parseInt(allowance)+parseInt(pulsa)+parseInt(bpjs)+parseInt(absent_rp)+parseInt(late_rp)+
            parseInt(violation_rp)+parseInt(overtime_rp)+parseInt(reward_poin)+parseInt(penalty_poin)+parseInt(bonus)+parseInt(design)+
            parseInt(counter)+parseInt(paper)+parseInt(waste)+parseInt(dp)+parseInt(rs)+parseInt(debt); 
       //     var total = parseInt(basic)+parseInt(allowance)+parseInt(pulsa)-parseInt(bpjs)+parseInt(absent_rp)+parseInt(late_rp)+
         //  parseInt(violation_rp)+parseInt(overtime_rp)+parseInt(report_rp)+parseInt(paper)+parseInt(waste);
            //parseInt(paper)+parseInt(waste)+parseInt(dp)+parseInt(rs)+parseInt(dept); 

			$("#absent_rp").val(absent_rp);
			$("#overtime_rp").val(overtime_rp);
			$("#late_rp").val(late_rp);
			$("#violation_rp").val(violation_rp);
			$("#report_rp").val(report_rp);
			$("#total").val(total);
		});




		$('.edit-btn').click(function(){
			$("#hilangkan").show();
			var id = $(this).data('id');
			var basic = $(this).data('basic');
			var allowance = $(this).data('allowance');
			var pulsa = $(this).data('pulsa');
			var bpjs = $(this).data('bpjs');
			var hari_kerja = $(this).data('hari_kerja');
			var penalty = $(this).data('penalty');
		    var absent_qty = $(this).data('absent_qty');
		    var absent_rp = $(this).data('absent_rp');
		    var late_qty = $(this).data('late_qty');
		    var late_rp = $(this).data('late_rp');
			var violation_qty = $(this).data('violation_qty');
			var violation_rp = $(this).data('violation_rp');
			var overtime_qty = $(this).data('overtime_qty');
			var overtime_rp = $(this).data('overtime_rp');
		    var reward_poin = $(this).data('reward_poin');
		    var penalty_poin = $(this).data('penalty_poin');
		    var bonus = $(this).data('bonus');
			var design = $(this).data('design');
			var counter = $(this).data('counter');
			var paper = $(this).data('paper');
			var waste = $(this).data('waste');
		    var dp = $(this).data('dp');
		    var rs = $(this).data('rs');
			var debt = $(this).data('debt');
			var total = $(this).data('total');
			
			
		   
		   

		    $("#bb").attr('action', '<?php echo base_url(); ?>payroll/editpayroll/'+id);
		    $("#judul").html("Input Payroll");
		   
		    $("#basic").val(basic);
			$("#allowance").val(allowance);
			$("#pulsa").val(pulsa);
			$("#bpjs").val(bpjs);
			$("#hari_kerja").val(hari_kerja);
			$("#penalty").val(penalty);
			$("#absent_qty").val(absent_qty);
			$("#late_qty").val(late_qty);
			$("#violation_qty").val(violation_qty);
			
			$("#overtime_qty").val(overtime_qty);
			$("#reward_poin").val(reward_poin);
			$("#penalty_poin").val(penalty_poin);
			$("#bonus").val(bonus);
			$("#design").val(design);
			$("#counter").val(counter);
			$("#paper").val(paper);
			$("#waste").val(waste);
			$("#dp").val(dp);
			$("#rs").val(rs);
			$("#debt").val(debt);
			
			

		    $("#btn-submit").val("Save");
		});
	</script>
