<?php
namespace MardiGras\Lib\OAuthModels;

class ClientModel implements \OAuth2\Storage\ClientInterface {
    private $em;

	public function __construct($em)
    {
        $this->em = $em;
    }

	public function getClient($clientId = null, $clientSecret = null, $redirectUri = null)
	{
		if(empty($clientId))
			return false;

		$dql = 'SELECT
                    c, e
                FROM
                    Entities\OauthClients c
                join
                    c.clientEndpoints e
                where
                    c.id = :clientid
                	and e.redirectUri = :redirecturi';

        $query = $this->em->createQuery($dql);

        $query->setParameters(array(
            'clientid' => $clientId,
            'redirecturi' => $redirectUri
        ));

        $query->setMaxResults(1);
        $client = $query->getResult();

        $endpoints = $client[0]->GetClientEndpoints();
		if ($client) {
			return array(
				'client_id' => $client[0]->getId(),
				'client secret' =>  $client[0]->getSecret(),
				'redirect_uri' =>  $endpoints[0]->getRedirectUri(),
				'name' =>  $client[0]->getName());
		} else {
			return false;
		}
	}
}