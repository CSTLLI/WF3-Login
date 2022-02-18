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

	<body class="d-flex d-flex flex-column gap-5 text-center justify-content-center align-items-center vh-100">

		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<!-- Titre -->
					<h2 class="text-center text-dark mt-5">Register</h2>

					<div class="text-center mb-5 text-dark"></div>
						<div class="card my-5">

							<form action="index.php" class="card-body cardbody-color p-lg-5">
								<div class="text-center">
									<img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
								</div>
						
								<div class="mb-2">
									<input type="text" class="form-control" id="Username" aria-describedby="" placeholder="User Name">
								</div>

								<div class="mb-2">
									<input type="text" class="form-control" id="Mail" aria-describedby="" placeholder="Mail">
								</div>

								<div class="mb-2">
									<input type="password" class="form-control" id="password" placeholder="Password">
								</div>

								<div class="mb-2">
									<input type="password" class="form-control" id="password" placeholder="Password Confirm">
								</div>

								<div class="mb-2">
									<input type="file" class="form-control" id="avatar" placeholder="Avatar">
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