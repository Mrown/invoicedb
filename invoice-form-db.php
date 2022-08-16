<?php
//db connection
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'invoicedb');
?>

<html>

<head>
    <title> php invoice generator </title>
</head>

<body>
    <form method='get' action='invoice-db.php'>
        <select name='InvoiceID'>
            <?php

            // shows invoices as an options list
            $query = mysqli_query($con, "select * from invoices");
            while ($invoice = mysqli_fetch_array($query)) {
                echo "<option value='" . $invoice['InvoiceID'] . "'>" . $invoice['InvoiceID'] . "</option>";
            }
            ?>

        </select>
        <input type='submit' value='generate'>
    </form>
</body>

</html>