<?php
include("../include/configure.php");
$pnameErr = $descriptionErr = '';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	function call($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if(empty($_POST['pname']))
	{
		$pnameErr = "pname is required";
	}else
	{
		$obj_page->pname = call($_POST['pname']);
	}
	if(empty($_POST['description']))
	{
		$descriptionErr = "description is required";
	}else
	{
		$obj_page->description = call($_POST['description']);
	}
	if($_POST['pname'] !='' && $_POST['description'] !='')
	{
		$obj_page->addrecord();
		header("location:page.php");exit;
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
						<form class="add_courses_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
						  <div class="mb-3">
							<label  class="form-label"><b>Page Name:</b></label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="pname">
							<span class="error">*<?php echo  $pnameErr; ?></span>
						 </div>
						  <div class="mb-3">
							<label  class="form-label"><b>Description:</b></label>
							<textarea type="text" class="form-control" id="exampleInputPassword1" name="description"></textarea>
							<span class="error">*<?php echo $descriptionErr; ?></span>
						 </div>
						  <button type="submit" class="btn btn-primary">Add Page</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- center part and-->
</body>
</html>