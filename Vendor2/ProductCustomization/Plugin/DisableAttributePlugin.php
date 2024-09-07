<?php

namespace Vendor2\ProductCustomization\Plugin;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\CatalogSearch\Model\Layer\Filter\Attribute as AttributeFilter;
use Psr\Log\LoggerInterface;

class DisableAttributePlugin
{
    protected $scopeConfig;
    protected $logger;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        LoggerInterface $logger
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->logger = $logger;
    }

    public function afterGetFilters($subject, $result)
    {

        $this->logger->info('Layered Navigation Plugin Called');

        $categoryId = $subject->getLayer()->getCurrentCategory()->getId();
        $selectedCategory = trim($this->scopeConfig->getValue(
            'general/product_attributes/category_dropdown',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ));
        $disabledAttribute = trim($this->scopeConfig->getValue(
            'general/product_attributes/dropdown_attribute',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ));

        $this->logger->info('Category ID: ' . $categoryId);
        $this->logger->info('Selected Category from Config: ' . $selectedCategory);
        $this->logger->info('Disabled Attribute from Config: ' . $disabledAttribute);

        if ($categoryId == $selectedCategory && $disabledAttribute) {
            foreach ($result as $key => $filter) {
                $this->logger->info('Filter Type: ' . get_class($filter));
                if ($filter instanceof AttributeFilter) {
                    $attributeCode = trim($filter->getAttributeModel()->getAttributeCode());
                    $this->logger->info('Filter Attribute Code: ' . $attributeCode);

                    if ($attributeCode == $disabledAttribute) {
                        $this->logger->info('Removing Filter for Attribute: ' . $disabledAttribute);
                        unset($result[$key]);
                    }
                }
            }
        }

        return $result;
    }
}
