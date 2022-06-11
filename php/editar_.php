<?php
  $boleta = $_POST["boleta"];
  $nombre = $_POST["nombre"]; 
  $primerApe = $_POST["primerApe"];
  $segundoApe = $_POST["segundoApe"];
  $correo = $_POST["correo"];
  $telcel = $_POST["telcel"];

  $nombrem = $_POST["nombrem"];
  $edad = $_POST["edad"];
  $especie = $_POST["especie"];
  $raza = $_POST["raza"];
  $sexo = $_POST["sexo"];

  $conexion = mysqli_connect("localhost","root","","sem20221");
  mysqli_set_charset($conexion, "utf8");
  $longContrasena = strlen($_POST["contrasena"]);
  if($longContrasena == 0){
    $sqlUpdAlumno = "UPDATE alumno SET nombre = '$nombre',primerApe='$primerApe',segundoApe='$segundoApe',correo='$correo',telcel='$telcel',auditoria=NOW(),nombrem='$nombrem',edad='$edad',especie='$especie',raza='$raza',sexo='$sexo' WHERE boleta ='$boleta'";
  }else{
    $contrasena = md5($_POST["contrasena"]);
    $sqlUpdAlumno = "UPDATE alumno SET nombre = '$nombre',primerApe='$primerApe',segundoApe='$segundoApe',correo='$correo',telcel='$telcel',contrasena='$contrasena',auditoria=NOW(),nombrem='$nombrem',edad='$edad',especie='$especie',raza='$raza',sexo='$sexo' WHERE boleta ='$boleta'";
  }

  $respAX=[];
  $resUpdAlumno = mysqli_query($conexion,$sqlUpdAlumno);
  if(mysqli_affected_rows($conexion) == 1){
    $respAX["cod"] = 1;
    $respAX["msj"] = "<h5>Gracias. Datos actualizados correctamente.</h5>";
  }else{ 
    $respAX["cod"] = 0;
    $respAX["msj"] = "<h5>Error. No se actualizaron los datos. Favor de intentarlo nuevamente.</h5>";
  }

  echo json_encode($respAX);
?>