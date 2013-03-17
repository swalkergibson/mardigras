<?php
namespace Classes\OAuth;

class ClientModel implements \OAuth2\Storage\ClientInterface {
    private $db;

	public function __construct()
    {
        $this->db = new DB();
    }

	public function getClient($clientId = null, $clientSecret = null, $redirectUri = null)
	{
		if(empty($clientId))
			return false;

		$result = $this->db->query('
			SELECT
				c.id,
				c.secret,
				c.name,
				e.redirect_uri
			FROM
				oauth_clients c
			JOIN
				oauth_client_endpoints e ON c.id = e.client_id
			where
				c.id = :clientid
				and e.redirect_uri = :redirectUri', array(
			':clientid' => $clientId,
			':redirectUri' => $redirectUri));
		$row = $result->fetch();

		if ($row) {
			return array(
				'client_id' => $row->id,
				'client secret' =>  $row->secret,
				'redirect_uri' =>  $row->redirect_uri,
				'name' =>  $row->name);
		} else {
			return false;
		}
	}

}