
	<div class="container-fluid" id="content">
		<div id="main" style="margin-left: 0px;">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-sm-12">
						<div class="box box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>Create Ticket</h3>
							</div>
							<div class="box-content nopadding">
								<form action="<?php echo base_url(); ?>allticket/store" method="POST" class='form-horizontal form-column form-bordered form-validate'  id="bb" autocomplete="off" enctype="multipart/form-data">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Subject</label>
												<div class="col-sm-10">
													<select name="subject" id="subject" class='select2-me' style="width:80%;" data-rule-required="true" required> 
														<option value="">-- Select Subject --</option>
														<?php 
															foreach ($subject as $row) {
																echo '<option data-point="'.$row->point.'" data-part="'.$row->part.'" data-auto="'.$row->auto_close.'" data-counter="'.$row->need_counter.'" value="'.$row->name.'">'.$row->name.' ('.$row->point.')</option>';
															}
														?>
													</select>
													<input type="hidden" name="point" id="point">
													<input type="hidden" name="auto_close" id="auto_close">
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Assign to</label>
												<div class="col-sm-10">
													<select name="assign_id" id="assign_id" class='select2-me' style="width:80%;">
														<option value="">-- Select Assignment --</option>
														<?php 
															foreach ($assign as $row) {
																echo '<option data-dept="'.$row->department_id.'" value="'.$row->id.'">'.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Location</label>
												<div class="col-sm-10">
													<select name="division_id" id="division_id" class='select2-me' style="width:80%;" data-rule-required="true" required>
														<option value="">-- Select Location --</option>
														<?php 
															foreach ($department as $row) {
																$sel = '';
																if($this->session->deptID==$row->id){
																	$sel = 'selected';
																}
																echo '<option '.$sel.' value="'.$row->id.'">'.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Department</label>
												<div class="col-sm-10">
													<select name="department_id" id="department_id" class='select2-me' style="width:80%;" data-rule-required="true" required>
														<option value="">-- Select Department --</option>
														<?php 
															foreach ($department as $row) {
																$sel = '';
																if($this->session->deptID==$row->id){
																	$sel = 'selected';
																}
																echo '<option '.$sel.' value="'.$row->id.'">'.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Due Date</label>
												<div class="col-sm-10">
													<input type="text" class="date_input" id="datetimepicker" name="due_date" data-rule-required="true" required style="width:80%;">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Priority</label>
												<div class="col-sm-10">
													<select name="priority" id="priority" class='select2-me' style="width:80%;">
														<?php 
															foreach ($priority as $row) {
																echo '<option value="'.$row->id.'">'.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Equip code</label>
												<div class="col-sm-10">
													<select name="equip_code" id="equip_code" class='select2-me' style="width:80%;"><option value="">-- Select Equip Code --</option>
														<?php 
															foreach ($equipment as $row) {
																echo '<option value="'.$row->code.'">'.$row->code.' - '.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Part code</label>
												<div class="col-sm-10">
													<select name="part_code" id="part_code" class='select2-me' style="width:80%;"><option value="">-- Select Part Code --</option>
														<?php 
															foreach ($part as $row) {
																echo '<option value="'.$row->part_code.'">'.$row->part_code.' - '.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>

											<div class="form-group" id="counterdiv">
												<label for="textfield" class="control-label col-sm-2">Counter</label>
												<div class="col-sm-4" id="counterinput">
													<input type="number" class="form-control" name="counter" id="counter" style="width:80%;">
												</div>

												<label for="textfield" class="control-label col-sm-2">Qty Part</label>
												<div class="col-sm-4">
														<input type="text" class="form-control" name="part_qty" id="part_qty" style="width:47%;" data-rule-required="false">
												</div>
											</div>


											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Attachment</label>
												<div class="col-sm-10">
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="input-group" style="width:80%;">
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
															format : jpg, max 1MB
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- <div class="row"> -->
										<div class="col-sm-12" style="border-top: 1px solid #ddd;">
											
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-2">Description</label>
												<div class="col-sm-10">
													<textarea name="description" class='form-control' rows="5" data-rule-required="true" required></textarea>
												</div>
											</div>
											<div class="form-actions">
												<button type="submit" class="btn btn-primary">Save changes</button>
												<a href="<?php echo base_url(); ?>allticket"><button type="button" class="btn">Cancel</button></a>
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
		    var auto_close = $(this).find(':selected').data('auto');
		    var counter = $(this).find(':selected').data('counter');
		    var part = $(this).find(':selected').data('part');

		    $.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>allticket/subjPart/"+part,
				success: function(data) {
					$('#part_code').html(data);
   					$('#part_code').select2().trigger('change');
				}
			});

		    $('#point').val(point);
		    $('#auto_close').val(auto_close);

		    if(counter==1){
		    	$('#counter').attr('data-rule-required', 'true');
		    	$('#counter').attr('required', 'required');
		    } else {
		    	$('#counterinput').html('<input type="number" class="form-control" name="counter" id="counter" style="width:80%;">');
		    	$('#counterdiv').removeClass('has-success');
		    	$('#counterdiv').removeClass('has-error');
		    }


		});

		$('#assign_id').change(function(){
		    var dept = $(this).find(':selected').data('dept');
		    $('#department_id').val(dept);
   			$('#department_id').select2().trigger('change');
		});

		$('#division_id').change(function(){
		    var dept = $(this).val();
		    $.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>ticket/deptEquip/"+dept,
				success: function(data) {
					$('#equip_code').html(data);
   					$('#equip_code').select2().trigger('change');
				}
			});
		});

		<?php if($this->session->roles>10) { ?>
		$("#division_id").prop("disabled", true);
		<?php } ?>

		var tmr = new Date();
		tmr.setDate(tmr.getDate()+1);


		$('#datetimepicker').datetimepicker({
		    format: 'yyyy-mm-dd hh:00',
		    minView: 1,
		    autoclose: true,
		    startDate: tmr,
		    todayHighlight: true

		});

	</script>
