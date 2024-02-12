<?php
/**
* @package  AD/FeedbackSurveyModule
* @version  1.0.0
* @author  Kangana
* @copyright Copyright © 2024. All Rights Reserved.
*/

namespace AD\FeedbackSurveyModule\Controller\Customer;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use AD\FeedbackSurveyModule\Model\CustomerFeedbackSurveyFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface as MessageManager;
use \Magento\Framework\App\Request\Http;

/**
* Form Submit class
*/
class Submit extends Action
{
  /**
  * @var pageFactory
  */
  protected $pageFactory;

  /**
  * @var customerFeedbackSurveyFactory
  */
  protected $customerFeedbackSurveyFactory;

  /**
  * @var resultFactory
  */
  protected $resultFactory;

  /**
  * @var messageManager
  */
  protected $messageManager;

  /**
  * @var request
  */
  private $request;

  /**
  * Construct function
  *
  * @param Context $context
  * @param PageFactory $pageFactory
  * @param CustomerFeedbackSurveyFactory $customerFeedbackSurveyFactory
  * @param MessageManager $messageManager
  * @param Http $request
  */
  public function __construct(
   Context $context,
   PageFactory $pageFactory,
   CustomerFeedbackSurveyFactory $customerFeedbackSurveyFactory,
   MessageManager $messageManager,
   Http $request
  ) {
    $this->pageFactory = $pageFactory;
    $this->customerFeedbackSurveyFactory = $customerFeedbackSurveyFactory;
    $this->messageManager = $messageManager;
    $this->request = $request;
    return parent::__construct($context);
  }

  /**
  * Execute function
  *
  * @return void
  */
  public function execute()
  {
    try {
      $data = $this->request->getPost();
      if ($data) {
        $FeedbackData = $this->customerFeedbackSurveyFactory->create();
        $FeedbackData->setName($data['name']);
        $FeedbackData->setFeedback($data['feedback']);
        $FeedbackData->save();
        $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
      }
    } catch (\Exception $e) {
      $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
    }
    $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
    $resultRedirect->setUrl($this->_redirect->getRefererUrl());
    return $resultRedirect;
  }
}