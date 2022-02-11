<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Template</title>

	<style>
		nav {
			position: relative;
			margin: auto;
			width: 100%;
			height: auto;
			background: black;
		}

		nav ul {
			position: relative;
			margin: auto;
			width: 50%;
			text-align: center;
		}

		nav ul li {
			display: inline-block;
			width: 24%;
			line-height: 50px;
			list-style: none;
		}

		nav ul li a {
			color: white;
			text-decoration: none;
		}

		section {
			position: relative;
			margin: auto;
			width: 400px;
		}

		section h1 {
			position: relative;
			margin: auto;
			padding: 10px;
			text-align: center;
		}

		section form {
			position: relative;
			margin: auto;
			width: 400px;
		}

		section form input#usuarioRegistro {
			text-transform: lowercase;
			/* Hago que el texto se cambie a minusculas*/
			display: inline-block;
			padding: 10PX;
			width: 95%;
			margin: 5PX;
		}

		section form input {
			display: inline-block;
			padding: 10PX;
			width: 95%;
			margin: 5PX;
		}

		section form input[type="submit"] {
			position: relative;
			margin: 20px auto;
			left: 4.5%;

		}

		table {
			position: relative;
			margin: auto;
			width: 100%;
			left: -10%;
		}

		table thead tr th {
			padding: 10px;
		}

		table tbody tr td {
			padding: 10px;
		}
	</style>
	<script src="views/js/jquery-3.0.0.min.js"></script>

</head>

<body>

	<?php include "modules/navegacion.php"; ?>

	<section>

		<?php


		$mvc = new MvcController();
		$mvc->enlacesPaginasController();

		?>

	</section>

	<ul>
		<li>En el ejercicio anterior puedo crear 2 usuarios con mismo correo y pass iguales y cuando ingrese va a ir a cualquiera</li>
		<li>AJAX Es tecnologia del lado cliente, entonces tengo que trabajar en js</li>
		<li>En ValidarRegistro.js</li>
	</ul>

	<script src=" views/js/validarRegistro.js"></script>
	<!--En este archivo se ve si usuario o correo estan repetidos-->
	<script src="views/js/validarIngreso.js"></script>
	<script src="views/js/validarCambio.js"></script>

</body>

</html>