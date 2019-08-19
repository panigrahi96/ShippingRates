<?php
class Codilar_ShippingRates_Model_Shippingrates extends Mage_Core_Model_Abstract
{
   public function _construct()
   {
   	   //Mage::log('My model shipping rates entry', null, 'model.log'); // Static text
      parent::_construct();
      $this->_init('shippingrates/categoryrate');
   }
}