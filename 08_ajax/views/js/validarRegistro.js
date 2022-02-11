/*===================================================
VALIDAR USUARIO EXISTENTE CON AJAX
=====================================================*/

var usuarioExistente = false;
var emailExistente = false;

/*
En esta carpeta voy a descargar una libreria de jquery
para utilizar AJAX desde Jquery
*/
$("#usuarioRegistro").change(function () {
    var usuario = $("#usuarioRegistro").val();
    var datos = new FormData();
    datos.append("validarUsuario", usuario);
    /* La instruccion de arriba es como si hubiera escrito */
    //$_POST["validarUsuario"];

    $.ajax({
        url: "views/modules/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        /* Aca podria colocarle la ruta pero si abro el codigo fuente puedo ver la misma */
        success: function (respuesta) {
            if (respuesta == 0) {
                $("label[for='usuarioRegistro'] span").html('<p>Este usuario ya existe en la BBDD</p>');
                usuarioExistente = true;
            }
            else {
                $("label[for='usuarioRegistro'] span").html("");
                usuarioExistente = false;
            }
        }
    });

})


/*===== FIN VALIDAR USUARIO EXISTENTE CON AJAX  ======*/


/*===================================================
VALIDAR CORREO EXISTENTE CON AJAX
=====================================================*/

/*
En esta carpeta voy a descargar una libreria de jquery
para utilizar AJAX desde Jquery
*/
$("#emailRegistro").change(function () {
    var usuario = $("#emailRegistro").val();
    var datos = new FormData();
    datos.append("validarEmail", usuario);
    /* La instruccion de arriba es como si hubiera escrito */
    //$_POST["validarUsuario"];

    $.ajax({
        url: "views/modules/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        /* Aca podria colocarle la ruta pero si abro el codigo fuente puedo ver la misma */
        success: function (respuesta) {
            if (respuesta == 0) {
                $("label[for='emailRegistro'] span").html('<p>Este usuario ya existe en la BBDD</p>');
                emailExistente = true;
            }
            else {
                $("label[for='emailRegistro'] span").html("");
                emailExistente = false;
            }
        }
    });

})


/*===== FIN VALIDAR CORREO EXISTENTE CON AJAX  ======*/



/*=============================================
VALIDAR REGISTRO
=============================================*/
function validarRegistro() {

    var usuario = document.querySelector("#usuarioRegistro").value;

    var password = document.querySelector("#passwordRegistro").value;

    var email = document.querySelector("#emailRegistro").value;

    var terminos = document.querySelector("#terminos").checked;

    /* VALIDAR USUARIO */

    if (usuario != "") {

        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if (caracteres > 6) {

            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<p>Escriba por favor menos de 6 caracteres.</p>";

            return false;
        }

        if (!expresion.test(usuario)) {

            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>No escriba caracteres especiales.</p>";

            return false;

        }

        if (usuarioExistente) {
            document.querySelector("label[for='usuarioRegistro'] span").innerHTML = "<p>Este usuario ya existe en la BBDD.</p>";
            return false;
        }

    }

    /* VALIDAR PASSWORD */

    if (password != "") {

        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if (caracteres < 6) {

            document.querySelector("label[for='passwordRegistro']").innerHTML += "<p>Escriba por favor más de 6 caracteres.</p>";

            return false;
        }

        if (!expresion.test(password)) {

            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<p>No escriba caracteres especiales.</p>";

            return false;

        }

    }

    /* VALIDAR EMAIL*/

    if (email != "") {

        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(email)) {

            document.querySelector("label[for='emailRegistro']").innerHTML += "<p>Escriba correctamente el Email.</p>";

            return false;

        }
        if (emailExistente) {
            document.querySelector("label[for='emailRegistro'] span").innerHTML = "<p>Este email ya existe en la BBDD.</p>";
            return false;
        }

    }

    /* VALIDAR TÉRMINOS*/

    if (!terminos) {

        document.querySelector("form").innerHTML += "<>No se logró el registro, acepte términos y condiciones!.</p>";
        document.querySelector("#usuarioRegistro").value = usuario;
        document.querySelector("#passwordRegistro").value = password;
        document.querySelector("#emailRegistro").value = email;

        return false;
    }

    return true;

}
/*=====  FIN VALIDAR REGISTRO  ======*/
