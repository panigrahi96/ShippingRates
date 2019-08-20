<?php
class Codilar_ShippingRates_Block_Adminhtml_Shippingrates_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
    {
        parent::__construct();
         
        $this->setDefaultSort('id');
        $this->setId('shippingrates_shippingrates_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }
    protected function _prepareCollection()
    {
       
        $collection = Mage::getResourceModel('shippingrates/categoryrate_collection');
       
        $this->setCollection ($collection);
        return parent::_prepareCollection();
    }
     protected function _prepareColumns()
    {
        $this->addColumn('id',
            array(
                'header'=> Mage::helper('shippingrates')->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'id',
            )
        );
         $this->addColumn('project_type_id',
            array(
                'header'=> Mage::helper('shippingrates')->__('Project_type_id'),
                'index' => 'project_type_id',
            )
        );
        $this->addColumn('rate',
            array(
                'header'=> Mage::helper('shippingrates')->__('Rate'),
                'index' => 'rate',
            )
        ); 

          return parent::_prepareColumns();

    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id'=>$row->getId()));
    }

}