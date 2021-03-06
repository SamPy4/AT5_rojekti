<?php
  function connect() {
    // Server connect and Database selection
    $mysql_server = "localhost";
    $mysql_db     = "projekti_tyo";
    $mysql_user   = "root";
    $mysql_pass   = "root";
    $link = mysqli_connect($mysql_server, $mysql_user, $mysql_pass, $mysql_db)
      or die("mySQLi connection error");
    return $link;
  }

  function get_ruoat($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe) {
    $link = connect();

    $query  = "SELECT * FROM ruoka WHERE pvm = '$pvm_ma' ";
    $result = mysqli_query($link, $query);
    $row    = mysqli_fetch_array($result);
    $ma_ruoka = $row['ruoka'];

    $query  = "SELECT * FROM ruoka WHERE pvm =  '$pvm_ti' ";
    $result = mysqli_query($link, $query);
    $row    = mysqli_fetch_array($result);
    $ti_ruoka = $row['ruoka'];

    $query  = "SELECT * FROM ruoka WHERE pvm =  '$pvm_ke' ";
    $result = mysqli_query($link, $query);
    $row    = mysqli_fetch_array($result);
    $ke_ruoka = $row['ruoka'];

    $query  = "SELECT * FROM ruoka WHERE pvm =  '$pvm_to' ";
    $result = mysqli_query($link, $query);
    $row    = mysqli_fetch_array($result);
    $to_ruoka = $row['ruoka'];

    $query  = "SELECT * FROM ruoka WHERE pvm =  '$pvm_pe' ";
    $result = mysqli_query($link, $query);
    $row    = mysqli_fetch_array($result);
    $pe_ruoka = $row['ruoka'];

    $ruoat = array($ma_ruoka, $ti_ruoka, $ke_ruoka, $to_ruoka, $pe_ruoka);
    return $ruoat;
  }

  function def_tulevat_paivat() {
    $link = connect();

    $query  = "SELECT * FROM ruoka WHERE pvm >= CURDATE()";
    $result = mysqli_query($link, $query);

    $tulevat_paivat = array();

    while ($row = mysqli_fetch_array($result)) {
      array_push($tulevat_paivat, $row);
    }

    // foreach($tulevat_paivat as $tmp) {
    //   echo "\n".$tmp['pvm'];
    // }

    return $tulevat_paivat;
  }
 ?>
