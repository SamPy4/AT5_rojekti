<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include 'functions.php';
  include 'mySQL_func.php';


  $date_today = date("Y-m-d");

  list($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe) = def_days();  // Luo viikonpäivä muuttujille päivämäärät

  // $pvm_ma = '2018-01-01';
  // $pvm_ti = '2018-01-02';
  // $pvm_ke = '2018-01-03';
  // $pvm_to = '2018-01-04';
  // $pvm_pe = '2018-01-05';

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

  // For debuggin'
  // $today = date("Y-m-d", strtotime("2017-12-26"));

  $today = date("Y-m-d");
  if (date("Y-m-d", strtotime($pvm_ma)) == $today) {
    $what_style = "style_ma.css";
  }
  elseif (date("Y-m-d", strtotime($pvm_ti)) == $today) {
    $what_style = "style_ti.css";
  }
  elseif (date("Y-m-d", strtotime($pvm_ke)) == $today) {
    $what_style = "style_ke.css";
  }
  elseif (date("Y-m-d", strtotime($pvm_to)) == $today) {
    $what_style = "style_to.css";
  }
  elseif (date("Y-m-d", strtotime($pvm_pe)) == $today) {
    $what_style = "style_pe.css";
  }
  elseif (date("Y-m-d", strtotime($pvm_ma)) < $today) {
    $what_style = "style_kaikki_menny.css";
  }
  elseif (date("Y-m-d", strtotime($pvm_ma)) > $today) {
    $what_style = "style_kaikki_tulossa.css";
  }

  list($ma_ruoka, $ti_ruoka, $ke_ruoka, $to_ruoka, $pe_ruoka) = get_ruoat($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);

  if(isset($_POST['search_box'])) {
    if ($_POST['search_box'] == "VEG") {
      $search = trim($_POST['search_box']);
    }
    else {
      $search = strtolower(trim($_POST['search_box']));
    }

    if($search !== '' && $search !== ' ' && strlen($search) >= 3) {

      $tulevat_paivat = def_tulevat_paivat();
      $loydetyt_paivat = array();

      foreach ($tulevat_paivat as $tmp_paiva) {
        if ($search == "VEG") {
          $pv_ruoka = $tmp_paiva['ruoka'];
        }
        else {
          $pv_ruoka = strtolower(($tmp_paiva['ruoka']));
        }

        if (strpos($pv_ruoka, $search) == true) {
          array_push($loydetyt_paivat, $tmp_paiva);
        }
      }

      $result_amount = sizeof($loydetyt_paivat);
    }
 }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <title>LISTA</title>
   <link rel="stylesheet" type="text/css" href="stylesheets\\main_site_style.css">
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
     <link rel="stylesheet" type="text/css" href= <?php echo "stylesheets\\".$what_style ?>>
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
   <script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        // alert(keyCode);

        if(keyCode === 39) {
            document.next_week.submit();
        }

        if(keyCode === 32) {
            document.this_week.submit();
        }

        if(keyCode === 37) {
            document.prev_week.submit();
        }
    }
  </script>
   <div>
     <form name="next_week" action="main.php" method="post" id="next_week">
         <input type="hidden" name="pvm_ma" value="<?php echo date('Y-m-d', strtotime($pvm_ma. ' + 7 days')) ?> "/>
         <input type="hidden" name="pvm_ti" value="<?php echo date('Y-m-d', strtotime($pvm_ti. ' + 7 days')) ?> "/>
         <input type="hidden" name="pvm_ke" value="<?php echo date('Y-m-d', strtotime($pvm_ke. ' + 7 days')) ?> "/>
         <input type="hidden" name="pvm_to" value="<?php echo date('Y-m-d', strtotime($pvm_to. ' + 7 days')) ?> "/>
         <input type="hidden" name="pvm_pe" value="<?php echo date('Y-m-d', strtotime($pvm_pe. ' + 7 days')) ?> "/>

         <button type="submit" class="next_week_but" /><span>Seuraava viikko</span> </button>
     </form>
   </div>

   <div>
     <form name="this_week" action="main.php" method="post" id="this_week">
         <input type="hidden" name="pvm_ma" value="<?php echo def_day("ma") ?> "/>
         <input type="hidden" name="pvm_ti" value="<?php echo def_day("ti") ?> "/>
         <input type="hidden" name="pvm_ke" value="<?php echo def_day("ke") ?> "/>
         <input type="hidden" name="pvm_to" value="<?php echo def_day("to") ?> "/>
         <input type="hidden" name="pvm_pe" value="<?php echo def_day("pe") ?> "/>

         <button type="submit" class="this_week_but" /><span>Tänään</span> </button>
     </form>
   </div>


   <div>
     <form name="prev_week" action="main.php" method="post" id="prev_week">
         <input type="hidden" name="pvm_ma" value="<?php echo date('Y-m-d', strtotime($pvm_ma. ' - 7 days')) ?> "/>
         <input type="hidden" name="pvm_ti" value="<?php echo date('Y-m-d', strtotime($pvm_ti. ' - 7 days')) ?> "/>
         <input type="hidden" name="pvm_ke" value="<?php echo date('Y-m-d', strtotime($pvm_ke. ' - 7 days')) ?> "/>
         <input type="hidden" name="pvm_to" value="<?php echo date('Y-m-d', strtotime($pvm_to. ' - 7 days')) ?> "/>
         <input type="hidden" name="pvm_pe" value="<?php echo date('Y-m-d', strtotime($pvm_pe. ' - 7 days')) ?> "/>

         <button type="submit" class="prev_week_but" /><span>Edellinen viikko</span> </button>
     </form>
   </div>

   <div>
     <p1 id="search_text_bg">
     </p1>
     <form name="search" action="main.php" method="post" id="search">
       <label id="search_text">Etsi ruokaa</label>
       <input type="text" name="search_box" id="search_box" />
       <button type="submit" class="search_but" id="search_but" /><span>Etsi</span> </button>
     </form>
   </div>

   <div id="search_results">
     <?php
     if (isset($loydetyt_paivat)) {
       foreach ($loydetyt_paivat as $ruog) {
         $weekday = date("N", strtotime($ruog['pvm']));
         echo wd_int_to_str($weekday);
         echo "\n";
         echo $ruog['pvm'];
         echo "<p>";
         echo "-------------------";
         echo "</p>";
       }
    }
     ?>
   </div>
   <div id="result_amount">
     <?php
     if(isset($result_amount)) {
       echo "Hakutuloksia: ".$result_amount;
     }
     ?>
   </div>


 </body>
 </html>
