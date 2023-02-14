<?php

include "../PDF/fpdf/fpdf.php";


if (!empty($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    //regex for all
    $nameRegex = "/^[a-zA-Z ]*$/";
    $emailRegex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    $numberRegex = "/^[0-9]{10}$/";
    $messageRegex = "/^[a-zA-Z0-9 ]*$/";

    //regex validation

    //filter_var with regex
    if (!filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$nameRegex)))) {
        echo "<script>alert('Invalid Name')</script>";
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$emailRegex)))) {
        echo "<script>alert('Invalid Email')</script>";
        exit();
    } else if (!filter_var($number, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$numberRegex)))) {
        echo "<script>alert('Invalid Number')</script>";
        exit();
    } else if (!filter_var($message, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$messageRegex)))) {
        echo "<script>alert('Invalid Message')</script>";
        exit();
    }
    
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);


    $pdf->Cell(40,10,'Name: '.$name);
    $pdf->Ln();
    $pdf->Cell(40,10,'Email: '.$email);
    $pdf->Ln();
    $pdf->Cell(40,10,'Number: '.$number);
    $pdf->Ln();
    $pdf->Cell(40,10,'Message: '.$message);
    $pdf->Ln();
    $pdf->Cell(40,10,'Date: '.date('d-m-Y'));
    $pdf->Ln();

    $datetime = new DateTime();
    $date = $datetime->format('d-m-Y-H-is');
    
    header('Location: ../index.php');
    $filename = 'Message-' . $date;
    $destination = '../PDF/files/'.$filename.'.pdf';
    $pdf->output($destination, 'F');
    
    // refresh the page
}




?>