<?php
require('lib/fpdf.php');
include 'process.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signboxtask3";
$conn =  new mysqli($servername, $username, $password, $dbname);

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->Image('fb.png',83,9,40);
$pdf->Ln(12);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(190,7,'USER REPORT ',0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(190,5,'By: Facebook',0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(14,0,'Dated : ',0,1,'C');
$pdf->Cell(52,0,date("Y.m.d"),0,1,'C');
$pdf->Cell(325,0,'Developer : Ayesha Noor Khan',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(0,128,255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(255);
		$pdf->SetLineWidth(.3);
		$pdf->SetFont('','B');
        $pdf->Ln(7);
$pdf->Cell(20,6,'USER ID',1,0,'C',TRUE);
$pdf->Cell(45,6,'NAME',1,0,'C',TRUE);
$pdf->Cell(57,6,'EMAIL',1,0,'C',TRUE);
$pdf->Cell(26,6,'CONTACT',1,0,'C',TRUE);
$pdf->Cell(23,6,'BIRTHDATE',1,0,'C',TRUE);
$pdf->Cell(18,6,'GENDER',1,1,'C',TRUE);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(192,192,192);
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['generateall']))
    {
    
$detail = mysqli_query($conn, "SELECT * FROM user");
while ($row = mysqli_fetch_array($detail)){
    $pdf->Cell(20,6,$row['id'],1,0);
    $pdf->Cell(45,6,$row['FName'],1,0);
    $pdf->Cell(57,6,$row['Email'],1,0);
    $pdf->Cell(26,6,$row['Mobile'],1,0); 
    $pdf->Cell(23,6,$row['DOB'],1,0); 
    $pdf->Cell(18,6,$row['Gender'],1,1); 
}
}
else if(isset($_POST['generate']))
{
// $ufname=$_POST['ufname'];
// $umname=$_POST['umname'];
// $ulname=$_POST['ulname'];
$ueinfo=$_POST['ueinfo'];
$uminfo=$_POST['uminfo'];
if($_POST['uminfo'] !== null && $_POST['ueinfo'] == null)
{
$detail2 = mysqli_query($conn, "SELECT * FROM user where FName ='$uminfo' ");
}
else if($_POST['uminfo'] == null && $_POST['ueinfo'] !== null)
{
$detail2 = mysqli_query($conn, "SELECT * FROM user where Email ='$ueinfo' ");
}
else if($_POST['uminfo'] !== null && $_POST['ueinfo'] !== null)
{
$detail2 = mysqli_query($conn, "SELECT * FROM user where Email ='$ueinfo' AND FName ='$uminfo' ");
}
while ($row = mysqli_fetch_array($detail2)){
$pdf->Cell(20,6,$row['id'],1,0);
$pdf->Cell(45,6,$row['FName'],1,0);
$pdf->Cell(57,6,$row['Email'],1,0);
$pdf->Cell(26,6,$row['Mobile'],1,0); 
$pdf->Cell(23,6,$row['DOB'],1,0); 
$pdf->Cell(18,6,$row['Gender'],1,1); 
}
}
}
$pdf->SetDrawColor(0);
$pdf->Rect(5, 5, 200, 287, 'D');//D for a4
ob_end_clean();
$pdf->Output(); 
?> 