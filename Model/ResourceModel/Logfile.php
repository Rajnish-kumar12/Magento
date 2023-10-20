<?php

namespace Brainvire\Logs\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Logfile extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('log_table', 'logid');
    }
}
