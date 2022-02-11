<?php

class MvcController
{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina()
	{

		include "views/template.php";
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController()
	{

		if (isset($_GET['action'])) {

			$enlaces = $_GET['action'];
		} else {

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;
	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController()
	{

		if (isset($_POST["usuarioRegistro"])) {

			#preg_match = Relaiza una comparacion con una expresion regular, ahora del lado del servidor

			if (
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioRegistro"]) &&
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordRegistro"]) &&
				preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST["emailRegistro"])
				#Si esta condicion se cumple, o sea no hay caracteres especiales.
			) {

				#Aqui comienzo la encriptacios
				#crypt() devolverá el hash de un string utilizando el algoritmo estándar basado 
				#en DES de Unix o algoritmos alternativos que puedan estar disponibles en el sistema.

				$encriptar = crypt($_POST["passwordRegistro"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				#El segundo parametro es un salt tipo bowfish, que es de los mas seguros
				#salt, si se ingresa una contraseña poco segura el parametro salt 
				/*
				Un string opcional de salt para la base del hash. Si no se proporciona, el comportamiento se define 
				por la aplicación del algoritmo y puede conducir a resultados inesperados. 
				*/

				$datosController = array(
					"usuario" => $_POST["usuarioRegistro"],
					"password" => $encriptar,				//esta variable tiene el password encriptado y asi la guardo.
					"email" => $_POST["emailRegistro"]
				);

				$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

				if ($respuesta == "success") {

					header("location:ok");
				} else {

					header("location:index.php");
				}
			}
		}
	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController()
	{

		if (isset($_POST["usuarioIngreso"])) {

			#Ava tambien va la validacion de ingreso

			if (
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioIngreso"]) &&
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordIngreso"])
			) {
				#Uso el mismo metodo para desencriptar la contraseña leida de la BBDD y permitir el ingreso

				$encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array(
					"usuario" => $_POST["usuarioIngreso"],
					"password" => $encriptar
				);



				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

				#Aca hago el conteo de intentos.
				$intentos = $respuesta["intentos"];
				$usuario = $_POST["usuarioIngreso"];
				$maximointentos = 2;
				if ($intentos < $maximointentos) {

					if ($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $encriptar) {

						session_start();

						$_SESSION["validar"] = true;

						$intentos = 0;

						$datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);

						$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuarios");

						header("location:usuarios");
					} else {
						++$intentos;
						$datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);
						$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuarios");
						header("location:fallo");
					}
				} else {

					$intentos = 0;

					$datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);

					$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuarios");

					header("location:fallo3intentos");
				}
			}
		}
	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController()
	{

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach ($respuesta as $row => $item) {
			echo '<tr>
				<td>' . $item["usuario"] . '</td>
				<td>' . $item["password"] . '</td>
				<td>' . $item["email"] . '</td>
				<td><a href="index.php?action=editar&id=' . $item["id"] . '"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar=' . $item["id"] . '"><button>Borrar</button></a></td>
			</tr>';
		}
	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController()
	{

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo '<input type="hidden" value="' . $respuesta["id"] . '" name="idEditar">

			 <input type="text" value="' . $respuesta["usuario"] . '" name="usuarioEditar" required>

			 <input type="text" value="' . $respuesta["password"] . '" name="passwordEditar" required>

			 <input type="email" value="' . $respuesta["email"] . '" name="emailEditar" required>

			 <input type="submit" value="Actualizar">';
	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController()
	{

		if (isset($_POST["usuarioEditar"])) {

			if (
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioEditar"]) &&
				preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordEditar"]) &&
				preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST["emailEditar"])
			) {

				$encriptar = crypt($_POST["passwordEditar"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


				$datosController = array(
					"id" => $_POST["idEditar"],
					"usuario" => $_POST["usuarioEditar"],
					"password" => $encriptar,
					"email" => $_POST["emailEditar"]
				);

				$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

				if ($respuesta == "success") {

					header("location:cambio");
				} else {

					echo "error";
				}
			}
		}
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController()
	{

		if (isset($_GET["idBorrar"])) {

			$datosController = $_GET["idBorrar"];

			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if ($respuesta == "success") {

				header("location:usuarios");
			}
		}
	}
}
