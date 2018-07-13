
<?php
require '../../../fpdf181/fpdf.php';
$image = '../../../assets/img/itsu.jpeg';
$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font type
$pdf ->SetFont('Arial','','14');

$pdf->Cell(55,2,$pdf->Image($image,$pdf->GetX()+33, $pdf->GetY(),24.78));
$pdf->Cell(59,7,'TAKORADI TECHNICAL UNIVERSITY',0,1);


$pdf->Cell(55,5 ,'',0,0);
$pdf->Cell(90,5 ,'INFORMATION TECHNOLOGY STUDENTS UNION(ITSU)',0,1);

$pdf->Cell(55,5 ,'',0,0);
$pdf->Cell(90,5 ,'P.O. Box 256, Takoradi',0,1);


$pdf->Cell(55,5 ,'',0,0);
$pdf->Cell(90,5 ,'Email: itsu@yahoo.com',0,1);

$pdf->Cell(90,5 ,'____________________________________________________________________',0,1);
// cell
$pdf ->SetFont('Arial','','18');
$pdf->Cell(50,10 ,'',0,1);
$pdf->Cell(50,10 ,'Officail Receipt',1,0);
$pdf->Cell(80,10 ,'',0,0);
$pdf->Cell(50,10 ,'',0,1);


$pdf ->SetFont('Arial','','16');
$pdf->Cell(80,10 ,'',0,0);
$pdf->Cell(55,10 ,'Receipt Number:',0,0);
$pdf->Cell(50,10 ,'iTSU18051000010',0,1);


$pdf->Cell(50,0 ,'',0,1);
$pdf->Cell(110,10 ,'',0,0);
$pdf->Cell(25,10 ,'Date:',0,0);
$pdf->Cell(45,10 ,'25 May, 2018',0,1);

//set font
$pdf ->SetFont('Arial','','13');

// a dummy emtyp cell a vertical  spacer
$pdf->Cell(189,10 ,'',0,1);


$pdf->Cell(45,'5','Name:','0','0');
$pdf->Cell(120,'5','Osikani Israel','0','1');



$pdf->Cell(45,'5','Index Number:','0','0');
$pdf->Cell(120,'5','07162734','0','1');

$pdf->Cell(45,'5','Class:','0','0');
$pdf->Cell(120,'5','HND LEVEL 100','0','1');


$pdf->Cell(45,'5','Phone:','0','0');
$pdf->Cell(120,'5','0249051415','0','1');
$pdf->Cell(130,5 ,'____________________________________',0,1);
// a dummy emtyp cell a vertical  spacer
$pdf->Cell(189,10 ,'',0,1);


$pdf ->SetFont('Arial','B','13');
$pdf->Cell(55,5 ,'',0,0);
$pdf->Cell(70,8 ,'Amount in Words',0,0);
$pdf->Cell(90,8 ,'Amount in Figures(GH)',0,1);
//set font type
$pdf ->SetFont('Arial','','13');

// a dummy emtyp cell at the begining for indentation
$pdf->Cell(10,5 ,'',0,0);
$pdf->Cell(45,5 ,'Amount Paid',0,0);
$pdf->Cell(70,5 ,'Thirty Five Ghana Cedis',0,0);
$pdf->Cell(40,5 ,'45',0,1);


$pdf->Cell(10,5 ,'',0,0);
$pdf->Cell(45,5 ,'Amount Paid',0,0);
$pdf->Cell(70,5 ,'Zero',0,0);
$pdf->Cell(40,5 ,'0',0,1);



$pdf ->SetFont('Arial','','13');
$pdf->Cell(55,5 ,'',0,0);
$pdf->Cell(130,5 ,'____________________________________',0,1);

$pdf->Cell(10,10 ,'',0,1);
$pdf->Cell(10,5 ,'',0,0);
$pdf->Cell(45,5 ,'Lactost:',0,0);


$pdf ->SetFont('Arial','B','13');
$pdf->Cell(90,5 ,'Not Received',0,1);




// a dummy emtyp cell a vertical  spacer
$pdf->Cell(189,10 ,'',0,1);
//set font type
$pdf ->SetFont('Arial','B','12');


// a dummy emtyp cell a vertical  spacer
$pdf->Cell(189,10 ,'',0,1);

//set font type
$pdf ->SetFont('Arial','','12');

$pdf->Cell(110,10 ,'',0,0);
$pdf->Cell(45,'5','','0','0');
$pdf->Cell(120,'5','Supervisor','0','1');
$pdf->Cell(189,10 ,'',0,1);

$pdf->Cell(110,10 ,'',0,0);
$pdf->Cell(45,'5','','0','0');
$pdf->Cell(120,'5','.....................','0','1');


$pdf->Cell(110,10 ,'',0,0);
$pdf->Cell(45,'5','','0','0');
$pdf->Cell(120,'5','Osikani Israel','0','1');

$pdf->Output();

