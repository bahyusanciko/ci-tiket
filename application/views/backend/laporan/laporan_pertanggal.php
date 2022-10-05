<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Data Tiket Pertanggal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()" >
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PENJUALAN TIKET</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>
<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
<tr>
<th colspan="11" style="text-align:left;">Laporan Dari Tanggal <?= $mulai ?> Sampai <?= $sampai ?> </th>
</tr>
    <tr>
        <th>No Tiket</th>
        <th>No Order</th>
        <th>Nama </th>
        <th>Umur</th>
        <th>Kursi</th>
        <th>Harga Tiket</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($laporan as $row) { ?>
    <tr>
        <td style="text-align:center;"><?= $row['kd_tiket'];?></td>
        <td style="padding-left:5px;"><?= $row['kd_order'];?></td>
        <td style="text-align:center;"><?= $row['nama_tiket'];?></td>
        <td style="text-align:center;"><?= $row['umur_tiket'];?></td>
        <td style="text-align:center;"><?= $row['kursi_tiket'];?></td>
        <td style="text-align:left;"><?= 'Rp '.number_format($row['harga_tiket']);?></td>
    </tr>
    <?php } ?>
</tbody>
<tfoot>

    <tr>
        <td colspan="5" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:left;"><b><?= 'Rp '.number_format($total);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Jakarta, <?= date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?= $this->session->userdata('username_admin');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>