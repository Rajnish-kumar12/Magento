<?php

namespace VendorGiftCard\GiftCard\Block;

use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Model\Product;

class PreviewButton extends AbstractProduct
{

    public function getProductImageUrl()
    {
        $product = $this->getProduct();
        if ($product instanceof Product) {
            $mediaUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
            return $mediaUrl . 'catalog/product' . $product->getImage();
        }
        return null;
    }
}
