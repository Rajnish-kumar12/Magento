<?php

namespace Training\Impo\Model;

use Magento\Framework\Model\AbstractModel;
use Training\Impo\Model\ResourceModel\Imp as ResourceModel;

class Imp extends AbstractModel
{
	protected function _construct()
	{
		$this->_init(ResourceModel::class);
	}
}

?>