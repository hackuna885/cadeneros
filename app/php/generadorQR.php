<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

// Libreria phpqrcode
// include('phpqrcode.php');

//Libreria de dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Correo

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'phpMailer/Exception.php';
// require 'phpMailer/PHPMailer.php';
// require 'phpMailer/SMTP.php';

// Codifica el formato json
// $_POST = json_decode(file_get_contents("php://input"), true);


    //Generamos el QR dentro de la Ruta 'img/qr/'

    $con = new SQLite3("../data/data.db");
    $cs = $con -> query("SELECT * FROM v_registroUsr WHERE id = 1");
    
    // $cs = $con -> query("SELECT * FROM vEmpleados2021 WHERE id BETWEEN '227' AND '227' AND (correoUno NOT LIKE '')");
    // $cs = $con -> query("SELECT * FROM vEmpleados2021 WHERE id BETWEEN '261' AND '280' AND (correoInt NOT LIKE '')");
    while ($resul = $cs -> fetchArray()) {
        $id = $resul['id'];
        $nombreCom = $resul['nombreCom'];
        $institucion = $resul['institucion'];
        $dirPdf = '../../pdf/';
        $nomPdf = $id.'.pdf';
        $archivoPdf = $dirPdf.$nomPdf;
      
      
        
        

            //Generamos PDF
            $dompdf = new Dompdf();
            ob_start();
            include "plantilla.php";
            $html = ob_get_clean();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('letter', 'vertical');
            $dompdf->render();
    
            //Pregunta donde guardar el PDF
            // $pdf = $dompdf->stream($nomPdf);
    
            //Guarda PDF dentro de la ruta
            $output = $dompdf->output();
            file_put_contents($archivoPdf, $output);


	
            // ##################################

      


    };




    $con -> close();

?>