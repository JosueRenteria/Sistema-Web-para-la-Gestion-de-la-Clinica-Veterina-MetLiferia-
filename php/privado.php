<?php
  //Aqui se inicia la sesion de nuestro usuario.
  session_start();
  if(isset($_SESSION["boleta"])){
    include("./privado_BD.php");
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
  <title>MitLIFE</title> 
  <!--Bibliotecas para los iconos que ocupa materalize-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!--Bibliotecas de los frameworks de css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Bibliotecas de los frameworks de js-->
  <script src="./../js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--Bibliotecas de los archivos hechos-->
  <link rel="stylesheet" href="./../css/general.css">
  <script src="./../js/privado.js"></script>
  <!--Estilos para la parte de cerrrar sesion-->
  <style>
    .icoEliminar:hover,
    .icoEditar:hover,
    .icoPDF:hover{
      cursor:pointer;
    }
  </style>
  <!--Script para la animacion de nuestro header para moviles-->
  <script>
      $(document).ready(function() {
          $('.sidenav').sidenav();
      });
  </script>
  <!--Aqui voy a agregar estilos porque no me esta dejando mi css-->
  <style>
    .letras-datos{
      font-size: 18px;
    }
    .iconos-datos{
      font-size: 22px;
      /*Aqui le voy a agregar un color*/
    }
    .paleta_fondotitulo {
      background-color: #ded9ca;
    }
  </style>

</head>

<body>

  <!--Cabezera de nuestra pagina privada-->
  <header>
    <!--Aqui inicia el header del nav-->
    <nav class="nav-extended paleta_azulc">
      <div class="nav-wrapper logo-izquierda">
          <!--Se hizo este arreglo para que se vea bien en Xampp-->
          <a href="admin.html" class="brand-logo center"><img src="./../imgs/Logo.png" alt=""></a>
        </div>
    </nav>

    <!--Boton para cerrar la Sesion y modificar los datos-->
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large teal">
        <i class="large fas fa-bars"></i>
      </a>
      <ul>
        <!--Todas las opciones que tendra el boton-->
        <li><a href="./cerrarSesion.php?nombreSesion=boleta" class="btn-floating tooltipped green" data-position="left" data-tooltip="Cerrar Sesión"><i class="fas fa-sign-out-alt"></i></a></li>
        <li><a href="./citas.php" class="btn-floating tooltipped grey" data-position="left" data-tooltip="Agregar una Cita Medica"><i class="fas fa-user-md"></i></a></li>
        <li><a href="./vacunacion.php" class="btn-floating tooltipped grey" data-position="left" data-tooltip="Agregar una Cita de Vacunacion"><i class="fas fa-medkit "></i></a></li>
      </ul>
    </div>

  </header>

  <!--Main de nuestra pagina-->
  <main class="lighten 2 paleta_fondotext">
    <!--Contenedor del Saludo-->
    <div class="container">
      <!--Mensaje de bienvenido que sale del privado_BD-->
      <h1 class="paleta_fondotitulo z-depth-1">Bienvenido <?php echo "$infAdm[1] !";  ?></h1>

      <!--Texto del apartado (se define el slogan de la clinica veterinaria)-->
      <div class="imagenes_centradas ">
        <!--Contenedor del Texto-->
        <div class="col s12 m12 l6 ">
          <h4>
          Hola <?php echo "$infAdm[1] ";  ?>se bienvenido a nuestro Servidor MitLife donde podrás hasta el momento puedes hacer las siguientes operaciones: Editar los datos (personales y los de tu mascota) y poder agendar una cita médica.
        </h4>
        </div>
        <!--Contenedor de la imagen asociada-->
        <div class="row col s12 m12 l6">
          <img class="responsive-img center " src="./../img/inicio.png" alt=" ">
        </div>
      </div>

      <div class="row col s12 m12 l12 center">
          <img class="responsive-img center" src="./../imgs/perro_inicio.png" alt=" ">
      </div>
      <!--Datos personales a Modificar-->
      <h1 class="paleta_fondotitulo z-depth-1">Datos personales</h1>

      <!--Texto de para explicar como modicar los datos del Usuario-->
      <h4>
        En la parte inferior se muestran los principales datos de tu cuenta donde podrá ver el PDF con tus datos, puedes editar los datos de tu mascota y tuyo y puedes eliminar tu cuenta.
      </h4>

<!------------------------------------Aqui esta el arreglo de tus datos-------------------------------------->
      <div class="datos_usuario" style="margin-top: 50px; margin-bottom: 50px;">
        <table class="striped centered responsive-table letras-datos">
          <thead class="pink lighten-3">
            <tr><th><i class="fas fa-user-circle"></i>  Usuario</th><th><i class="fas fa-address-card"></i>  Nombre</th>
            <th><i class="fas fa-envelope"></i>  Correo</th><th><i class="fas fa-cog"></i>  Opciones</th></tr>
          </thead>
          <tbody>
            <?php echo $trsGetAlumnos; ?>
          </tbody>
        </table>
      </div>
<!---------------------------------------------------------------------------------------------------------->
    </div>
  </main>

  <!--Pie de pagina de laa pagina web-->
  <footer class="page-footer paleta_azulf ">
    <div class="footer-copyright ">
      <div class="container letras-negritas">
          © 2021 Copyright MitLIFE
          <a class="grey-text text-lighten-4 right " href="https://www.escom.ipn.mx ">ESCOM</a>
      </div>
    </div>
  </footer>

</body>

</html>

<?php
  //Cuando no hay una sesion iniciada y nos envie al inicio.
  }else{
    header("location: ./../login.html");
  }
?>