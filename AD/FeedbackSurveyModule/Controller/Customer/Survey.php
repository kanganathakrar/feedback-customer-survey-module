<?php
/**
* @package  AD/FeedbackSurveyModule
* @version  1.0.0
* @author  Kangana
* @copyright Copyright © 2024. All Rights Reserved.
*/

namespace AD\FeedbackSurveyModule\Controller\Customer;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
* Survey controller class
*/
class Survey extends Action
{
 /**
  * Undocumented variable
  *
  * @var pageFactory
  */
  protected $pageFactory;

  /**
  * Construct function
  *
  * @param Context $context
  * @param PageFactory $pageFactory
  */
  public function __construct(
   Context $context,
   PageFactory $pageFactory
  ) {
    $this->pageFactory = $pageFactory;
    return parent::__construct($context);
  }

 /**
  * Execute function
  *
  * @return void
  */
  public function execute()
  {
    return $this->pageFactory->create();
  }
}