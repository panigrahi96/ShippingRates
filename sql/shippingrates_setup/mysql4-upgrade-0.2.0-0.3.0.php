<?php
$installer = $this;
$installer->startSetup();
$installer->run("
	ALTER TABLE {$this->getTable('categoryrate')}
	CHANGE COLUMN `project_type_id` `project_type_id` int NULL,
	ADD COLUMN `product_type` VARCHAR(45) NOT NULL AFTER `id`;
	");
$installer->endSetup();