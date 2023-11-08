<style>
.error {color: #FF0000;}
</style>
<?php
include("../include/configure.php");

/*if(!isset($_SESSION['adminId']) && $_SESSION['adminId'] == '')
{
	header('location:index.php');exit;
}*/
$tid = isset($_GET['tid'])? $_GET['tid']:1;

$obj_trainer->FetchData($tid);
$data = $obj_trainer->GetObjectFromRecordset();


if(isset($_POST['submit']))
{
	//echo"<pre>";
	//print_r($_POST);
	$tid = $_POST['tid'];
	$obj_trainer->tname = $_POST['tname'];
	$obj_trainer->t_details = $_POST['t_details'];
	$obj_trainer->description = $_POST['description'];
	$obj_trainer->phone = $_POST['phone'];
	$obj_trainer->username = $_POST['username'];
	$obj_trainer->password = $_POST['password'];
	$obj_trainer->cid = $_POST['cid'];
	
	if(isset($_FILES['fileToUpload']['name']) && $_FILES['fileToUpload']['name']!='')
	{
		$obj_trainer->timg = $_FILES['fileToUpload']['name'];
		$obj_trainer->update_image($tid);
	}
	$obj_trainer->editdata($tid);
	header("location:trainer.php?tid=".$tid);
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
						<form class="add_courses_form" method="post" enctype="multipart/form-data">
						  <div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label  class="form-label"><b>Trainers Name:</b></label>
									<input type="text" class="form-control" id="exampleInputEmail1" name="tname" value="<?php echo $data->tname; ?>" >
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Trainers Details:</b></label>
									<input type="text" class="form-control" id="exampleInputEmail1" name="t_details" value="<?php echo $data->t_details; ?>">
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Description:</b></label>
									<textarea type="text" class="form-control" id="exampleInputPassword1" name="description" value="<?php echo $data->description; ?>"><?php echo $data->description; ?></textarea>
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Phone:</b></label>
									<input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $data->phone; ?>">
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label  class="form-label"><b>Image:</b></label>
									<input type="file" class="form-control" id="exampleInputPassword1" name="fileToUpload" value="<?php echo $data->timg; ?>"><img src="../upload_img/<?php echo $data->timg; ?>" width="100px">
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Username :</b></label>
									<input type="text" class="form-control" id="exampleInputPassword1" name="username" value="<?php echo $data->username; ?>">
								</div>
								<div class="mb-3">
									<label  class="form-label"><b>Password:</b></label>
									<input type="text" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $data->password; ?>">
										<input type="hidden" class="form-control" id="exampleInputPassword1" name="tid" value="<?php echo $data->tid; ?>">
										<input type="hidden" class="form-control" id="exampleInputPassword1" name="cid" value="<?php echo $data->cid; ?>">
								</div>
								<div class="mb-3">
									<label for="cid"  class="form-label"><b>Select Name:</b></label>
									<select class="form-control" name="cid">
										<option> Select category</option>
										<?php
											$obj_course->ShowCourses();
											$num = $obj_course->GetNumRows();
											if($num >0)
											{
												while($data2 = $obj_course->GetArrayFromRecord())
												{			
												?>
												<option value="<?php echo $data2['cid']; ?>" <?php if($data2['cid'] == $data->cid){ echo "selected"; } ?>>
														<?php echo $data2['cname']; ?>
												 </option>
												<?php
												}
											}
										?>
									</select>
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