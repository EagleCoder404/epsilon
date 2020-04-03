<?php
include "../libraries/lemons.php";
$con = getCon();
$sql=<<<EOD
  delete from user;

EOD;
$con->query($sql);
echo $con->error;
 ?>
