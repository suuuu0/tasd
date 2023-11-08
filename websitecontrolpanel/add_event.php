<?php
include("../include/configure.php");
$enameErr = $e_descriptionErr = $e_dateErr = $e_imgErr = '';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	function call($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if(empty($_POST['ename']))
	{
		$enameErr = "ename is required";
	}else
	{
		$obj_event->ename = call($_POST['ename']);
	}
	if(empty($_POST['e_description']))
	{
		$e_descriptionErr = "e_description is required";
	}else
	{
		$obj_event->e_description = call($_POST['e_description']);
	}
	if(empty($_POST['e_date']))
	{
		$e_dateErr = "e_date is required";
	}else
	{
		$obj_event->e_date = call($_POST['e_date']);
	}
	if(empty($_FILES['fileToUpload']['name']))
	{
		$e_imgErr = "e_date is required";
	}else
	{
		$obj_event->e_img = call($_FILES['fileToUpload']['name']);
		$target_dir = "../upload_img/";
		$taeget_file = 	$target_dir. basename($_FILES['fileToUpload']['name']);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$taeget_file);
	}
	if($_POST['ename'] !='' && $_POST['e_description'] !='' && $_POST['e_date'] !='' &&  $_FILES['fileToUpload']['name']!='')
	{
		$obj_event->addrecord();
		header("location:event.php");exit;
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
							<label  class="form-label"><b>Event Name:</b></label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="ename">
							<span class="error">*<?php echo  $enameErr; ?></span>
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Description:</b></label>
							<textarea type="text" class="form-control" id="exampleInputPassword1" name="e_description"></textarea>
							<span class="error">*<?php echo $e_descriptionErr; ?></span>
						 </div>
						 <div class="mb-3">
							<label  class="form-label"><b>Event Data:</b></label>
							<input type="date" class="form-control" id="exampleInputPassword1" name="e_date">
							<span class="error">*<?php echo $e_dateErr; ?></span>
						 </div>
						 <div class="mb-3">
							<label  class="form-label"><b>Event Data:</b></label>
							<input type="file" class="form-control" id="exampleInputPassword1" name="fileToUpload">
							<span class="error">*<?php echo $e_imgErr; ?></span>
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