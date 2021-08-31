<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>E-Tiket(<?php echo $cetak[0]['kd_order'];?>)</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>
<style type="text/css">

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }
    
    img{float:left;padding-right:10px;}
    </style>
</head>
<body onload="window.print()">
  <table width="100%">
    <tr>
        <td valign="top"><img src="<?php echo base_url($cetak[0]['qrcode_order']) ?>" alt="" width="200"/></td>
        <td align="right">
            <h1>E-TICKET</h1>
            <pre>
                <b><span style='font-size:15px'>Detail Pesanan </span></b>
                </br>
                Kode Order : <?php echo $cetak[0]['kd_order'];?></br>
                Kode Jadwal : <?php echo $cetak[0]['kd_jadwal'];?></br>
                Beli : <?php echo $cetak[0]['tgl_beli_order'];?></br>
                Nama Pemesan : <?php echo $cetak[0]['nama_order'];?></br>
                Jadwal : <?php echo hari_indo(date('N',strtotime($cetak[0]['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$cetak[0]['tgl_berangkat_order'].'')));?><br>
                Jam Berangkat : <?php echo date('H:i',strtotime($cetak[0]['jam_berangkat_jadwal'])).' Sampai '.date('H:i',strtotime($cetak[0]['jam_tiba_jadwal'])) ?>
                Berangkat Dari : <?php echo $asal['nama_terminal_tujuan'].'-'.strtoupper($asal['kota_tujuan']);?></br>
                Tujuan Ke : <?php echo $cetak[0]['nama_terminal_tujuan'].' - '.strtoupper($cetak[0]['kota_tujuan']); ?>
            </pre>
        </td>
    </tr>
  </table>
  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Nomor Tiket</th>
        <th>Nama Penumpang</th>
        <th>Umur </th>
        <th>Nomor Kursi</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cetak as $row) { ?>
        <tr>
           <td scope="row"><?php echo $row['kd_tiket']; ?></td>
           <td align="left"><?php echo $row['nama_kursi_order']; ?></td>
           <td align="center"><?php echo $row['umur_kursi_order']; ?>Tahun</td>
            <td align="center"><?php echo $row['no_kursi_order']; ?> </td>
           <td align="left"><?php echo 'Rp '.number_format(($row['harga_jadwal'])).',-'; ?></td>
        <tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total Rp</td>
            <td align="right" class="gray"><?php $total = count($cetak) * $cetak[0]['harga_jadwal']; echo 'Rp '.number_format(($total)).',-';?></td>
        </tr>
    </tfoot>
  </table>
  <div id="container">
    <h1>Syarat dan ketentuan</h1>

    <div id="body">
        <ol type="1">
          <li>Tiket XTRANS * HANYA agen tiket bus. Ini tidak mengoperasikan layanan bus
            itu sendiri. Untuk menyediakan pilihan operator bus yang komprehensif,
            waktu keberangkatan dan harga untuk pelanggan, telah terikat dengan banyak bus
            operator.
            Saran Tiket XTRANS kepada pelanggan adalah memilih operator bus yang mereka ketahui
            dari dan yang layanannya mereka merasa nyaman.</li>
          <li>Waktu keberangkatan yang disebutkan di tiket hanyalah waktu tentatif. Namun
            bus tidak akan meninggalkan sumber sebelum waktu yang disebutkan pada tiket.
            Penumpang diwajibkan untuk memberikan yang berikut pada saat naik bus:
             (1) Salinan tiket (Cetak tiket atau cetak email tiket).
             (2) Bukti identitas yang valid
            Gagal melakukannya, mereka mungkin tidak diizinkan naik bus.</li>
           <li>Tanggung jawab Tiket XTRANS meliputi:
            (1) Mengeluarkan tiket yang valid (tiket yang akan diterima oleh bus)
            operator) untuk jaringan operator busnya
            (2) Memberikan pengembalian dana dan dukungan jika terjadi pembatalan
            (3) Memberikan dukungan dan informasi pelanggan jika ada penundaan /
            kerepotan
            Ganti bus: Jika operator bus mengubah jenis bus karena beberapa
            alasannya, Tiket XTRANS akan mengembalikan jumlah diferensial kepada pelanggan setelah menjadi
            diintimidasi oleh pelanggan dalam 24 jam perjalanan.</li>
            <li> Kebijakan Pembatalan: Untuk SVR Tours & Travels: Antara 0 jam hingga 7 jam sebelumnya
        perjalanan, biaya pembatalan adalah 100,0%. Antara 7 jam hingga 8 jam sebelumnya
        perjalanan, biaya pembatalan adalah 50,0%. Dan, biaya pembatalan di atas adalah
        10,0%.</li>
        <li>Tanggung jawab Tiket XTRANS TIDAK termasuk:
        (1) Bus operator bus tidak berangkat / mencapai tepat waktu
        (2) Karyawan operator bus bersikap kasar
        (3) Kursi bus operator dll tidak sesuai dengan pelanggan
        harapan
        (4) Operator bus membatalkan perjalanan karena alasan yang tidak dapat dihindari
        (5) Bagasi pelanggan hilang / dicuri / rusak
        (6) Operator bus mengubah kursi pelanggan pada menit terakhir
        mengakomodasi seorang wanita / anak
         (7) Pelanggan menunggu di titik keberangkatan yang salah (harap hubungi
        operator bus untuk mengetahui titik boarding yang tepat jika Anda bukan penumpang reguler
        traveler di bus tertentu)
        (8) Operator bus mengubah titik boarding dan / atau menggunakan pick-up
        Jika seseorang membutuhkan pengembalian dana untuk dikreditkan kembali ke rekening banknya, silakan
        tulis rincian kupon tunai Anda ke support@Tiket XTRANS.in
        * Biaya pengiriman ke rumah (jika ada), tidak akan dikembalikan dalam hal tiket
        pembatalan</li>
        <li>Jika email konfirmasi pemesanan dan sms tertunda atau gagal karena
        alasan teknis atau sebagai akibat dari ID / nomor telepon email yang salah diberikan
        oleh pengguna dll, tiket akan dianggap 'dipesan' selama tiket tersebut menunjukkan
        kendaraan di titik boarding untuk membawa pelanggan ke keberangkatan bus
        titik
        di halaman konfirmasi</li>
        </ol>  
    </div>
</div>

</body>
</html>