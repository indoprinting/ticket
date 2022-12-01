
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
					<!-- code here 
						<a href="<?php echo base_url().'knowledge'; ?>"><button type="button" class="btn">Back</button></a> -->
					<?php 
						foreach ($category as $cat) {
					?> 
					<div class="col-sm-12" id="<?php echo $cat['name']; ?>">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="fa fa-bars"></i>
									<?php echo $cat['name']; ?>
								</h3>
							</div>
							<div class="box-content">
								<div class="panel-group panel-widget" id="ac<?php echo $cat['id']; ?>">
									<?php 
										foreach ($cat['knowledge'] as $row) {
									?> 
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a href="#c<?php echo $row->id; ?>" style="font-size: 14px;" data-toggle="collapse" data-parent="#ac<?php echo $cat['id']; ?>">
													<?php echo $row->title; ?>
												</a>
											</h4>
											<!-- /.panel-title -->
										</div>
										<!-- /.panel-heading -->
										<div id="c<?php echo $row->id; ?>" class="panel-collapse collapse">
											<div class="panel-body">
												<?php echo $row->body; ?>
											</div>
											<!-- /.panel-body -->
										</div>
										<!-- /#c1.panel-collapse collapse in -->
									</div>
									<!-- /.panel panel-default -->
									<?php } ?>
								</div>
								<!-- /.panel-group -->
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

	</script>
