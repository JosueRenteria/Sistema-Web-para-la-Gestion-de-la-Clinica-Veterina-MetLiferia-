<?php
    $boleta = $_POST["boleta"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"]; 
    $tipo = $_POST["tipo"]; 
 
    $conexion = mysqli_connect("localhost","root","","sem20221");
    $respAX = [];

    $sqlInsAlumno = "INSERT INTO citas VALUE('$boleta','$fecha','$hora','$tipo',NOW())";
    $resInsAlumno = mysqli_query($conexion, $sqlInsAlumno);

    if(mysqli_affected_rows($conexion) == 1){ 
        $respAX["cod"] = 1;
        $respAX["msj"] = "<h5>Gracias. Tu registro se realizó correctamente.</h5>";
    }
    else{
        $respAX["cod"] = 0;
        $respAX["msj"] = "<h5>Error. No se pudo guardar tu información. Favor de intentarlo nuevamente.</h5>";
    }

    
    echo json_encode($respAX);
?> 


