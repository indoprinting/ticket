
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
					<?php 
						foreach ($category as $cat) {
					?> 
					<div class="col-sm-4">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-bars"></i>
									<?php echo $cat['name']; ?>
								</h3>
							</div>
							<div class="box-content" style="line-height: 35px;">
								<?php
									foreach ($cat['subs'] as $row) {
										echo '<a href="knowledge/detail/'. $cat['id'].'#'.$row->name.'" class="btn btn-primary"  style="white-space: normal; text-align: left;">'.$row->name.'</a> ';
									}
								?>
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
