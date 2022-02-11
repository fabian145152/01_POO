<?php
#Codigo imperativo o espaguetti

# (objeto) : son variables tipo Objeto
$automovil_1 = (object)["marca" => "toyota", "modelo" => "Corolla"];
$automovil_2 = (object)["marca" => "Hyundai", "modelo" => "Accent Vision"];

function mostrar($automovil)
{
    echo "<p>Hola! soy un $automovil->marca, modelo $automovil->modelo</p>";
}

mostrar($automovil_1);
mostrar($automovil_2);
?>
