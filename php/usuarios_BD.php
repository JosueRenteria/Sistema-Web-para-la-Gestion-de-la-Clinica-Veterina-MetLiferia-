<?php 
    //Tener la sesion abierta.
    $boleta = $_SESSION["boleta"]; 

    //Conexion con la base de datos.
    $conexion = mysqli_connect("localhost","root","","sem20221");
    mysqli_set_charset($conexion, "utf8");
    $sqlCheckAdm = "SELECT * FROM administrador WHERE boleta = '$boleta'";
    $resCheckAdm = mysqli_query($conexion, $sqlCheckAdm);
    $infAdm = mysqli_fetch_row($resCheckAdm);

    //Aqui se guarda en un arreglo todos los datos que no sean la boleta.
    $sqlGetAlumnos = "SELECT * FROM alumno";
    $resGetAlumnos = mysqli_query($conexion, $sqlGetAlumnos);
    $trsGetAlumnos = "";

    //Ciclo para mostrar todos los datos del usuario.
    while($filas = mysqli_fetch_array($resGetAlumnos, MYSQLI_BOTH)){
        $trsGetAlumnos .= "
        <tr>
        <td>$filas[0]</td>
        <td>$filas[1] $filas[2] $filas[3]</td>
        <td>$filas[4]</td>
        <td>$filas[5]</td>
        </tr>";
    }
?>