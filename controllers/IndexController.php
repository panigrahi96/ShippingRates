<?php

class Codilar_ShippingRates_IndexController extends Mage_Core_Controller_Front_Action
{
     public function indexAction()
     {
         
     	//echo 'This is a test';
     	$this->loadLayout();
     	$this->renderLayout();

     }
 public function getpriceAction()
     {
         Mage::log('My model shipping rates entry', null, 'ajax.log'); 
         $pin = $this->getRequest()->getParam('pincode');
         Mage::getSingleton('core/session')->setPincode($pin);
         Mage::log('18', null, 'ajax.log'); 
         $producttype1 = $this->getRequest()->getParam('producttype');
         Mage::getSingleton('core/session')->setProducttype($producttype1);
      
     }

      

}