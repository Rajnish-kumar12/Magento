<?php
namespace Training\Impo\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;

class Index extends Action
{
	protected $resultPageFactory;
	
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	) {
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}
	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		
		return $resultPage;
	}
}
?>

