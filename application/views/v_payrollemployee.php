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
									Employee Data
								</h3>

							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable dataTable-scroll-x" >
									<thead>
									<tr>
										<th>No</th>
										<th>Option</th>
										<th>Pin</th>
										<th>Name</th>
										<th>Job Title</th>		
										<th>Division</th>	
										<th>Company</th>	
										<th>Hire Date</th>		
										<th>Bank Account</th>	
										<th>Phone / WA Number</th>
										<th>Birth Date</th>					
										<th>Gender</th>																				     <th>Marriage Status</th>	
										<th>KTP No</th>
										<th>Address</th>				
										<th>Basic</th>
										<th>Allowance</th>						
										<th>Pulsa</th>						
										<th>BPJS</th>		
										<th>Day Work</th>				
										<th>Penalty</th>				
																
										
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
												<button
												    data-id="<?php echo $row->id; ?>"
													data-pin="<?php echo $row->pin; ?>"
													data-nama="<?php echo $row->nama; ?>"
													data-job_title="<?php echo $row->job_title; ?>"
													data-div_name="<?php echo $row->div_name; ?>"
													data-company="<?php echo $row->company; ?>"
													data-basic="<?php echo $row->basic; ?>"
													data-allowance="<?php echo $row->allowance; ?>"
													data-bpjs="<?php echo $row->bpjs; ?>"
													data-pulsa="<?php echo $row->pulsa; ?>"
													data-hire_date="<?php echo $row->hire_date; ?>"
													data-norek="<?php echo $row->norek; ?>"
													data-whatsapp="<?php echo $row->whatsapp; ?>"
													data-birth_date="<?php echo $row->birth_date; ?>"
													data-gender="<?php echo $row->gender; ?>" 
													data-marriage="<?php echo $row->marriage; ?>" 
													data-ktp="<?php echo $row->ktp; ?>" 
													data-addr="<?php echo $row->addr; ?>" 
													data-daywork="<?php echo $row->daywork; ?>" 
													data-penalty="<?php echo $row->penalty; ?>" 
													
													class="btn edit-btn" rel="tooltip" title="Edit Employee">
													<i class="fa fa-edit"></i>
												</button>
												<a href="<?php echo base_url(); ?>payroll/deleteemployee/<?php echo $row->id; ?>" onclick="return confirm('are you sure you want to delete this?');" class="btn" rel="tooltip" title="Delete">
													<i class="fa fa-times"></i>
												</a>
						
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
												<?php echo  $row->hire_date; ?>
											</td>
											<td>
												<?php echo $row->norek; ?>
											</td>
											<td>
												<?php echo $row->whatsapp; ?>
											</td>
											<td>
												<?php echo $row->birth_date; ?>
											</td>
											<td>
												<?php echo $row->gender; ?>
											</td>
											<td>
												<?php echo $row->marriage ?>
											</td>
											<td>
												<?php echo $row->ktp; ?>
											</td>
											<td>
												<?php echo $row->addr; ?>
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
												<?php echo number_format($row->daywork,0,",","."); ?>
											</td>
											<td>
												<?php echo number_format($row->penalty,0,",","."); ?>
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
					<div class="col-sm-5">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>
									<span id="judul">Create New</span>
								</h3>
								
								<div class="pull-right" style="margin-right: 5px;">
									<a href="<?php echo base_url(); ?>payroll/up_employee" class="btn">Upload Data Employee</a>
								</div>

							</div>
							
							<div class="box-content">
								<form action="<?php echo base_url(); ?>payroll/addemployee" method="POST" class='form-horizontal form-validate' id="bb">

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Pin</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="pin" id="pin" style="width:80%;" data-rule-required="true">
										</div>
								</div>
					
							    <div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="nama" id="nama" style="width:80%;" data-rule-required="true">
										</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Job title</label>
										<div class="col-sm-10">
											<select name="job_title" id="job_title" class='select2-me' style="width:80%;" data-rule-required="true" required> 
												<option value="">-- Select Job Title --</option>
													<?php 
													
														foreach ($jobnya as $row) {
														echo '<option value="'.$row->job_title.'">'.$row->job_title.'</option>';
														}
													?>
											</select>
									</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Divisions</label>
										<div class="col-sm-10">
											<select name="div_name" id="div_name" class='select2-me' style="width:80%;" data-rule-required="true" required> 
												<option value="">-- Select Division --</option>
													<?php 
													
														foreach ($bagian as $row) {
														echo '<option value="'.$row->name.'">'.$row->name.'</option>';
														}
													?>
											</select>
									</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Company</label>
										<div class="col-sm-10">
											<select name="company" id="company" class='select2-me' style="width:80%;" data-rule-required="true" required> 
												<option value="">-- Select Company --</option>
													<?php 
													
														foreach ($compnya as $row) {
														echo '<option value="'.$row->comp_name.'">'.$row->comp_name.'</option>';
														}
													?>
											</select>
									</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Hire Date</label>
									<div class="col-sm-10">
										<input type="text" class="date_input" id="hire_date" name="hire_date" data-rule-required="false" required style="width:80%;">
									</div>
								</div>

								
							    <div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Bank Account</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="norek" id="norek" style="width:80%;" data-rule-required="false">
										</div>
								</div>
								
								
							    <div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Phone / WA</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="whatsapp" id="whatsapp" style="width:80%;" data-rule-required="false">
										</div>
								</div>
							

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Birth Date</label>
									<div class="col-sm-10">
										<input type="text" class="date_input" id="birth_date" name="birth_date" data-rule-required="false" required style="width:80%;">
									</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Gender</label>
										<div class="col-sm-10">
											<select name="gender" id="gender" class='select2-me' style="width:80%;" data-rule-required="true" required>
												<option value="">-- Select Gender --</option>
												<option value="L">L (Laki - Laki)</option>
												<option value="P">P (Perempuan)</option>
											</select>
									</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Merriage Status</label>
										<div class="col-sm-10">
											<select name="marriage" id="marriage" class='select2-me' style="width:80%;" data-rule-required="true" required>
												<option value="">-- Select Status --</option>
												<option value="Single">Single</option>
												<option value="Married">Married</option>
											</select>
									</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">KTP No</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="ktp" id="ktp" style="width:80%;" data-rule-required="false">
										</div>
								</div>


								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Address</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="addr" id="addr" style="width:80%;" data-rule-required="false">
										</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Day Work</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="daywork" id="daywork" style="width:80%;" data-rule-required="false">
										</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Penalty</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="penalty" id="penalty" style="width:80%;" data-rule-required="false">
										</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Basic</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="basic" id="basic" style="width:80%;" data-rule-required="false">
										</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Allowance</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="allowance" id="allowance" style="width:80%;" data-rule-required="false">
										</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Pulsa</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="pulsa" id="pulsa" style="width:80%;" data-rule-required="false">
										</div>
								</div>


								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">BPJS</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="bpjs" id="bpjs" style="width:80%;" data-rule-required="false">
										</div>
								</div>								

								<div class="col-sm-12">
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" id="btn-submit" value="Create">
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
			$("#bb").attr('action', '<?php echo base_url(); ?>payroll/addemployee');
		    $("#judul").html("Create New");
		    $("#btn-submit").val("Create");
			document.getElementById("bb").reset();
			
		}

 	
		$('.edit-btn').click(function(){
			
			var id = $(this).data('id');
			var pin = $(this).data('pin');
			var nama = $(this).data('nama');
		    var job_title = $(this).data('job_title');
		    var div_name = $(this).data('div_name');
			var company = $(this).data('company');
			var basic = $(this).data('basic');
			var allowance = $(this).data('allowance');
			var bpjs = $(this).data('bpjs');
			var pulsa = $(this).data('pulsa');
			var hire_date = $(this).data('hire_date');
			var norek = $(this).data('norek');
		    var whatsapp = $(this).data('whatsapp');
		    var birth_date = $(this).data('birth_date');
		    var gender = $(this).data('gender');
		    var marriage = $(this).data('marriage');
			var ktp = $(this).data('ktp');
			var addr = $(this).data('addr');
			var daywork = $(this).data('daywork');
			var penalty = $(this).data('penalty');
		    
	   

		    $("#bb").attr('action', '<?php echo base_url(); ?>payroll/editemployee/'+id);
		    $("#judul").html("Edit Employee");

		   
			$("#pin").val(pin);
			$("#nama").val(nama);
			$("#job_title").val(job_title);
			$('#job_title').select2().trigger('change');
			$("#div_name").val(div_name);
			$('#div_name').select2().trigger('change');
			$("#company").val(company);
			$('#company').select2().trigger('change');
		    $("#basic").val(basic);
			$("#allowance").val(allowance);
			$("#bpjs").val(bpjs);
			$("#pulsa").val(pulsa);
			$("#hire_date").val(hire_date);
			$("#norek").val(norek);
			$("#whatsapp").val(whatsapp);
			$("#birth_date").val(birth_date);
			$("#gender").val(gender);
			$('#gender').select2().trigger('change');
			$("#marriage").val(marriage);
			$('#marriage').select2().trigger('change');
			$("#ktp").val(ktp);
			$("#addr").val(addr);
			$("#daywork").val(daywork);
			$("#penalty").val(penalty);
			
		    $("#btn-submit").val("Edit");
		});

	$('.date_input').datetimepicker({
		    format: 'yyyy-mm-dd',
		    minView: 2,
		    autoclose: true
		});

	</script>
