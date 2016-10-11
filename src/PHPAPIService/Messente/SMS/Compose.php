<?php
/**
 * Messente SMS Composer Class
 *
 * @author Ibrahim Azhar <azhar@iarmar.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace Oml\PHPAPIService\Messente\SMS;

use Oml\PHPAPIService\Interfaces\SMS\ComposerInterface;
use GuzzleHttp;
use DateTime;

class Compose extends AbstractMessage implements ComposerInterface
{
	/**
	 * Receiver's phone number with the country code
	 * 
	 * @var string
	 */
	protected $to;

	/**
	 * Optional parameter that sets the Sender. When not set, the default Sender is used. Sender must be encoded in UTF-8
	 * 
	 * @var string
	 */
	protected $from;

	/**
	 * All characters (Unicode) and long messages are supported
	 * 
	 * @var string
	 */
	protected $message;

	/**
	 * Optional parameter for sending messages at some specific time in the future. Must be numeric Unix timestamp i.e. 1417190104.
	 * If the time_to_send is set in past, message will be sent with no delays.
	 * You can cancel sending this message with cancel_sms request.
	 * 
	 * @var DateTime
	 */
	protected $scheduleAt;

	/**
	 * Encoding of the "text" and "from" parameter value. Defaults to UTF-8 
	 * 
	 * @var string
	 */
	protected $charset = 'UTF-8';

	/**
	 * For how long the message is re-tried when the phone is switched off (in minutes). Defaults to 360 minutes (6 hours).
	 * 
	 * @var integer
	 */
	protected $validity;

	/**
	 * {@inheritDoc}
	 * 
	 * @param string $to
	 * @return $this
	 */
	public function setTo($to)
	{
		$this->to = $to;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @return string
	 */
	public function getTo()
	{
		return $this->to;
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @param string $from
	 * @return $this
	 */	
	public function setFrom($from)
	{
		$this->from = $from;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @return string
	 */
	public function getFrom()
	{
		return $this->from;
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @param string $message
	 * @return $this
	 */	
	public function setMessage($message)
	{
		$this->message = $message;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @param DateTime $dateTime
	 * @return $this
	 */
	public function setScheduleAt(DateTime $dateTime)
	{
		$this->scheduleAt = $dateTime;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @param boolean $unixTimestamp
	 * @return DateTime|double
	 */
	public function getScheduleAt($unixTimestamp = false)
	{
		return true === $unixTimestamp && $this->scheduleAt instanceof DateTime ? $this->scheduleAt->getTimestamp() : $this->scheduleAt;
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @param string $charset
	 * @return $this
	 */
	public function setCharset($charset)
	{
		$this->charset = $charset;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @return string
	 */
	public function getCharset()
	{
		return $this->charset;
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @param integer $validity
	 * @return $this
	 */
	public function setValidity($validity)
	{
		$this->validity = $validity;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @return integer
	 */
	public function getValidity()
	{
		return $this->validity;
	}

	/**
	 * Query Params
	 * 
	 * @return array
	 */
	protected function getQueryParams()
	{
		$parameters = [];
		$parameters['username'] = $this->getUsername();
		$parameters['password'] = $this->getPassword();
		$parameters['to'] = $this->getTo();
		$parameters['text'] = $this->getMessage();
		return $parameters;
	}

	public function send()
	{
		$client = new GuzzleHttp\Client();
		$response = $client->request('GET', $this->getComposeUri(), [
		    'query' => $this->getQueryParams()
		]);
		return [
			'status_code' => $response->getStatusCode(),
			'body' => (string)$response->getBody(),
			'response' => $response
		];
	}
}
