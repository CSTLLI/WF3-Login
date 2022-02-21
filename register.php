<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: Login	                                    / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- register.php                                  	    | $$ /$$$| $$| $$     |__/  \ $$  -->
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

		<title>Register</title>

		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Intégration de Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- Intégration du style css -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body class="d-flex d-flex flex-column text-center justify-content-center align-items-center vh-100">

		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<!-- Titre -->
					<h2 class="text-center text-dark mt-5">Register</h2>

					<div class="text-center mb-5 text-dark"></div>
						<div class="card my-5">

							<form action="" method="post" class="card-body cardbody-color p-lg-5">
								<div class="text-center">
									<img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
								</div>
						
								<div class="mb-2">
									<input type="text" class="form-control" name="username" id="Username" aria-describedby="" placeholder="User Name">
								</div>

								<div class="mb-2">
									<input type="text" class="form-control" name="mail" id="Mail" aria-describedby="" placeholder="Mail">
								</div>

								<div class="mb-2">
									<input type="password" class="form-control" name="pass1" id="password" placeholder="Password">
								</div>

								<div class="mb-2">
									<input type="password" class="form-control" name="pass2" id="password" placeholder="Password Confirm">
								</div>

								<div class="mb-2">
									<input type="file" class="form-control" name="avatar" id="avatar" placeholder="Avatar">
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-color px-5 mb-5 w-100">Create an Account</button>
								</div>

								<div class="form-text text-center mb-5 text-dark"> 
									<a href="index.php" class="text-dark fw-bold"> Back</a>
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

	// Couper l'affichage des erreurs lors de la première visite de la page
	if (empty($_POST['username']) && empty($_POST['mail']) && empty($_POST['pass1'])){
		die();
	}

	if (isset($_POST['username']) && !empty($_POST['username']) && preg_match("/^[a-zA-Z][\p{L}-]*$/", $_POST['username'])){
		$input_username = $_POST['username'];

		if (isset($_POST['mail']) && !empty($_POST['mail']) && preg_match("/^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,12})+$/", $_POST['mail'])){
			$input_mail = $_POST['mail'];

			if (isset($_POST['pass1']) && !empty($_POST['pass1']) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $_POST['pass1'])){
				$input_pass1 = $_POST['pass1'];

				if (isset($_POST['pass2']) && !empty($_POST['pass2']) && $_POST['pass2'] == $input_pass1){
					$input_pass2 = $_POST['pass2'];

					$input_pass1 = password_hash($input_pass1, PASSWORD_BCRYPT);

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

						try {
							$sth = $conn->prepare("INSERT INTO user (nom, email, mot_de_passe) VALUES ('$input_username', '$input_mail', '$input_pass1')");
							$sth->execute();
							
							header("Location:index.php");		
							
						} catch(PDOException $e){
							// echo $e->getCode();

							if ($e -> getCode() == 23000){
								echo "<div class='alert alert-danger' role='alert'>	Cet email existe déjà </div>";
								header("Refresh:2");
							}else{
								echo "<div class='alert alert-danger' role='alert'>	Une erreur est survenue. </div>";
								header("Refresh:2");
							}
						}

					} catch(PDOException $e) {
						//echo "Connection failed: " . $e->getMessage();
						die();
					}

				}else{
					echo "<div class='alert alert-danger' role='alert'>	Les mots de passes ne sont pas identiques. </div>";
					header("Refresh:2");
				}
			}else{
				echo "<div class='alert alert-danger' role='alert'>	Le mot de passe est invalide. </div>";
				header("Refresh:2");
			}
		}else{
			echo "<div class='alert alert-danger' role='alert'>	Cet email est invalide. </div>";
			header("Refresh:2");
		}
	}else{
		echo "<div class='alert alert-danger' role='alert'>	Ce nom est invalide. </div>";
		header("Refresh:2");
	}
?>