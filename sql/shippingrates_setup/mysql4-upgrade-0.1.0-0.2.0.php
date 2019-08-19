<?php
$installer = $this;
$installer->startSetup();
$installer->run("
   DROP TABLE IF EXISTS {$this->getTable('shippingzonerates')};
   CREATE TABLE {$this->getTable('shippingzonerates')} (
   `id` int(11) unsigned NOT NULL auto_increment,
   `area` varchar(255) NOT NULL default '',
   `postcode` text(255) NOT NULL default '',
   `rate` int(11) NOT NULL default '0',
   PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
$installer->endSetup();

?>