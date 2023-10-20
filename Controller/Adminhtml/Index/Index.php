<?php
namespace Brainvire\Logs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;

class Index extends Action
{
   
    protected $resultPageFactory;

    protected $scopeConfig;

    protected $messageManager;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        MessageManagerInterface $messageManager
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->scopeConfig = $scopeConfig;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        $enableDisable = $this->scopeConfig->getValue('config_section/general/enable_disable');
        if ($enableDisable) {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->prepend(__('Logs details'));

            return $resultPage;
        } else {
            $message = "Please enable functionality from store configuration";
            $this->messageManager->addError($message);
            $this->_redirect('admin/dashboard/index');
        }
    }
}
