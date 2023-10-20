<?php 

namespace Training\Impo\Model\ResourceModel\Imp;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\Impo\Model\Imp as Model;
use Training\Impo\Model\ResourceModel\Imp as ResourceModel;

class Collection extends AbstractCollection
{
	protected function _construct()
	{
		$this->_init(Model::class, ResourceModel::class);
	}


}

?>