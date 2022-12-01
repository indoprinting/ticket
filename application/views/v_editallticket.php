<?php 
	if(isset($_GET['b'])) {
		$b=$_GET['b'];
	} else {
		$b='index';
	}
?>
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
					<div class="col-sm-4">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>Detail Data
								</h3>
								<div class="pull-right" style="margin-right: 5px;">
									<a href="<?php echo base_url().'allticket'; ?>"><button type="button" class="btn">Back</button></a>
								</div>
							</div>
							<div class="box-content nopadding edit_form">
								<form class='form-horizontal form-column form-bordered form-validate'>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Created By</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->created_name; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Location</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->location_name; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Subject</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->subject; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Description</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->description; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Attachment</label>
												<div class="col-sm-8">
													&nbsp; <a href="<?php echo base_url().'attachment/'.$ticket->attachment; ?>"><?php echo $ticket->attachment; ?></a>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Department</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->department_name; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Assigment</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->assigned_name; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Status</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->status_name; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Priority</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->priority_name; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Equip code</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->equip_code; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Part code</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->part_code.' - '.$ticket->part_name; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Counter</label>
												<div class="col-sm-8">
													&nbsp; <?php echo $ticket->counter; ?>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Start Date</label>
												<div class="col-sm-8">
													<span>&nbsp; <?php echo $ticket->created_date; ?></span>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Due Date</label>
												<div class="col-sm-8">
													<span>&nbsp; <?php echo $ticket->due_date; ?></span>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Close Date</label>
												<div class="col-sm-8">
													<span>&nbsp; <?php echo $ticket->close_date; ?></span>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Time Span</label>
												<div class="col-sm-8">
													<span id="timespan">&nbsp; 
														<?php $timeSpan = '-';
														if($ticket->done_date!='') {
															$datetime1 = new DateTime($ticket->created_date);
														    $datetime2 = new DateTime($ticket->done_date);
														    
														    $interval = $datetime1->diff($datetime2);
														    
															$timeSpan = $interval->format('%d Days %h Hours');
														}
														echo $timeSpan; ?>
													</span>
												</div>
											</div>
											<?php
												if($ticket->status=='4') { //only if close
											?>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Rating <?php echo $ticket->rating; ?></label>
												<div class="col-sm-8">
													<div class='starrr' id='star1'></div>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-12">
								<div class="box box-color box-bordered orange">
									<div class="box-title">
										<h3>
											<i class="fa fa-bars"></i>
											Message
										</h3>
									</div>
									<div class="box-content nopadding edit_form2">
										<ul class="timeline">
											<?php 
												if(!$reply) {
													echo '<li>
													<div class="timeline-content">
													No message found
													</div>
													</li>';
												}
												foreach ($reply as $val) {
											?>
												<li>
													<div class="timeline-content">
														<div class="left">
															<div class="icon orange">
																<i class="fa fa-comment"></i>
															</div>
															<div class="date"><?php echo date('d M', strtotime($val->created_date)) ?></div>
														</div>
														<div class="activity" style="margin-right: 15px;">
															<div class="user">
																<a href="#"><?php echo $val->user_name; ?></a>
																<span>added a new message</span>
															</div>
															<p>
																<?php echo $val->message; ?>
															</p>
															<?php if($val->attachment!='') { ?>
															<p>
																Attachment : <a href="<?php echo base_url().'attachment/'.$val->attachment; ?>"><?php echo $val->attachment; ?></a>
															</p>
															<?php } ?>
														</div>
													</div>
													<div class="line"></div>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="box box-color box-bordered green">
									<div class="box-title">
										<h3>
											<i class="fa fa-bars"></i>
											History Ticket
										</h3>
									</div>
									<div class="box-content nopadding edit_form2">
										<ul class="timeline">
											<?php 
												if(!$history) {
													echo '<li>
													<div class="timeline-content">
													No history found
													</div>
													</li>';
												}
												foreach ($history as $val) {
											?>
												<li style="padding: 10px 0;">
													<div class="timeline-content">
														<div class="left">
															<div class="icon green">
																<i class="fa fa-bullhorn"></i>
															</div>
															<div class="date"><?php echo date('d M', strtotime($val->created_date)) ?></div>
														</div>
														<div class="activity" style="margin-right: 15px;">
															<div class="user">
																<a href="#"><?php echo $val->user_name; ?></a>
																<span><?php echo $val->message; ?></span>
															</div>
															<p>
																&nbsp;
															</p>
														</div>
													</div>
													<div class="line"></div>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="box box-color box-bordered lime">
							<div class="box-title">
								<h3>
									<i class="fa fa-bars"></i>
									Update Data
								</h3>
							</div>
							<div class="box-content nopadding edit_form">
								<form action="<?php echo base_url(); ?>allticket/update/<?php echo $ticket->id; ?>" method="POST" class='form-horizontal form-column form-bordered form-validate' autocomplete="off" id="detail_form" enctype="multipart/form-data">
									<div class="row">
										<div class="col-sm-12">
											<?php
												if($ticket->status!='4' and $ticket->status!='5' and ($ticket->status!='3' or $ticket->created_by == $this->session->userID)) {
											?>
											<div class="form-group">
												<label style="text-align: center" for="textfield" class="control-label col-sm-12">&nbsp; UPDATE</label>
											</div>
											<?php
												if($this->session->userID==$ticket->created_by) { //only if created by user
											?>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Due Date</label>
												<div class="col-sm-8">
													<input type="text" class="date_input" id="datetimepicker" name="due_date" style="width:90%;">
												</div>
											</div>
											<?php } ?>
											
											<?php
											if($ticket->part_qty!=0) { //only if close
											?>
											<div class="form-group">
											<label for="textfield" class="control-label col-sm-4">Qty Part</label>
												<div class="col-sm-8">
														<input type="text" class="form-control" name="part_qty" id="part_qty" style="width:90%;" data-rule-required="false" value="<?php echo $ticket->part_qty;?> ">
												</div>
											</div>
											<?php } ?>

											<?php
												if($this->session->roles<10) { //only if close
											?>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Priority</label>
												<div class="col-sm-8">
													<select name="priority" id="priority" class='select2-me' style="width:90%;">
														<?php 
															foreach ($priority as $row) {
																$sel = '';
																if($ticket->priority==$row->id){
																	$sel = 'selected';
																}
																echo '<option '.$sel.' value="'.$row->id.'">'.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<?php } ?>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Assign to</label>
												<div class="col-sm-8">
													<select name="assign_id" id="assign_id" class='select2-me' style="width:90%;">
														<option value="">-- Select Assignment --</option>
														<?php 
															foreach ($assign as $row) {
																$sel = '';
																if($ticket->assign_id==$row->id){
																	$sel = 'selected';
																}
																echo '<option '.$sel.' value="'.$row->id.'">'.$row->name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-4">Status</label>
												<div class="col-sm-8">
													<select name="status" id="status" class='select2-me' style="width:90%;">
														<option value="">-- Select Status --</option>
														<?php 
															// $cls = '';
															if($ticket->assign_id==$this->session->userID) {
																// $status = $worker;

																foreach ($worker as $row) {
																	$sel = '';
																	if($ticket->status==$row->id){
																		$sel = 'selected';
																	}
																	echo '<option '.$sel.' value="'.$row->id.'">'.$row->name.'</option>';
																}

																if($this->session->roles==12 && $this->session->deptID == $ticket->division_id && $ticket->created_by != $this->session->userID){
																	$cls = '<option value="4"> Close </option>';
																}
															}
															if($ticket->created_by==$this->session->userID) {
																// $status = $creator;

																foreach ($creator as $row) {
																	$sel = '';
																	if($ticket->status==$row->id){
																		$sel = 'selected';
																	}
																	echo '<option '.$sel.' value="'.$row->id.'">'.$row->name.'</option>';
																}
															}

															// foreach ($status as $row) {
															// 	$sel = '';
															// 	if($ticket->status==$row->id){
															// 		$sel = 'selected';
															// 	}
															// 	echo '<option '.$sel.' value="'.$row->id.'">'.$row->name.'</option>';
															// }

															// echo $cls;
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-3">Reply</label>
												<div class="col-sm-12">
													<textarea placeholder="new message" name="reply" class='form-control' rows="5"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="textfield" class="control-label col-sm-3">Attachment</label>
												<div class="col-sm-12">
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="input-group">
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
											<div class="form-actions">
												<button type="submit" class="btn btn-primary">Save changes</button>
												<a href="<?php echo base_url().'allticket'; ?>"><button type="button" class="btn">Back</button></a>
											</div>
											<?php
												} else {
											?>
											<div class="form-actions">
												<a href="<?php echo base_url().'allticket'; ?>"><button type="button" class="btn">Back</button></a>
											</div>
											<?php
												}
											?>

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

			<?php if($ticket->done_date=='') { ?>
				$('#subject').change(function(){
				    var point = $(this).find(':selected').data('point');
				    $('#point').val(point);
				});
			
				$(document).ready(function() {
				  TimespanUpdate();
				  setInterval(TimespanUpdate, 1000);
				});

				function TimespanUpdate() {
					var start 	= new Date('<?php echo $ticket->created_date; ?>');
				  	var end 	= new Date();

				  	var diff 	= new Date(end - start);

					var d = Math.floor(diff/1000/60/60/24);
				  	var h = Math.floor(diff/1000/60/60) % 24;
				  	// var m = Math.floor(diff/1000/60) % 60;
				  	// var s = Math.floor(diff/1000) % 60;

				  	$('#timespan').text(d + ' Days, '+ h + ' Hours');
				}
			<?php } ?>

			<?php if($ticket->rating>0) { ?>

				$('.starrr').starrr({
				  	rating: <?php echo $ticket->rating; ?>,
				  	readOnly: true
				});

			<?php } else { ?>

				$('.starrr').starrr();
				$('.starrr').on('starrr:change', function(e, value){
				  	//alert('new rating is ' + value)
				  	// ajax simpan rating...
				  	$.ajax({
						method: "POST",
						url: "<?php echo base_url(); ?>ticket/rating/<?php echo $ticket->id; ?>",
						data: "rating="+value,
						success: function(data) {
							data = JSON.parse(data);
							alert(data.message);
					    	location.reload();
						}
					});
				});

			<?php } ?>

			$('#datetimepicker').datetimepicker({
			    format: 'yyyy-mm-dd hh:00',
			    minView: 1,
			    autoclose: true,
			    startDate: new Date()
			});
		</script>
