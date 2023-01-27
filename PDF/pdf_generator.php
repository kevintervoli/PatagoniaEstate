<?php

include "../PDF/fpdf/fpdf.php";


if (!empty($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);




    $pdf->Cell(40,10,'Name: '.$name);
    $pdf->Ln();
    $pdf->Cell(40,10,'Email: '.$email);
    $pdf->Ln();
    $pdf->Cell(40,10,'Date: '.date('d-m-Y'));
    $pdf->Ln();

    $datetime = new DateTime();
    $date = $datetime->format('d-m-Y-H-is');

    $filename = 'Message-' . $date;
    $destination = '../PDF/files/'.$filename.'.pdf';
    $pdf->output($destination, 'F');
}




?>