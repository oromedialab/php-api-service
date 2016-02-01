PHP API Serives Library
=============


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
if($sms->send()) {
	echo $sms->getMessageSid();
} else {
	echo 'message not sent';
}
```
