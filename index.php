<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>RoodeeRoomak.com</title>
    <meta name="keywords" content="">
	<meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
	Medigo Template
	http://www.templatemo.com/preview/templatemo_460_medigo
    -->
    
	<!-- Google Fonts -->
	<link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700itali" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,500,200,100,600" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="bootstrap/bootstrap.css">
	<link rel="stylesheet" href="css/misc.css">
	<link rel="stylesheet" href="css/blue-scheme.css">
	<link rel="stylesheet" href="css/custom-style.css">
	<link rel="stylesheet" href="css/animate.css">
	<script src="js/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="css/sweetalert2.min.css">
	
	<!-- JavaScripts -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

</head>
<body>
	<?php 
	 	include "header.php";
	?>

	<?php 
		if(isset($_GET['p'])){
			$page = "pages/".$_GET['p'].'.php';
			if(file_exists($page)){
				include($page);
			}
			
		}else{
			include("pages/home.php");
		}
	?>

	<?php 
	 	include "footer.php";
	?>

	<!-- Scripts -->
	<script src="js/min/plugins.min.js"></script>
	<script src="js/min/medigo-custom.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<?php 
		if(isset($_GET['p'])){
			$page = "controllers/".$_GET['p'].'.controller.js';
			if(file_exists($page)){
			echo '<script src="'.$page.'"></script>';
			}
			
		}else{
			echo '<script src="controllers/main.controller.js"></script>';
		}
	?>
</body>
</html>