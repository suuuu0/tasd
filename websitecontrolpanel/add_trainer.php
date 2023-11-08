<style>
.error {color: #FF0000;}
</style>
<?php
include("../include/configure.php");

if(!isset($_SESSION['adminId']) && $_SESSION['adminId'] == '')
{
	header('location:index.php');exit;
}
/*if(isset($_POST['submit']))
{
	print_r($_POST);exit;
}*/
$tnameErr = $t_detailsErr = $descriptionErr = $fileToUploadErr = $phoneErr = $usernameErr = $passwordErr =  '';


if($_SERVER["REQUEST_METHOD"] == "POST")
{			
		function call($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
			if (empty($_POST["tname"])) 
			{
				$tnameErr = "tname is required";
			} 
			else 
			{
			$obj_trainer->tname = call($_POST["tname"]);
			}
			if (empty($_POST["cid"]))
			{
				$tnameErr = "cid is required";
			} 
			else 
			{
			$obj_trainer->cid = call($_POST["cid"]);
			}
			if (empty($_POST["t_details"])) {
				$t_detailsErr = "t_details is required";
			} 
			else 
			{
				$obj_trainer->t_details = call($_POST["t_details"]);
			}
			if (empty($_POST["description"])) {
				$descriptionErr = "description is required";
			} 
			else 
			{
				$obj_trainer->description = call($_POST["description"]);
			}
			if(empty($_FILES['fileToUpload']['name'])) {
				$fileToUploadErr = "timg is required";
			}
			else 
			{
				$obj_trainer->timg = call($_FILES['fileToUpload']['name']);
				$target_dir = "../upload_img/";
				$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
				move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
			}
			if (empty($_POST["phone"])) {
				$phoneErr = "phone is required";
			} 
			else 
			{
				$obj_trainer->phone = call($_POST["phone"]);
			}
			if (empty($_POST["username"])) {
				$usernameErr = "username is required";
			 } 
			else 
			{
				$obj_trainer->username = call($_POST["username"]);
			}
			if (empty($_POST["password"])) {
				$passwordErr = "password is required";
			 } 
			else 
			{
				$obj_trainer->password = call($_POST['password']);
			}
			if($_POST['tname']!='' && $_POST['t_details']!='' && $_POST['description']!='' && $_FILES['fileToUpload']['name']!='')
			{
				$obj_trainer->addrecord();
				header('location:trainer.php');exit;
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
						<h3>Add Trainer</h3>
						<form class="add_courses_form"  enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						  <div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label for="cid"  class="form-label"><b>Select Name:</b></label>
									<select class="form-control" name="cid">
									<option selected> Select category</option>
										<?php
											$obj_course->ShowCourses();
											$num = $obj_course->GetNumRows();
											if($num >0)
											{
											while( $data = $obj_course->GetArrayFromRecord())
											{

										?>
											<option value="<?php echo $data['cid'] ?>" ><?php echo $data['cname'] ?></option>
										<?php
										}
										}
										?>
									</select>
									<span class="error">*<?php echo $tnameErr; ?></span>
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Trainers Name:</b></label>
									<input type="text" class="form-control" id="exampleInputEmail1" name="tname" >
									<span class="error">*<?php echo $tnameErr; ?></span>
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Trainers Details:</b></label>
									<input type="text" class="form-control" id="exampleInputEmail1" name="t_details">
									<span class="error">*<?php echo $t_detailsErr; ?></span>
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Description:</b></label>
									<textarea type="text" class="form-control" id="exampleInputPassword1" name="description"></textarea>
									<span class="error">*<?php echo $descriptionErr; ?></span>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label  class="form-label"><b>Image:</b></label>
									<input type="file" class="form-control" id="exampleInputPassword1" name="fileToUpload">
									<span class="error">*<?php echo $fileToUploadErr; ?></span>
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Phone:</b></label>
									<input type="text" class="form-control" id="exampleInputPassword1" name="phone">
									<span class="error">*<?php echo $phoneErr; ?></span>
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Username :</b></label>
									<input type="text" class="form-control" id="exampleInputPassword1" name="username">
									<span class="error">*<?php echo $usernameErr; ?></span>
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Password:</b></label>
									<input type="text" class="form-control" id="exampleInputPassword1" name="password">
									<span class="error">*<?php echo $passwordErr; ?></span>
								</div>
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-primary right_btn" name="submit">Add trainer</button>
							</div>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- center part and-->
</body>
</html>