<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // Server connect and Database selection
  $mysql_server = "localhost";
  $mysql_db     = "projekti_tyo";
  $mysql_user   = "root";
  $mysql_pass   = "root";
  $link = mysqli_connect($mysql_server, $mysql_user, $mysql_pass, $mysql_db)
    or die("mySQLi connection error");

  $date_today = "2017-12-13"; //date("Y-m-d");

  $query  = "SELECT * FROM ruoka WHERE pvm = '$date_today' ";
  $result = mysqli_query($link, $query);

  $row    = mysqli_fetch_array($result);

  #echo "Ruoka:".$row['ruoka'];

  $paivan_ruoka = $row['ruoka'];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <title>LISTA</title>
   <link rel="stylesheet" type="text/css" href="main_site_style.css">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 </head>
 <body>
   <div id="days">
       <h1>
       </h1>
       <h2>
         <?php echo "KE" ?>
       </h2>
   </div>

   <div id="content">
       <p>
         <?php echo $paivan_ruoka ?>
       </p>
   </div>

 </body>
 </html>
