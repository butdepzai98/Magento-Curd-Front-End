<?php
namespace Vinh\Curd\Block;

class Create extends \Magento\Framework\View\Element\Template
{
	private $postFactory;
	private $postRepository;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Vinh\Curd\Model\PostFactory $postFactory, \Vinh\Curd\Model\PostRepository $postRepository)
	{
		parent::__construct($context);
		$this->postFactory = $postFactory;
		$this->postRepository = $postRepository;
	}
}