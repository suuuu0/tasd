<?php
include("../include/configure.php");
$eid= $_GET['eid'];
$obj_event->deletedata($eid);
header("location:event.php");exit;
?>