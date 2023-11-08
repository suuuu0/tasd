<?php
include("../include/configure.php");
$vnameErr = $vcourseErr = $descriptionErr = $vimgErr = '';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	function call($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if(empty($_POST['vname']))
	{
		$vnameErr = "vname is required";
	}else
	{
		$obj_review->vname = call($_POST['vname']);
	}
	if(empty($_POST['vcourse']))
	{
		$vcourseErr = "vcourse is required";
	}else
	{
		$obj_review->vcourse = call($_POST['vcourse']);
	}
	if(empty($_POST['description']))
	{
		$descriptionErr = "description is required";
	}else
	{
		$obj_review->description = call($_POST['description']);
	}
	if(empty($_FILES['fileToUpload']['name']))
	{
		$vimgErr = " vimg is required";
	}else
	{
		$obj_review->vimg = call($_FILES['fileToUpload']['name']);
		$target_dir = "../upload_img/";
		$taeget_file = 	$target_dir. basename($_FILES['fileToUpload']['name']);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$taeget_file);
	}
	if($_POST['vname'] !='' && $_POST['vcourse'] !='' && $_POST['description'] !='' &&  $_FILES['fileToUpload']['name']!='')
	{
		$obj_review->addrecord();
		header("location:review.php");exit;
	}
}
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  href="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>css/bootstrap.min.css">
	<link rel="stylesheet"  href="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>css/backand_style.css">
	<title><?php echo PAGES_TITLE; ?></title>
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
						<img src="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>img/course-1.jpg">
					</div>
				</div>
				<div class="col-6">
					<div class="add_courses_name">
						<h3>Add Page</h3>
						<form class="add_courses_form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
						  <div class="mb-3">
							<label  class="form-label"><b>Review Name:</b></label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="vname">
							<span class="error">*<?php echo  $vnameErr; ?></span>
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Course:</b></label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="vcourse">
							<span class="error">*<?php echo  $vcourseErr; ?></span>
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Description:</b></label>
							<textarea type="text" class="form-control" id="exampleInputPassword1" name="description"></textarea>
							<span class="error">*<?php echo $descriptionErr; ?></span>
						 </div>
						 <div class="mb-3">
							<label  class="form-label"><b>Image:</b></label>
							<input type="file" class="form-control" id="exampleInputPassword1" name="fileToUpload">
							<span class="error">*<?php echo $vimgErr; ?></span>
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