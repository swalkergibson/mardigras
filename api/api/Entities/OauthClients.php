<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OauthClients
 *
 * @Table(name="oauth_clients")
 * @Entity
 */
class OauthClients
{
    /**
     * @var string
     *
     * @Column(name="id", type="string", length=40, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="secret", type="string", length=40, nullable=false)
     */
    private $secret;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var boolean
     *
     * @Column(name="auto_approve", type="boolean", nullable=false)
     */
    private $autoApprove;

    /**
     * @OneToMany(targetEntity="OauthClientEndpoints", mappedBy="client")
    */
    private  $clientEndpoints;

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set secret
     *
     * @param string $secret
     * @return OauthClients
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    
        return $this;
    }

    /**
     * Get secret
     *
     * @return string 
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return OauthClients
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set autoApprove
     *
     * @param boolean $autoApprove
     * @return OauthClients
     */
    public function setAutoApprove($autoApprove)
    {
        $this->autoApprove = $autoApprove;
    
        return $this;
    }

    /**
     * Get autoApprove
     *
     * @return boolean 
     */
    public function getAutoApprove()
    {
        return $this->autoApprove;
    }

    /**
     * Set clientEndpoints
     *
     * @param Entities\OauthClientEndpoints $clientEndpoints
     * @return OauthClients
     */
    public function setClientEndpoints(OauthClientEndpoints $clientEndpoints)
    {
        $this->clientEndpoints = $clientEndpoints;
    
        return $this;
    }

    /**
     * Get clientEndpoints
     *
     * @return Entities\OauthClientEndpoints
     */
    public function getClientEndpoints()
    {
        return $this->clientEndpoints;
    }
}
