<?php
  function def_days() {
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
    elseif (date('N') == 5) {
      $pvm_ma = date('Y-m-d', strtotime(' -4 day'));
      $pvm_ti = date('Y-m-d', strtotime(' -3 day'));
      $pvm_ke = date('Y-m-d', strtotime(' -2 day'));
      $pvm_to = date('Y-m-d', strtotime(' -1 day'));
      $pvm_pe = date('Y-m-d');
    }
    elseif (date('N') == 6) {
      $pvm_ma = date('Y-m-d', strtotime(' +2 day'));
      $pvm_ti = date('Y-m-d', strtotime(' +3 day'));
      $pvm_ke = date('Y-m-d', strtotime(' +4 day'));
      $pvm_to = date('Y-m-d', strtotime(' +5 day'));
      $pvm_pe = date('Y-m-d', strtotime(' +6 day'));
    }
    elseif (date('N') == 7) {
      $pvm_ma = date('Y-m-d', strtotime(' +1 day'));
      $pvm_ti = date('Y-m-d', strtotime(' +2 day'));
      $pvm_ke = date('Y-m-d', strtotime(' +3 day'));
      $pvm_to = date('Y-m-d', strtotime(' +4 day'));
      $pvm_pe = date('Y-m-d', strtotime(' +5 day'));
    }

    $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
    return $pvms;
  }

  function nextWeek($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe) {
    $pvm_ma = date($pvm_ma, strtotime(' +7 day'));
    $pvm_ti = date($pvm_ti, strtotime(' +7 day'));
    $pvm_ke = date($pvm_ke, strtotime(' +7 day'));
    $pvm_to = date($pvm_to, strtotime(' +7 day'));
    $pvm_pe = date($pvm_pe, strtotime(' +7 day'));

    $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
    return $pvms;

  }

function def_day($day) {
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
  elseif (date('N') == 5) {
    $pvm_ma = date('Y-m-d', strtotime(' -3 day'));
    $pvm_ti = date('Y-m-d', strtotime(' -2 day'));
    $pvm_ke = date('Y-m-d', strtotime(' -1 day'));
    $pvm_to = date('Y-m-d', strtotime(' +1 day'));
    $pvm_pe = date('Y-m-d');
  }
  elseif (date('N') == 6) {
    $pvm_ma = date('Y-m-d', strtotime(' +2 day'));
    $pvm_ti = date('Y-m-d', strtotime(' +3 day'));
    $pvm_ke = date('Y-m-d', strtotime(' +4 day'));
    $pvm_to = date('Y-m-d', strtotime(' +5 day'));
    $pvm_pe = date('Y-m-d', strtotime(' +6 day'));
  }
  elseif (date('N') == 7) {
    $pvm_ma = date('Y-m-d', strtotime(' +1 day'));
    $pvm_ti = date('Y-m-d', strtotime(' +2 day'));
    $pvm_ke = date('Y-m-d', strtotime(' +3 day'));
    $pvm_to = date('Y-m-d', strtotime(' +4 day'));
    $pvm_pe = date('Y-m-d', strtotime(' +5 day'));
  }
  if ($day == "ma") {
    return $pvm_ma;
  }
  if ($day == "ti") {
    return $pvm_ti;
  }
  if ($day == "ke") {
    return $pvm_ke;
  }
  if ($day == "to") {
    return $pvm_to;
  }
  if ($day == "pe") {
    return $pvm_pe;
  }
  return "No day defined";

}

function wd_int_to_str($weekday_int) {
  switch ($weekday_int) {
    case 1:
      return "MA";
    case 2:
      return "TI";
    case 3:
      return "KE";
    case 4:
      return "TO";
    case 5:
      return "PE";
    case 6:
      return "LA";
    case 7:
      return "SU";
  }
}

function week_by_day($result_pvm) {
 $result_wd = date("N", strtotime($result_pvm));

 switch ($result_wd) {
   case 1:
     $pvm_ma = $result_pvm;
     $pvm_ti = date('Y-m-d', strtotime($result_pvm. ' +1 day'));
     $pvm_ke = date('Y-m-d', strtotime($result_pvm. ' +2 day'));
     $pvm_to = date('Y-m-d', strtotime($result_pvm. ' +3 day'));
     $pvm_pe = date('Y-m-d', strtotime($result_pvm. ' +4 day'));
     $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
     return $pvms;
   case 2:
     $pvm_ma = date('Y-m-d', strtotime($result_pvm. ' -1 day'));
     $pvm_ti = $result_pvm;
     $pvm_ke = date('Y-m-d', strtotime($result_pvm. ' +1 day'));
     $pvm_to = date('Y-m-d', strtotime($result_pvm. ' +2 day'));
     $pvm_pe = date('Y-m-d', strtotime($result_pvm. ' +3 day'));
     $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
     return $pvms;
   case 3:
     $pvm_ma = date('Y-m-d', strtotime($result_pvm. ' -2 day'));
     $pvm_ti = date('Y-m-d', strtotime($result_pvm. ' -1 day'));
     $pvm_ke = $result_pvm;
     $pvm_to = date('Y-m-d', strtotime($result_pvm. ' +1 day'));
     $pvm_pe = date('Y-m-d', strtotime($result_pvm. ' +2 day'));
     $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
     return $pvms;
   case 4:
     $pvm_ma = date('Y-m-d', strtotime($result_pvm. ' -3 day'));
     $pvm_ti = date('Y-m-d', strtotime($result_pvm. ' -2 day'));
     $pvm_ke = date('Y-m-d', strtotime($result_pvm. ' -1 day'));
     $pvm_to = $result_pvm;
     $pvm_pe = date('Y-m-d', strtotime($result_pvm. ' +1 day'));
     $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
     return $pvms;
   case 5:
     $pvm_ma = date('Y-m-d', strtotime($result_pvm. ' -4 day'));
     $pvm_ti = date('Y-m-d', strtotime($result_pvm. ' -3 day'));
     $pvm_ke = date('Y-m-d', strtotime($result_pvm. ' -2 day'));
     $pvm_to = date('Y-m-d', strtotime($result_pvm. ' -1 day'));
     $pvm_pe = $result_pvm;
     $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
     return $pvms;
  }

  $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
  return $pvms;
}
?>
