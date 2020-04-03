<?php
include "../libraries/lemons.php";
 
 if(rowExists('user','email',$_POST['email']))
    echo "yes";
else
    echo "no";

?>
