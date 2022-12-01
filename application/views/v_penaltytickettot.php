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
									Total Ticket Penalty Over Due Date 
								</h3>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable dataTable-scroll-x" >
									<thead>
									<tr>
										<th>No</th>
										<th>Pin ID</th>
										<th>Name</th>
										<th>Jml Ticket</th>
										<th>Penalty</th>
										<th>Total Penalty</th>					
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
												<?php echo $row->pin; ?>
											</td>

											<td>
												<?php echo $row->name; ?>
											</td>

											<td>
												<?php echo $row->ttl_ticket; ?>
											</td>

											<td>
												<?php echo number_format($row->penalty,0,",","."); ?>
											</td>

											<td>
												<?php echo number_format($row->total,0,",","."); ?>
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
