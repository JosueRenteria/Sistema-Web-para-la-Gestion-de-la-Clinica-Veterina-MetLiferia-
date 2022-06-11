<?php
  $conexion = mysqli_connect("localhost","root","","sem20221");
  mysqli_set_charset($conexion, "utf8");
  $sql = "SELECT * FROM alumno";
  $res = mysqli_query($conexion,$sql);
  $optionAlumnos = "";
  while($filas = mysqli_fetch_array($res,MYSQLI_BOTH)){
    $optionAlumnos .= "<option value='$filas[0]'>$filas[1] $filas[2] $filas[3]</option>";
  }
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>SEM20221 / Eliminar</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="./fontawesome/css/all.min.css" rel="stylesheet">
<link href="./materialize/css/materialize.min.css" rel="stylesheet">
<link href="./js/validetta/validetta.min.css" rel="stylesheet">
<link href="./css/general.css" rel="stylesheet">
<script src="./js/jquery-3.6.0.min.js"></script>
<script src="./materialize/js/materialize.min.js"></script>
<script src="./js/validetta/validetta.min.js"></script>
<script src="./js/validetta/validettaLang-es-ES.js"></script>
<script src="./js/eliminar.js"></script>
<script>
  $(document).ready(()=>{
    $("select").formSelect();
  });
</script>
</head>
<body>
  <header>
    <img src="./imgs/header.png" class="responsive-img">
  </header>
  <main class="valign-wrapper">
    <div class="container">
      <div class="row">
        <h4>Eliminar:</h4>
        <form id="formEliminar" method="POST" action="./php/eliminar_.php" autocomplete="off">
          <div class="col s12 m6 input-field">
            <select id="boleta" name="boleta" data-validetta="required">
              <option value="">--- Seleccionar ---</option>
              <?php echo $optionAlumnos; ?>
            </select>
            <label for="boleta">Alumno</label>
          </div>
          <div class="col s12 m6">
          <input type="submit" class="btn blue" style="width:100%" value="Eliminar">
        </div>
        </form>
      </div>
    </div>
  </main>
  <footer class="page-footer blue">
    <div class="footer-copyright">
      <div class="container">
      © 2021 Copyright TDAW-20221
      <a class="grey-text text-lighten-4 right" href="https://www.escom.ipn.mx">ESCOM</a>
      </div>
    </div>
  </footer>
</body>
</html>