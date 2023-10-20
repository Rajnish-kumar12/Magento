<?php

namespace Training\Impo\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class FileList implements OptionSourceInterface
{
    protected $directoryList;
    protected $attributeOptionsList = [];
    
    public function __construct(
        DirectoryList $directoryList
    ) {
        $this->directoryList = $directoryList;
    }

    public function toOptionArray()
    {
        $options = [];
        $mediaDirectory = $this->directoryList->getPath(DirectoryList::MEDIA);
        $importDirectory = $mediaDirectory . '/import';

        if (is_dir($importDirectory)) {
            $files = scandir($importDirectory);
            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'xml') {
                    $options[] = ['value' => $file, 'label' => $file];
                }
            }
        }
        return $options;
    }
}