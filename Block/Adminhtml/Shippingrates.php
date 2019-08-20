<?php
class Codilar_ShippingRates_Block_Adminhtml_shippingrates extends Mage_Adminhtml_Block_Widget_Grid_Container {
    public function __construct()
    {

    	
        $this->_controller = 'adminhtml_shippingrates';
        $this->_blockGroup = 'shippingrates';
        $this->_headerText = Mage::helper('shippingrates')->__('Grid');
        $this->_addButtonLabel = Mage::helper('shippingrates')->__('Add New');
        parent::__construct();
    }
}
?>