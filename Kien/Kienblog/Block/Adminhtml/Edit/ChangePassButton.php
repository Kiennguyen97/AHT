<?php

namespace Kien\Kienblog\Block\Adminhtml\Edit;

use Magento\Customer\Block\Adminhtml\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ChangePassButton extends GenericButton implements ButtonProviderInterface {

    protected $_customerRepository;

    /**
     * @var AccountManagementInterface
     */
    protected $customerAccountManagement;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param AccountManagementInterface $customerAccountManagement
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context               $context,
        \Magento\Framework\Registry                         $registry,
        \Magento\Customer\Api\AccountManagementInterface    $customerAccountManagement,
        \Magento\Customer\Api\CustomerRepositoryInterface   $customerRepository
    ) {
        parent::__construct($context, $registry);
        $this->customerAccountManagement    = $customerAccountManagement;
        $this->_customerRepository          = $customerRepository;
    }

    public function getButtonData()
    {
        $customerId = $this->getCustomerId();

        // get customer
        $customer = $this->_customerRepository->getById($customerId);

        // confirm message
        $message = __('Are you sure you want to do this?');

        if ($customer->getConfirmation())
        {
            return [
                'label' => __('Custom Button'),
                'on_click' => "confirmSetLocation('{$message}', '{$this->getCustomUrl()}')",
                //'on_click' => "alert('Hello')",
                'sort_order' => 100
            ];
        }

        return [
            'label' => __('Custom Button'),
            // 'on_click' => "confirmSetLocation('{$message}', '{$this->getCustomUrl()}')",
            'on_click' => "alert('Hello')",
            'sort_order' => 100
        ];
    }

    /**
     * URL getter
     *
     * @return string
     */
    public function getCustomUrl()
    {
        return $this->getUrl('custom/index/custom', ['customer_id' => $this->getCustomerId()]);
    }
}