<?php
include("../include/configure.php");
$tid= $_GET['tid'];
$obj_trainer->deletedata($tid);
header("location:trainer.php");exit;
?>