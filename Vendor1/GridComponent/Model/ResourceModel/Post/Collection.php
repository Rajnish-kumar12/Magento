<?php

namespace Vendor1\GridComponent\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Vendor1\GridComponent\Model\Post', 'Vendor1\GridComponent\Model\ResourceModel\Post');
	}
}
