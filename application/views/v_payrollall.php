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
					<div class="col-sm-12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-table"></i>
									All Payroll
								</h3>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable dataTable-scroll-x" >
									<thead>
									<tr>
										<th>No</th>
										<th>Begin Date</th>
										<th>End Date</th>
										<th>Pin ID</th>
										<th>Nama</th>
										<th>Job Title</th>
										<th>Division</th>
										<th>Company</th>
										<th>Bank Account</th>
										<th>Total Salary</th>
										<th>Basic</th>
										<th>Allowance</th>						
										<th>Pulsa</th>						
										<th>BPJS</th>
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
												<?php echo $row->begin_date; ?>
											</td>

											<td>
												<?php echo $row->end_date; ?>
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
												<?php echo $row->norek; ?>
											</td>

											<td>
												<?php echo number_format($row->total,0,",","."); ?>
											</td>

											<td>
												<?php echo number_format($row->basic,0,",","."); ?>
											</td>

											<td>
												<?php echo number_format($row->allowance,0,",","."); ?>
											</td>

											<td>
												<?php echo number_format($row->pulsa,0,",","."); ?>
											</td>

											<td>
												<?php echo number_format($row->bpjs,0,",","."); ?>
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
					
				</div>
			</div>
		</div>
	</div>
