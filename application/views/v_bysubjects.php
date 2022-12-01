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
				  
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4">
					
						
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>
									<span id="judul">Report Ticket By Subjects</span>
								</h3>
							</div>
						<div class="box-content">
							<form action="<?php echo base_url(); ?>ticket/reportbySubject" method="POST" class='form-horizontal form-validate' id="bb">
								<div class="form-group">
								         <label for="textfield" class="control-label col-sm-2">Begin Date</label>
									     <div class="col-sm-4">
										     <input type="text" class="date_input" id="datetimepicker" name="begin_date" data-rule-required="true" required style="width:80%;">
									     </div>
								    
								         <label for="textfield" class="control-label col-sm-2">End Date</label>
									     <div class="col-sm-4">
										     <input type="text" class="date_input" id="datetimepicker" name="end_date" data-rule-required="true" required style="width:80%;">
									     </div>
								</div>
								<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Subject</label>
											<div class="col-sm-10">
													<select name="subject" id="subject" class='select2-me' style="width:93%;" data-rule-required="true" required> 
														<option value="">-- Select Subject --</option>
														<?php 
															foreach ($subject as $row) {
																echo '<option value="'.$row->name.'">'.$row->name.' ('.$row->point.')</option>';
															}
														?>
													</select>
											</div>
								</div>
								<div class="col-sm-12">
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" id="btn-submit" value="Search">
										<button onclick="cancel_btn()" type="button" class="btn">Cancel</button>
									</div>
								</div>
							</form>
				
						</div>	

						</div>	
					</div>
					<div class="col-sm-4">
					</div>
						
					
					<div class="col-sm-12">	
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-table"></i>
									Report
								</h3>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable">
									<thead>
									<tr>
										<th>No.</th>
										<th>Created Date</th>
										<th>Ticket Subject</th>
										<th>Ticket Description</th>
										<th>Department</th>
										<th>Assigned to</th>
										<th>Priority</th>
										<th>Due Date</th>
										<th>Created by</th>
										<th>Location</th>
										<th>Status</th>
										<th>Eqp Code</th>
										<th>Eqp Name</th>
										<th>Part Code</th>
										<th>Part Name</th>
										<th>Counter</th>
										<th>Part Qty</th>
										<th>Point</th>
										<th>Done Date</th>
										<th>Rating</th>
										
										<th>Comment</th>
										
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
												<?php echo date('Y-m-d <\b\r>H:i', strtotime($row->created_date)); ?>
											</td>
											<td>
												<?php echo $row->subject; ?></a>
											</td>
											<td>
												<?php echo $row->description; ?>
											</td>
											<td>
												<?php echo $row->department_name; ?>
											</td>
											<td>
												<?php echo $row->assigned_name; ?>
											</td>
											<td>
												<?php echo $row->priority_name; ?>
											</td>
											<td>
												<?php echo date('Y-m-d <\b\r>H:i', strtotime($row->due_date)); ?>
											</td>
											<td>
												<?php echo $row->created_name; ?>
											</td>
											<td>
												<?php echo $row->location_name; ?>
											</td>
											<td>
												<?php echo $row->status_name; ?>
											</td>
											<td>
												<?php echo $row->equip_code; ?>
											</td>
											<td>
												<?php echo $row->equip_name; ?>
											</td>
											<td>
												<?php echo $row->part_code; ?>
											</td>
											<td>
												<?php echo $row->part_name; ?>
											</td>
											<td>
												<?php echo $row->counter; ?>
											</td>
											<td>
												<?php echo $row->part_qty; ?>
											</td>

											<td>
												<?php echo $row->point; ?>
											</td>
											<td>
												<?php if($row->done_date!='') echo date('Y-m-d <\b\r>H:i', strtotime($row->done_date)); ?>
											</td>
											<td>
												<?php echo $row->rating; ?>
											</td>
											
											<td>
												<?php echo $row->notes; ?>
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
	<script type="text/javascript">
		function cancel_btn() {
			$("#bb").attr('action', '<?php echo base_url(); ?>ticket/reportbySubject');
		    $("#judul").html("Report By Subjects");
		    $("#btn-submit").val("Search");
			document.getElementById("bb").reset();
			
		}

		$('.date_input').datetimepicker({
		    format: 'yyyy-mm-dd',
		    minView: 2,
		    autoclose: true
		});
	</script>