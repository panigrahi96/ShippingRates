<?php
class Codilar_ShippingRates_Model_Shippingzonerates extends Mage_Core_Model_Abstract
{
   public function _construct()
   {
   	   //Mage::log('My model shipping zone rates entry', null, 'model.log'); // Static text
      parent::_construct();
      $this->_init('shippingrates/shippingzonerates');
   }
}