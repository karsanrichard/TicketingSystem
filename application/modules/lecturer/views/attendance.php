﻿<?php //echo "<pre>"; print_r($this->session->all_userdata());echo "</pre>"; exit; ?>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lecturer Dashboard</title>
	<link type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap-responsive.min.css';?>" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url().'assets/css/lecturer_theme.css';?>" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url().'assets/font-awesome-4.1.0/css/font-awesome.css'; ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url().'assets/css/lecturer_theme.css';?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url().'assets/css/animate.css'; ?>" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="fa fa-reorder shaded"></i>
				</a>

			  	<a class="brand" href="<?php echo base_url()."lecturer"?>">
			  		Edmin
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="fa fa-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="fa fa-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="fa fa-bar-chart"></i>
						</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="fa fa-search"></i>
						</button>
					</form>
				
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Item No. 1</a></li>
								
								<li><a href="#">Don't Click</a></li>
								<li class="divider"></li>
								<li class="nav-header">Example Header</li>
								<li><a href="#">A Separated link</a></li>
															</ul>
						</li>
						
						<li><a href="#">
							Support
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url().'assets/images/lec_images/user.png';?>" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Account Settings</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->

    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active"><a href="<?php echo base_url()."lecturer"?>"><i class="menu-icon fa fa-dashboard"></i>Dashboard
            </a></li>
            <li><a href="<?php echo base_url()."lecturer/page_to_load/activity"?>"><i class="menu-icon fa fa-bullhorn"></i>News Feed </a>
            </li>
            <li><a href="<?php echo base_url()."lecturer/page_to_load/messages"?>"><i class="menu-icon fa fa-inbox"></i>Inbox <b class="label green pull-right">
            <?php echo $msg_no[0]['total']; ?></b> </a></li>
            <li><a href="<?php echo base_url()."lecturer/page_to_load/students"?>"><i class="menu-icon fa fa-tasks"></i>Students <b class="label orange pull-right">
                <?php echo $total_students; ?></b> </a></li>
            <li><a href="<?php echo base_url()."lecturer/page_to_load/attendance"?>"><i class="menu-icon fa fa-tasks"></i>Attendance</a></li>
            <li><a href="<?php echo base_url()."lecturer/page_to_load/charts"?>"><i class="menu-icon fa fa-area-chart"></i>Statistics </a></li>
            <li><a href="#"><i class="menu-icon fa fa-signout"></i>Logout </a></li>
        </ul>
    </div>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span9 content_span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Forms</h3>
							</div>
							<div class="module-body">
									<div class="alert alert-success display-none animated">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong></strong> 
									</div>

									<br />

									<form class="form-horizontal row-fluid">
									<div class="control-group">
									<div class="control-group">
											<label class="control-label" for="basicinput">Students: </label>
											<div class="controls ">
												<select id="student_select" tabindex="1" class="span8 student_select">
												<option>-- Select Student -- </option>
											<?php 
													foreach ($students as $student_data) {
														$full_names= $student_data['firstname'].' '.$student_data['lastname'].' '.$student_data['othernames'];
														echo '
														<option value="'.$student_data['student_id'].'">'.$full_names.'</option>
														
														';
													}
													 ?>
												</select>
											</div>
										</div>

										
										<div class="control-group">
											<label class="control-label" for="basicinput"></label>
											<div class="controls">
												<span class="help-inline">Total Hours for <?php echo date("D/M/Y") ?></span>
												<input type="text" id="basicinput" placeholder="Type something here..." class="span8 total_hrs" value="8" disabled="disabled">
											</div>
										</div>

										<div class="control-group float_left">
											<label class="control-label" for="basicinput">Morning Lesson: </label>
											<div class="controls">
												<input type="checkbox" id="basicinput" class="morning_class" title="Student was available during the MORNING class">
											</div>
										</div>

										<div class="control-group float_left">
											<label class="control-label" for="basicinput">Late Morning/ Early Afternoon Lesson: </label>
											<div class="controls">
												<input type="checkbox" id="basicinput" class="late_morning_class" title="Student was available during the Late Morning/ Early Afternoon  class">
											</div>
										</div>

										<div class="control-group float_left">
											<label class="control-label" for="basicinput">Afternoon Lesson: </label>
											<div class="controls">
												<input type="checkbox" id="basicinput" class="afternoon_class" title="Student was available during the Afternoon class">
											</div>
										</div>

										<div class="control-group float_left">
											<label class="control-label" for="basicinput">Evening Lesson: </label>
											<div class="controls">
												<input type="checkbox" id="basicinput" class="evening_class" title="Student was available during the Evening class">
											</div>
										</div>

												<button type="submit" class="btn update_attendance">Update Attendance</button>
									</form>
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

        <div class="footer">
        <div class="span3"></div>
            <div class="span9">
                <b class="copyright">&copy; 2014 Richard Seth Karsan|Otaalo John Chrispine|Bakasa Joshua  </b>  All rights reserved.
            </div>
        </div>
        <script src="<?php echo base_url().'assets/js/jquery-1.9.1.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery-ui-1.10.1.custom.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery.flot.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery.flot.resize.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery.dataTables.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/custom_lecturer.js';?>" type="text/javascript"></script>
</body>