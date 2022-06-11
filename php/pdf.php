<?php
  session_start();
  if(isset($_SESSION["boleta"])){
    require("./../mpdf/vendor/autoload.php");
    $boleta = $_GET["boleta"];

    $conexion = mysqli_connect("localhost","root","","sem20221");
    mysqli_set_charset($conexion, "utf8");
    $sql = "SELECT * FROM alumno WHERE boleta = '$boleta'";
    $res = mysqli_query($conexion,$sql);
    $inf = mysqli_fetch_row($res);
    
    $nombreCompleto = $inf[1]." ".$inf[2]." ".$inf[3];
    $correo = $inf[4];
    $telcel = $inf[5]; 
    $fechaRegistro = $inf[7];

    
    $header = "
      <img src='./../imgs/header.png' style='max-width:100%;'>
    ";

    $html = "
      <style>
        body{text-align='center';}
      </style>
      <body>
        <h1>$boleta</h1>
        <h2>$nombreCompleto</h2>
        <h2>$correo</h2>
        <h2>$telcel</h2>
        <h4>$fechaRegistro</h4>
        <barcode code='$boleta' type='Code11' />
      </body>
    ";
    $footer = "
      <table width='100%'>
        <tr style='background-color:#CCCCCC;'>
          <td width='33%'>{DATE Y-m-j}</td>
          <td width='33%' align='center'>{PAGENO}/{nbpg}</td>
          <td width='33%' style='text-align: right;'>TDAW-20221</td>
        </tr>
      </table>
    ";
    
    
    $mpdf = new \Mpdf\Mpdf([
      "orientation"=>"L",
      "format"=>"Letter",
      "margin_top"=>35
    ]);
    $mpdf->setHTMLHeader($header);
    $mpdf->setHTMLFooter($footer);
    $mpdf->writeHTML($html);
    $mpdf->setWatermarkText("TDAW-20221",0.1);
    $mpdf->showWatermarkText = true;
    $mpdf->output("./../archsPdfs/".$boleta.".pdf","F");
  }else{
    header("location:./../login.html");
  }
?>