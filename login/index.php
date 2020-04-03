<!DOCTYPE html>

<?php

    if(isset($_SESSION['user_name']))

        session_destroy();

?>

<?php include "../header.php";?>

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



    <!--  <nav class="navbar navbar-expand-sm  justify-content-center bg-dark navbar-dark">

         <a href="/" class='navbar-brand'>

          Epsilon

        </a> 

 

     </nav>
         -->
    <?= $code?>
     <div class="container bg-light p-3 mt-3 justify-content-center">



     <form id='main' action="index.html" method="post">

       <div class="row">

         <div class="form-group col-sm">

           

           <input type="text" class='form-control' id='e' name="email" placeholder='email' required>

         </div>

         <div class="form-group col-sm">

          

           <input type="password" class='form-control' id='p' name="pasword" placeholder='password' required>

         </div>

        </div>

        <div class="container mt-3">

         <button id='sub' class='btn btn-primary' type="submit" name="button">Submit</button>

       </div>

       <div class="container border border-danger error mt-3 mb-3">



       </div>



     </form>

   </div>



   <script type="text/javascript">
var r;
   $(".error").hide();

        $('#main').submit(function(e){
    
            e.preventDefault();

    

            $.ajax({

                url:'check_user.php',

                method:'POST',

                data:{'email':$('#e').val(),'password':$('#p').val()},

                success:function(response){
                        response = response.trim();
                    console.log(response);

                if(response==="yes")
                    window.location.href="/";
                else if(response=='no1')
                {

                    $('.error').show();

                    $(".error").html("user not found");

                }
                else if(response=='no2')
                {

                    $('.error').show();

                    $(".error").html("password incorrect");

                }
                else
                {

                  console.log("something happend")
                  console.log(response);
                                           $('.error').show();
                    $(".error").html(response)

                }

                },

            error:function(x,y,z)

            {

                

                console.log(x,"\n",y,"\n",z);

            }

            })

        })

   </script>

</body>

</html>

