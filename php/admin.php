<?php
  session_start(); 
  $boleta = $_POST["boleta"];
  $contrasena = $_POST["contrasena"];

  $conexion = mysqli_connect("localhost","root","","sem20221");
  $sql = "SELECT * FROM administrador WHERE boleta = '$boleta' AND contrasena = '$contrasena'";
  $res = mysqli_query($conexion,$sql);
  $infAlumno = mysqli_fetch_row($res);
  $respAX = [];
  if(mysqli_num_rows($res) == 1){
    $respAX["cod"] = 1;
    $respAX["msj"] = "<h5>Bienvenido Administrador</h5>";
    $_SESSION["boleta"] = $boleta;
  }else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "<h5>Error. Favor de intentarlo nuevamente.</h5>";
  }

  echo json_encode($respAX);
?>