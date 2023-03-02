<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!doctype html>

<html>



<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Apple devices fullscreen -->

	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!-- Apple devices fullscreen -->

	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />



	<title>Indoprinting support center</title>



	<!-- Bootstrap -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

	<!-- jQuery UI -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/jquery-ui/jquery-ui.min.css">

	<!-- PageGuide -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/pageguide/pageguide.css">

	<!-- Fullcalendar -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" media="print">

	<!-- Tagsinput -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/tagsinput/jquery.tagsinput.css">

	<!-- dataTables -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/datatable/TableTools.css">

	<!-- chosen -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/chosen/chosen.css">

	<!-- multi select -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/multiselect/multi-select.css">

	<!-- timepicker -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/timepicker/bootstrap-timepicker.min.css">

	<!-- colorpicker -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/colorpicker/colorpicker.css">

	<!-- Datepicker -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/datepicker/datepicker.css">

	<!-- Daterangepicker -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/daterangepicker/daterangepicker.css">

	<!-- Plupload -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/plupload/jquery.plupload.queue.css">

	<!-- select2 -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/select2/select2.css">

	<!-- icheck -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/icheck/all.css">

	<!-- Theme CSS -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

	<!-- Color CSS -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes.css">

	<!-- Rating Simple -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/starrr.css">

	<!-- Datetimepicker Simple -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">



	<!-- jQuery -->

	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>



	<!-- Nice Scroll -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>

	<!-- imagesLoaded -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>

	<!-- jQuery UI -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.js"></script>

	<!-- Touch enable for jquery UI -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>

	<!-- slimScroll -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Bootstrap -->

	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

	<!-- Bootbox -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/bootbox/jquery.bootbox.js"></script>

	<!-- New DataTables -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/momentjs/jquery.moment.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/momentjs/moment-range.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/extensions/dataTables.tableTools.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/extensions/dataTables.colReorder.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/extensions/dataTables.colVis.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/extensions/dataTables.fixedColumns.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/extensions/dataTables.fixedHeader.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/extensions/dataTables.scroller.min.js"></script>



	<!-- Masked inputs -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/maskedinput/jquery.maskedinput.min.js"></script>

	<!-- TagsInput -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

	<!-- Datepicker -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>

	<!-- Daterangepicker -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/moment.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>

	<!-- Timepicker -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/bootstrap-timepicker.min.js"></script>

	<!-- Colorpicker -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.js"></script>

	<!-- Chosen -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/chosen/chosen.jquery.min.js"></script>

	<!-- MultiSelect -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/multiselect/jquery.multi-select.js"></script>

	<!-- CKEditor -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/ckeditor/ckeditor.js"></script>

	<!-- PLUpload -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/plupload/plupload.full.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>

	<!-- Custom file upload -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/fileupload/bootstrap-fileupload.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/mockjax/jquery.mockjax.js"></script>

	<!-- select2 -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.js"></script>

	<!-- icheck -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/icheck/jquery.icheck.min.js"></script>

	<!-- complexify -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/complexify/jquery.complexify-banlist.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/complexify/jquery.complexify.min.js"></script>

	<!-- Mockjax -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/mockjax/jquery.mockjax.js"></script>

	<!-- Validation -->

	<script src="<?php echo base_url(); ?>assets/js/plugins/validation/jquery.validate.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/plugins/validation/additional-methods.min.js"></script>

	<!-- Rating Simple -->

	<script src="<?php echo base_url(); ?>assets/js/starrr.js"></script>

	<!-- Datetimepicker Simple -->

	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Chart JS Simple -->

	<script src="<?php echo base_url(); ?>assets/js/chart-js.js"></script>



	<!-- Theme framework -->

	<script src="<?php echo base_url(); ?>assets/js/eakroko.min.js"></script>

	<!-- Theme scripts -->

	<script src="<?php echo base_url(); ?>assets/js/application.min.js"></script>

	<!-- Just for demonstration -->

	<script src="<?php echo base_url(); ?>assets/js/demonstration.min.js"></script>



	<!--[if lte IE 9]>

	<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>

	<script>

		$(document).ready(function () {

			$('input, textarea').placeholder();

		});

	</script>

	<![endif]-->



	<!-- Favicon -->

	<link rel="shortcut icon" href="img/favicon.ico" />

	<!-- Apple devices Homescreen icon -->

	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />



	<style>

		a.paginate_button.current{

			background-color: #368ee0 !important;

			font-weight: bold;

		}

		.breadcrumbs{

			margin-top: 15px;

		}

		.edit_form{

			max-height: 75vh;

    		overflow: scroll;

   			padding-right: 15px !important;

		}

		.edit_form2{

			max-height: 32vh;

    		overflow: scroll;

   			padding-right: 15px !important;

		}

		.create_btn{

			display: block;

		    padding: 5px 15px;

		    color: #fff;

		    margin-right: 10px;

    		font-size: medium;

		}

		.create_btn:hover {

		  	background-color: #1e74c5;

		    color: #fff;

    		text-decoration: none;

		}

		.date_input{

			height: 34px;

			padding: 6px 12px;

			font-size: 14px;

			line-height: 1.42857143;

		}

		.flot {

		    left: 0px;

		    top: 0px;

		    width: 610px;

		    height: 250px;

		}

		#flotTip {

		    padding: 3px 5px;

		    background-color: #000;

		    z-index: 100;

		    color: #fff;

		    opacity: .80;

		    filter: alpha(opacity=85);

		}

		.pieLabel div {

		    color: white !important;

		    text-shadow: 0 0 4px #000;

		}

	</style>

</head>



<body data-layout-topbar="fixed">

	<div id="navigation">

		<div class="container-fluid">

			<a href="<?php echo base_url(); ?>ticket" id="brand">Intranet</a>

			<!-- <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation">

				<i class="fa fa-bars"></i>

			</a> -->

			<ul class='main-nav'>

				<li>

					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>

						<span>Ticket</span>

						<span class="caret"></span>

					</a>

					<ul class="dropdown-menu">

						<li>

							<a href="<?php echo base_url(); ?>home">

								<span>Dashboard</span>

							</a>

						</li>

						<?php if($this->session->roles<10) { ?>

						<li>

							<a href="<?php echo base_url(); ?>allticket">

								<span>All Ticket</span>

							</a>

						</li>

						<?php } ?>

						<li>

							<a href="<?php echo base_url(); ?>ticket">

								<span>My Ticket</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>ticket/assignticket">

								<span>Assign Ticket</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>ticket/departmentticket">

								<span>Department Ticket</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>ticket/locationticket">

								<span>Location Ticket</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>ticket/historyticket">

								<span>History Ticket</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>ticket/reportbySubject">

								<span>Report Ticket By subjects</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>ticket/getPenalty">

								<span>Ticket Penalty Over Due Date per Day</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>ticket/getPenaltytot">

								<span>Total Ticket Penalty Over Due Date</span>

							</a>

						</li>

					</ul>

				</li>

				<?php if($this->session->roles<10) { ?>

				<li>

					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>

						<span>Master Data</span>

						<span class="caret"></span>

					</a>

					<ul class="dropdown-menu">

						<li>

							<a href="<?php echo base_url(); ?>user">User</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>master/department">Department</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>master/subject">Ticket Subject</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>master/equipment">Equipment</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>master/knowledge">Knowledge Base</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>master/category">Knowledge Category</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>master/sopsubject">SOP Violation Subjects</a>

						</li>



					</ul>

				</li>

				<?php } ?>

				

				

				<li>

					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>

						<span>Payroll</span>

						<span class="caret"></span>

					</a>

					<ul class="dropdown-menu">

						<?php if($this->session->roles<10) { ?>

						

						<li>

					      <a href="<?php echo base_url(); ?>payroll/payrollviolation">Input SOP Violation</a>

						</li>

						<li>

					      <a href="<?php echo base_url(); ?>payroll/hro">Upload by HRO</a>

						</li>

						<li>

					      <a href="<?php echo base_url(); ?>payroll/mgr">Upload by MGR</a>

						</li>

						<li>

					      <a href="<?php echo base_url(); ?>payroll/ic">Upload by IC</a>

						</li>

						<li>

					      <a href="<?php echo base_url(); ?>payroll/ar">Upload by AR</a>

						</li>

						<?php } ?>		

						<?php if($this->session->roles<2) { ?>

						<li>

					      <a href="<?php echo base_url(); ?>payroll/payrollemployee">Employee Data</a>

						</li>

						<li>

					      <a href="<?php echo base_url(); ?>payroll/payrollnew">Generate Payroll</a>

						</li>

						<li>

					      <a href="<?php echo base_url(); ?>payroll/payrollsheet">Payroll Sheet</a>

						</li>

						<li>

					      <a href="<?php echo base_url(); ?>payroll/payrollrekap">Rekap Payroll</a>

						</li>	

						<li>

					      <a href="<?php echo base_url(); ?>payroll/payrollAll">All Payroll</a>

						</li>

						<?php } ?>			

						<li>

					      <a href="<?php echo base_url(); ?>payroll/payrollslip">My Payroll</a>

						</li>		



					</ul>

				</li>



				



				<li>

					<a href="<?php echo base_url(); ?>knowledge">Knowledge Base</a>

				</li>

				

			</ul>

			<div class="user">

				<div class="dropdown">

					<a href="#" class='dropdown-toggle' data-toggle="dropdown">

						<?php echo $this->session->name;?>

					</a>

					<ul class="dropdown-menu pull-right">

						<!-- <li>

							<a href="more-userprofile.html">Edit profile</a>

						</li> -->

						<li>

							<a href="<?php echo base_url(); ?>user/changepass">Change Password</a>

						</li>

						<li>

							<a href="<?php echo base_url(); ?>login/logout">Sign out</a>

						</li>

					</ul>

				</div>

				<ul class="icon-nav" style="display: block !important">

					<li class='dropdown' id="notification">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

							<i class="fa fa-bell"></i>

						</a>

						<ul class="dropdown-menu pull-right message-ul">

						</ul>

					</li>

				</ul>

			</div>

		</div>

	</div>