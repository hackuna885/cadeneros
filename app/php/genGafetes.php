<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

//Libreria de dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

//Generamos el Gafete dentro de la Ruta 'img/qr/'

    $con = new SQLite3("../data/data.db");
    $cs = $con -> query("SELECT * FROM v_registroUsr WHERE id = 1");


    while ($resul = $cs -> fetchArray()) {
        $id = $resul['id'];
        $nombreCom = $resul['nombreCom'];
        $institucion = $resul['institucion'];
        $correoMd5 = $resul['correoMd5'];
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