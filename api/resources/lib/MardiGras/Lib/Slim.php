<?php
Namespace MardiGras\lib;

class Slim extends \Slim\Slim
{
	private $requestObj;

	/* Request methods */
	public function request()
	{
		if (!$this->requestObj)
			$this->requestObj = parent::request();
		return $this->requestObj;
	}

	public function getRequestJSON()
	{
		$this->request();
        return json_decode($this->requestObj->getBody());
	}

	/* Response methods */
	public function responseJSON($array)
	{
		$res = $this->response();
		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($array));
	}

	public function response403($error = "You are not authorised to use this endpoint")
	{
		$res = $this->response();
		$res->status(403);
		$res['Content-Type'] = 'application/json';
		$res->body(json_encode(array(
			'error' => $error
		)));
	}
}
