<style>
.error {color:red}
</style>

<?php
include("../include/configure.php");
//print_r($_SESSION);exit;

if(!isset($_SESSION['adminId']) && $_SESSION['adminId'] == '')
{
	header('location:index.php');exit;
}
$cnameErr=$descriptionErr = $priceErr = $fileToUploadErr = '';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	function call($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if(empty($_POST['cname']))
	{
		$cnameErr = "canme is required";
	}
	else
	{
		$obj_course->cname = call($_POST['cname']);
	}
	if(empty($_POST['description']))
	{
		$descriptionErr = "description is required";
	}
	else
	{
		$obj_course->description = call($_POST['description']);
	}
	if(empty($_POST['price']))
	{
		$priceErr = "price is required";
	}
	else
	{
		$obj_course->price = call($_POST['price']);
	}
	if(empty($_FILES['fileToUpload']['name']))
	{
		$fileToUploadErr = "cimg is required";
	}
	else
	{
		$obj_course->cimg = call($_FILES['fileToUpload']['name']);
		$target_dir="../upload_img/";
		$target_file = $target_dir. basename($_FILES['fileToUpload']['name']);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
	}

	if($_POST['cname']!='' && $_POST['description']!='' && $_POST['price']!='' && $_FILES['fileToUpload']['name']!='' )
	{
		$obj_course->addrecord();
		header('location:courses.php');exit;
	}
}
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  href="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>css/bootstrap.min.css">
	<link rel="stylesheet"  href="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>css/backand_style.css">
	<script src="<?php echo DTS_WS_SITE_WEB_ASSETS; ?>ckeditor/ckeditor.js" ></script>
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
							<input type="text" class="form-control" name="cname" id="exampleInputEmail1" >
							<span class="error">*<?php echo $cnameErr ?> </span>
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Description:</b></label>
							<textarea type="text" class="form-control" id="description" name="description"></textarea>
							<span class="error">*<?php echo $descriptionErr ?> </span>
						  </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Price:</b></label>
							<input type="text" class="form-control" name="price" id="exampleInputPassword1">
							<span class="error">*<?php echo $priceErr ?> </span>
						  </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Course Img:</b></label>
							<input type="file" class="form-control" name="fileToUpload" id="exampleInputPassword1">
							<span class="error">*<?php echo $fileToUploadErr ?> </span>
						  </div>
							<button type="submit" class="btn btn-primary">Add Coures</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	
		// Initialize CKEditor
		CKEDITOR.replace('description',{

			
   
		}); 
	
    	
	</script>
<!-- center part and-->
</body>
</html>