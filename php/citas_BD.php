<?php
    //Tener la sesion abierta.
    $boleta = $_SESSION["boleta"]; 

    //Conexion con la base de datos.
    $conexion = mysqli_connect("localhost","root","","sem20221");
    mysqli_set_charset($conexion, "utf8");
    $sqlCheckAdm = "SELECT * FROM alumno WHERE boleta = '$boleta'";
    $resCheckAdm = mysqli_query($conexion, $sqlCheckAdm); 
    $infAdm = mysqli_fetch_row($resCheckAdm);

    //Aqui se borran las citas antiguas.
    $sqlDelAlumno2 = "DELETE FROM citas WHERE fecha <= '2022-06-09'";
    $resDelAlumno = mysqli_query($conexion,$sqlDelAlumno2);

    //Aqui se guarda en un arreglo todos los datos que no sean la boleta.
    $sqlGetAlumnos = "SELECT * FROM citas WHERE boleta = $boleta";
    $resGetAlumnos = mysqli_query($conexion, $sqlGetAlumnos);
    $trsGetAlumnos = "";
    
    //Ciclo para mostrar todos los datos del usuario.
    while($filas = mysqli_fetch_array($resGetAlumnos, MYSQLI_BOTH)){
        $trsGetAlumnos .= "
        <tr>
        <td>$filas[1]</td>
        <td>$filas[2]</td>
        <td>$filas[3]</td>
        <td>
            <i class='fas fa-times icoEliminar iconos-datos' data-boleta='$filas[0]'></i>
        </td>
        </tr>";
    }
?> 