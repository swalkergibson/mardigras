<?php
Namespace MardiGras\lib;

// This class provides common functions used by MG controllers
class MGControllerClass
{
	// Doctrine Entity Manager
	protected $em;

	// Exception Messages and their error codes
    static protected $exceptionMessages = array(
        'undefined_error' => array (0, 'undefined error occurred'),
        'not_found' => array (1, '"%s" was not found'),
        'not_defined' => array (2, '"%s" was not defined'),
        'custom_error' => array (3, '%s')
    );

	public function __construct($em)
	{
		$this->em = $em;
	}

	// Throw an exception
    static protected function throwException($error_slug = 'undefined_error', $insert_txt = null)
	{
		$errormsg = self::$exceptionMessages[$error_slug];

		$msgtxt = sprintf($errormsg[1], $insert_txt);
		throw new \OAuth2\Exception\ClientException($msgtxt, $errormsg[0]);
	}
}