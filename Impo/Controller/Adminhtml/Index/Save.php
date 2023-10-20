<?php

namespace Training\Impo\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Catalog\Model\ProductFactory;//save
use Magento\Catalog\Api\Data\ProductInterface;//save

class Save extends \Magento\Backend\App\Action
{
    protected $fileFactory;
    protected $filesystem;
    protected function parseXmlData($xmlData) {
        $productData = [];
        foreach ($xmlData->item as $item) {
            $product = [
                'name' => (string)$item->name,
                'sku' => (string)$item->sku,
                'price' => (float)$item->price
            ];
            $productData[] = $product;
        }
        return $productData;
    }
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Framework\Filesystem $filesystem,
        ProductFactory $productFactory//save
    ) {
        $this->fileFactory = $fileFactory;
        $this->filesystem = $filesystem;
        $this->productFactory = $productFactory;//save
        parent::__construct($context);
    }
    protected function saveProducts($productData)//save
    {
        foreach ($productData as $data) {
            $product = $this->productFactory->create();
            $product->setData(ProductInterface::SKU, $data['sku']);
            $product->setData(ProductInterface::NAME, $data['name']);
            $product->setData(ProductInterface::PRICE, $data['price']);
            $product->save();
        }
    }//save
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $selectedXml = $this->getRequest()->getParam('import_xml');

        if ($selectedXml) {
            $mediaPath = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath();
            $xmlFilePath = $mediaPath . 'import/' . $selectedXml;

            if (file_exists($xmlFilePath) && pathinfo($xmlFilePath, PATHINFO_EXTENSION) === 'xml') {
                $xmlData = simplexml_load_file($xmlFilePath);
                $productData = $this->parseXmlData($xmlData);
                $this->saveProducts($productData);
                $this->_redirect($this->_redirect->getRefererUrl());
                $this->messageManager->addSuccessMessage(__('XML file uploaded and data imported successfully.'));
            } else {
                $this->messageManager->addErrorMessage(__('Invalid file format or file not found.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('Please select an XML file.'));
        }
    }

}
