<?php
namespace Vinh\Curd\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{
    protected $_pageFactory;

	protected $_postFactory;

	protected $_postRepository;

    protected $_coreRegistry;
    
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Vinh\Curd\Model\PostFactory $postFactory,
        \Vinh\Curd\Model\PostRepository $postRepository,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        $this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		$this->_postRepository = $postRepository;
		$this->_coreRegistry = $coreRegistry;

		return parent::__construct($context);
    }

    public function execute()
    {
        $post_id = $this->getRequest()->getParam('post_id');
		$this->_coreRegistry->register('post_id', $post_id);
		return $this->_pageFactory->create();
    }
}