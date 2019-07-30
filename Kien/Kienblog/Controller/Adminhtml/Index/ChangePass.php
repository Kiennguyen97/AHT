<?php
namespace Kien\Kienblog\Controller\Adminhtml\Index;

class ChangePass extends \Magento\Backend\App\Action
{

//    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $_registry;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->_registry = $registry;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $cus_id = $this->getRequest()->getParam('id');
        $this->_registry->register('id',$cus_id);
        return $this->resultPageFactory->create();
    }
}
