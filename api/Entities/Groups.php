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
     * @var \Customers
     *
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Customers")
     * @JoinColumns({
     *   @JoinColumn(name="admin_customer_id", referencedColumnName="id")
     * })
     */
    private $adminCustomer;


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
}