
	<div class="container-fluid" id="content">
		<div id="main" style="margin-left: 0px;">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>Add User</h3>
							</div>
							<div class="box-content nopadding">
								<form action="<?php echo base_url(); ?>ticket/store" method="POST" class='form-horizontal form-column form-bordered form-validate'  id="bb">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Subject</label>
												<div class="col-sm-10">
													<input type="text" name="oldpass" id="oldpass" class="form-control" data-rule-required="true" data-rule-minlength="2">
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Department</label>
												<div class="col-sm-10">
													<select name="department_id" id="department_id" class='select2-me' style="width:80%;" data-rule-required="true" required>
														<option value="">-- Select Department --</option>
														<?php 
															foreach ($department as $row) {
																echo '<option value="'.$row->id.'">'.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Division</label>
												<div class="col-sm-10">
													<input type="text" name="oldpass" id="oldpass" class="form-control" data-rule-required="true" data-rule-minlength="2">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Subject</label>
												<div class="col-sm-10">
													<input type="text" name="oldpass" id="oldpass" class="form-control" data-rule-required="true" data-rule-minlength="2">
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Department</label>
												<div class="col-sm-10">
													<select name="department_id" id="department_id" class='select2-me' style="width:80%;" data-rule-required="true" required>
														<option value="">-- Select Department --</option>
														<?php 
															foreach ($department as $row) {
																echo '<option value="'.$row->id.'">'.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Division</label>
												<div class="col-sm-10">
													<input type="text" name="oldpass" id="oldpass" class="form-control" data-rule-required="true" data-rule-minlength="2">
												</div>
											</div>
										</div>
									</div>
									<!-- <div class="row"> -->
									<div class="col-sm-12" style="border-top: 1px solid #ddd;">
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save changes</button>
											<a href="<?php echo base_url(); ?>ticket"><button type="button" class="btn">Cancel</button></a>
										</div>
									</div>
									<!-- </div> -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#subject').change(function(){
		    var point = $(this).find(':selected').data('point');
		    $('#point').val(point);
		});
	</script>
