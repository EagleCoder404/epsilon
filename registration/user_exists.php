<?php
include "../libraries/lemons.php";
 
 if(rowExists('user','user_name',$_POST['user_name']))
    echo "yes";
else
    echo "no";

?>
