<?php

namespace Oml\PHPAPIService\Test;

class BaseTestCase extends \PHPUnit_Framework_TestCase
{
	public function getConfig()
	{
		if (file_exists(__DIR__.'/config/credentials.php')) {
			return include_once __DIR__.'/config/credentials.php';
		}
		return [];
	}	
}