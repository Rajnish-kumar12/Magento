<?php

namespace Brainvire\Logs\Model;

use Magento\Framework\Model\AbstractModel;

class Logfile extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Brainvire\Logs\Model\ResourceModel\Logfile');
    }
}
