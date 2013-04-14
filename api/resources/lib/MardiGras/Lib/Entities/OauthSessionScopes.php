<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OauthSessionScopes
 *
 * @Table(name="oauth_session_scopes")
 * @Entity
 */
class OauthSessionScopes extends \MardiGras\Lib\MyDoctrineEntity
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var Entities\OauthSessions
     * @manyToOne(targetEntity="OauthSessions", inversedBy="SessionScopes")
     * @JoinColumn(name="session_id", referencedColumnName="id")
     */
    protected $session;

    /**
     * @var Entities\OauthScopes
     * @manyToOne(targetEntity="OauthScopes", inversedBy="SessionScopes")
     * @JoinColumn(name="scope_id", referencedColumnName="id")
     */
    protected $scope;


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
     * Set session
     *
     * @param Entities\OauthSessions $session
     * @return OauthSessionScopes
     */
    public function setSession(OauthSessions $session = null)
    {
        $this->session = $session;
    
        return $this;
    }

    /**
     * Get session
     *
     * @return Entities\OauthSessions 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set scope
     *
     * @param Entities\OauthScopes $scope
     * @return OauthSessionScopes
     */
    public function setScope(OauthScopes $scope = null)
    {
        $this->scope = $scope;
    
        return $this;
    }

    /**
     * Get scope
     *
     * @return Entities\OauthScopes 
     */
    public function getScope()
    {
        return $this->scope;
    }
}
