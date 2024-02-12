<?php
/**
* @package  AD/FeedbackSurveyModule
* @version  1.0.0
* @author  Kangana
* @copyright Copyright © 2024. All Rights Reserved.
*/

namespace AD\FeedbackSurveyModule\Block;

use Magento\Framework\View\Element\Template;

/**
* CustomerSurveyForm submit class
*/
class CustomerSurveyForm extends Template
{
  /**
  * GetFormAction function
  *
  * @return void
  */
  public function getFormAction()
  {
    return $this->getUrl('feedback/customer/submit', ['_secure' => true]);
  }
}