<?php
include("../include/configure.php");
$pid= $_GET['pid'];
$obj_page->Deletepage($pid);
header("location:page.php");exit;
?>