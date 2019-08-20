<?php

class Codilar_ShippingRates_IndexController extends Mage_Core_Controller_Front_Action
{
     public function indexAction()
     {
         
     	//echo 'This is a test';
     	$this->loadLayout();
     	$this->renderLayout();

     }

     public function getRatesAction()
     {
         
     	$pin = $this->getRequest()->getParam('pincode');
     	//echo $pin;
     	$pincodeCollection = Mage::getModel('shippingrates/shippingzonerates')->getCollection();
     	$getshippingprice = $pincodeCollection->addFieldToSelect('rate')->addFieldToFilter('postcode',$pin)->getData();
     	return $getshippingprice ;
     }
      
}