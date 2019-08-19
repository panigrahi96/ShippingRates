<?php
class Codilar_ShippingRates_Model_Resource_Shippingrates_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
      protected function _construct()
      {
      	//Mage::log('collection shipping rates entry', null, 'model.log'); // Static text
         parent::_construct();
        $this->_init('shippingsrates/categoryrate');
      }
}