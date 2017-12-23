<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  include 'functions.php';
  include 'mySQL_func.php';

  $date_today = "2017-12-13"; //date("Y-m-d");

  list($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe) = def_days();  // Luo viikonpäivä muuttujille päivämäärät

  list($ma_ruoka, $ti_ruoka, $ke_ruoka, $to_ruoka, $pe_ruoka) = get_ruoat($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);

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
         <?php echo "MA" ?>
       </h1>
       <h2>
         <?php echo "TI" ?>
       </h2>
       <h3>
         <?php echo "KE" ?>
       </h3>
       <h4>
         <?php echo "TO" ?>
       </h4>
       <h5>
         <?php echo "PE" ?>
       </h5>
   </div>

   <div id="days_bg">
     <h1>
     </h1>
     <h2>
     </h2>
     <h3>
     </h3>
     <h4>
     </h4>
     <h5>
     </h5>
   </div>


   <div id="content">
       <p1>
         <?php echo $ma_ruoka ?>
       </p1>
       <p2>
         <?php echo $ti_ruoka ?>
       </p2>
       <p3>
         <?php echo $ke_ruoka ?>
       </p3>
       <p4>
         <?php echo $to_ruoka ?>
       </p4>
       <p5>
         <?php echo $pe_ruoka ?>
       </p5>

   </div>

 </body>
 </html>
