<?php
namespace AHT\Blog\Block;

class Edit extends \Magento\Framework\View\Element\Template
{
	private $customerFactory;
	private $customerRepository;
	private $_coreRegistry;

    public function __construct(
    \Magento\Framework\View\Element\Template\Context $context, 
    \Magento\Customer\Model\CustomerFactory $customerFactory, 
    \Magento\Customer\Model\CustomerRepository $customerRepository, 
	\Magento\Framework\Registry $coreRegistry)

	{
		parent::__construct($context);
		$this->customerFactory = $customerFactory;
		$this->customerRepository = $customerRepository;
		$this->_coreRegistry = $coreRegistry;
	}

	public function getBlogInfo()
	{
		return __('AHT Blog module');
	}
	public function getCustomer()
	{
        $customer_id = $this->_coreRegistry->registry('customer_id'); // lấy ra từ session do controller Cusedit đã lưu lại
		$customer = $this->customerRepository->getById($customer_id);
		return $customer;
	}
	public function execute()
	{
		return $this->_pageFactory->create();
	}
}