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
									<span id="judul">Generate Payroll</span>
								</h3>
							</div>

							<div class="box-content">
								<form action="<?php echo base_url(); ?>payroll/payrollnew" method="POST" class='form-horizontal form-validate' id="bb">
							
									<div class="form-group">
								         <label for="textfield" class="control-label col-sm-4">Begin Date</label>
									     <div class="col-sm-8">
										     <input type="text" class="date_input" id="datetimepicker" name="begin_date" data-rule-required="true" required style="width:80%;">
									     </div>
								    </div>

									<div class="form-group">
								         <label for="textfield" class="control-label col-sm-4">End Date</label>
									     <div class="col-sm-8">
										     <input type="text" class="date_input" id="datetimepicker" name="end_date" data-rule-required="true" required style="width:80%;">
									     </div>
								    </div>

								    <div class="col-sm-12">
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" id="btn-submit" value="Generate">
										<button onclick="cancel_btn()" type="button" class="btn">Cancel</button>
									</div>
								</div>

								</form>
							</div>


						</div>	
					</div>
					<div class="col-sm-4">
					</div>

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function cancel_btn() {
			$("#bb").attr('action', '<?php echo base_url(); ?>payroll/payrollnew');
		    $("#judul").html("Generate Payroll");
		    $("#btn-submit").val("Generate");
			document.getElementById("bb").reset();
			
		}

		$('.date_input').datetimepicker({
		    format: 'yyyy-mm-dd',
		    minView: 2,
		    autoclose: true
		});
	</script>