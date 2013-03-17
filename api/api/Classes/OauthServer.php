<?php
namespace Classes;

use OAuth2;

// Include the storage models
include __dir__ . '\\OAuth\\model_client.php';
include __dir__ . '\\OAuth\\model_scope.php';
include __dir__ . '\\OAuth\\model_session.php';

// Common Oauth2 resource funtions
class OauthServer
{

	public $resource;
	public $auth;

	// Slim object
	public $app;

	public function __construct($app)
	{
		$this->app = $app;
		// Initiate the auth server with the models
		$this->resource = new \OAuth2\ResourceServer(new \Classes\OAuth\SessionModel(), new \Classes\OAuth\ScopeModel());

		// Initiate the auth server with the models
		$this->auth = new \OAuth2\AuthServer(new \Classes\OAuth\ClientModel(), new \Classes\OAuth\SessionModel(), new \Classes\OAuth\ScopeModel());
	}

	public function responseJSON($app, $response = "")
	{
		$res = $app->response();
		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($response));
	}

	public function response403($app, $error = "You are not authorised to use this endpoint")
	{
		$res = $app->response();
		$res->status(403);
		$res['Content-Type'] = 'application/json';
		$res->body(json_encode(array(
			'error' => $error
		)));
	}
}
