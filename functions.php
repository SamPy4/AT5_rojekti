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
    $pvms = array($pvm_ma, $pvm_ti, $pvm_ke, $pvm_to, $pvm_pe);
    return $pvms;
  }
?>
