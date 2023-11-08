 <?php
	session_start();
	
	
	//print_r($_SESSION);exit;
	if(!isset($_SESSION['adminId']) && $_SESSION['adminId'] == '')
	{
		header('location:index.php');exit;
	}
	session_destroy();		
	session_unset();
	
	header('location:index.php');
	exit;	
?>