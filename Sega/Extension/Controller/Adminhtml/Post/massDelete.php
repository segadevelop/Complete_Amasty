<?php

namespace Sega\Extension\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context,
    Magento\Ui\Component\MassAction\Filter,
    Magento\Backend\App\Action,
    Magento\Framework\Controller\ResultFactory;

use Sega\Extension\Model\PostFactory;

class MassDelete extends Action
{
    /**
     * @var Filter
     */

    protected $filter;
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    public function __construct(
        Context $context,
        Filter $filter,
        PostFactory $collectionFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $selects = $this->getRequest()->getPost('selected');
        $collection = $this->collectionFactory->create();
        $i = 0;

        foreach ($selects as $select) {
            $collection->load($select);
            $collection->delete();
            $i++;
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $i));
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}
