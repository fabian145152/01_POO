<?php

#Clase:
#una Clase es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento, estado e identidad.

class Automovil
{

    #Propiedades: 
    #Son las caracteristicas que pueden tener un objeto 

    public $marca;
    public $modelo;
    /*
    Son publicas para podes acceder a ellas desde cualquier parte de la aplicacion. 
    Lo mas comun es hacerla publica. 
    */
    private $marco;
    /*
    Es privada para que solo se pueda acceder dese esta clase
    */
    /*
    Metodo. 
    El metodo es un algotitmo asociado a un objeto que indica la capacidad de lo que este puede hacer.
    La unica diferencia entre metodo y funcion, es que llamamos metodo a las funciones de una clase (en la POO), 
    mientras que llamamos funciones, a los algoritmos de la programacion estructurada.
    */

    public function mostrar()
    {
        echo "<p>Hola soy un $this->marca, modelo $this->modelo";
    }
}

/*Objeto:
Es una entidad que provista de metodos o mensajes a los cuales responde propiedades con valores concretos
*/
$a = new Automovil();
$a->marca = "Toyota";
$a->modelo = "Corolla";
$a->mostrar();

$b = new Automovil();
$b->marca = "Hyunday";
$b->modelo = "Accent Vision";
$b->mostrar();

/*Principios de la POO que se cumplen en este ejemplo:
Se proteje todo,  la clase puede estar en un archivo y los objetos pueden estar en otro(new);
La persona que quiera vulnerar el codigo no va a poder entrar hasta deonde estan las clases


Abstraccion: Nuevos tipos de datos (el que quiera, yo lo creo) 
                Si quieres un nuevo automovil lo creas.
                $c = new Automovil();
                $c->marca = "Fiat";
                $c->modelo = "Palio";
                $c->mostrar();
Encapsulacion: Organizar el codigo en grupos logicos. 
            La primera capsula es la clase
            La segunda es el objeto
 Ocultamiento: Ocultar detalles de implementacoion y exponer solo los 
 detalles que sean necesarios para el resto del sistema Lo que esta dentro de ""
 */