<?php
namespace AHT\Blog\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_customerFactory;

	protected $_customerRepository;

	protected $_coreRegistry;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		// \AHT\Blog\Model\PostFactory $postFactory,
        // \AHT\Blog\Model\PostRepository $postRepository,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\PostRepository $customerRepository,
		\Magento\Framework\Registry $coreRegistry
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_customerFactory = $customerFactory;
		$this->_customerRepository = $customerRepository;
		$this->_coreRegistry = $coreRegistry;

		return parent::__construct($context);
	}

	public function execute()
	{
		$cus_id = $this->getRequest()->getParam('cus_id');
		//TODO: có thể làm thế này
		//  $post_id = $_GET['post_id'];
		$this->_coreRegistry->register('cus_id', $cus_id);
		return $this->_pageFactory->create();
	}
}