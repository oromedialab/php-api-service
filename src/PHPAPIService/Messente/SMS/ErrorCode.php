<?php
/**
 * Messente SMS Abstract Message Class
 *
 * @author Ibrahim Azhar <azhar@iarmar.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace Oml\PHPAPIService\Messente\SMS;

abstract class ErrorCode
{
	const ERROR_101 = 'Access is restricted, wrong credentials. Check the username and password values.';
	const ERROR_102 = 'Parameters are wrong or missing. Check that all the required parameters are present.';
	const ERROR_103 = 'Invalid IP address. The IP address you made the request from, is not in the API settings whitelist.';
	const ERROR_104 = 'Country was not found';
	const ERROR_105 = 'This country is not supported';
	const ERROR_106 = 'Invalid format provided - only json or xml is allowed';
	const ERROR_107 = 'Could not find the message with sms_unique_id';
	const ERROR_108 = 'Number is in blacklist.';
	const ERROR_111 = 'Sender parameter "from" is invalid. You have not activated this sender name on Messente.com';
	const FAILED_102 = 'No Delivery report yet, try again later.';
	const FAILED_209 = 'Server failure, try again after a few seconds or try the api3.messente.com backup server.';
}
