<?php
class Codilar_ShippingRates_Model_Flatrate
   extends Mage_Shipping_Model_Carrier_Abstract
   implements Mage_Shipping_Model_Carrier_Interface
   {

   protected $_code = 'flatrate';


    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
    if (!$this->getConfigFlag('active')) {
        return false;
    }

    $freeBoxes = 0;
    if ($request->getAllItems()) {
        foreach ($request->getAllItems() as $item) {
            if ($item->getFreeShipping() && !$item->getProduct()->getTypeInstance()->isVirtual()) {
                $freeBoxes+=$item->getQty();
            }
        }
    }
    $this->setFreeBoxes($freeBoxes);

    $result = Mage::getModel('shipping/rate_result');
    if ($this->getConfigData('type') == 'O') { // per order
        $shippingPrice = $this->getConfigData('price');
    } elseif ($this->getConfigData('type') == 'I') { // per item
        $shippingPrice = '0.00';
        foreach ($request->getAllItems() as $item) {
            if (!$item->getFreeShipping()) {
                //$productId = 700091;//$item->getProduct()->getId();
                $productList = Mage::getModel('shippingrates/shippingzonerates')->getCollection();
                   $productdata = $productList->addFieldToSelect('*')->addFieldToFilter('postcode',700091)->getData();
                   //print_r ($productdata);
                   //die;
                foreach($productdata as $product) {
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
    } else {
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