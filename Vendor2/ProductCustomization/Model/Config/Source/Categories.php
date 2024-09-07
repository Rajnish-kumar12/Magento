<?php

namespace Vendor2\ProductCustomization\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;

class Categories implements ArrayInterface
{
    /**
     * @var CategoryCollectionFactory
     */
    protected $categoryCollectionFactory;

    /**
     * @param CategoryCollectionFactory $categoryCollectionFactory
     */
    public function __construct(CategoryCollectionFactory $categoryCollectionFactory)
    {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
    }

    /**
     * Get category options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        $categories = $this->categoryCollectionFactory->create()
            ->addAttributeToSelect('name')
            ->addIsActiveFilter()
            ->setOrder('name', 'ASC');

        foreach ($categories as $category) {
            $options[] = [
                'value' => $category->getId(),
                'label' => $category->getName(),
            ];
        }

        return $options;
    }
}
