<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('tgl_indo')){

  function tgl_indo($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = getBulan(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
  }
  function tanggal_indo($tanggal){
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  }
  function hari_indo($day){
    $hari = array ( 1 =>    'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
    );
    return $hari[$day];
  }
  function tanggal_ing($tanggal1){
  $bulan1 = array (1 =>   
        'January',
        'February',
          'March',
       'April',
         'May',
         'June',
          'July',
            'August',
           'September',
           'October',
         'November',
            'December'
      );
    $split1 = explode('-', $tanggal1);
    return $split1[2] . ' ' . $bulan1[ (int)$split1[1] ] . ' ' . $split1[0];
  }
  function hari_ing($day1){
    $hari1 = array ( 1 =>    'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
    );
    return $hari1[$day1];
  }
  function getBulan($bln){
    switch ($bln){
      case 1:
	    return "Januari";
	    break;
	  case 2:
	    return "Februari";
	    break;
	  case 3:
	    return "Maret";
	    break;
	  case 4:
	    return "April";
	    break;
	  case 5:
	    return "Mei";
	    break;
	  case 6:
	    return "Juni";
	    break;
	  case 7:
	    return "Juli";
	    break;
	  case 8:
	    return "Agustus";
	    break;
	  case 9:
	    return "September";
	    break;
	  case 10:
	    return "Oktober";
	    break;
	  case 11:
	    return "November";
	    break;
	  case 12:
	    return "Desember";
	    break;
    }
  }
  
  function tgl_str($date){
    $exp = explode('-',$date);
    if(count($exp) == 3) {
	  $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
    }
    return $date;
  }
  
  function nama_hari(){
    $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $hari = date("w");
    $hari_ini = $seminggu[$hari];
    return $hari_ini;
  }
  function time_since($original)
{
  date_default_timezone_set('Asia/Jakarta');
  $chunks = array(
      array(60 * 60 * 24 * 365, 'tahun'),
      array(60 * 60 * 24 * 30, 'bulan'),
      array(60 * 60 * 24 * 7, 'minggu'),
      array(60 * 60 * 24, 'hari'),
      array(60 * 60, 'jam'),
      array(60, 'menit'),
  );
 
  $today = time();
  $since = $today - $original;
 
  if ($since > 604800)
  {
    $print = date("M jS", $original);
    if ($since > 31536000)
    {
      $print .= ", " . date("Y", $original);
    }
    return $print;
  }
 
  for ($i = 0, $j = count($chunks); $i < $j; $i++)
  {
    $seconds = $chunks[$i][0];
    $name = $chunks[$i][1];
 
    if (($count = floor($since / $seconds)) != 0)
      break;
  }
 
  $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
  return $print . ' yang lalu';
}
}
?>
