<?php
include("../include/configure.php");
$vid= $_GET['vid'];
$obj_review->deletedata($vid);
header("location:review.php");exit;
?>