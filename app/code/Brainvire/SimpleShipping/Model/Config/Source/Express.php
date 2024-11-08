<?php

namespace Brainvire\SimpleShipping\Model\Config\Source;

/**
 * @api
 * @since 100.0.2
 */
class Express implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('None')],
            ['value' => 'O', 'label' => __('Per Order')],
            ['value' => 'I', 'label' => __('Per Item')]
        ];
    }
}
