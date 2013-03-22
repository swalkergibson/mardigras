<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OauthSessions
 *
 * @Table(name="oauth_sessions")
 * @Entity
 */
class OauthSessions
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="client_id", type="string", length=40, nullable=false)
     */
    private $clientId;

    /**
     * @var string
     *
     * @Column(name="redirect_uri", type="string", length=250, nullable=true)
     */
    private $redirectUri;

    /**
     * @var string
     *
     * @Column(name="owner_type", type="string", length=10, nullable=false)
     */
    private $ownerType;

    /**
     * @var string
     *
     * @Column(name="owner_id", type="string", length=255, nullable=true)
     */
    private $ownerId;

    /**
     * @var string
     *
     * @Column(name="access_token", type="string", length=40, nullable=true)
     */
    private $accessToken;

    /**
     * @var string
     *
     * @Column(name="auth_code", type="string", length=40, nullable=true)
     */
    private $authCode;

    /**
     * @var string
     *
     * @Column(name="refresh_token", type="string", length=40, nullable=true)
     */
    private $refreshToken;

    /**
     * @var integer
     *
     * @Column(name="access_token_expires", type="integer", nullable=true)
     */
    private $accessTokenExpires;

    /**
     * @var string
     *
     * @Column(name="stage", type="string", length=15, nullable=false)
     */
    private $stage;

    /**
     * @var integer
     *
     * @Column(name="first_requested", type="integer", nullable=false)
     */
    private $firstRequested;

    /**
     * @var integer
     *
     * @Column(name="last_updated", type="integer", nullable=false)
     */
    private $lastUpdated;

    /**
     * @OneToMany(targetEntity="OauthSessionScopes", mappedBy="session")
    */
    private  $sessionScopes;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set clientId
     *
     * @param string $clientId
     * @return OauthSessions
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    
        return $this;
    }

    /**
     * Get clientId
     *
     * @return string 
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set redirectUri
     *
     * @param string $redirectUri
     * @return OauthSessions
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    
        return $this;
    }

    /**
     * Get redirectUri
     *
     * @return string 
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set ownerType
     *
     * @param string $ownerType
     * @return OauthSessions
     */
    public function setOwnerType($ownerType)
    {
        $this->ownerType = $ownerType;
    
        return $this;
    }

    /**
     * Get ownerType
     *
     * @return string 
     */
    public function getOwnerType()
    {
        return $this->ownerType;
    }

    /**
     * Set ownerId
     *
     * @param string $ownerId
     * @return OauthSessions
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    
        return $this;
    }

    /**
     * Get ownerId
     *
     * @return string 
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set accessToken
     *
     * @param string $accessToken
     * @return OauthSessions
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    
        return $this;
    }

    /**
     * Get accessToken
     *
     * @return string 
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Set authCode
     *
     * @param string $authCode
     * @return OauthSessions
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
    
        return $this;
    }

    /**
     * Get authCode
     *
     * @return string 
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * Set refreshToken
     *
     * @param string $refreshToken
     * @return OauthSessions
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    
        return $this;
    }

    /**
     * Get refreshToken
     *
     * @return string 
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Set accessTokenExpires
     *
     * @param integer $accessTokenExpires
     * @return OauthSessions
     */
    public function setAccessTokenExpires($accessTokenExpires)
    {
        $this->accessTokenExpires = $accessTokenExpires;
    
        return $this;
    }

    /**
     * Get accessTokenExpires
     *
     * @return integer 
     */
    public function getAccessTokenExpires()
    {
        return $this->accessTokenExpires;
    }

    /**
     * Set stage
     *
     * @param string $stage
     * @return OauthSessions
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
    
        return $this;
    }

    /**
     * Get stage
     *
     * @return string 
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Set firstRequested
     *
     * @param integer $firstRequested
     * @return OauthSessions
     */
    public function setFirstRequested($firstRequested)
    {
        $this->firstRequested = $firstRequested;
    
        return $this;
    }

    /**
     * Get firstRequested
     *
     * @return integer 
     */
    public function getFirstRequested()
    {
        return $this->firstRequested;
    }

    /**
     * Set lastUpdated
     *
     * @param integer $lastUpdated
     * @return OauthSessions
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
    
        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return integer 
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set sessionScopes
     *
     * @param Entities\OauthSessionScopes $sessionScopes
     * @return OauthSessions
     */
    public function setSessionScopes(OauthSessionScopes $sessionScopes)
    {
        $this->sessionScopes = $sessionScopes;
    
        return $this;
    }

    /**
     * Get sessionScopes
     *
     * @return Entities\OauthSessionScopes
     */
    public function getSessionScopes()
    {
        return $this->sessionScopes;
    }
}
