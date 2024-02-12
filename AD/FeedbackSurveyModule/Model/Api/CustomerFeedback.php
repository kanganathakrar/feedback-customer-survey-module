<?php
/**
* @package  AD/FeedbackSurveyModule
* @version  1.0.0
* @author  Kangana
* @copyright Copyright © 2024. All Rights Reserved.
*/

namespace AD\FeedbackSurveyModule\Model\Api;

use AD\FeedbackSurveyModule\Api\CustomerFeedbackInterface;
use Psr\Log\LoggerInterface;
use AD\FeedbackSurveyModule\Model\CustomerFeedbackSurveyFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
* CustomerFeedback Api class
*/
class CustomerFeedback implements CustomerFeedbackInterface
{
  /**
  * @var logger
  */
  protected $logger;

  /**
  * @var customerFeedbackSurveyFactory
  */
  protected $customerFeedbackSurveyFactory;

  /**
  * @var ScopeConfigInterface
  */
  protected $scopeConfig;

  /**
  * Construct function
  *
  * @param LoggerInterface $logger
  * @param CustomerFeedbackSurveyFactory $customerFeedbackSurveyFactory
  * @param ScopeConfigInterface $scopeConfig
  */
  public function __construct(
   LoggerInterface $logger,
   CustomerFeedbackSurveyFactory $customerFeedbackSurveyFactory,
   ScopeConfigInterface $scopeConfig
  ) {
    $this->logger = $logger;
    $this->customerFeedbackSurveyFactory = $customerFeedbackSurveyFactory;
    $this->scopeConfig = $scopeConfig;
  }
 
  /**
  * @inheritdoc
  */
  public function getData()
  {
    $response = ['success' => false];
    try {
      $isEnabled = $this->scopeConfig->isSetFlag(
       'feedback/customersurvey/enable',
       ScopeInterface::SCOPE_STORE
      );
      if ($isEnabled) {
        $data = $this->customerFeedbackSurveyFactory->create()->getCollection()->getData();
        if (empty($data)) {
          $data = "Customer feedback data is not available";
        }
        $response = ['success' => true, 'message' => $data];
      } else {
        $response = ['success' => false, 'message' => 'Permission Denide'];
      }
    } catch (\Exception $e) {
      $response = ['success' => false, 'message' => $e->getMessage()];
      $this->logger->info($e->getMessage());
    }
    $returnArray = json_encode($response);
    return $returnArray;
  }
}