<!DOCTYPE html>
<?php

include "../header.php";

if(!isset($_SESSION['user_name']))

{

    header("Location:../login/");

    die();

}

    $user_name = $_SESSION['user_name'];

    include "../libraries/lemons.php";

    $con = getCon();

    $res = $con->query("select * from user order by id");

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

    $rank=0;



    foreach($user as $u)

    {

        $rank++;

        if($u==$user_name)

            break;

    }





?>
	<html lang="en" dir="ltr">

	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
  <!-- changed -->
	<body onload="getQ()">
		<?= $code ?>
			<br>
			<div class='container text-center'> <kbd><?= $user_name ?> : <?= $rank ?></kbd> </div>
			<div class="container mt-3 border" id='main'>
				<div class="row">
					<div class="col-sm p-3 " id='i'> </div>
					<div class="col-sm">
						<div class='container' id='q'> </div>
						<div class="container" id='a-c'>
							<form id='submitF'>
								<div class='form-group'>
									<input type='text' class='form-control mt-3' name="answer" id="answer" placeholder="Answer">
									<div class="container" id='stuff'>
										<input type='submit' id='sub' class='btn btn-primary mt-3'> </div>
								</div>
								<div class="container " id="result"> </div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid text-center mt-3 bg-dark fixed-bottom"> <kbd>TEAM 12</kbd> </div>
			<script>
			var num;

			function sleep(milliseconds) {
				const date = Date.now();
				let currentDate = null;
				do {
					currentDate = Date.now();
				} while (currentDate - date < milliseconds);
			}

			function getQ() {
				$.ajax({
					url: "get_question.php",
					method: "post",
					data: {},
					success: function(res) {
						res = res.trim();
						if(res == 'gg') {
							$('#main').html("<div class='jumbotron display-1'>You've got em all ash!'</div>");
							return;
						}
						console.log(res);
						res = JSON.parse(res);
						num = res['n'];
						if(res['f'] != "") $("#i").html("<img class='img-fluid float-right' src=" + res['f'] + ">")
						$("#q").html(res['q'])
					},
					error: function(x, y, z) {}
				})
			}
			$("#submitF").submit(function(e) {
				e.preventDefault();
				$.ajax({
					url: "check_answer.php",
					method: "POST",
					data: {
						num: num,
						answer: $("#answer").val()
					},
					success: function(res) {
						res = res.trim();
						if(res == "yes") {
							$("#result").html("CORRECT!");
							$("#result").removeClass("bg-danger");
							$("#result").addClass("bg-success");
							$('#stuff').html("<a class='btn btn-success mt-3' href='/quiz/'>Onward</a>")
						} else {
							$("#result").html("WRONG!!");
							$("#result").addClass("bg-danger");
							$("#result").removeClass("bg-success");
						}
					},
					error: function(x, y, z) {},
				})
			})
			</script>
	</body>

	</html>
