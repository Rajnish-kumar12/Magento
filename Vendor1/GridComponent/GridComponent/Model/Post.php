<?php
namespace Brainvire\GridComponent\Model;
class Post extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Brainvire\GridComponent\Model\ResourceModel\Post');
	}
}