<?php

namespace Oml\PHPAPIService\Test\Messente\SMS;

use Oml\PHPAPIService\Test\BaseTestCase;
use Oml\PHPAPIService\Messente;

class ComposeTest extends BaseTestCase
{
	protected $sms;

	protected $config;

	public function setUp()
	{
		$this->config = $this->getConfig()['messente']['sms'];
		$this->sms = new Messente\SMS\Compose($this->config['username'], $this->config['password']);
		$this->sms->setMessage('Lorem ipsum dolor sit amet, consectetur adipisicing elit.');
	}

	public function testMessageIsDelivered()
	{
		$this->sms->setTo($this->config['to']);
		$response = $this->sms->send();
	}
}
