<?php

/**
 * Inspired by:
 * https://github.com/colinmollenhour/Cm_Cache_Backend_Redis/blob/master/README.md
 */

require_once '../../../../../../Mage.php';

ini_set('memory_limit','1024M');
set_time_limit(0);
error_reporting(E_ALL | E_STRICT);

class Trs_Cron_Model_Redis_Garbage
{
  public function collect() {
    Mage::app()->getCache()->getBackend()->clean('old');
  }
}

$script = new Trs_Cron_Model_Redis_Garbage();
$script->collect();
?>
