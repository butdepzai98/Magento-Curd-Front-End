<?php
namespace Vinh\Curd\Block;

use Magento\Framework\View\Element\Template;

class HelloWorld extends Template
{
    public function getHelloWorldTxt()
    {
        return 'Hello world!';
    }
}
