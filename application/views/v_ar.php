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
									<span id="judul">Upload by AR</span>
								</h3>
							</div>

							<div class="box-content">
								<form action="<?php echo base_url(); ?>payroll/addar" method="POST" class='form-validate'  id="bb" autocomplete="off" enctype="multipart/form-data">
							
									<div class="col-sm-12">
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-3">Attachment</label>
												<div class="col-sm-9">
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="input-group" style="width:90%;">
															<div class="form-control" data-trigger="fileinput" style="overflow: hidden; text-overflow: ellipsis;">
																<!-- <i class="glyphicon glyphicon-file fileinput-exists"></i> -->
																<span class="fileinput-filename"></span>
															</div>
															<span class="input-group-addon btn btn-default btn-file">
																<span class="fileinput-new">Select file</span>
															<span class="fileinput-exists">Change</span>
															<input type="file" name="attachment">
															</span>
															<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
														</div>
														<span class="help-block">
															format : Xlsx
														</span>
													</div>
												</div>
											</div>
									</div>


								    <div class="col-sm-12">
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" id="btn-submit" value="Upload">
										<button onclick="cancel_btn()" type="button" class="btn">Cancel</button>
										<a href="<?php echo base_url().'payroll/downloadar' ?>">Download format Form Upload</a> 
										
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
									Upload AR
								</h3>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable">
									<thead>
									<tr>
										<th>No</th>
										<th>Date</th>
										<th>PIN</th>
										<th>Employee Name</th>
										<th>DP</th>
										<th>RS</th>
										<th>Debt</th>
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
												<?php echo $row->date_trans; ?>
											</td>
											<td>
												<?php echo $row->pin; ?>
											</td>
											<td>
												<?php echo $row->nama; ?>
											</td>

											<td>
												<?php echo number_format($row->dp,0,",","."); ?>

											</td>

											<td>
												<?php echo number_format($row->rs,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format( $row->debt,0,",","."); ?>
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
		function cancel_btn() {
			$("#bb").attr('action', '<?php echo base_url(); ?>payroll/ar');
		    $("#judul").html("Upload by AR");
		    $("#btn-submit").val("Upload");
			document.getElementById("bb").reset();
		}

	

		
	</script>