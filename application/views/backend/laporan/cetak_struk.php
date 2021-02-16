<?php
require_once(APPPATH.'vendor/mike42/escpos-php/autoload.php');
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    $date = date('d-M-Y H:i:s');  
        $connector = new WindowsPrintConnector("POS58");
        // $logo = EscposImage::load("./assets/img/logo.png", false);
        $printer = new Printer($connector);
        $printer -> initialize();
                  $testStr = ($cetak[0]['kd_order']);
    $sizes = array(
     15 => "(maximum)");
    foreach ($sizes as $size => $label) {
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> qrCode($testStr, Printer::QR_ECLEVEL_L, $size);
    $printer -> text($cetak[0]['kd_order']);
    $printer -> setJustification();
}
    $printer -> feed(1);      
        /* Name of shop */
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        // $printer -> bitImage($logo);
        $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer -> text("BUS XTRANS\n");
        $printer -> selectPrintMode();
        $printer -> text("Jl. Meruya Ilir Raya\n");
        $printer -> text("Srengseng - Kembangan\n");
        $printer -> text("Jakarta Barat\n");
        $printer -> text("================================\n");
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> text("No Order    : ");
        $printer -> text($cetak[0]['kd_order']);
        $printer -> feed();
        $printer -> text("Nama Pemesan : ");
        $printer -> text($cetak[0]['nama_temp']);
        $printer -> feed();
        $printer -> text("--------------------------------\n"); 
        /* Title of receipt */
        $printer -> setEmphasis(true);
        $printer -> text("Keterangan                Total");
        $printer -> setEmphasis(false);
        foreach ($cetak as $i) {
        $printer -> feed();
        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer -> text($i['kd_tiket']);
        $printer -> feed();
        $printer -> text($i['kd_jadwal']   );
        $printer -> text("      ");
        $printer -> text($i['harga_tiket']);
        // $printer -> text("      ");        
        // $printer -> text($diskon=$i['d_jual_diskon'])."";
        $printer -> text("      ");
        $printer -> text($i['harga_tiket']);
        }
        $printer -> feed();
        $printer -> text("--------------------------------\n");
        // $printer -> setJustification(Printer::JUSTIFY_RIGHT);
        $printer -> setEmphasis(true);
        $printer -> text("Total     :              ");
        if (count($cetak) == '2') { $total = $cetak[0]['harga_tiket'] + $cetak[0]['harga_tiket'] ;;
                                            }else{ $total = $cetak[0]['harga_tiket'] ;}
        $printer -> text($total);
        $printer -> setEmphasis(false);
        $printer -> feed();
        $printer -> text("--------------------------------\n");
        /* Footer */
        $printer -> feed();
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer -> text("Terima Kasih \n");
        $printer -> text($date . "\n");
        $printer -> feed();

        
        /* Cut the receipt and open the cash drawer */
        $printer -> cut();
        $printer -> pulse();
        $printer -> close();
    $printer -> close();
        redirect('tiket/tiketsaya/'.$cetak[0]['kd_pelanggan']);