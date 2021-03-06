<?php

require_once '../../../../../../../shell/abstract.php';

class Trs_Cron_Model_Varnish_Cache extends Mage_Shell_Abstract
{
  public function warm() {
    $shellScript = Mage::getBaseDir('code').DS.'community'.DS.'Trs'.DS.'Cron'.DS.'shell'.DS.'warm-cache.sh';
    $siteMapFile = Mage::getBaseDir('base').DS.'sitemap.xml';
    $siteMapUrl  = Mage::getStoreConfig(Mage_Core_Model_Store::XML_PATH_SECURE_BASE_URL).'sitemap.xml';

    if(file_exists($shellScript) && file_exists($siteMapFile)) {
      shell_exec(escapeshellcmd("/bin/sh $shellScript $siteMapUrl"));
    } else {
      throw new Exception("$shellScript or $siteMapFile do not exist!");
      exit(1);
    }

  }
}

$shell = new Trs_Cron_Model_Varnish_Cache();
$shell->warm();
?>
