<?php
namespace MardiGras\Lib\OAuthModels;

class ScopeModel implements \OAuth2\Storage\ScopeInterface {

	private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

	public function getScope($scope)
	{
		$dql = 'select s from Entities\OauthScopes s where s.scope = :scope';
		$query = $this->em->createQuery($dql);
		$query->setMaxResults(1);
		$query->setParameters(array(
			'scope' => $scope
			));
		$result = $query->getResult();
 
		if ($result) {
			$row = array_shift($result);
			return array(
				'id'	=>	$row->getId(),
				'scope'	=>	$row->getScope(),
				'name'	=>	$row->getName(),
				'description'	=>	$row->getDescription()
			);
		} else {
			return false;
		}
	}
}
