<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: Login	                                    / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- login.php               		              	    | $$ /$$$| $$| $$     |__/  \ $$  -->
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

		<title>Hub</title>

		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Intégration de Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- Intégration du style css -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<header class="p-3 bg-dark text-white">
			<div class="container">
				<div class="d-flex justify-content-end gap-3 align-items-center">
					<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
						<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
					</a>

					<div class="text-end">
						<a href="index.php" class="btn btn-warning">Sign-out</a>
					</div>

					<a href="#" class="d-block link-dark text-decoration-none" aria-expanded="false">
						<img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" alt="Avatar" width="32" height="32" class="rounded-circle">
					</a>
				</div>
			</div>
		</header>

		<main>
			<div class="d-flex d-flex flex-column gap-5 text-center justify-content-center align-items-center vh-100">
				Bienvenue User ! :)
			</div>
		</main>
	</body>
</html>