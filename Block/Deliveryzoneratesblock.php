<?php
class Codilar_ShippingRates_Block_Deliveryzoneratesblock extends Mage_core_block_template
{
	public function zoneRate()
	{
		$quote=Mage::getSingleton('adminhtml/session_quote')->getQuote();
        $quote->save(); 

        $address = $quote->getShippingAddress();
        $price=$address->setShippingAmount+30;

        $address->setShippingAmount($price);
        $address->setBaseShippingAmount($price);
        $address->setGrandTotal($address->getGrandTotal() + $price);
        $rates = $address->collectShippingRates()->getGroupedAllShippingRates();

        foreach ($rates as $carrier) {
          foreach ($carrier as $rate) {
           $rate->setPrice($price);
           $rate->save();      
          }
        }
        $address->setCollectShippingRates(false);
        $address->save();

	}
}