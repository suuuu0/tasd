<!DOCTYPE html>
<html>
<body>

<?php
$int = "kosd";

if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}
?>

</body>
</html>
