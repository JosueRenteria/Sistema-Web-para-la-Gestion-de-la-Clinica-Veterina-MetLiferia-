<?php
    //Tener la sesion abierta.
    $boleta = $_SESSION["boleta"];

    //Conexion con la base de datos.
    $conexion = mysqli_connect("localhost","root","","sem20221");
    mysqli_set_charset($conexion, "utf8");
    $sqlCheckAdm = "SELECT * FROM administrador WHERE boleta = '$boleta'";
    $resCheckAdm = mysqli_query($conexion, $sqlCheckAdm);
    $infAdm = mysqli_fetch_row($resCheckAdm);
?>