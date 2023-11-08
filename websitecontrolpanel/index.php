<style>
.error {color: #FF0000;}
</style>

<?php
include("../include/configure.php");
$nameErr=$passwordErr='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	function call($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if(empty($_POST['name']))
	{
		$nameErr = "name is required";
	}else
	{
		$obj_login->name = call($_POST['name']);
	}
	if(empty($_POST['password']))
	{
		$passwordErr = "password is required";
	}else
	{
		$obj_login->password = call($_POST['password']);
	}
	
	
	$obj_login->Check();
	
	//print_r($arr);exit;
	$Record = $obj_login->GetNumRows();
	if($Record<1)
	{
		$err = "Invalid username and password";
	}
	else 
	{
		$arr = $obj_login->GetObjectFromRecordset();
		$_SESSION['adminId'] = $arr->adminID;
		
		header('location:courses.php');exit;
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
	<div class="container-fluid  bg_login">
		<div class="container ">
			<div class="row">
				<div class="col-12 login_diplay ">
					<form class="white_bg_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
					  <div class="mb-3">
						<label  class="form-label">User Name</label>
						<input type="text" class="form-control" name="name" id="exampleInputEmail1" >
						<span class="error">*<?php echo $nameErr ?></span>
					</div>
					  <div class="mb-3">
						<label  class="form-label">Password</label>
						<input type="password" class="form-control" name="password" id="exampleInputPassword1">
						<span class="error">*<?php echo $passwordErr ?></span>
					  </div>
					  <button type="su
					  bmit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>