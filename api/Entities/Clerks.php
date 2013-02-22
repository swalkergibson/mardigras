<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Clerks
 *
 * @Table(name="clerks")
 * @Entity
 */
class Clerks
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
     * @Column(name="code", type="string", length=6, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=10, nullable=false)
     */
    private $name;

    /**
     * @var \ClerkGroups
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="ClerkGroups")
     * @JoinColumns({
     *   @JoinColumn(name="clerk_group_id", referencedColumnName="id")
     * })
     */
    private $clerkGroup;


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
     * Set code
     *
     * @param string $code
     * @return Clerks
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Clerks
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
     * Set clerkGroup
     *
     * @param \ClerkGroups $clerkGroup
     * @return Clerks
     */
    public function setClerkGroup(\ClerkGroups $clerkGroup)
    {
        $this->clerkGroup = $clerkGroup;
    
        return $this;
    }

    /**
     * Get clerkGroup
     *
     * @return \ClerkGroups 
     */
    public function getClerkGroup()
    {
        return $this->clerkGroup;
    }
}
