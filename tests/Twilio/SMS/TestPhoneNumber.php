<?php
/**
 * Twilio Test Phone Number Class (Test phone numbers provided by Twilio for testing)
 *
 * @author Ibrahim Azhar <azhar@iarmar.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace Oml\PHPAPIService\Test\Twilio\SMS;

class TestPhoneNumber
{
	/**
	 * This phone number is invalid.
	 * Error code: 21212
	 */
	const FROM_NUMBER_INVALID = '+15005550001';

	/**
	 * This phone number is not owned by your account or is not SMS-capable.
	 * Error code: 21606
	 */
	const FROM_NUMBER_NOT_ASSOCIATED_WITH_ACCOUNT = '+15005550007';

	/**
	 * This number has an SMS message queue that is full.
	 * Error code: 21611
	 */
	const FROM_NUMBER_FULL_QUEUE = '+15005550008';

	/**
	 * This number passes all validation.
	 * Error code: No error
	 */
	const FROM_NUMBER_NO_ERROR = '+15005550006';

	/**
	 * This phone number is invalid.
	 * Error code: 21211
	 */
	const TO_NUMBER_INVALID = '+15005550001';

	/**
	 * Twilio cannot route to this number.
	 * Error code: 21612
	 */
	const TO_NUMBER_CANNOT_BE_ROUTED = '+15005550002';

	/**
	 * Your account doesn't have the international permissions necessary to SMS this number.
	 * Error code: 21408
	 */
	const TO_NUMBER_NO_INTERNATIONAL_ACCESS = '+15005550003';

	/**
	 * This number is blacklisted for your account.
	 * Error code: 21610
	 */
	const TO_NUMBER_BLACKLISTED = '+15005550004';

	/**
	 * This number is incapable of receiving SMS messages.
	 * Error code: 21614
	 */
	const TO_NUMBER_CANNOT_RECEIVE_SMS = '+15005550009';
}
