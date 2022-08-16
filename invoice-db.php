<?php
//db connection
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'invoicedb');

//fpdf connection
require('fpdf/fpdf.php');

//creates a PDF with standards with 219mm, 10mm margin
$pdf = new FPDF('p', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

//gets invoice data from invoicedb -> invoices
$query1 = mysqli_query($con, "select * from invoices
inner join clients using(id)
where
InvoiceID ='" . $_GET['InvoiceID'] . "'");
$invoices = mysqli_fetch_array($query1);

$query2 = mysqli_query($con, "select * from invoices
inner join products using(id)
where
InvoiceID ='" . $_GET['InvoiceID'] . "'");
$products = mysqli_fetch_array($query2);

// Sum for Subtotal calculation - across different arrays
function multisum(array $currency): float
{
    $sum = array_sum($currency);
    foreach ($currency as $currency) {
        $sum += is_array($currency) ? multisum($currency) : 0;
    }
    return $sum;
}

//Designing Cells
//(Width, Height, Text, Border, end line, [align])
//Border = 1= 4 sides, 0 = no sides
//end Line = 1 = new line, 0 = continue on the same line
//align = optional
$pdf->Cell(130, 5, 'Eriks PHP Service', 0, 1);
$pdf->Cell(130, 5, '', 0, 1);

$pdf->Cell(130, 7, $invoices['Company'], 1, 0);
$pdf->Cell(60, 7, 'INVOICE', 1, 0, 1); //end of line example
$pdf->Cell(130, 7, '', 0, 1);
$pdf->Cell(130, 7, '', 0, 1);

$pdf->Cell(130, 7, $invoices['company adress'], 1, 0);
$pdf->Cell(60, 7, '', 0, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);

$pdf->Cell(130, 7, 'City, County, ZIP', 1, 0);
$pdf->Cell(30, 7, 'Date', 1, 0, 1);
$pdf->Cell(30, 7, $invoices['Date'], 1, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);

$pdf->Cell(130, 7, $invoices['phone'], 1, 0);
$pdf->Cell(30, 7, 'Invoice #', 1, 0, 1);
$pdf->Cell(30, 7, $invoices['InvoiceID'], 1, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);

$pdf->Cell(130, 7, $invoices['email'], 1, 0);
$pdf->Cell(30, 7, 'Customer #', 1, 0, 1);
$pdf->Cell(30, 7, $invoices['ClientID'], 1, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);
$pdf->Cell(130, 7, '', 0, 1);
$pdf->Cell(130, 7, '', 0, 1);

// Billing information
$pdf->Cell(30, 7, 'Bill To', 0, 1, 1);
$pdf->Cell(160, 7, $invoices['name'], 0, 0);
$pdf->Cell(60, 7, '', 0, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);
$pdf->Cell(160, 7, $invoices['company department'], 0, 0);
$pdf->Cell(60, 7, '', 0, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);
$pdf->Cell(160, 7, $invoices['address'], 0, 0);
$pdf->Cell(60, 7, '', 0, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);
$pdf->Cell(160, 7, 'Phone:', 0, 0);
$pdf->Cell(60, 7, '', 0, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);
$pdf->Cell(130, 7, '', 0, 1);

// Description Part
$pdf->Cell(130, 7, 'Description', 0, 0);
$pdf->Cell(30, 7, 'Taxable', 0, 0, 1);
$pdf->Cell(30, 7, 'Amount', 0, 0, 1);
$pdf->Cell(130, 7, '', 0, 1);

$pdf->Cell(130, 7, $products['text'], 1, 0);
$pdf->Cell(30, 7, '-', 1, 0, 1);
$pdf->Cell(30, 7, $products['currency'], 1, 0, 'R');
$pdf->Cell(130, 7, '', 0, 1);

$pdf->Cell(130, 7, $products['text'], 1, 0);
$pdf->Cell(30, 7, '-', 1, 0, 1);
$pdf->Cell(30, 7, $products['currency'], 1, 0, 'R');
$pdf->Cell(130, 7, '', 0, 1);

$pdf->Cell(130, 7, $products['text'], 1, 0);
$pdf->Cell(30, 7, '-', 1, 0, 1);
$pdf->Cell(30, 7, $products['currency'], 1, 0, 'R');
$pdf->Cell(130, 7, '', 0, 1);

$pdf->Cell(130, 7, $products['text'], 1, 0);
$pdf->Cell(30, 7, '-', 1, 0, 1);
$pdf->Cell(30, 7, $products['currency'], 1, 0, 'R');
$pdf->Cell(130, 7, '', 0, 1);

// Subtotal
$pdf->Cell(130, 7, '', 0, 0);
$pdf->Cell(30, 7, 'Subtotal', 1, 0, 1);
$pdf->Cell(30, 7, multisum($products), 1, 0, 'R');
$pdf->Cell(130, 7, '', 0, 1);


$pdf->Output();