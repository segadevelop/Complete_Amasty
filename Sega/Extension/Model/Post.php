<?php

namespace Sega\Extension\Model;

use \Magento\Framework\Model\AbstractModel,
    \Magento\Framework\DataObject\IdentityInterface;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Sega\Extension\Model\ResourceModel\Post');
    }
}

