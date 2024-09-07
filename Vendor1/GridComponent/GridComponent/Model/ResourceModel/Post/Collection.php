<?php
namespace Brainvire\GridComponent\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Brainvire\GridComponent\Model\Post', 'Brainvire\GridComponent\Model\ResourceModel\Post');
	}

}