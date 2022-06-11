<?php
    session_start();
    if(isset($_SESSION["boleta"])){
        include("./citas_BD.php");
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
    <script src="./../js/citas.js"></script>
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

    </header>

    <!--La parte de las citas medicas del programa-->
    <main class="valign-wrapper paleta_fondotext">
        <div class="container">

        <!--Div de la parte de ingreso de Datos-->
        <div class="row">

            <!--Titulo de nuestro encabezado -->
            <h1 class="paleta_fondotitulo z-depth-1">Registro de Citas Medicas</h1><br>

            <!--Mensaje para darle los datos del usuario que va a registrar una cita-->
            <h4>
                Hola <b><?php echo "$infAdm[1]";?></b> a continuación se muestran todas tus citas médicas y puedes agregar más citas medicas para el usuario <b><?php echo "$infAdm[0]";?></b>.
            </h4><br><br>

            <!--Titulo del formulario-->
            <h4><b>Citas medicas del Día:</b></h4>

<!------------------------------------Aqui esta el arreglo de tus datos-------------------------------------->
            <div class="datos_usuario" style="margin-top: 50px; margin-bottom: 50px;">
                <table class="striped centered responsive-table letras-datos">
                <thead class="pink lighten-3">
                    <tr><th><i class="fas fa-calendar"></i>  Fecha de la Cita</th><th><i class="fas fa-clock"></i>  Hora</th>
                    <th><i class="fas fa-cog"></i>  Tipo de Cita Medica</th><th><i class="fas fa-times"></i>  Eliminar Cita Medica</th></tr>
                </thead>
                <tbody>
                    <?php echo $trsGetAlumnos; ?>
                </tbody>
                </table>
            </div>
<!---------------------------------------------------------------------------------------------------------->

            <!--Titulo del apartado-->
            <h4><b>Registro (Datos de la mascota):</b></h4>
 
            <!--Inicio de nuestro formulario-->
            <form id="formRegistro" autocomplete="off">

            <!--Registro del Usuario (forma numerica)-->
            <div class="col s12 m6 l4 input-field">
                <i class="fas fa-user prefix"></i>
                <label for="boleta">Usuario</label>
                <input type="text" id="boleta" name="boleta" maxlength="10" data-validetta="required,number,minLength[10],maxLength[10]" value="<?php echo "$infAdm[0]";?>">
            </div>
            <!--Registro del Nombre del Usuario-->
            <div class="col s12 m6 l4 input-field">
                <i class="fas fa-calendar prefix"></i>
                <label for="fecha">Fecha de la Cita</label>
                <input type="text" id="fecha" name="fecha" data-validetta="required">
            </div>
            <!--Registro del Apellido Paterno del Usuario-->
            <div class="col s12 m6 l4 input-field">
                <i class="fas fa-clock prefix"></i>
                <label for="hora">Hora de la Cita</label>
                <input type="text" id="hora" name="hora" data-validetta="required">
            </div>
            <!--Registro del Apellido Materno del Usuario-->
            <div class="col s12 m6 l4 input-field">
                <i class="fas fa-address-book prefix"></i>
                <label for="tipo">Tipo de Cita</label>
                <input type="text" id="tipo" name="tipo" data-validetta="required">
            </div>

        </div>

        <!--Contenedor de los Botones-->
        <div class="row">

        <!--Boton de Cancelar y enviara a la pagina principal-->
            <div class="col s12 m3"> 
                <a href="./privado.php" class="btn orange" style="width:100%;">Cancelar</a>
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