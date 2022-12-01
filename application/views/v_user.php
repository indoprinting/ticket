
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
									Data Users
								</h3>
								<div class="pull-right">
									<a href="<?php echo base_url(); ?>user/create" class="btn btn-warning" style="margin-right: 10px;">Add User</a>
								</div>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable dataTable-column_filter" data-column_filter_types="null,text,text,select,select,null">
									<thead>
									<tr>
										<th>No</th>
										<th>Username</th>
										<th>Name</th>
										<th>Department</th>
										<th>Role</th>
										<th>Option</th>
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
												<?php echo $row->username; ?>
											</td>
											<td>
												<?php echo $row->name; ?>
											</td>
											<td>
												<?php echo $row->department_name; ?>
											</td>
											<td>
												<?php echo $row->role_name; ?>
											</td>
											<td>
												<a href="<?php echo base_url().'user/edit/'.$row->id; ?>" class="btn" rel="tooltip" title="Edit">
													<i class="fa fa-edit"></i>
												</a>
												<a class="btn" rel="tooltip" title="Delete">
													<i class="fa fa-times"></i>
												</a>
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

	</script>
