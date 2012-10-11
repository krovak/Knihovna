<?php
class Book_HelloworldPetr_Block_HelloworldPetr extends Mage_Core_Block_Template
{
    public function _prepareLayout()
{
    return parent::_prepareLayout();
}
    public function getHelloworld()
{
    return 'Hello world';
}
}