<?php

namespace AHT\AddPassword\Controller\Adminhtml\Customer;

class Index extends \AHT\AddPassword\Controller\Adminhtml\Customer
{

    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Customer'));
        $this->_view->renderLayout();
    }

}