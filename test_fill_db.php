<?php
  // TÄYTTÄÄ TIETOKANNAN IRRELEVANTEILLA TESTI TEKSTEILLÄ
  $state = "null";

  function fill_db(){
    if (date('N') == 1) {
      $pvm_ma = date('Y-m-d');
      $pvm_ti = date('Y-m-d', strtotime(' +1 day'));
      $pvm_ke = date('Y-m-d', strtotime(' +2 day'));
      $pvm_to = date('Y-m-d', strtotime(' +3 day'));
      $pvm_pe = date('Y-m-d', strtotime(' +4 day'));
    }
    elseif (date('N') == 2) {
      $pvm_ma = date('Y-m-d', strtotime(' -1 day'));
      $pvm_ti = date('Y-m-d');
      $pvm_ke = date('Y-m-d', strtotime(' +1 day'));
      $pvm_to = date('Y-m-d', strtotime(' +2 day'));
      $pvm_pe = date('Y-m-d', strtotime(' +3 day'));
    }
    elseif (date('N') == 3) {
      $pvm_ma = date('Y-m-d', strtotime(' -2 day'));
      $pvm_ti = date('Y-m-d', strtotime(' -1 day'));
      $pvm_ke = date('Y-m-d');
      $pvm_to = date('Y-m-d', strtotime(' +1 day'));
      $pvm_pe = date('Y-m-d', strtotime(' +2 day'));
    }
    elseif (date('N') == 4) {
      $pvm_ma = date('Y-m-d', strtotime(' -3 day'));
      $pvm_ti = date('Y-m-d', strtotime(' -2 day'));
      $pvm_ke = date('Y-m-d', strtotime(' -1 day'));
      $pvm_to = date('Y-m-d');
      $pvm_pe = date('Y-m-d', strtotime(' +1 day'));
    }

    $mysql_server = "localhost";
    $mysql_db     = "projekti_tyo";
    $mysql_user   = "root";
    $mysql_pass   = "root";

    $link = mysqli_connect($mysql_server, $mysql_user, $mysql_pass, $mysql_db)
      or die("mySQLi connection error");

    $query  = "INSERT INTO ruoka (`pvm`, `ruoka`, `arvostelu ruoka`, `kasvisruoka`, `arvostelu kasvisruoka`) VALUES ('$pvm_ma', 'Testibolognese','0','Testikasvisbolognese','0')";
    mysqli_query($link, $query)
      or die("Insertion failed");

    $query  = "INSERT INTO ruoka (`pvm`, `ruoka`, `arvostelu ruoka`, `kasvisruoka`, `arvostelu kasvisruoka`) VALUES ('$pvm_ti', 'Nakkikastiketta','0','Soija_nakki-kastiketta','0')";
    mysqli_query($link, $query)
      or die("Insertion failed");

    $query  = "INSERT INTO ruoka (`pvm`, `ruoka`, `arvostelu ruoka`, `kasvisruoka`, `arvostelu kasvisruoka`) VALUES ('$pvm_ke', 'Kreikkalainen kasvisruoka','0','Italialainen vegaaniruoka','0')";
    mysqli_query($link, $query)
      or die("Insertion failed");

    $query  = "INSERT INTO ruoka (`pvm`, `ruoka`, `arvostelu ruoka`, `kasvisruoka`, `arvostelu kasvisruoka`) VALUES ('$pvm_to', 'Hernekeitto','0','Kasvis hernekeitto','0')";
    mysqli_query($link, $query)
      or die("Insertion failed");

    $query  = "INSERT INTO ruoka (`pvm`, `ruoka`, `arvostelu ruoka`, `kasvisruoka`, `arvostelu kasvisruoka`) VALUES ('$pvm_pe', 'Uunimakkara ja perunamuusi','0','Soija, papu pullia ja perunamuusia  ','0')";
    mysqli_query($link, $query)
      or die("Insertion failed");

    $state = "Database filled";
  }

  function empty_db() {
    if (date('N') == 1) {
      $pvm_ma = date('Y-m-d');
      $pvm_ti = date('Y-m-d', strtotime(' +1 day'));
      $pvm_ke = date('Y-m-d', strtotime(' +2 day'));
      $pvm_to = date('Y-m-d', strtotime(' +3 day'));
      $pvm_pe = date('Y-m-d', strtotime(' +4 day'));
    }
    elseif (date('N') == 2) {
      $pvm_ma = date('Y-m-d', strtotime(' -1 day'));
      $pvm_ti = date('Y-m-d');
      $pvm_ke = date('Y-m-d', strtotime(' +1 day'));
      $pvm_to = date('Y-m-d', strtotime(' +2 day'));
      $pvm_pe = date('Y-m-d', strtotime(' +3 day'));
    }
    elseif (date('N') == 3) {
      $pvm_ma = date('Y-m-d', strtotime(' -2 day'));
      $pvm_ti = date('Y-m-d', strtotime(' -1 day'));
      $pvm_ke = date('Y-m-d');
      $pvm_to = date('Y-m-d', strtotime(' +1 day'));
      $pvm_pe = date('Y-m-d', strtotime(' +2 day'));
    }
    elseif (date('N') == 4) {
      $pvm_ma = date('Y-m-d', strtotime(' -3 day'));
      $pvm_ti = date('Y-m-d', strtotime(' -2 day'));
      $pvm_ke = date('Y-m-d', strtotime(' -1 day'));
      $pvm_to = date('Y-m-d');
      $pvm_pe = date('Y-m-d', strtotime(' +1 day'));
    }

    $mysql_server = "localhost";
    $mysql_db     = "projekti_tyo";
    $mysql_user   = "root";
    $mysql_pass   = "root";

    $link = mysqli_connect($mysql_server, $mysql_user, $mysql_pass, $mysql_db)
      or die("mySQLi connection error");

    $query  = "DELETE FROM ruoka WHERE pvm='$pvm_ma'";
    mysqli_query($link, $query)
      or die("Query failed");

    $query  = "DELETE FROM ruoka WHERE pvm='$pvm_ti'";
    mysqli_query($link, $query)
      or die("Query failed");

    $query  = "DELETE FROM ruoka WHERE pvm='$pvm_ke'";
    mysqli_query($link, $query)
      or die("Query failed");

    $query  = "DELETE FROM ruoka WHERE pvm='$pvm_to'";
    mysqli_query($link, $query)
      or die("Query failed");

    $query  = "DELETE FROM ruoka WHERE pvm='$pvm_pe'";
    mysqli_query($link, $query)
      or die("Query failed");

    echo "Database emptyed";
    $state = "Database emptyed";
  }
 ?>


 <!DOCTYPE html>
 <html>
 <head>
   <title>Fill/empty database</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 </head>
 <body>

   <div>
     <h1>
        <input type="button" onclick="<?php empty_db() ?>" />
     </h1>
   </div>
