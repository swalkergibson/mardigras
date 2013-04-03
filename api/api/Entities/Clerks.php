<?php
Namespace Entities;


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
     * @var string
     *
     * @Column(name="password_hash", type="string", length=128, nullable=false)
     */
    private $passwordHash;

    /**
     * @var string
     *
     * @Column(name="password_salt", type="string", length=16, nullable=false)
     */
    private $passwordSalt;

    /**
     * @var \DateTime
     *
     * @Column(name="date_created", type="datetime", nullable=false)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @Column(name="date_last_login", type="datetime", nullable=true)
     */
    private $dateLastLogin;

    /**
     * @var integer
     *
     * @Column(name="deleted", type="integer", nullable=false)
     */
    private $deleted;

    /**
     * @var Entities\ClerkGroups
     * @manyToOne(targetEntity="ClerkGroups", inversedBy="clerksInGroup")
     * @JoinColumn(name="clerk_group_id", referencedColumnName="id")
     */
    private $clerkGroup;

    /**
     * @OneToMany(targetEntity="Orders", mappedBy="clerk")
    */
    private  $orders;

    /**
     * @OneToMany(targetEntity="Invoices", mappedBy="clerk")
    */
    private  $invoices;


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
     * Set passwordHash
     *
     * @param string $passwordHash
     * @return Clerks
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    
        return $this;
    }

    /**
     * Get passwordHash
     *
     * @return string 
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * Set passwordSalt
     *
     * @param string $passwordSalt
     * @return Clerks
     */
    public function setPasswordSalt($passwordSalt)
    {
        $this->passwordSalt = $passwordSalt;
    
        return $this;
    }

    /**
     * Get passwordSalt
     *
     * @return string 
     */
    public function getPasswordSalt()
    {
        return $this->passwordSalt;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Clerks
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    
        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateLastLogin
     *
     * @param \DateTime $dateLastLogin
     * @return Clerks
     */
    public function setDateLastLogin($dateLastLogin)
    {
        $this->dateLastLogin = $dateLastLogin;
    
        return $this;
    }

    /**
     * Get dateLastLogin
     *
     * @return \DateTime 
     */
    public function getDateLastLogin()
    {
        return $this->dateLastLogin;
    }

    /**
     * Set deleted
     *
     * @param integer $deleted
     * @return Clerks
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    
        return $this;
    }

    /**
     * Get deleted
     *
     * @return integer 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set clerkGroup
     *
     * @param Entities\ClerkGroups $clerkGroup
     * @return Clerks
     */
    public function setClerkGroup(ClerkGroups $clerkGroup)
    {
        $this->clerkGroup = $clerkGroup;
    
        return $this;
    }

    /**
     * Get clerkGroup
     *
     * @return Entities\ClerkGroups 
     */
    public function getClerkGroup()
    {
        return $this->clerkGroup;
    }

    /**
     * Set orders
     *
     * @param Entities\Orders $orders
     * @return Clerks
     */
    public function setOrders(Orders $orders)
    {
        $this->orders = $orders;
    
        return $this;
    }

    /**
     * Get orders
     *
     * @return Entities\Orders 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set invoices
     *
     * @param Entities\Invoices $invoices
     * @return Clerks
     */
    public function setInvoices(Invoices $invoices)
    {
        $this->invoices = $invoices;
    
        return $this;
    }

    /**
     * Get invoices
     *
     * @return Entities\Invoices
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    public function getJsonString()
    {
        
    }
}
