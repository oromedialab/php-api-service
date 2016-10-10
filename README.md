PHP API Services Library
=============

API Services
* [Twilio](https://github.com/oromedialab/php-api-service#twilio)
* [Messente](https://github.com/oromedialab/php-api-service#messente)

Installation
------------

#### Install using composer
```
composer require oromedialab/php-api-service dev-master
```

#### Install using GIT clone
```
git clone git@github.com:oromedialab/php-api-service.git
```


Twilio 
------
URL : (http://twilio.com/)

#### Compose SMS
```php
use Oml\PHPAPIService\Twilio\SMS;

$accountSid = 'xxxxxxxxxxx';
$authToken = 'xxxxxxxxxxx';

$sms = new SMS\Compose($accountSid, $authToken);
$sms->setFrom('xxx-xxx-xxx');
$sms->setTo('xxx-xxx-xxx');
$sms->setMessage('Lorem ipsum dolor sit amet, consectetur adipisicing elit.');
$response = $sms->send();

// Get message status
$status = $response->status;
// Get message SID
$messageSid = $response->sid;
```

Messente 
------
URL : (http://messente.com/)

#### Compose SMS
```php
use Oml\PHPAPIService\Messente\SMS;
```
