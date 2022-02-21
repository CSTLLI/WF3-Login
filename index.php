<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: Login	                                    / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- index.php                                    	    | $$ /$$$| $$| $$     |__/  \ $$  -->
<!--                                                  	| $$/$$ $$ $$| $$$$$     /$$$$$/  -->
<!-- By: vcastell <valeriocastellipro@gmail.com>	    | $$$$_  $$$$| $$__/    |___  $$  -->
<!--                                              		| $$$/ \  $$$| $$      /$$  \ $$  -->
<!-- Created: 2022/02/18 14:30:00 vcastell   	        | $$/   \  $$| $$     |  $$$$$$/  -->
<!-- Updated: 2022/02/18 23:29:28 vcastell              |__/     \__/|__/      \______/   -->
<!--                                                                     				  -->
<!--**************************************************************************************-->

<!DOCTYPE html>
<html lang='fr'>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Login</title>

		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Intégration de Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- Intégration du style css -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body class="d-flex d-flex flex-column gap-5 text-center justify-content-center align-items-center vh-100">

		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<!-- Titre -->
					<h2 class="text-center text-dark mt-5">Login Form</h2>

					<div class="text-center mb-5 text-dark"></div>
						<div class="card my-5">

							<form action="" method="post" class="card-body cardbody-color p-lg-5">
								<div class="text-center">
									<img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="Avatar">
								</div>
						
								<div class="mb-2">
									<input type="text" class="form-control" name="mail" id="email" aria-describedby="" placeholder="Email">
								</div>

								<div class="mb-2">
									<input type="password" class="form-control" name="pass1" id="password" placeholder="Password">
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button>
								</div>

								<div id="emailHelp" class="form-text text-center mb-5 text-dark">Not Registered? 
									<a href="register.php" class="text-dark fw-bold"> Create an Account</a>
								</div>
							</form>
						</div>
					</div>
				</div>
  			</div>
		</div>
	</body>
</html>

<?php
	setlocale(LC_ALL, 'fr_FR.utf8','fra', 'French');

	session_start();

	// Couper l'affichage des erreurs lors de la première visite de la page
	if (empty($_POST['mail']) && empty($_POST['pass1'])){
		die();
	}

	if (!empty($_POST['mail'])){
		$input_mail = $_POST['mail'];

		if (!empty($_POST['pass1'])){
			$input_pass1 = $_POST['pass1'];

				$servername = "phpmyadmin.test";
				$username = "root";
				$password = "";

				// Tentative de connexion à la base
				try {

					$conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
					// set the PDO error mode to exception
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//$conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

					//echo "Connected successfully <br>";

					$sth = $conn->prepare("SELECT nom, email, mot_de_passe FROM user WHERE email = '$input_mail'");
					$sth->execute();

					$result = $sth -> fetchAll();
					
					forEach($result as $user){
						// echo $user['email'];
						// echo $user['mot_de_passe'];

						if (password_verify($input_pass1, $user['mot_de_passe'])) {

							$_SESSION['nom'] = $user['nom'];
							$_SESSION['password'] = $user['mot_de_passe'];

							header("Location:login.php");
						} else {
							echo "<div class='alert alert-danger' role='alert'>	Vous n'avez pas entrer le bon mail ou le bon mot de passe. </div>";
							header("Refresh:2");
						}
					}

				} catch(PDOException $e) {
					echo "<div class='alert alert-danger' role='alert'>	Connection failed: " . $e->getMessage() . "</div>";
					header("Refresh:2");
					die();
				}
		}else{
			echo "<div class='alert alert-danger' role='alert'>	Vous n'avez pas entrer de mot de passe. </div>";
			header("Refresh:2");
		}
	}else{
		echo "<div class='alert alert-danger' role='alert'>	Vous n'avez pas entrer de mail. </div>";
		header("Refresh:2");
	}
?>