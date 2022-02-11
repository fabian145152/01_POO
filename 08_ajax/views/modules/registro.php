<h1>REGISTRO DE USUARIO</h1>

<form method="post" onsubmit="return validarRegistro()">
	<!-- Cuando le doy al boton submit, enviar: me ejecuta la funsion validar Registro -->

	<label for="usuarioRegistro">Usuario<span></span></label>
	<input type="text" placeholder="Maximo 6 caracteres" maxlength="6" name="usuarioRegistro" id="usuarioRegistro" required>
	<!-- EN CSS CAMBIO EL TEXTO A MINUSCULA -->

	<label for="passwordRegistro">Contraseña</label>
	<input type="password" placeholder="Mínimo 6 caracteres, incluir número(s) y una mayúscula" name="passwordRegistro" id="passwordRegistro" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>

	<label for="emailRegistro">Correo Electronico<span></span></label>
	<input type="email" placeholder="Ingrese su correo" name="emailRegistro" id="emailRegistro" required>

	<p style="text-align: center;"><input type="checkbox" id="terminos"><a href="#"> Acepta terminos y condiciones</a></p>

	<input type="submit" value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro->registroUsuarioController();

if (isset($_GET["action"])) {

	if ($_GET["action"] == "ok") {

		echo "Registro Exitoso";
	}
}

?>