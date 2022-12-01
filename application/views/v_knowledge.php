
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
									Data Knowledge Base
								</h3>
							</div>
							<div class="box-content nopadding" style="overflow-x: auto;">
								<table class="table table-hover table-nomargin table-bordered dataTable">
									<thead>
									<tr>
										<th>No</th>
										<th>Category</th>
										<th>Sub Category</th>
										<th>Title</th>
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
												<?php echo $row->cat_name; ?>
											</td>
											<td>
												<?php echo $row->sub_name; ?>
											</td>
											<td>
												<?php echo $row->title; ?>
											</td>
											<td>
												<button data-id="<?php echo $row->id; ?>" class="btn edit-btn" rel="tooltip" title="Edit">
													<i class="fa fa-edit"></i>
												</button>
												<a href="<?php echo base_url(); ?>master/deleteknowledge/<?php echo $row->id; ?>" onclick="return confirm('are you sure you want to delete this?');" class="btn" rel="tooltip" title="Delete">
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
								<form action="<?php echo base_url(); ?>master/addknowledge" method="POST" class='form-horizontal form-validate' id="bb">
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-3">Category</label>
										<div class="col-sm-9">
											<select name="category_id" id="category_id" class='select2-me' style="width:80%;" data-rule-required="true" required>
												<option value="">-- Select Category --</option>
												<?php 
													foreach ($category as $row) {
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
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-3">Sub Category</label>
										<div class="col-sm-9">
											<select name="sub_category_id" id="sub_category_id" class='select2-me' style="width:80%;" data-rule-required="true" required>
												<option value="">-- Select Category --</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-3">Title</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="title" id="title" style="width:80%;" data-rule-required="true">
										</div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-3">Body</label>
										<div class="col-sm-9">
											<textarea name="body" id="body" class='ckeditor span12' rows="5" style="width:80%;" data-rule-required="true"></textarea>
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
			$("#bb").attr('action', '<?php echo base_url(); ?>master/addknowledge');
		    $("#judul").html("Create New");
		    $("#btn-submit").val("Create");
		    $("#category_id").val("");
   			$('#category_id').select2().trigger('change');
		    var editor = CKEDITOR.instances['body'];
		    editor.setData("");
			document.getElementById("bb").reset();
		}

		$('#category_id').change(function(){
		    var cat = $(this).val();
		    $.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>master/getSubs/"+cat,
				success: function(data) {
					$('#sub_category_id').html(data);
   					$('#sub_category_id').select2().trigger('change');
				}
			});
		});

		$('.edit-btn').click(function(){
		    var id = $(this).data('id');

		    $.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>master/getknowledge/"+id,
				dataType:"json",
				success: function(data) {
					console.log(data);
					var know = data.knowledge;
					console.log(know);
				    $("#title").val(know.title);
				    var editor = CKEDITOR.instances['body'];
				    editor.setData(know.body);
				    $("#category_id").val(know.category_id);
		   			$('#category_id').select2().trigger('change');
					$('#sub_category_id').html(data.subs);
					setTimeout(function() { $("#sub_category_id").val(know.sub_category_id) }, 100);
					setTimeout(function() { $('#sub_category_id').select2().trigger('change') }, 100);
				}
			});

		    $("#bb").attr('action', '<?php echo base_url(); ?>master/editknowledge/'+id);
		    $("#judul").html("Edit Data");
		    $("#btn-submit").val("Edit");
		});
	</script>
