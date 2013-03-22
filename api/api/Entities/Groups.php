<?php
Namespace Entities;


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
     * @var Entities\Customers
     * @manyToOne(targetEntity="Customers", inversedBy="adminGroups")
     * @JoinColumn(name="admin_customer_id", referencedColumnName="id")
     */
    private $adminCustomer;

    /**
     * @var Entities\GroupTypes
     * @manyToOne(targetEntity="GroupTypes", inversedBy="groups")
     * @JoinColumn(name="group_type_id", referencedColumnName="id")
     */
    private $groupType;

    /**
     * @OneToMany(targetEntity="Customers", mappedBy="group")
    */
    private  $customers;

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
     * @param Entities\Customers $adminCustomer
     * @return Groups
     */
    public function setAdminCustomer(Customers $adminCustomer)
    {
        $this->adminCustomer = $adminCustomer;
    
        return $this;
    }

    /**
     * Get adminCustomer
     *
     * @return Entities\Customers 
     */
    public function getAdminCustomer()
    {
        return $this->adminCustomer;
    }

    /**
     * Set groupType
     *
     * @param Entities\GroupTypes $groupType
     * @return Groups
     */
    public function setGroupType(GroupTypes $groupType)
    {
        $this->groupType = $groupType;
    
        return $this;
    }

    /**
     * Get groupType
     *
     * @return Entities\GroupTypes 
     */
    public function getGroupType()
    {
        return $this->groupType;
    }

    /**
     * Set customers
     *
     * @param Entities\Customers $customers
     * @return Groups
     */
    public function setCustomers(Customers $customers)
    {
        $this->customers = $customers;
    
        return $this;
    }

    /**
     * Get customers
     *
     * @return Entities\Customers
     */
    public function getCustomers()
    {
        return $this->customers;
    }
}
