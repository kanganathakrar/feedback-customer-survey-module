<?php
/**
* @package  AD/FeedbackSurveyModule
* @version  1.0.0
* @author  Kangana
* @copyright Copyright © 2024. All Rights Reserved.
*/

namespace AD\FeedbackSurveyModule\Model;

use Magento\Framework\Model\AbstractModel;

/**
* CustomerFeedbackSurvey model class
*/
class CustomerFeedbackSurvey extends AbstractModel
{
  /**
  * Constructor
  */
  protected function _construct()
  {
    $this->_init(\AD\FeedbackSurveyModule\Model\ResourceModel\CustomerFeedbackSurvey::class);
  }
}