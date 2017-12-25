<?php
  // TÄYTTÄÄ TIETOKANNAN IRRELEVANTEILLA TESTI TEKSTEILLÄ
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include 'functions.php';
  include 'mySQL_func.php';
  $state = "null";

  function fill_db() {
    list($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe) = def_days();  // Luo viikonpäivä muuttujille päivämäärät

    $link = connect();

    // $query  = "SELECT * FROM `ruoka` WHERE pvm="0000-00-00" ";
    // mysqli_query($link, $query)
    //   or die("Insertion failed");


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
    echo $state;
  }

  function empty_db() {
    list($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe) = def_days();  // Luo viikonpäivä muuttujille päivämäärät
    $link = connect();

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
