<!DOCTYPE html>
<?php
    include "../libraries/lemons.php";
    $con = getCon();
    $res = $con->query("select * from user");
    $points=[];
    $rank=[];
    $user=[];
    foreach($res as $row)
    {
        
        $points[] =$row['points'];
        $rank[] = 1440-$row['rank'];
        $user[] = $row['user_name'];
    }
    array_multisort($points,SORT_DESC,SORT_NUMERIC,$rank,SORT_DESC,SORT_NUMERIC,$user);
    $i=1;
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>

      <nav class="navbar navbar-expand-sm  justify-content-center bg-dark navbar-dark">
         <a href="/" class='navbar-brand'>
          Epsilon
        </a> 
 
     </nav>
    <div class='jumbotron text-center'>
        <h1 class="">Hall Of Fame</h1>
    </div>
   </div>
   <div class='container mt-3'>
       <table class='table '>
           <thead class='thead-dark'>
                <tr>
                    <th>Rank</th>
                    <th>User</th>
                </tr>
           </thead>
<?php foreach($user as $u){?>
           <tr>
               <td><?= $i ?></td>
               <td><?= $u ?></td>
           </tr>
           <?php $i++;} ?>
       </table>
   </div>

</body>
</html>
