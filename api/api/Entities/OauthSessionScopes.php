<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OauthSessionScopes
 *
 * @Table(name="oauth_session_scopes")
 * @Entity
 */
class OauthSessionScopes
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
     * @var \OauthSessions
     *
     * @ManyToOne(targetEntity="OauthSessions")
     * @JoinColumns({
     *   @JoinColumn(name="session_id", referencedColumnName="id")
     * })
     */
    private $session;

    /**
     * @var \OauthScopes
     *
     * @ManyToOne(targetEntity="OauthScopes")
     * @JoinColumns({
     *   @JoinColumn(name="scope_id", referencedColumnName="id")
     * })
     */
    private $scope;


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
     * @param \OauthSessions $session
     * @return OauthSessionScopes
     */
    public function setSession(\OauthSessions $session = null)
    {
        $this->session = $session;
    
        return $this;
    }

    /**
     * Get session
     *
     * @return \OauthSessions 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set scope
     *
     * @param \OauthScopes $scope
     * @return OauthSessionScopes
     */
    public function setScope(\OauthScopes $scope = null)
    {
        $this->scope = $scope;
    
        return $this;
    }

    /**
     * Get scope
     *
     * @return \OauthScopes 
     */
    public function getScope()
    {
        return $this->scope;
    }
}
