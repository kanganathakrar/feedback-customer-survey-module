<?php
/**
* @package  AD/FeedbackSurveyModule
* @version  1.0.0
* @author  Kangana
* @copyright Copyright © 2024. All Rights Reserved.
*/

namespace AD\FeedbackSurveyModule\Controller\Adminhtml\Customer;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
* Survey controller class
*/
class Survey extends Action
{
  /**
  * @var resultPageFactory
  */
  protected $resultPageFactory;

  /**
  * Construct function
  *
  * @param \Magento\Backend\App\Action\Context $context
  * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
  */
  public function __construct(
   Context $context,
   PageFactory $resultPageFactory
  ) {
    parent::__construct($context);
    $this->resultPageFactory = $resultPageFactory;
  }
  
  /**
  * Execute function
  *
  * @return void
  */
  public function execute()
  {
    $resultPage = $this->resultPageFactory->create();
    $resultPage->getConfig()->getTitle()->prepend((__('Feedback : Customer Survey')));

    return $resultPage;
  }
}