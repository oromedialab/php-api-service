<?php
/**
 * SMS Composer Interface
 *
 * @author Ibrahim Azhar <azhar@iarmar.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace Oml\PHPAPIService\Interfaces\SMS;

interface ComposerInterface
{
	public function setTo($to);

	public function getTo();

	public function setMessage($message);

	public function getMessage();

	public function send();
}
