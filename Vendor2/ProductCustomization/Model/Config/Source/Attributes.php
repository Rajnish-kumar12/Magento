<?php

namespace Vendor2\ProductCustomization\Model\Config\Source;

use Magento\Eav\Model\ResourceModel\Entity\Attribute\CollectionFactory as AttributeCollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

class Attributes implements OptionSourceInterface
{
    protected $attributeCollectionFactory;

    public function __construct(AttributeCollectionFactory $attributeCollectionFactory)
    {
        $this->attributeCollectionFactory = $attributeCollectionFactory;
    }

    public function toOptionArray()
    {
        $attributes = $this->attributeCollectionFactory->create()
            ->setEntityTypeFilter(4)
            ->addFieldToSelect(['attribute_code', 'frontend_label']);

        $options = [];
        foreach ($attributes as $attribute) {
            $options[] = [
                'value' => $attribute->getAttributeCode(),
                'label' => $attribute->getFrontendLabel(),
            ];
        }

        return $options;
    }
}
