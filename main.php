<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include 'functions.php';
  include 'mySQL_func.php';


  $date_today = date("Y-m-d");

  list($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe) = def_days();  // Luo viikonpäivä muuttujille päivämäärät

  $pvm_ma = '2018-01-01';
  $pvm_ti = '2018-01-02';
  $pvm_ke = '2018-01-03';
  $pvm_to = '2018-01-04';
  $pvm_pe = '2018-01-05';

  if(isset($_POST['pvm_ma'])) {
    $pvm_ma = $_POST['pvm_ma'];
  }
  if(isset($_POST['pvm_ti'])) {
    $pvm_ti = $_POST['pvm_ti'];
  }
  if(isset($_POST['pvm_ke'])) {
    $pvm_ke = $_POST['pvm_ke'];
  }
  if(isset($_POST['pvm_to'])) {
    $pvm_to = $_POST['pvm_to'];
  }
  if(isset($_POST['pvm_pe'])) {
    $pvm_pe = $_POST['pvm_pe'];
  }

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

   <div id="pvm_texts">
     <p1>
       <?php echo $pvm_ma ?>
     </p1>
     <p2>
       <?php echo $pvm_ti ?>
     </p2>
     <p3>
       <?php echo $pvm_ke ?>
     </p3>
     <p4>
       <?php echo $pvm_to ?>
     </p4>
     <p5>
       <?php echo $pvm_pe ?>
     </p5>
   </div>

   <div>
     <form action="main.php" method="post" id="next_week">
         <input type="hidden" name="pvm_ma" value="<?php echo date('Y-m-d', strtotime($pvm_ma. ' + 7 days')) ?> "/>
         <input type="hidden" name="pvm_ti" value="<?php echo date('Y-m-d', strtotime($pvm_ti. ' + 7 days')) ?> "/>
         <input type="hidden" name="pvm_ke" value="<?php echo date('Y-m-d', strtotime($pvm_ke. ' + 7 days')) ?> "/>
         <input type="hidden" name="pvm_to" value="<?php echo date('Y-m-d', strtotime($pvm_to. ' + 7 days')) ?> "/>
         <input type="hidden" name="pvm_pe" value="<?php echo date('Y-m-d', strtotime($pvm_pe. ' + 7 days')) ?> "/>

         <button type="submit" class="next_week_but" /><span>Seuraava viikko</span> </button>
     </form>
   </div>

   <div>
     <form action="main.php" method="post" id="prev_week">
         <input type="hidden" name="pvm_ma" value="<?php echo date('Y-m-d', strtotime($pvm_ma. ' - 7 days')) ?> "/>
         <input type="hidden" name="pvm_ti" value="<?php echo date('Y-m-d', strtotime($pvm_ti. ' - 7 days')) ?> "/>
         <input type="hidden" name="pvm_ke" value="<?php echo date('Y-m-d', strtotime($pvm_ke. ' - 7 days')) ?> "/>
         <input type="hidden" name="pvm_to" value="<?php echo date('Y-m-d', strtotime($pvm_to. ' - 7 days')) ?> "/>
         <input type="hidden" name="pvm_pe" value="<?php echo date('Y-m-d', strtotime($pvm_pe. ' - 7 days')) ?> "/>

         <button type="submit" class="prev_week_but" /><span>Edellinen viikko</span> </button>
     </form>
   </div>

 </body>
 </html>
