<?php
  session_start();
  if(isset($_SESSION["boleta"])){
    $boleta = $_GET["boleta"];
    $conexion = mysqli_connect("localhost","root","","sem20221");
    mysqli_set_charset($conexion, "utf8");
    $sql = "SELECT * FROM alumno WHERE boleta = '$boleta'";
    $res = mysqli_query($conexion,$sql);
    $inf = mysqli_fetch_row($res); 
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
  <script src="./../js/editar.js"></script>
  <!--Script para la animacion de nuestro header para moviles-->
  <script>
    $(document).ready(function() {
      $('.sidenav').sidenav();
    });
  </script>
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
        <a href="admin.html" class="brand-logo center"><img src="./imgs/Logo.png" alt=""></a>
      </div>
    </nav>

  </header>
  
  <!--Main de nuestro Sistema-->
  <main class="valign-wrapper paleta_fondotext">

    <!--Contenedor que manda a llamar los datos del usuario (para poder editarlos)-->
    <div class="container">
      <div class="row">

        <!--Titulo de nuestro encabezado para poder editar-->
        <h1 class="paleta_fondotitulo z-depth-1">Editar</h1>

        <!--Titulo del formulario-->
        <h4>Datos del Dueño:</h4>
        
        <form id="formEdit" autocomplete="off">
          <!--Registro del Usuario (forma numerica)-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-user prefix"></i>
            <label for="boleta">usuario</label>
            <input type="text" id="boleta" name="boleta" maxlength="10" data-validetta="required,number,minLength[10],maxLength[10]" value="<?php echo $inf[0]; ?>" readonly>
          </div>

          <!--Registro del Nombre del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-cog prefix"></i>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" data-validetta="required" value="<?php echo $inf[1]; ?>">
          </div>

          <!--Registro del Apellido Paterno del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-cog prefix"></i>
            <label for="primerApe">Primer Apellido</label>
            <input type="text" id="primerApe" name="primerApe" data-validetta="required" value="<?php echo $inf[2]; ?>">
          </div>

          <!--Registro del Apellido Materno del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-cog prefix"></i>
            <label for="segundoApe">Segundo Apellido</label>
            <input type="text" id="segundoApe" name="segundoApe" data-validetta="" value="<?php echo $inf[3]; ?>">
          </div>

          <!--Registro del Correo del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-envelope prefix"></i>
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo" data-validetta="required,email" value="<?php echo $inf[4]; ?>">
          </div>

          <!--Registro del No. Telefonico del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-phone prefix"></i>
            <label for="telcel">Tel-Cel</label>
            <input type="text" id="telcel" name="telcel" data-validetta="required" value="<?php echo $inf[5]; ?>">
          </div>

          <!--Registro de la Contraseña del Usuario-->
          <div class="col s12 m6 l4 input-field">
            <i class="fas fa-key prefix"></i>
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" maxlength="16">
          </div>

      </div>

      <div class="row">
        <!--Titulo del apartado-->
        <h4>Datos de la mascota:</h4>
        
        <!--Registro del Nombre de la Mascota-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-user prefix"></i>
          <label for="nombrem">Nombre mascota</label>
          <input type="text" id="nombrem" name="nombrem" data-validetta="required" value="<?php echo $inf[8]; ?>">
        </div>
        <!--Registro del Nombre de la edad de la mascota-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-address-card prefix"></i>
          <label for="edad">Edad</label>
          <input type="text" id="edad" name="edad" maxlength="10" data-validetta="required,number,minLength[1],maxLength[2]" value="<?php echo $inf[9]; ?>">
        </div>
        <!--Registro de la Especie de la Macota-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-users prefix"></i>
          <label for="especie">Especie</label>
          <input type="text" id="especie" name="especie" data-validetta="required" value="<?php echo $inf[10]; ?>">
        </div>
        <!--Registro de la Raza de la Mascota-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-users prefix"></i>
          <label for="raza">Raza</label>
          <input type="text" id="raza" name="raza" data-validetta="required" value="<?php echo $inf[11]; ?>">
        </div>
        <!--Registro del Sexo-->
        <div class="col s12 m6 l4 input-field">
          <i class="fas fa-venus-double prefix"></i>
          <label for="sexo">Sexo</label>
          <input type="text" id="sexo" name="sexo" data-validetta="required" value="<?php echo $inf[12]; ?>">
        </div>
      </div>

      <div class="row">
        <div class="col s12 m3">
          <a class="btn orange" href="./privado.php" style="width:100%">Cancelar</a>
        </div>
        <div class="col s12 m9">
          <input type="submit" class="btn blue" style="width:100%" value="Editar">
        </div>
      </div><br><br>
      
      </form><br><br>
    </div>

  </main>


  <!--Pie de pagina de laa pagina web-->
  <footer class="page-footer paleta_azulf">
    <div class="footer-copyright">
      <div class="container letras-negritas">
        © 2021 Copyright MetLIFE
        <a class="grey-text text-lighten-4 right" href="https://www.escom.ipn.mx">ESCOM</a>
      </div>
    </div>
  </footer>

</body>
</html>
<?php
  }else{
    header("location:./../login.html");
  }
?>