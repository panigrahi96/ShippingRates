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
         Mage::log('My model shipping rates entry', null, 'ajax.log'); // //Static text
     	return 1;
           
     }

      
}