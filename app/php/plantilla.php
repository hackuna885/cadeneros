<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');


$nomCompleto = !empty($nomCompleto) ? $nomCompleto : '';

?>

<html>
    <head>
        <link rel="stylesheet" href="../../css/cadeneros.css">
    </head>
    <body>
        <div class="hoja">
            <div class="nomInvitado">
                <h1>OLIVER RAÚL VELÁZQUEZ TORRES</h1>
                <br>
                <h3>UNIVERSIDAD TECNOLÓGICA FIDEL VELÁZQUEZ</h3>
            </div>
            <!-- <img src="../../img/acceso.jpg" style="background-color: red;"> -->
            <?php
                include('phpqrcode.php');

                $contenido = "https://www.baulphp.com/";
                
                // Exportamos una imagen llamado resultado.png que contendra el valor de la avriable $content
                QRcode::png($contenido,"resultado.png",QR_ECLEVEL_L,20,2);
                
                // Impresión de la imagen en el navegador listo para usarla
                echo "<div class='codigoQr'><img src='resultado.png'/></div>";
                ?>
                <div class="codigoBarras">
                    <div class="otraCodigoBarras">*000001*</div>
                </div>
                 <img src="../../img/acceso.jpg">
        </div>
    </body>
</html>