<?php
/**
* @package  AD/FeedbackSurveyModule
* @version  1.0.0
* @author  Kangana
* @copyright Copyright © 2024. All Rights Reserved.
*/

namespace AD\FeedbackSurveyModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
* CustomerFeedbackSurvey ResourceModel class
*/
class CustomerFeedbackSurvey extends AbstractDb
{
  /**
  * Constructor
  */
  protected function _construct()
  {
    $this->_init('customer_feedback_survey', 'id');
  }
}