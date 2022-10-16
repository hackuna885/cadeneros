<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadeneros</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'code39';
            src: url('css/fonts/free3of9-webfont.ttf') format('truetype');
            font-style: normal;
            font-weight: normal;
        }
        .otraCodigoBarras{
            font-family: 'code39';
            font-size: 9em;
        }
    </style>
</head>
<body>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

?>



    <div class="container" id="app">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3>Ejemplo</h3>
                <input type="text" class="form-control" v-model="ejemplo"/>
                <br>
                <div class="codigoBarras">


                    <h4 class="otraCodigoBarras">*{{ejemplo}}*</h4>
                </div>

                <?php
                include('app/php/phpqrcode.php');

                $contenido = "https://www.baulphp.com/";
                
                // Exportamos una imagen llamado resultado.png que contendra el valor de la avriable $content
                QRcode::png($contenido,"resultado.png",QR_ECLEVEL_L,50,2);
                
                // Impresión de la imagen en el navegador listo para usarla
                echo "<div><img class='img-fluid' src='resultado.png'/></div>";
                ?>


            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                ejemplo: ''
            },
            mounted() {

            }
        });
    </script>
</body>
</html>