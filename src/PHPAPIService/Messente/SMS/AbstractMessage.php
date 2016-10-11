<?php
/**
 * Messente SMS Abstract Message Class
 *
 * @author Ibrahim Azhar <azhar@iarmar.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace Oml\PHPAPIService\Messente\SMS;

abstract class AbstractMessage
{
	/**
	 * API account user name from the Messente's web page
	 * 
	 * @var string
	 */
	protected $username;

	/**
	 * API account security key (API key) from the Messente's web page
	 * 
	 * @var string
	 */
	protected $password;

	/**
	 * Establish Secure Connection (HTTP or HTTPS)
	 * 
	 * @var boolean
	 */
	protected $secureConnection = true;

	/**
	 * Initialize Backup Server
	 * 
	 * @var boolean
	 */
	protected $initBackupServer = false;

	/**
	 * HTTP API Endpoint
	 * 
	 * @var string
	 */
	protected $httpApiEndpoint = 'http://api2.messente.com';

	/**
	 * HTTPS API Endpoint
	 * 
	 * @var string
	 */
	protected $httpsApiEndpoint = 'https://api2.messente.com';

	/**
	 * HTTP Backup API Endpoint
	 * 
	 * @var string
	 */
	protected $httpBackupApiEndpoint = 'http://api3.messente.com';

	/**
	 * HTTPS Backup API Endpoint
	 * 
	 * @var string
	 */
	protected $httpsBackupApiEndpoint = 'http://api3.messente.com';

	/**
	 * Compose URI
	 * 
	 * @var string
	 */
	protected $composeUri = '/send_sms';

	/**
	 * @param string $username
	 * @param string $password
	 */
	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	/**
	 * Set Secure Connection
	 * 
	 * @param boolean $secureConnection
	 */
	public function setSecureConnection($secureConnection)
	{
		$this->secureConnection = (bool)$secureConnection;
		return $this;
	}

	/**
	 * Check if Secure Connection
	 * 
	 * @return boolean
	 */
	protected function isSecureConnection()
	{
		return $this->secureConnection;
	}

	/**
	 * Initialize Backup Server
	 * 
	 * @param $value
	 * @return $this
	 */
	public function initBackupServer($value = null)
	{
		if (null == $value) {
			return $this->initBackupServer;
		}
		$this->initBackupServer = (bool)$value;
		return $this;
	}

	/**
	 * Get API Endpoint
	 * 
	 * @return string
	 */
	protected function getApiEndpoint()
	{
		if (true === $this->isSecureConnection() && true === $this->initBackupServer(null)) {
			return $this->httpsBackupApiEndpoint;
		}
		if (false === $this->isSecureConnection() && true === $this->initBackupServer(null)) {
			return $this->httpBackupApiEndpoint;
		}
		if (true === $this->isSecureConnection() && false === $this->initBackupServer(null)) {
			return $this->httpApiEndpoint;
		}
		if (false === $this->isSecureConnection() && false === $this->initBackupServer(null)) {
			return $this->httpsApiEndpoint;
		}
		return $this->httpApiEndpoint;
	}

	/**
	 * Get SMS Compose URI
	 * 
	 * @return string
	 */
	protected function getComposeUri()
	{
		return $this->getApiEndpoint().$this->composeUri.'/';
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}
}