<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=curso_poo","root","belgrado");
		return $link;

	}

}

?>