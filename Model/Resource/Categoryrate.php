<?php
class Codilar_ShippingRates_Model_Resource_Categoryrate extends Mage_Core_Model_Resource_Db_Abstract
{
   public function _construct()
   {
   	     //Mage::log('inside resouce shipping rates entry', null, 'model.log'); // Static text
        $this->_init('shippingrates/categoryrate', 'id');
   }
}