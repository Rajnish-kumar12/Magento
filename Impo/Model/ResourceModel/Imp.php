<?php 

namespace Training\Impo\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Imp extends AbstractDb
{
	protected function _construct()
	{
		$this->_init('custom','entity_id');
	}
}