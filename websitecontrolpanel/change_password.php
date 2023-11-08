<?php
include("../include/config.php");
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  href="<?php echo SITE_PATH_ASSETS; ?>css/bootstrap.min.css">
	<link rel="stylesheet"  href="<?php echo SITE_PATH_ASSETS; ?>css/backand_style.css">
	<title><?php echo SITE_PATH_BACK; ?></title>
</head>
<body>
<!-- start header -->
	<?php include("../include/backand_header.php"); ?>
<!-- and header -->
<!-- center part start-->
	<div class="container-fluid add_courses_padding">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="add_courses_img">
						<img src="<?php echo SITE_PATH_ASSETS; ?>img/course-1.jpg">
					</div>
				</div>
				<div class="col-6">
					<div class="add_courses_name">
						<h3>Change Password</h3>
						<form class="add_courses_form">
						  <div class="mb-3">
							<label  class="form-label"><b>Password:</b></label>
							<input type="text" class="form-control" id="exampleInputEmail1" >
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Confirm Password:</b></label>
							<textarea type="text" class="form-control" id="exampleInputPassword1"></textarea>
						  </div>
						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- center part and-->
</body>
</html>