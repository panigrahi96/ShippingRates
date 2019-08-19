<?php
$installer = $this;
$installer->startSetup();
$installer->run("
   DROP TABLE IF EXISTS {$this->getTable('categoryrate')};
   CREATE TABLE {$this->getTable('categoryrate')} (
   `id` int(11) unsigned NOT NULL auto_increment,
   `project_type_id` int(11) NOT NULL default '0',
   `rate` int(11) NOT NULL default '0',
   PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
$installer->endSetup();

?>