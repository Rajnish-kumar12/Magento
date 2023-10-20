<?php

namespace Brainvire\Logs\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Filesystem\Io\File;
use Brainvire\Logs\Model\LogfileFactory;
use Psr\Log\LoggerInterface;

class Add extends Action
{
    protected $file;
    protected $logfileFactory;
    protected $logger;

    public function __construct(
        Context $context,
        File $file,
        LogfileFactory $logfileFactory,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->file = $file;
        $this->logfileFactory = $logfileFactory;
        $this->logger = $logger;
    }

    public function execute()
    {
        $directoryPath = BP . '/var/log/';

        try {
            $files = scandir($directoryPath);
            foreach ($files as $file) {
                if ($file != '.' && $file != '..' && is_file($directoryPath . $file)) {
                    $this->saveFileNameToCustomTable($file);
                }
            }
            $this->messageManager->addSuccessMessage(('Successfully Updated the Logs.'));
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $this->messageManager->addErrorMessage(('An error occurred during file import.'));
        }

        $this->_redirect('*/*/');
    }

    protected function saveFileNameToCustomTable($fileName)
    {
        try {
            $logfileModel = $this->logfileFactory->create();
            $existingLogFile = $logfileModel->load($fileName, 'name');
            
            // Get the last modified time of the file
            $lastModifiedTime = filemtime(BP . '/var/log/' . $fileName);
    
            if (!$existingLogFile->getId()) {
                // The record doesn't exist, so create a new one.
                $logfileModel->setName($fileName);
                $logfileModel->setUpdatedAt(date('Y-m-d H:i:s', $lastModifiedTime));
                $logfileModel->save();
                $this->logger->info('New file name saved to custom table: ' . $fileName);
            } else {
                // The record already exists, update the "updated_at" timestamp.
                $existingLogFile->setUpdatedAt(date('Y-m-d H:i:s', $lastModifiedTime));
                $existingLogFile->save();
                $this->logger->info('File name updated in custom table: ' . $fileName);
            }
        } catch (\Exception $e) {
            $this->logger->error('Error saving/updating file name: ' . $e->getMessage());
        }
    }
    
}
