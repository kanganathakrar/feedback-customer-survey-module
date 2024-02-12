<?php
/**
* @package  AD/FeedbackSurveyModule
* @version  1.0.0
* @author  Kangana
* @copyright Copyright © 2024. All Rights Reserved.
*/

namespace AD\FeedbackSurveyModule\Model\ResourceModel\CustomerFeedbackSurvey;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
* Customer Feedback Collection class
*/
class Collection extends AbstractCollection
{
  /**
  * Constructor
  */
  protected function _construct()
  {
    $this->_init(
      \AD\FeedbackSurveyModule\Model\CustomerFeedbackSurvey::class,
      \AD\FeedbackSurveyModule\Model\ResourceModel\CustomerFeedbackSurvey::class
    );
  }
}