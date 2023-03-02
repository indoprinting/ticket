
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
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="fa fa-check"></i>
									Change Password
								</h3>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>user/updatePass/<?php echo $this->session->userID; ?>" method="POST" class='form-horizontal form-validate' id="bb">
									<div class="form-group">
										<label for="newpass" class="control-label col-sm-2">New password</label>
										<div class="col-sm-3">
											<input width="50%" type="password" name="newpass" id="newpass" class="form-control" data-rule-required="true">
										</div>
									</div>
									<div class="form-group">
										<label for="confirmpass" class="control-label col-sm-2">Confirm new password</label>
										<div class="col-sm-3">
											<input width="50%" type="password" name="confirmpass" id="confirmpass" class="form-control" data-rule-equalTo="#newpass" data-rule-required="true">
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" value="Submit">
										<button onclick="history.back()" type="button" class="btn">Cancel</button>
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

	</script>
