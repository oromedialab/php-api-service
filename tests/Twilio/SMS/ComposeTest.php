<?php

namespace Oml\PHPAPIService\Test\Twilio\SMS;

use Oml\PHPAPIService\Test\BaseTestCase;
use Oml\PHPAPIService\Test\Twilio\SMS\TestPhoneNumber as TwilioTestNumber;
use Oml\PHPAPIService\Twilio;

class ComposeTest extends BaseTestCase
{
	protected $sms;

	protected $config;

	public function setUp()
	{
		$this->config = $this->getConfig()['twilio']['sms'];
		$this->sms = new Twilio\SMS\Compose($this->config['account_sid'], $this->config['auth_token']);
		$this->sms->setMessage('Lorem ipsum dolor sit amet, consectetur adipisicing elit.');
		$this->sms->setTo(TwilioTestNumber::TO_NUMBER_INVALID);
	}

	/**
     * @expectedException Services_Twilio_RestException
     */
	public function testFromPhoneNumberIsInvalid()
	{
		$this->sms->setFrom(TwilioTestNumber::FROM_NUMBER_INVALID);
		$response = $this->sms->send();
	}
}
