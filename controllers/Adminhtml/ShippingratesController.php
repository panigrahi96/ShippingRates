<?php
class Codilar_ShippingRates_Adminhtml_ShippingratesController extends Mage_Adminhtml_Controller_Action
{
  
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('shippingrates/categoryrate');
    }

    protected function _initAction() {
        $this->loadLayout()
        ->_setActiveMenu('shippingrates/categoryrate')
        ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items categoryrate'), Mage::helper('adminhtml')->__('Item categoryrate'));
        return $this;
    }
    public function indexAction() {
        $this->_initAction()
        ->renderLayout();
    }
    public function editAction() {
        $id     = $this->getRequest()->getParam('id');
        $model  = Mage::getModel('shippingrates/categoryrate')->load($id);
        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }
            Mage::register('categoryrate_data', $model);
            $this->loadLayout();
            $this->_setActiveMenu('shippingrates/categoryrate');
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item categoryrate'), Mage::helper('adminhtml')->__('Item categoryrate'));
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()->createBlock('shippingrates/adminhtml_shippingrates_edit'))
            ->_addLeft($this->getLayout()->createBlock('shippingrates/adminhtml_shippingrates_edit_tabs'));
            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('shippingrates')->__('Item does not exist'));
            $this->_redirect('*/*/');
        }
    }
    public function newAction() {
        $this->_forward('edit');
    }
}