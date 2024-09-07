<?php

namespace Vendor1\GridComponent\Model;

class Post extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Vendor1\GridComponent\Model\ResourceModel\Post');
	}
}
