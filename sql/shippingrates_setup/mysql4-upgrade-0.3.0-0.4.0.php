<?php
$installer = $this;
$installer->startSetup();
$installer->run("
	ALTER TABLE {$this->getTable('categoryrate')}
	DROP COLUMN `project_type_id`;
	");
$installer->endSetup();