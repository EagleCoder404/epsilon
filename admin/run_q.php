<?php
include "../libraries/lemons.php";
$con = getCon();
$sql=<<<EOD
  delete from user;

EOD;
if($con->query($sql))
echo "done";
else
echo $con->error;
 ?>
