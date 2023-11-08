<?php
include("../include/configure.php");
$sid= $_GET['sid'];
$obj_student->deletedata($sid);
header("location:student.php");exit;
?>