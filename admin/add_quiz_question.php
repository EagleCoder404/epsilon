<?php

function add()
{
    $html="<form action='add_it.php' method='POST' enctype='multipart/form-data'>
        <input type='text' name='question_name' placeholder='question'/>
        
        <input type='text' name='answer' placeholder='answer'/>
        <button type='submit'>submit</button>
    </form>";
    echo $html;
}
session_start();
if(isset($_SESSION['user_name']))
    if($_SESSION['user_name']=="toor")
        add();
    else
        echo "fuck off";
else
    echo "fuck off";

?>
