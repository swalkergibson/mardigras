<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OauthScopes
 *
 * @Table(name="oauth_scopes")
 * @Entity
 */
class OauthScopes extends \MardiGras\Lib\MyDoctrineEntity
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
     * @var string
     *
     * @Column(name="scope", type="string", length=255, nullable=false)
     */
    protected $scope;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @OneToMany(targetEntity="OauthSessionScopes", mappedBy="scope")
    */
    protected  $sessionScopes;

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
     * Set scope
     *
     * @param string $scope
     * @return OauthScopes
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    
        return $this;
    }

    /**
     * Get scope
     *
     * @return string 
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return OauthScopes
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
     * Set description
     *
     * @param string $description
     * @return OauthScopes
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sessionScopes
     *
     * @param Entities\OauthSessionScopes $sessionScopes
     * @return OauthScopes
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
