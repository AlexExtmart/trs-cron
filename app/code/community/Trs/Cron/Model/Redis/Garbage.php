<?php

/**
 * Inspired by:
 * https://github.com/colinmollenhour/Cm_Cache_Backend_Redis/blob/master/README.md
 */

class Trs_Cron_Model_Redis_Garbage
{
  public function collect() {
      try {
        Mage::app()->getCache()->getBackend()->clean('old');
      } catch(Exception $e){
        Mage::log($e->getMessage(), null, 'trs_cron.log');
      }
  }
}
