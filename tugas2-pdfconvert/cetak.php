<?php

require_once 'vendor/autoload.php';
ob_start();
include 'cetak_ini.php';
$html = ob_get_clean();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream("file_transaksi.pdf");

?>