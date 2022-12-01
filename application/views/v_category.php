
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
									Data Equipment
								</h3>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable">
									<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Parent</th>
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
												<?php echo $row->name; ?>
											</td>
											<td>
												<?php echo $row->parent_name; ?>
											</td>
											<td>
												<button data-id="<?php echo $row->id; ?>" data-name="<?php echo $row->name; ?>" data-parent="<?php echo $row->parent_id; ?>" class="btn edit-btn" rel="tooltip" title="Edit">
													<i class="fa fa-edit"></i>
												</button>
												<a href="<?php echo base_url(); ?>master/deletecategory/<?php echo $row->id; ?>" onclick="return confirm('are you sure you want to delete this?');" class="btn" rel="tooltip" title="Delete">
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
								<form action="<?php echo base_url(); ?>master/addcategory" method="POST" class='form-horizontal form-validate' id="bb">
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Category</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="name" id="name" style="width:80%;" data-rule-required="true">
										</div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Parent</label>
										<div class="col-sm-10">
											<select name="parent_id" id="parent_id" class='select2-me' style="width:80%;">
												<option value="0">-- Select Parent --</option>
												<?php 
													foreach ($parent as $row) {
														$sel = '';
														// if($this->session->deptID==$row->id){
														// 	$sel = 'selected';
														// }
														echo '<option '.$sel.' value="'.$row->id.'">'.$row->name.'</option>';
													}
												?>
											</select>
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
			$("#bb").attr('action', '<?php echo base_url(); ?>master/addcategory');
		    $("#judul").html("Create New");
		    $("#btn-submit").val("Create");
		    $("#department_id").val("");
   			$('#department_id').select2().trigger('change');
			document.getElementById("bb").reset();
		}

		$('.edit-btn').click(function(){
		    var name = $(this).data('name');
		    var parent = $(this).data('parent');
		    var id = $(this).data('id');

		    $("#bb").attr('action', '<?php echo base_url(); ?>master/editcategory/'+id);
		    $("#judul").html("Edit Data");
		    $("#name").val(name);
		    $("#parent_id").val(parent);
   			$('#parent_id').select2().trigger('change');
		    $("#btn-submit").val("Edit");
		});
	</script>
