<?php
namespace MardiGras\Lib;

// Include the storage models

// Common Oauth2 resource funtions
class OauthServer
{

	public $resource;
	public $auth;

	// Slim object
	public $app;

	public function __construct($app, $em)
	{
		$this->app = $app;
		// Initiate the auth server with the models
		$this->resource = new \OAuth2\ResourceServer(new OAuthModels\SessionModel($em), new OAuthModels\ScopeModel($em));
		// Initiate the auth server with the models
		$this->auth = new \OAuth2\AuthServer(new OAuthModels\ClientModel($em), new OAuthModels\SessionModel($em), new OAuthModels\ScopeModel($em));
	}
}
