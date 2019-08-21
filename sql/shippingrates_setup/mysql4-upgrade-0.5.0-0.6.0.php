<?php
$installer = $this;
$installer->startSetup();
$installer->run("
	ALTER TABLE {$this->getTable('shippingzonerates')}
	DROP COLUMN `product_type_rate`,
	DROP COLUMN `product_type`;
	");
$installer->endSetup();