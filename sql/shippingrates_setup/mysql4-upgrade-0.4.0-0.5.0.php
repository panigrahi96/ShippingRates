<?php
$installer = $this;
$installer->startSetup();
$installer->run("
	ALTER TABLE {$this->getTable('shippingzonerates')}
	ADD COLUMN `product_type_rate` int NOT NULL;
	");
$installer->endSetup();