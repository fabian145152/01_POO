<?php

class Ingreso
{

    public function ingreoController()
    {
        if (
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])
        ) {

            $datosController = array(
                "usuario" => $_POST["usuarioIngreso"],
                "password" => $_POST["passwordIngreso"]
            );

            $respuesta = IngresoModels::ingresoModel($datosController, "usuarios");

            $intentos = $respuesta["intentos"];
            $usuarioActual = $_POST["usuarioIngreso"];
            $maximoIntentos = 2;

            if ($intentos < $maximoIntentos) {

                if ($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]) {
                    $intentos = 0;
                    $datosController = array("usuarioActual" => $usuarioActual, "actualizarIntentos" => $intentos);
                    $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");
                    header("location:index.php?action=inicio");
                } else {
                    ++$intentos;
                    echo '<div class="alert alert-danger">Error al ingresar</div>';
                }
            } else {
                $intentos = 0;
                $datosController = array("usuarioActual" => $usuarioActual, "actualizarIntentos" => $intentos);
                $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");
                header("location:index.php?action=fallo3intentos");
                echo '<div class="alert alert-danger">Ha fallado 3 veces, demuestre que no es un robot.</div>';
            }
        }
    }
}
