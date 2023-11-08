<?php
include("../include/configure.php");
$vnameErr = $vcourseErr = $descriptionErr = $vimgErr = '';



$vid = isset($_GET['vid'])?$_GET['vid']:1;
$obj_review->fetchdata($vid);
$record = $obj_review->GetNumRows();
if($record >0)
{
	$data = $obj_review->GetArrayFromRecord();
}
if(isset($_POST['submit']))
{
	$vid=$_POST['vid'];
	$obj_review->vname= $_POST['vname'];
	$obj_review->vcourse= $_POST['vcourse'];
	$obj_review->description= $_POST['description'];
	$obj_review->editdata($vid);
	if(isset($_FILES['fileToUpload']['name']) && $_FILES['fileToUpload']['name']!='')
	{
		
		$obj_review->vimg = $_FILES['fileToUpload']['name'];
		$obj_review->update_image($vid);
	}
	header("location:review.php?vid=".$vid);exit;
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
							<label  class="form-label"><b> Name:</b></label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="vname" value="<?php echo $data['vname'] ?>">
							<span class="error">*<?php echo  $vnameErr; ?></span>
						 </div>
						 <div class="mb-3">
							<label  class="form-label"><b>Course:</b></label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="vcourse" value="<?php echo $data['vcourse'] ?>">
							<span class="error">*<?php echo  $vcourseErr; ?></span>
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Description:</b></label>
							<textarea type="text" class="form-control" id="exampleInputPassword1" name="description" value="<?php echo $data['description'] ?>"> <?php echo $data['description'] ?></textarea>
							<span class="error">*<?php echo $descriptionErr; ?></span>
						 </div>
						 <div class="mb-3">
							<label  class="form-label"><b> Image:</b></label>
							<input type="file" class="form-control" id="exampleInputPassword1" name="fileToUpload" value="<?php echo $data['vimg'] ?>"><img src="../upload_img/<?php echo $data['vimg'] ?>" width="50px">
							<span class="error">*<?php echo $vimgErr; ?></span>
						 </div>
						 <input type="hidden" name="vid" value="<?php echo $data['vid'] ?>" >
						  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- center part and-->
</body>
</html>