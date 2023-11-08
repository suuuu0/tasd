<style>
.error {color: #FF0000;}
</style>
<?php
include("../include/configure.php");
$sid = isset($_GET['sid'])?$_GET['sid']:1;
//$sid = $_GET['sid'];
//echo $sid;
$obj_student->FetchData($sid);
$recoard = $obj_student->GetNumRows();

//print_r($recoard);exit;

if($recoard >0)
{
	$data = $obj_student->GetArrayFromRecord();
}

if(isset($_POST['submit']))
{	
	$sid = $_POST['sid'];

	$obj_student->sname = $_POST['sname'];
	$obj_student->course = $_POST['course'];
	$obj_student->fee = $_POST['fee'];
	$obj_student->e_mail = $_POST['e_mail'];
	$obj_student->phone = $_POST['phone'];
	$obj_student->alt_phone = $_POST['alt_phone'];
	$obj_student->username = $_POST['username'];
	$obj_student->password = $_POST['password'];
	$obj_student->admission_date = $_POST['admission_date'];
	$obj_student->editdata($sid);
	header("location:student.php");
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
						<form class="add_courses_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div class="row">
								<div class="col-6">
									<div class="mb-3">
										<label  class="form-label"><b>Name:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="sname" value=" <?php echo  $data['sname'] ?>" > 
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Course:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="course"  value=" <?php echo  $data['scourse'] ?>">
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>fee:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="fee"  value=" <?php echo  $data['fee'] ?>">
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>UserID:</b></label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="username" value=" <?php echo  $data['username'] ?>" >
									</div>
									<div class="mb-3">
										<label  class="form-label"><b>Date:</b></label>
										<input type="date" class="form-control" id="exampleInputEmail1" name="admission_date" value=" <?php echo $data['admission_date'] ?>" >
									</div>
								</div>
								<div class="col-6">
									<div class="mb-3">
									<label  class="form-label"><b>G Mail:</b></label>
									<input type="mail" class="form-control" id="exampleInputEmail1" name="e_mail"  value=" <?php echo  $data['e_mail'] ?>">
								  </div>
								  <div class="mb-3">
									<label  class="form-label"><b>Phone:</b></label>
									<input type="num" class="form-control" id="exampleInputEmail1" name="phone" value=" <?php echo  $data['phone'] ?>">
								  </div>
								   <div class="mb-3">
									<label  class="form-label"><b>Alt Phone:</b></label>
									<input type="num" class="form-control" id="exampleInputEmail1" name="alt_phone" value=" <?php echo  $data['alt_phone'] ?>" >
								  </div>
								  <div class="mb-3">
									<label  class="form-label"><b>Password:</b></label>
									<input type="text" class="form-control" id="exampleInputEmail1" name="password" value=" <?php echo  $data['password'] ?>" >
								  </div>
									<div class="mb-3">
										<input type="hidden" class="form-control" id="exampleInputEmail1" name="sid" value=" <?php echo  $data['sid'] ?>" >
										<button type="submit" class="btn btn-primary student_right_btn" name="submit">Add trainer</button>
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