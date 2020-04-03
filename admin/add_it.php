<?php
include "../libraries/lemons.php";
$q = $_POST['question_name'];
$a = $_POST['answer'];
$con = getCon();
// $target_dir = "upl/";

// $target_file = $target_dir . basename($_FILES["image"]["name"]);
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



$res = $con->query('select max(number) as n from quiz;')->fetch_assoc();

if($res['n']==NULL)
    $num=1;
else
    $num=$res['n']+1;

$q = addslashes($q);
$a = addslashes($a);
$sql = "insert into quiz values($num,'$q','$a')";
if($con->query($sql)===True)
    echo "question added";
else
    echo $con->error."<br>";
// echo "<br>$imageFileType<br>";
// echo is_writable('../data');
    // if (move_uploaded_file($_FILES["image"]["tmp_name"], "../data/"."$num.".$imageFileType)) {
    //     echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    // } else {
    //     echo "Sorry, there was an error uploading your file.";
    // }
?>
