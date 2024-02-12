# Module AD FeedbackSurveyModule

  Customer Survey Feedback Functionality.

## Installation/setup guide

  - Enable the module by running
  > php bin/magento module:enable AD_FeedbackSurveyModule
  - Apply database updates by running
  > php bin/magento setup:upgrade command
  - Run command for the compilation
  > php bin/magento setup:di:compile
  - Generate static content for Admin html by running
  > php bin/magento setup:static-content:deploy -f
  - Flush the cache by running
  > php bin/magento cache:flush

## Configuration

  - Store Configuration: Setup following store configuration under the Stores > Configuration > Feedback > Customer Survey
    - Enable
      - If this config set to Yes, module will be enable
      - If this config set to No , module will be disable
 
## List of functionality

  1. Admin Functionality
  - Created page in 'Feedback > Customer Survey' menu which allows us to view all the customer survey details in grid.

  2. Frontend Functionality
  - Page is developed for submitting customer survey feedback on route(/feedback/customer/survey).

## Purpose of Module files

```
.
├── .
├── Api
│   └── * CustomerFeedbackInterface.php (Define the interface for rest api)
├── * Block
│   └── * CustomerSurveyForm.php (Define the customer Survey form action block)
├── * Controller
│   ├── * Adminhtml
│   │   └── * Customer
│   │       └── * Survey.php (Define admin customer survey grid controller)
│   └── * Customer
│       ├── * Submit.php (Define frontend customer survey form submit and save data controller)
│       └── * Survey.php (Define frontend customer survey form controller)
├── * etc
│   ├── * adminhtml
│   │   ├── * menu.xml (Define the 'Feedback' menu)
│   │   ├── * routes.xml (Define the admin route for admin custom page loading)
│   │   └── * system.xml (Define configuration for module enable/disable)
│   ├── * frontend
│   │   └── * routes.xml (Define the admin route for frontend custom page loading)
│   ├── * config.xml (Define default value of configuration)
│   ├── * db_schema_whitelist.json (Generated by 'php bin/magento setup:db-declaration:generate-whitelist'command this file, this file define history of all custom tables, columns, and keys added with the declarative schema)
│   ├── * db_schema.xml (Declarative schema file for define 'customer_feedback_survey' custom table)
│   ├── * di.xml (Define dependancy injection for ui grid and custom rest api)
│   ├── * module.xml (Define custom module)
│   └── * webapi.xml (Define custom rest api)
├── * Model
│   ├── * Api
│   │   └── * CustomerFeedback.php (Define to get all customer feedback data in rest api action)
│   ├── * ResourceModel
│   │   ├── * CustomerFeedbackSurvey
│   │   │   └── * Collection.php (Collections are used when we want to fetch multiple rows from our table. Meaning collections are a group of models)
│   │   └── * CustomerFeedbackSurvey.php (All actual database operations are executed by the resource model. Every model must have a resource model, since all of the methods of a resource model expects a model as its first parameter)
│   └── * CustomerFeedbackSurvey.php (Define one method, _construct(), when we call the _init()method, and pass the resource model’s name as its parameter)
├── * view
│   ├── * adminhtml
│   │   ├── * layout
│   │   │   └── * feedback_customer_survey.xml (Define the containers, and uiComponent for admin grid)
│   │   └── * ui_component
│   │       └── * customer_feedback_listing.xml (Define column, filters, pagination for admin grid)
│   └── * frontend
│       ├── * layout
│       │   └── * feedback_customer_survey.xml (Define the containers, block and template file for frontend form)
│       └── * templates
│           └── * customersurveyform.phtml (Define customer feedback form in frontend custom page)
├── * composer.json (Define composer for dependency manager to maintain and upgrade the Magento components)
├── * README.md (Markdown file of the module)
└── * registration.php (Define registration.php file is a kind of the entry point of custom module)
```