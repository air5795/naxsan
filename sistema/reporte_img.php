<?php

require "../conexion.php";
require "assets/fpdf/fpdf.php";

$query = mysqli_query($conexion, "SELECT * FROM exp_general");

$result = mysqli_num_rows($query);



$pdf = new FPDF("P","mm","letter");
$pdf->AddPage();
$pdf->SetFont("Arial","B",12);
$pdf->Cell(100,10,utf8_decode("Respaldo Actas Experiencia General"),0,0,'C');

if ($result > 0) {
    while ($data = mysqli_fetch_array($query)) {
        
        $image = 'img/actas/'.$data['image'];
        $image2 = 'img/actas/'.$data['image2'];
        $image3= 'img/actas/'.$data['image3'];

        $pdf->Image($image,10,10,200);
        $pdf->Image($image2,10,10,200);
        $pdf->Image($image3,10,10,200);

    



}}

$pdf->PageNo();


$pdf->Output();


