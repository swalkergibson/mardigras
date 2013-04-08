<?php
namespace MardiGras\Lib\OAuthModels;

class SessionModel implements \OAuth2\Storage\SessionInterface {

    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function createSession($clientId, $redirectUri, $type = 'user', $typeId = null, $authCode = null, $accessToken = null, $refreshToken = null, $accessTokenExpire = null, $stage = 'requested')
    {
        $newSession = new \Entities\OauthSessions;
        $newSession->setClientId($clientId);
        $newSession->setRedirectUri($redirectUri);
        $newSession->setOwnerType($type);
        $newSession->setOwnerId($typeId);
        $newSession->setAuthCode($authCode);
        $newSession->setAccessToken($accessToken);
        $newSession->setRefreshToken($refreshToken);
        $newSession->setAccessTokenExpires($accessTokenExpire);
        $newSession->setStage($stage);
        $newSession->setFirstRequested(time());
        $newSession->setLastUpdated(time());

        $this->em->persist($newSession);
        $this->em->flush();

        return $newSession->getId();
    }

    public function updateSession($sessionId, $authCode = null, $accessToken = null, $refreshToken = null, $accessTokenExpire = null, $stage = 'requested')
    {
        $session = $this->em->find('Entities\OauthSessions',$sessionId);
        $session->setAuthCode($authCode);
        $session->setAccessToken($accessToken);
        $session->setRefreshToken($refreshToken);
        $session->setAccessTokenExpires($accessTokenExpire);
        $session->setStage($stage);

        $this->em->persist($session);
        $this->em->flush();
    }

    public function deleteSession($clientId, $type, $typeId)
    {
        $query = $this->em->createQuery('DELETE Entities\OauthSessions s where s.clientId = :clientId and s.ownerType = :type and s.ownerId = :typeId');
        $query->setParameters(array(
                ':clientId' =>  $clientId,
                ':type'  =>  $type,
                ':typeId' =>  $typeId
            ));
        $query->execute();
    }

    public function validateAuthCode($clientId, $redirectUri, $authCode)
    {
        $dql = 'SELECT s from Entities\OauthSessions s where s.clientId = :clientId and s.redirectUri = :redirectUri
            and s.authCode = :authCode';
        $query = $this->em->createQuery($dql);
        $query->setParameters(array ('clientId' => $clientId, 'redirectUri' => $redirectUri, 'authCode' => $authCode));
        $session = $query->getResult();
        if ($session)
        {
            return array (
                'id' => $session[0]->getId(),
                'client_id' => $session[0]->getClientId(),
                'redirect_uri' => $session[0]->getRedirectUri(),
                'owner_type' => $session[0]->getOwnerType(),
                'owner_id' => $session[0]->getOwnerId(),
                'auth_code' => $session[0]->getAuthCode(),
                'access_token' => $session[0]->getAccessToken(),
                'refresh_token' => $session[0]->getRefreshToken(),
                'access_token_expires' => $session[0]->getAccessTokenExpires(),
                'stage' => $session[0]->getStage(),
                'first_requested' => $session[0]->getFirstRequested(),
                'last_updated' => $session[0]->getLastUpdated()
            );
        }
        else return false;
    }

    public function validateAccessToken($accessToken)
    {
        $dql = 'select s from Entities\OauthSessions where accessToken = :accessToken';
        $query = $this->em->createQuery($dql);
        $query->setParameters(array(':accessToken' => $accessToken));
        $session = $query->getResult();

        if ($session) {
            return array(
                'id'    =>  $session[0]->getId(),
                'owner_type' =>  $session[0]->getOwnerType(),
                'owner_id'  =>  $session[0]->getOwnerId()
            );
        } else {
            return false;
        }
    }

    public function getAccessToken($sessionId)
    {
        // Not needed for this demo
    }

    public function validateRefreshToken($refreshToken, $clientId)
    {
        // Not needed for this demo
    }

    public function updateRefreshToken($sessionId, $newAccessToken, $newRefreshToken, $accessTokenExpires)
    {
        // Not needed for this demo
    }

    public function associateScope($sessionId, $scopeId)
    {
        $session = $this->em->find('Entities\OauthSessions',$sessionId);
        $scope = $this->em->find('Entities\OauthScopes', $scopeId);

        // Add scope to session
        $newSession = new \Entities\OauthSessionScopes;
        $newSession->setSession($session);
        $newSession->setScope($scope);

        $this->em->persist($newSession);
        $this->em->flush();
    }

    public function getScopes($sessionId)
    {
        // Get scopes available for this session
        $dql = 'SELECT s, ss from Entities\OauthScopes s join s.sessionScopes ss where ss.sessionId = :sessionid';
        $query = $this->em.createQuery($dql);
        $query->setParameters(array (
                'sessionid' => $sessionId
            ));
        $result = $query->getResults();

        // Pack into an array
        $scopes = array();
        foreach ($result as $scope)
            $scopes[] = $scope->getScope();
        return $scopes;
    }
}