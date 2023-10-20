<?php
namespace Brainvire\Logs\Model\ResourceModel\Logfile;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(\Brainvire\Logs\Model\Logfile::class, \Brainvire\Logs\Model\ResourceModel\Logfile::class);
    }
}
