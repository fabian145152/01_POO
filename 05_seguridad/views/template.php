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
		<li><u><b>Estas validaciones son del lado del cliente.</b></u></li>
		<li>1_Validar Registro en js.</li>
		<li>2_Capturo unas variables en los input con los id.</li>
		<ul>
			<li>Usuario no mas de 6 caracteres y minusculas.</li>
			<ul>
				<li>Hago una validacion doble porque desde html se ouede editar el archivo y cambierle la length, pero desde js no.</li>
				<li>Si modifico el archivo html desde el inspector con F12 me va a dejar escribir mas de 6 caracteres en el formulario,
					pero desde js me va a aparecer el cartel de no mas de 6 caracteres. </li>
				<li>Acento Circunflejo ^ ALT + 94</li>
			</ul>
			<li>Password no menos de 6 caracteres numeros y minusculas.</li>
			<ul>
				<li>Agrego esta linea en el input del password.</li>
				<ul>
					<li>pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"</li>
					<li>sacado de aca:</li>
					<li><a href="https://www.w3schools.com/tags/att_input_pattern.asp">Link</a></li>
				</ul>
				<li>Validar correo.</li>
				<li>Validar teminos y condiciones.</li>
			</ul>
		</ul>
		<li><u><b>Validar Ingreso del ladeo Servidor.</b></u></li>
		<li>Ojo puedo cambiar los nombres de los js con el inspector y de ese modo saltear las protecciones de js.
			Por eso tengo que validar del lado del servidor tambien.
			<ul>
				<li>Voy al archivo Controller.php y uso la funcion preg_match, para validar el registro y que no lleges caracteres especiales</li>
			</ul>
		</li>
		<li>Falta validarCambio y Validar Ingreso</li>

	</ul>

	<script src="views/js/validarRegistro.js"></script>
	<script src="views/js/validarIngreso.js"></script>
	<script src="views/js/validarCambio.js"></script>

</body>

</html>