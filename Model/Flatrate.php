<?php
class Codilar_ShippingRates_Model_Flatrate
   extends Mage_Shipping_Model_Carrier_Abstract
   implements Mage_Shipping_Model_Carrier_Interface
   {

   protected $_code = 'flatrate';
   

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        $var1= Mage::getSingleton('core/session')->getPincode();
        // echo $var1;
        // die;
        if (!$this->getConfigFlag('active')) 
        {
            return false;
        }

        $freeBoxes = 0;
        $quote = Mage::getSingleton('checkout/session')->getQuote();
        if ($quote->getAllVisibleItems()) 
        {

            foreach ($quote->getAllVisibleItems() as $item) 
            {
                if ($item->getFreeShipping() && !$item->getProduct()->getTypeInstance()->isVirtual()) 
                {
                    $freeBoxes+=$item->getQty();
                }
            }
        }
        $this->setFreeBoxes($freeBoxes);
        $result = Mage::getModel('shipping/rate_result');
        if ($this->getConfigData('type') == 'O') 
        { // per order
            $shippingPrice = $this->getConfigData('price');
        } 
        elseif ($this->getConfigData('type') == 'I') 
        {  //per item
            $shippingPrice = '0.00';
            foreach ($quote->getAllVisibleItems() as $item) 
            {
                if (!$item->getFreeShipping()) 
                {
                  $productList = Mage::getModel('shippingrates/shippingzonerates')->getCollection();
                  $productdata = $productList->addFieldToSelect('*')->addFieldToFilter('postcode',$var1)->getData();
                 foreach($productdata as $product) 
                 {
                    $quantity = $item->getQty();
                    // if ($product->getRate()) {
                    $product1 = $product['rate']; 
                    $shippingPrice+=$product1 * $quantity;

                   //  } else {
                    //     $shippingPrice+=$this->getConfigData('price') * $quantity;

                    // }
                }
            }

        }
    }
     else {
        $shippingPrice = false;
    }

    $shippingPrice = $this->getFinalPriceWithHandlingFee($shippingPrice);

    if ($shippingPrice !== false) {
        $method = Mage::getModel('shipping/rate_result_method');

        $method->setCarrier('flatrate');
        $method->setCarrierTitle($this->getConfigData('title'));

        $method->setMethod('flatrate');
        $method->setMethodTitle($this->getConfigData('name'));

        if ($request->getFreeShipping() === true || $request->getPackageQty() == $this->getFreeBoxes()) {
            $shippingPrice = '0.00';
        }


        $method->setPrice($shippingPrice);
        $method->setCost($shippingPrice);

        $result->append($method);
    }

    return $result;
}

public function getAllowedMethods()
{
    return array('flatrate'=>$this->getConfigData('name'));
}

}