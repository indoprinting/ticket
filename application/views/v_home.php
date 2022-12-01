
	<div class="container-fluid" id="content">
		<div id="main" style="margin-left: 0px;">
			<div class="container-fluid">
				<div class="row">
					<!-- code here -->
					<div class="col-sm-6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-table"></i>
									Ticket by Assigment
								</h3>
							</div>
							<div class="box-content nopadding">
								<table id="example" class="table table-hover table-nomargin dataTable table-bordered dataTable-scroll-y">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Open</th>
											<th>In Progress</th>
											<th>Overdue</th>
											<th>Done</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i=1;
											foreach ($data as $row) {
										?>
										<tr>
											<td>
												<?php echo $row->name; ?>
											</td>
											<td>
												<?php echo $row->open; ?>
											</td>
											<td>
												<?php echo $row->progress; ?>
											</td>
											<td>
												<?php echo $row->overdue; ?>
											</td>
											<td>
												<?php echo $row->done; ?>
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
					<div class="col-sm-6">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="fa fa-bar-chart-o"></i>
									All Ticket Statistics
								</h3>
							</div>
							<div class="box-content">
								<canvas id="myChart"></canvas>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
		    type: 'pie',
		    data: {
		      labels: ["Open", "In Progress", "Overdue"],
		      datasets: [{
		        label: "Population (millions)",
		        backgroundColor: ["#3e95cd", "#3cba9f","#c45850"],
		        data: [<?php echo $statistik->open.','.$statistik->progress.','.$statistik->overdue; ?>]
		      }]
		    },
		    options: {
		      title: {
		        display: true,
		        text: 'All active Ticket'
		      }
		    }
		});
	</script>
