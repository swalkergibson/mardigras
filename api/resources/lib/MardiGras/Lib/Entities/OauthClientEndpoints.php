<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OauthClientEndpoints
 *
 * @Table(name="oauth_client_endpoints")
 * @Entity
 */
class OauthClientEndpoints
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
     * @Column(name="redirect_uri", type="string", length=255, nullable=true)
     */
    private $redirectUri;

    /**
     * @var Entities\OauthClients
     * @manyToOne(targetEntity="OauthClients", inversedBy="clientEndpoints")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;


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
     * Set redirectUri
     *
     * @param string $redirectUri
     * @return OauthClientEndpoints
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
     * Set client
     *
     * @param Entities\OauthClients $client
     * @return OauthClientEndpoints
     */
    public function setClient(OauthClients $client = null)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return Entities\OauthClients 
     */
    public function getClient()
    {
        return $this->client;
    }
}
