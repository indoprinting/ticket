
	<div class="container-fluid" id="content">
		<div id="main" style="margin-left: 0px;">
			<div class="container-fluid">
				<div class="row">
					<!-- code here -->
					<div class="col-sm-12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="fa fa-bell"></i>
									All Notification
								</h3>
							</div>
							<div class="box-content nopadding">
								<ul class="messages">
									<?php
										$i=1;
										foreach ($notif as $row) {
									?>
									<li class="left">
										<a href="<?php echo base_url().$row->url ?>" style="text-decoration: none;">
											<div class="message">
												<span class="caret"></span>
												<span class="name"><?php echo $row->from_name ?></span>
												<p><?php echo $row->message ?></p>
											</div>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

	</script>
