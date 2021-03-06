<?php
  //session_start();
  //if(isset($_SESSION["boleta"])){
?>
<!DOCTYPE html>
<html>

<head>
  <!--Metas importantes para el manejo del Sistema-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!--Titulo de nuestro Sistema Web-->
  <title>SEM20221 / Registro</title>
  <!--Bibliotecas para los iconos que ocupa materalize-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!--Bibliotecas de los frameworks de css-->
  <link href="./../fontawesome/css/all.min.css" rel="stylesheet">
  <link href="./../materialize/css/materialize.min.css" rel="stylesheet">
  <link href="./../js/validetta/validetta.min.css" rel="stylesheet">
  <!--Bibliotecas de los frameworks de js-->
  <script src="./../js/jquery-3.6.0.min.js"></script>
  <script src="./../materialize/js/materialize.min.js"></script>
  <script src="./../js/validetta/validetta.min.js"></script>
  <script src="./../js/validetta/validettaLang-es-ES.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--Bibliotecas de los archivos hechos-->
  <link href="./../css/general.css" rel="stylesheet">
  <script src="./../js/registro.js"></script>
  <!--Script para la animacion de nuestro header para moviles-->
  <script>
    $(document).ready(function() {
      $('.sidenav').sidenav();
    });
  </script>
  <!--Css de los estilos que no se pueden-->
  <style>
    .paleta_fondotitulo {
      background-color: #ded9ca;
    }
    </style>
</head>

<body>

  <!--Inicio de nuestro header (inicio, iniciar sesion y acceder)-->
  <header>

    <!--Aqui en adelante se pone nuestro header con todas las opciones-->
    <!--Es el header cuando aun no se ha iniciado sesion-->
    <nav class="nav-extended paleta_azulc">
      <div class="nav-wrapper logo-izquierda">
        <!--Se hizo este arreglo para que se vea bien en Xampp-->
        <a href="./../inicio.html" class="brand-logo right hide-on-med-and-down"><img src="./../imgs/Logo.png" alt=""></a>
        <a href="./../inicio.html" class="brand-logo mobile-demo hide-on-large-only"><img src="./../imgs/Logo.png" alt=""></a>
        <!--Este es para que aparezca la parte del menu-->
        <a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <!--Esta parte del Registro e Iniciar sesion, pero en Xampp no funciona-->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="letras-negritas" href="./registro.php">Registrarse</a></li>
          <li><a class="letras-negritas" href="./../login.html">Iniciar Sesion</a></li>
        </ul>
      </div>

      <!--Parte del submenu de abajo, aqui van los iconos-->
      <div class="nav-content">
        <ul class="tabs tabs-transparent justificacion-texto">
          <li class="tab letras-negritas"><a class="active" href="./../inicio.html"><span class="material-symbols-outlined">home</span> Inicio</a></li>
          <li class="tab letras-negritas"><a href="./../servicios.html"><span class="material-symbols-outlined">settings</span> Servicios</a></li>
          <li class="tab letras-negritas"><a href="./../contactanos.html"><span class="material-symbols-outlined">call</span> Contactanos</a></li>
          <li class="tab letras-negritas"><a href="./../dudas.html"><span class="material-symbols-outlined">contact_support</span> Preguntas Frecuentes</a></li>
        </ul>
      </div>
    </nav>

    <!--Parte del Menu para moviles-->
    <ul class="sidenav" id="mobile-demo">
      <li><a href="./registro.php">Registrarse</a></li>
      <li><a href="./../login.html">Iniciar Sesion</a></li>
    </ul>

  </header>

  <!--La parte del loging de nuestro Sistema, este podria haber algunos cambios-->
  <main class="valign-wrapper paleta_fondotext">
    <div class="container">

    <!--Div de la parte de ingreso de Datos-->
      <div class="row">

        <!--Titulo de nuestro encabezado para poder editar-->
        <h1 class="paleta_fondotitulo z-depth-1">Registro de Datos</h1>
        
        <!--Titulo del formulario-->
        <h4>Registro (Datos del Due??o):</h4>
        <!--Inicio de nuestro formulario-->
        <form id="formRegistro" autocomplete="off">

          <!--Registro del Usuario (forma numerica)-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-user prefix"></i>
            <label for="boleta">Usuario</label>
            <input type="text" id="boleta" name="boleta" maxlength="10" data-validetta="required,number,minLength[10],maxLength[10]">
          </div>
          <!--Registro del Nombre del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-cog prefix"></i>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" data-validetta="required">
          </div>
          <!--Registro del Apellido Paterno del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-cog prefix"></i>
            <label for="primerApe">Primer Apellido</label>
            <input type="text" id="primerApe" name="primerApe" data-validetta="required">
          </div>
          <!--Registro del Apellido Materno del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-cog prefix"></i>
            <label for="segundoApe">Segundo Apellido</label>
            <input type="text" id="segundoApe" name="segundoApe" data-validetta="">
          </div>
          <!--Registro del Correo del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-envelope prefix"></i>
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo" data-validetta="required,email">
          </div>
          <!--Registro del No. Telefonico del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-phone prefix"></i>
            <label for="telcel">Tel-Cel</label>
            <input type="text" id="telcel" name="telcel" data-validetta="required,number,minLength[10],maxLength[10]">
          </div>
          <!--Registro de la Contrase??a del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-key prefix"></i>
            <label for="contrasena">Contrase??a</label>
            <input type="password" id="contrasena" name="contrasena" data-validetta="required,minLength[6],maxLength[16]" maxlength="16">
          </div>
          <!--Registro de la Confirmacion de la Contrase??a del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-key prefix"></i>
            <label for="contrasena2">Confirmar Contrase??a</label>
            <input type="password" id="contrasena2" name="contrasena2" data-validetta="required,minLength[6],maxLength[16],equalTo[contrasena]" maxlength="16">
          </div>

      </div>

      <div class="row">
        <!--Titulo del apartado-->
        <h4>Registro (Datos de la mascota):</h4>
        
        <!--Registro del Nombre de la Mascota-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-paw prefix"></i>
          <label for="nombrem">Nombre mascota</label>
          <input type="text" id="nombrem" name="nombrem" data-validetta="required">
        </div>
        <!--Registro del Nombre de la edad de la mascota-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-address-card prefix"></i>
          <label for="edad">Edad</label>
          <input type="text" id="edad" name="edad" maxlength="10" data-validetta="required,number,minLength[1],maxLength[2]">
        </div>
        <!--Registro de la Especie de la Macota-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-users prefix"></i>
          <label for="especie">Especie</label>
          <input type="text" id="especie" name="especie" data-validetta="required">
        </div>
        <!--Registro de la Raza de la Mascota-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-users prefix"></i>
          <label for="raza">Raza</label>
          <input type="text" id="raza" name="raza" data-validetta="required">
        </div>
        <!--Registro del Sexo-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-venus-double prefix"></i>
          <label for="sexo">Sexo</label>
          <input type="text" id="sexo" name="sexo" data-validetta="required">
        </div>
      </div>

      <!--Contenedor de los Botones-->
      <div class="row">

      <!--Boton de Cancelar y enviara a la pagina principal-->
        <div class="col s12 m3"> 
          <a href="./../inicio.html" class="btn orange" style="width:100%;">Cancelar</a>
        </div>
        <!--Boton para registrar todos los Datos-->
        <div class="col s12 m9">
          <input type="submit" class="btn blue" style="width:100%" value="Registrar">
        </div><br><br>

      </form><br><br>
      </div>
    </div>
  </main>

  <!--Pie de pagina de laa pagina web-->
  <footer class="page-footer paleta_azulf">
    <div class="footer-copyright">
      <div class="container letras-negritas">
        ?? 2021 Copyright MetLIFE
        <a class="grey-text text-lighten-4 right" href="https://www.escom.ipn.mx">ESCOM</a>
      </div>
    </div>
  </footer>

</body>
</html>


<?php
//}else{
  //header("location:./../login.html");
//}
?>