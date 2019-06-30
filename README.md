# Belvini project
### This module is made for magento 2.x
### module-default-attribute
## Installation

composer require OetkerDigital/belvini-magento2-module-default-attribute
bin/magento module:enable Belvini_ProductAttributes
bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f

### Unit Test

