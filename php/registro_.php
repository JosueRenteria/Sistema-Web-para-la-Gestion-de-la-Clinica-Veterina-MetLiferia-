<?php
  $boleta = $_POST["boleta"];
  $nombre = $_POST["nombre"];
  $primerApe = $_POST["primerApe"];
  $segundoApe = $_POST["segundoApe"];
  $correo = $_POST["correo"];
  $telcel = $_POST["telcel"];
  $contrasena = md5($_POST["contrasena"]);

  $nombrem = $_POST["nombrem"];
  $edad = $_POST["edad"];
  $especie = $_POST["especie"];
  $raza = $_POST["raza"];
  $sexo = $_POST["sexo"];

  $conexion = mysqli_connect("localhost","root","","sem20221");
  $sqlCheckBoleta = "SELECT * FROM alumno where boleta = '$boleta'";
  $resCheckBoleta = mysqli_query($conexion, $sqlCheckBoleta); 
  $respAX = [];
  if(mysqli_num_rows($resCheckBoleta) == 1){
    $respAX["cod"] = 2;
    $respAX["msj"] = "<h5>Error. El número del Usuario ya está registrado. Favor de intentarlo nuevamente.</h5>";
  }else{
    $sqlInsAlumno = "INSERT INTO alumno VALUE('$boleta','$nombre','$primerApe','$segundoApe','$correo','$telcel','$contrasena',NOW(),'$nombrem','$edad','$especie','$raza','$sexo')";
    $resInsAlumno = mysqli_query($conexion, $sqlInsAlumno);

    if(mysqli_affected_rows($conexion) == 1){
      $respAX["cod"] = 1;
      $respAX["msj"] = "<h5>Gracias. Tu registro se realizó correctamente.</h5>";
    }else{
      $respAX["cod"] = 0;
      $respAX["msj"] = "<h5>Error. No se pudo guardar tu información. Favor de intentarlo nuevamente.</h5>";
    }

  }

  echo json_encode($respAX);
?>