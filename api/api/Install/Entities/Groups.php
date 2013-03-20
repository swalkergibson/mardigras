<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Groups
 *
 * @Table(name="groups")
 * @Entity
 */
class Groups
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
     * @Column(name="name", type="string", length=250, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="phone", type="string", length=12, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @Column(name="fax", type="string", length=12, nullable=true)
     */
    private $fax;

    /**
     * @var \Customers
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Customers")
     * @JoinColumns({
     *   @JoinColumn(name="admin_customer_id", referencedColumnName="id")
     * })
     */
    private $adminCustomer;

    /**
     * @var \GroupTypes
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="GroupTypes")
     * @JoinColumns({
     *   @JoinColumn(name="group_type_id", referencedColumnName="id")
     * })
     */
    private $groupType;


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
     * Set name
     *
     * @param string $name
     * @return Groups
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
     * Set phone
     *
     * @param string $phone
     * @return Groups
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Groups
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set adminCustomer
     *
     * @param \Customers $adminCustomer
     * @return Groups
     */
    public function setAdminCustomer(\Customers $adminCustomer)
    {
        $this->adminCustomer = $adminCustomer;
    
        return $this;
    }

    /**
     * Get adminCustomer
     *
     * @return \Customers 
     */
    public function getAdminCustomer()
    {
        return $this->adminCustomer;
    }

    /**
     * Set groupType
     *
     * @param \GroupTypes $groupType
     * @return Groups
     */
    public function setGroupType(\GroupTypes $groupType)
    {
        $this->groupType = $groupType;
    
        return $this;
    }

    /**
     * Get groupType
     *
     * @return \GroupTypes 
     */
    public function getGroupType()
    {
        return $this->groupType;
    }
}
