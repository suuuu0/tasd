<?php
include("../include/configure.php");

$pid = isset($_GET['pid'])?$_GET['pid']:1;
$obj_page->Fetchdata($pid);
$record = $obj_page->GetNumRows();
if($record >0)
{
	$data = $obj_page->GetArrayFromRecord();
}
if(isset($_POST['submit']))
{
	$pid=$_POST['pid'];
	$obj_page->pname= $_POST['pname'];
	$obj_page->description= $_POST['description'];
	$obj_page->editdata($pid);
	header("location:page.php");
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
						<form class="add_courses_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
						  <div class="mb-3">
							<label  class="form-label"><b>Page Name:</b></label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="pname" value="<?php echo $data['pname'] ?>">
							
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Description:</b></label>
							<textarea type="text" class="form-control" id="exampleInputPassword1" name="description"  value="<?php echo $data['description'] ?>"><?php echo $data['description'] ?></textarea>
							
						 </div>
							<input type="hidden" name="pid" value="<?php echo $data['pid'] ?>">
						  <button type="submit" class="btn btn-primary" name="submit">Add Page</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- center part and-->
</body>
</html>