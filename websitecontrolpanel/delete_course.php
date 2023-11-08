<?php
include("../include/configure.php");
$cid= $_GET['cid'];
$obj_course->deletedata($cid);
header("location:courses.php");exit;
?>