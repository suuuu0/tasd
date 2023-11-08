 <style>
.error {color:red}
</style>

<?php
include("../include/configure.php");
$cid = isset($_GET['cid'])?$_GET['cid']:1;
//echo $cid;
$obj_course->fetchdata($cid);
$record = $obj_course->GetNumRows();

if($record >0)
{
	$data= $obj_course->GetArrayFromRecord();
}

if(isset($_POST['submit']))
{
	//print_r($_POST);exit;
	$cid=$_POST['cid'];
	$obj_course->cname= $_POST['cname'];
	$obj_course->description= $_POST['description'];
	$obj_course->price= $_POST['price'];
	$obj_course->cimg= $_FILES['fileToUpload']['name'];
	$obj_course->editdata($cid);
	header("location:courses.php ");
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
						<h3>Add Courses</h3>
						<form class="add_courses_form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						  <div class="mb-3">
							<label  class="form-label"><b>Courses Name:</b></label>
							<input type="text" class="form-control" name="cname" id="exampleInputEmail1" value="<?php echo $data['cname'];?>" >
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Description:</b></label>
							<textarea type="text" class="form-control" name="description" id="exampleInputPassword1" value="<?php echo $data['description'];?>"><?php echo $data['description'];?></textarea>
						  </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Price:</b></label>
							<input type="text" class="form-control" name="price" id="exampleInputPassword1" value="<?php echo $data['price'];?>">
						  </div>
						   <div class="mb-3">
							<label  class="form-label"><b>Price:</b></label>
							<input type="file" class="form-control" name="fileToUpload" id="exampleInputPassword1" value="<?php echo $data['cimg'];?>"><img src="../upload_img/<?php echo $data['cimg'] ?>" width="50px">
						  </div>
						  <input type="hidden" value="<?php echo $data['cid'];?>" name="cid">
						  <button type="submit" class="btn btn-primary" name="submit">Add Coures</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- center part and-->
</body>
</html>