<?php

require_once "conexion.php";

class IngresoModels
{

    public function ingresoModel($datosModel, $tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT usuario, password, intentos FROM $tabla WHERE usuario = :usuario");
        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        //va por video 54 revisarlo de nuevo
        cue
        
        $stmt->execute();

        return $stmt->fetch();

        $stmt->closeCursor();
        $stmt = null;


        $datosModel["usuario"];
        $datosModel["password"];
    }
    public function intentosModel($datosModel, $tabla)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE usuario = :usuario");

        $stmt->bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
