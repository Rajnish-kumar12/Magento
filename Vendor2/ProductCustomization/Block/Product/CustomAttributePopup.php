<?php

namespace Vendor2\ProductCustomization\Block\Product;

use Magento\Catalog\Model\Product;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;

class CustomAttributePopup extends Template
{
    /**
     * @var Registry
     */
    protected $_registry;

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Registry $registry,   // Inject the Registry object
        array $data = []
    ) {
        $this->_registry = $registry;  // Assign registry to class property
        parent::__construct($context, $data);
    }

    /**
     * Get the custom WYSIWYG attribute content
     *
     * @return string|null
     */
    public function getCustomWysiwygAttributeContent()
    {
        $product = $this->getProduct();
        return $product->getData('custom_wysiwyg_attribute');
    }

    /**
     * Get current product
     *
     * @return \Magento\Catalog\Model\Product
     */
    public function getProduct()
    {
        return $this->_registry->registry('product');
    }
}
