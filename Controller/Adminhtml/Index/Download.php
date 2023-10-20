<?php
namespace Brainvire\Logs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;
use Brainvire\Logs\Model\LogfileFactory;

class Download extends Action
{
    protected $fileFactory;
    protected $logFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        LogfileFactory $logFactory
    ) {
        $this->fileFactory = $fileFactory;
        $this->logFactory = $logFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $filePath = '';
        $logId = $this->getRequest()->getParam('log_id');

        if ($logId) {
            $logModel = $this->logFactory->create()->load($logId);

            if ($logModel->getId()) {
                $fileName = $logModel->getName();
                // print_r($fileName);
                // die();
                $filepath = '/log/'.$fileName;
                // print_r($filePath)
                $downloadName = $fileName;
                $content['type'] = 'filename';
                $content['value'] = $filepath;
                $content['rm'] = 0;

                return $this->fileFactory->create($downloadName, $content, DirectoryList::VAR_DIR);
            }
        }

        $this->messageManager->addError(__('Log not found or invalid log ID.'));
        return $this->_redirect('logs/index/grid'); 
    }
}
