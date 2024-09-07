<?php

namespace Vendor2\ProductCustomization\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class AddCustomWysiwygAttribute implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * Apply patch
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            'custom_wysiwyg_attribute',
            [
                'type' => 'text',
                'label' => 'Custom WYSIWYG Attribute',
                'input' => 'textarea',
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'wysiwyg_enabled' => true,
                'required' => false,
                'visible_on_front' => false,
                'is_html_allowed_on_front' => true,
                'sort_order' => 100,
                'group' => 'Content', // Adds to the Content tab
            ]
        );

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function revert()
    {
        // Optional: code to remove the attribute if the patch is reverted.
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
