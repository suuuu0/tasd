<style>
.error {color: #FF0000;}
</style>

<?php
include("../include/configure.php");
$usernameErr = $passwordErr = '';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	function call($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if(empty($_POST['username']))
	{
		$usernameErr  = "username is a required";
	}
	else
	{
		$obj_student->username = call($_POST['username']);
	}
	if(empty($_POST['password']))
	{
		$passwordErr  = "password is a required";
	}
	else
	{
		$obj_student->password = call($_POST['password']);
	}
	
}
if(isset($_POST['submit']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$obj_student->student_login($username,$password);
			$num = $obj_student->GetNumRows();
			if($num > 0)
			{
				$data = $obj_student->GetArrayFromRecord();
				$user = $data['username'];
				$pass = $data['password'];
				$sid = $data['sid'];
				
				if($username == $user && $password == $pass )
				{
					header("location:student_profile.php?sid=".$sid);
				}
				else
				{
					echo "do not match ";
				}
				
				
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
						<input type="text" class="form-control" name="username" id="exampleInputEmail1" >
						<span class="error">*<?php echo $usernameErr  ?></span>
					</div>
					  <div class="mb-3">
						<label  class="form-label">Password</label>
						<input type="text" class="form-control" name="password" id="exampleInputPassword1">
						<span class="error">*<?php echo $passwordErr  ?></span>
					  </div>
					  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>