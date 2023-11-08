<style>
.error {color: #FF0000;}
</style>
<?php
include("../include/configure.php");

if(!isset($_SESSION['adminId']) && $_SESSION['adminId'] == '')
{
	header('location:index.php');exit;
}
$snameErr = $courseErr = $feeErr = $e_mailErr = $phoneErr = $alt_phoneErr = $usernameErr = $passwordErr = $admission_dateErr = $student_imgErr = '';


if($_SERVER["REQUEST_METHOD"] == "POST")
{			
		function call($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
			if (empty($_POST["sname"])) 
			{
				$snameErr = "sname is required";
			}
			else
			{
			$obj_student->sname = call($_POST["sname"]);
			}

			if (empty($_POST["course"])) 
			{
				$courseErr = "course is required";
			 } 
			else 
			{
				$obj_student->course = call($_POST["course"]);
			}
			if (empty($_POST["fee"]))
			{
				$feeErr = "fee is required";
			 } 
			 else 
			 {
				$obj_student->fee = call($_POST["fee"]);
			}
			if (empty($_POST["e_mail"]))
			{
				$mailErr = "e_mail is required";
			} 
			 else 
			 {
				$obj_student->e_mail = call($_POST["e_mail"]);
			}
			if (empty($_POST["phone"])) 
			{
				$phoneErr = "phone is required";
			 } 
			 else 
			 {
				$obj_student->phone = call($_POST["phone"]);
			}
			if (empty($_POST["alt_phone"])) 
			{
				$alt_phoneErr = "alt_phone is required";
			 } 
			 else 
			 {
				$obj_student->alt_phone = call($_POST["alt_phone"]);
			}
			if (empty($_POST["username"])) 
			{
				$usernameErr = "username is required";
			 } 
			 else 
			 {
				$obj_student->username = call($_POST["username"]);
			}
			if (empty($_POST["password"])) 
			{
				$passwordErr = "password is required";
			 } 
			 else 
			 {
				$obj_student->password = call($_POST["password"]);
			}
			if (empty($_POST["admission_date"])) 
			{
				$admission_dateErr = "admission_date is required";
			 } 
			 else 
			 {
				$obj_student->admission_date = call($_POST["admission_date"]);
			}
			if (empty($_FILES['fileToUpload']['name'])) 
			{
				$student_imgErr = "student_img is required";
			 } 
			 else 
			 {
				$obj_student->student_img = call($_FILES['fileToUpload']['name']);
				$target_dir ="../upload_img/";
				$target_file = $target_dir .basename($_FILES['fileToUpload']['name']);
				move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
				
			
			}
			
			if($_POST['sname']!='' && $_POST['course']!='' && $_POST['fee']!='' && $_POST['e_mail']!='' && $_POST['phone']!='' && $_POST['alt_phone']!='' && $_POST['username']!='' && $_POST['password']!=''&& $_POST['admission_date']!='' && $_FILES['fileToUpload']['name']!='')
			{
				$obj_student->addrecord();
				header("location:student.php");exit;
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
						<form class="add_courses_form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div class="row">
								<div class="col-6">
									<div class="mb-3">
										<label  class="form-label"><b>Name:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="sname" >
										<span class="error">*<?php echo $snameErr; ?></span>
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Course:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="course" >
										<span class="error">*<?php echo $courseErr; ?></span>
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>fee:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="fee" >
										<span class="error">*<?php echo $feeErr; ?></span>
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Username:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="username" >
										<span class="error">*<?php echo $usernameErr; ?></span>
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Admission Date:</b></label>
										<input type="date" class="form-control" id="exampleInputEmail1" name="admission_date" >
										<span class="error">*<?php echo $admission_dateErr; ?></span>
									</div>
								</div>
								<div class="col-6">
									<div class="mb-3">
										<label  class="form-label"><b>G Mail:</b></label>
										<input type="mail" class="form-control" id="exampleInputEmail1" name="e_mail" >	
										<span class="error">*<?php echo $e_mailErr; ?></span>
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Phone:</b></label>
										<input type="number" class="form-control" id="exampleInputEmail1" name="phone" >
										<span class="error">*<?php echo $phoneErr; ?></span>
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Alt Phone:</b></label>
										<input type="number" class="form-control" id="exampleInputEmail1" name="alt_phone" >
										<span class="error">*<?php echo $alt_phoneErr; ?></span>
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Password:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="password" >
										<span class="error">*<?php echo $passwordErr; ?></span>
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Student Img:</b></label>
										<input type="file" class="form-control" id="exampleInputEmail1" name="fileToUpload" >
										<span class="error">*<?php echo $student_imgErr; ?></span>
									</div>
									<div class="mb-3 mt_4">
										<button type="submit" class="btn btn-primary student_right_btn">Add trainer</button>
									</div>
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