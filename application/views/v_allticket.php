
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
					<div class="col-sm-12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-table"></i>
									All Ticket Data
								</h3>
								<div class="pull-right">
									<a href="<?php echo base_url(); ?>allticket/create" class="create_btn">Create Ticket</a>
								</div>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<a href="<?php echo base_url(); ?>allticket/export" class="btn" style="margin-top: 10px; margin-left: 10px;">Excel</a>
								<table width="2050px" id="example" class="table table-hover table-nomargin dataTable-column_filter table-bordered">
									<thead>
									<tr class="dataTable-col_filter">
										<th>Filter</th>
										<th>
											<input data-index="1" placeholder="Search ">
										</th>
										<th>
											<input data-index="2" placeholder="Search ">
										</th>
										<th>
											<input data-index="3" placeholder="Search ">
										</th>
										<th>
											<input data-index="4" placeholder="Search ">
										</th>
										<th>
											<input data-index="5" placeholder="Search ">
										</th>
										<th>
											<select data-index="6">
												<option value="">All</option>
												<option>Low</option>
												<option>Medium</option>
												<option>High</option>	
											</select>
										</th>
										<th>
											<input data-index="7" placeholder="Search ">
										</th>
										<th>
											<input data-index="8" placeholder="Search ">
										</th>
										<th>
											<input data-index="9" placeholder="Search ">
										</th>
										<th>
											<select data-index="10">
												<option value="">All</option>
												<option>Open</option>
												<option>In Progress</option>
												<option>Done</option>
												<option>Close</option>
												<option>Cancel</option>
												<option>Re Open</option>
											</select>
										</th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
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
										<th>Point</th>
										<th>Done Date</th>
										<th>Rating</th>
										<th>Time Span</th>
										<th>Comment</th>
									</tr>
									</thead>
									<tbody>
										<?php
											$i=1;
											foreach ($data as $row) {
												$timeSpan = '-';
												if($row->close_date!='') {
													$datetime1 = new DateTime($row->created_date);
												    $datetime2 = new DateTime($row->done_date);
												    
												    $interval = $datetime1->diff($datetime2);
												    
													$timeSpan = $interval->format('%d Days <br>%h Hours');
												}
										?>
										<tr>
											<td>
												<?php echo $i; ?>
											</td>
											<td>
												<?php echo date('Y-m-d <\b\r>H:i', strtotime($row->created_date)); ?>
											</td>
											<td>
												<a href="<?php echo base_url().'allticket/edit/'.$row->id; ?>"><?php echo $row->subject; ?></a>
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
												<?php echo $row->point; ?>
											</td>
											<td>
												<?php if($row->done_date!='') echo date('Y-m-d <\b\r>H:i', strtotime($row->done_date)); ?>
											</td>
											<td>
												<?php echo $row->rating; ?>
											</td>
											<td>
												<?php echo $timeSpan; ?>
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
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
		    // DataTable
		    var table = $('#example').DataTable( {
		        scrollY:        "55vh",
		        scrollX:        true,
		        fixedColumns:   true,
		        columns: [
				    { "width": "55px" },
				    { "width": "95px" },
				    { "width": "200px" },
				    { "width": "300px" },
				    { "width": "150px" },
				    { "width": "150px" },
				    { "width": "90px" },
				    { "width": "100px" },
				    { "width": "150px" },
				    { "width": "150px" },
				    { "width": "90px" },
				    { "width": "90px" },
				    { "width": "55px" },
				    { "width": "95px" },
				    { "width": "55px" },
				    { "width": "95px" },
				    { "width": "130px" },
				  ]
		    } );
		 
		    // Filter event handler
		    $( table.table().container() ).on( 'keyup', '.dataTable-col_filter input', function () {
		        table
		            .column( $(this).data('index') )
		            .search( this.value )
		            .draw();
		    } );

		    $( table.table().container() ).on( 'change', '.dataTable-col_filter select', function () {
		        table
		            .column( $(this).data('index') )
		            .search( this.value )
		            .draw();
		    } );

		} ); 
	</script>
