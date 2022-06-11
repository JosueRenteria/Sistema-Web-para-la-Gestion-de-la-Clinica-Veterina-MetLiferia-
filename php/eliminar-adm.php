<?php
  $boleta = $_POST["boleta"];
  
  $conexion = mysqli_connect("localhost","root","","sem20221");
  $sqlDelAlumno = "DELETE FROM citas WHERE boleta='$boleta'";
  $resDelAlumno = mysqli_query($conexion,$sqlDelAlumno);
  $respAX = [];
  if(mysqli_affected_rows($conexion) == 1){
    $respAX["cod"] = 1;
    $respAX["msj"] = "<h5>Gracias. El registro se ha eliminado.</h5>";
  }else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "<h5>Error. No se pudo eliminar el registro. Favor de intentarlo nuevamente.</h5>";
  }

  echo json_encode($respAX);
?>