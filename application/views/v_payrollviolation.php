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
									Data Violation
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
										<th>Violation Subjects</th>
										<th>Poin</th>
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
												<?php echo $row->date_violation; ?>
											</td>
											<td>
												<?php echo $row->pin; ?>
											</td>
											<td>
												<?php echo $row->nama; ?>
											</td>

											<td>
												<?php echo $row->violation_name; ?>
											</td>

											<td>
												<?php echo $row->poin; ?>
											</td>

											<td>
												<button data-id="<?php echo $row->id; ?>" 
													data-date_violation="<?php echo $row->date_violation; ?>" 
													data-pin="<?php echo $row->pin; ?>"
													data-nama="<?php echo $row->nama; ?>"
													data-violation_name="<?php echo $row->violation_name; ?>"
													data-poin="<?php echo $row->poin; ?>"
													class="btn edit-btn" rel="tooltip" title="Edit">
													<i class="fa fa-edit"></i>
												</button>
												<a href="<?php echo base_url(); ?>payroll/deleteviolation/<?php echo $row->id; ?>" onclick="return confirm('are you sure you want to delete this?');" class="btn" rel="tooltip" title="Delete">
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
					<div class="col-sm-5">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>
									<span id="judul">Create New</span>
								</h3>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>payroll/addviolation" method="POST" class='form-horizontal form-validate' id="bb">
								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Date</label>
									<div class="col-sm-10">
										<input type="text" class="date_input" id="date_violation" name="date_violation" data-rule-required="false" required style="width:80%;">
									</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Employee Name</label>
										<div class="col-sm-10">
											<select name="pin" id="pin" class='select2-me' style="width:80%;" data-rule-required="true" required> 
												<option value="">-- Select Name --</option>
													<?php 
													
														foreach ($eployeenya as $row) {
														echo '<option data-nama="'.$row->nama.'" value="'.$row->pin.'">'.$row->nama.'</option>';
														}
													?>
											</select>
											<input type="hidden" name="nama" id="nama">
									</div>
								</div>

								<div class="form-group">
									<label for="textfield" class="control-label col-sm-2">Violation Name</label>
										<div class="col-sm-10">
											<select name="violation_name" id="violation_name" class='select2-me' style="width:80%;" data-rule-required="true" required> 
												<option value="">-- Select Name --</option>
													<?php 
													
														foreach ($sop as $row) {
														echo '<option data-poin="'.$row->poin.'" value="'.$row->violation_name.'">'.$row->violation_name.'</option>';
														}
													?>
											</select>
											<input type="hidden" name="poin" id="poin">
									</div>
								</div>

								

									<div class="form-actions">
										<input type="submit" class="btn btn-primary" id="btn-submit" value="Create">
										<button onclick="cancel_btn()" type="button" class="btn">Cancel</button>
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
			$("#bb").attr('action', '<?php echo base_url(); ?>payroll/addviolation');
		    $("#judul").html("Create New");
		    $("#btn-submit").val("Create");
			document.getElementById("bb").reset();
		}

		$('#violation_name').change(function(){
			 var poin = $(this).find(':selected').data('poin');
			 $('#poin').val(poin);
		});

        $('#pin').change(function(){
			 var nama = $(this).find(':selected').data('nama');
			 $('#nama').val(nama);
		});
	


		$('.edit-btn').click(function(){
			var id = $(this).data('id');
	
		    var date_violation = $(this).data('date_violation'); 
			var pin = $(this).data('pin');
			
			var violation_name = $(this).data('violation_name');

		    $("#bb").attr('action', '<?php echo base_url(); ?>payroll/editviolation/'+id);
		    
		    $("#judul").html("Edit Data");
		    $("#date_violation").val(date_violation);
			$("#pin").val(pin);
			$('#pin').select2().trigger('change');
			$("#violation_name").val(violation_name);
			$('#violation_name').select2().trigger('change');
			
		    $("#btn-submit").val("Edit");

		});

		$('.date_input').datetimepicker({
		    format: 'yyyy-mm-dd',
		    minView: 2,
		    autoclose: true
		});

	</script>
