<?php

session_start();
include "../conexion.php";

require_once(dirname(__FILE__).'./../vendor/autoload.php');

use Spipu\Html2Pdf\Html2Pdf;

ob_start();
require_once 'vista_reporteE_c.php';
$html = ob_get_clean();

$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->setTestTdInOnePage(false);
$html2pdf->output('pdf_actas_especifica.pdf','D');
?>