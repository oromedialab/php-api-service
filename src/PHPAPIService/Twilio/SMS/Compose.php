<?php
/**
 * Twilio SMS Composer Class
 *
 * @author Ibrahim Azhar <azhar@iarmar.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace Oml\PHPAPIService\Twilio\SMS;

use Oml\PHPAPIService\Interfaces\SMS\ComposerInterface;
use Services_Twilio;

class Compose implements ComposerInterface
{
	/**
	 * Account SID (Twilio)
	 *
	 * @var string
	 */
	protected $accountSid;

	/**
	 * Auth Token (Twilio)
	 *
	 * @var string
	 */
	protected $authToken;

	/**
	 * From Phone Number (Obtain the number from Twilio)
	 *
	 * @var string
	 */
	protected $from;

	/**
	 * To Phone Number (Obrain the number from Twilio)
	 *
	 * @var string
	 */
	protected $to;

	/**
	 * Message to send to user
	 *
	 * @var string
	 */
	protected $message;

	/**
	 * Initialize the class with required account_sid and auth_token
	 *
	 * @param string $accountSid
	 * @param string $authToken
	 */
	public function __construct($accountSid, $authToken)
	{
		$this->accountSid = $accountSid;
		$this->authToken = $authToken;
	}

	/**
	 * Get Account SID
	 *
	 * @return string
	 */
	protected function getAccountSid()
	{
		return $this->accountSid;
	}

	/**
	 * Get Auth Token
	 *
	 * @return string
	 */
	protected function getAuthToken()
	{
		return $this->authToken;
	}

	/**
	 * Set From (Phonenumber)
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
	 * Get From (Phonenumber)
	 *
	 * @return string
	 */
	public function getFrom()
	{
		return $this->from;
	}

	/**
	 * Set To (Phonenumber)
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
	 * Get To (Phonenumber)
	 *
	 * @return string
	 */
	public function getTo()
	{
		return $this->to;
	}

	/**
	 * Set Message
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
	 * Get Message
	 *
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * Send Message
	 *
	 * @return Services_Twilio_Rest_Message
	 */
	public function send()
	{
		if (empty($this->getFrom())) {
			throw new \Exception('Missing "from" parameter, set the value using "setFrom($from)"');
		}
		if (empty($this->getTo())) {
			throw new \Exception('Missing "to" parameter, set the value using "setTo($to)"');
		}
		if (empty($this->getMessage())) {
			throw new \Exception('Missing "message" parameter, set the value using "setMessage($message)"');
		}
		$client = new Services_Twilio($this->getAccountSid(), $this->getAuthToken());
		try {
		    $message = $client->account->messages->create(array('From' => $this->getFrom(), 'To' => $this->getTo(), 'Body' => $this->getMessage()));
		} catch (Services_Twilio_RestException $e) {
		    return false;
		}
		return $message;
	}
}
