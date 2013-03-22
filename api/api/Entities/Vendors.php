<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Vendors
 *
 * @Table(name="vendors")
 * @Entity
 */
class Vendors
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
     * @Column(name="code", type="string", length=50, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="contact", type="string", length=20, nullable=true)
     */
    private $contact;

    /**
     * @var string
     *
     * @Column(name="address1", type="string", length=30, nullable=true)
     */
    private $address1;

    /**
     * @var string
     *
     * @Column(name="address2", type="string", length=30, nullable=true)
     */
    private $address2;

    /**
     * @var string
     *
     * @Column(name="city_state", type="string", length=120, nullable=true)
     */
    private $cityState;

    /**
     * @var string
     *
     * @Column(name="city", type="string", length=100, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @Column(name="state", type="string", length=100, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @Column(name="zip", type="string", length=10, nullable=true)
     */
    private $zip;

    /**
     * @var string
     *
     * @Column(name="phone", type="string", length=14, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @Column(name="fax", type="string", length=14, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="mg_account_num", type="string", length=250, nullable=true)
     */
    private $mgAccountNum;

    /**
     * @var string
     *
     * @Column(name="sales_rep_name", type="string", length=250, nullable=true)
     */
    private $salesRepName;

    /**
     * @var string
     *
     * @Column(name="sales_rep_phone", type="string", length=250, nullable=true)
     */
    private $salesRepPhone;


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
     * @return Vendors
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
     * @return Vendors
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
     * Set contact
     *
     * @param string $contact
     * @return Vendors
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return Vendors
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    
        return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return Vendors
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    
        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set cityState
     *
     * @param string $cityState
     * @return Vendors
     */
    public function setCityState($cityState)
    {
        $this->cityState = $cityState;
    
        return $this;
    }

    /**
     * Get cityState
     *
     * @return string 
     */
    public function getCityState()
    {
        return $this->cityState;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Vendors
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Vendors
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Vendors
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    
        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Vendors
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
     * @return Vendors
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
     * Set email
     *
     * @param string $email
     * @return Vendors
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mgAccountNum
     *
     * @param string $mgAccountNum
     * @return Vendors
     */
    public function setMgAccountNum($mgAccountNum)
    {
        $this->mgAccountNum = $mgAccountNum;
    
        return $this;
    }

    /**
     * Get mgAccountNum
     *
     * @return string 
     */
    public function getMgAccountNum()
    {
        return $this->mgAccountNum;
    }

    /**
     * Set salesRepName
     *
     * @param string $salesRepName
     * @return Vendors
     */
    public function setSalesRepName($salesRepName)
    {
        $this->salesRepName = $salesRepName;
    
        return $this;
    }

    /**
     * Get salesRepName
     *
     * @return string 
     */
    public function getSalesRepName()
    {
        return $this->salesRepName;
    }

    /**
     * Set salesRepPhone
     *
     * @param string $salesRepPhone
     * @return Vendors
     */
    public function setSalesRepPhone($salesRepPhone)
    {
        $this->salesRepPhone = $salesRepPhone;
    
        return $this;
    }

    /**
     * Get salesRepPhone
     *
     * @return string 
     */
    public function getSalesRepPhone()
    {
        return $this->salesRepPhone;
    }
}
