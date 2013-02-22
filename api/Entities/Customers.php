<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @Table(name="customers")
 * @Entity
 */
class Customers
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
     * @Column(name="customer_ref_id", type="string", length=12, nullable=false)
     */
    private $customerRefId;

    /**
     * @var string
     *
     * @Column(name="first_name", type="string", length=20, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @Column(name="last_name", type="string", length=30, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @Column(name="address1", type="string", length=45, nullable=true)
     */
    private $address1;

    /**
     * @var string
     *
     * @Column(name="address2", type="string", length=45, nullable=true)
     */
    private $address2;

    /**
     * @var string
     *
     * @Column(name="city", type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @Column(name="state", type="string", length=20, nullable=true)
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
     * @Column(name="phone", type="string", length=12, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=60, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="notes", type="blob", nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @Column(name="company", type="string", length=250, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @Column(name="credit_card", type="string", length=20, nullable=true)
     */
    private $creditCard;

    /**
     * @var \DateTime
     *
     * @Column(name="credit_card_exp", type="datetime", nullable=true)
     */
    private $creditCardExp;

    /**
     * @var string
     *
     * @Column(name="cvv", type="string", length=11, nullable=true)
     */
    private $cvv;

    /**
     * @var integer
     *
     * @Column(name="default_tax_exempt", type="integer", nullable=false)
     */
    private $defaultTaxExempt;

    /**
     * @var \DateTime
     *
     * @Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @Column(name="last_activity_date", type="datetime", nullable=true)
     */
    private $lastActivityDate;

    /**
     * @var \DateTime
     *
     * @Column(name="last_update_date", type="datetime", nullable=true)
     */
    private $lastUpdateDate;

    /**
     * @var \CustomerTypes
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="CustomerTypes")
     * @JoinColumns({
     *   @JoinColumn(name="customer_type_id", referencedColumnName="id")
     * })
     */
    private $customerType;

    /**
     * @var \Groups
     *
     * @ManyToOne(targetEntity="Groups")
     * @JoinColumns({
     *   @JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    private $group;


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
     * Set customerRefId
     *
     * @param string $customerRefId
     * @return Customers
     */
    public function setCustomerRefId($customerRefId)
    {
        $this->customerRefId = $customerRefId;
    
        return $this;
    }

    /**
     * Get customerRefId
     *
     * @return string 
     */
    public function getCustomerRefId()
    {
        return $this->customerRefId;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Customers
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Customers
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return Customers
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
     * @return Customers
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
     * Set city
     *
     * @param string $city
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * Set email
     *
     * @param string $email
     * @return Customers
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
     * Set notes
     *
     * @param string $notes
     * @return Customers
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    
        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Customers
     */
    public function setCompany($company)
    {
        $this->company = $company;
    
        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set creditCard
     *
     * @param string $creditCard
     * @return Customers
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;
    
        return $this;
    }

    /**
     * Get creditCard
     *
     * @return string 
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Set creditCardExp
     *
     * @param \DateTime $creditCardExp
     * @return Customers
     */
    public function setCreditCardExp($creditCardExp)
    {
        $this->creditCardExp = $creditCardExp;
    
        return $this;
    }

    /**
     * Get creditCardExp
     *
     * @return \DateTime 
     */
    public function getCreditCardExp()
    {
        return $this->creditCardExp;
    }

    /**
     * Set cvv
     *
     * @param string $cvv
     * @return Customers
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
    
        return $this;
    }

    /**
     * Get cvv
     *
     * @return string 
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Set defaultTaxExempt
     *
     * @param integer $defaultTaxExempt
     * @return Customers
     */
    public function setDefaultTaxExempt($defaultTaxExempt)
    {
        $this->defaultTaxExempt = $defaultTaxExempt;
    
        return $this;
    }

    /**
     * Get defaultTaxExempt
     *
     * @return integer 
     */
    public function getDefaultTaxExempt()
    {
        return $this->defaultTaxExempt;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Customers
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set lastActivityDate
     *
     * @param \DateTime $lastActivityDate
     * @return Customers
     */
    public function setLastActivityDate($lastActivityDate)
    {
        $this->lastActivityDate = $lastActivityDate;
    
        return $this;
    }

    /**
     * Get lastActivityDate
     *
     * @return \DateTime 
     */
    public function getLastActivityDate()
    {
        return $this->lastActivityDate;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     * @return Customers
     */
    public function setLastUpdateDate($lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;
    
        return $this;
    }

    /**
     * Get lastUpdateDate
     *
     * @return \DateTime 
     */
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
    }

    /**
     * Set customerType
     *
     * @param \CustomerTypes $customerType
     * @return Customers
     */
    public function setCustomerType(\CustomerTypes $customerType)
    {
        $this->customerType = $customerType;
    
        return $this;
    }

    /**
     * Get customerType
     *
     * @return \CustomerTypes 
     */
    public function getCustomerType()
    {
        return $this->customerType;
    }

    /**
     * Set group
     *
     * @param \Groups $group
     * @return Customers
     */
    public function setGroup(\Groups $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Groups 
     */
    public function getGroup()
    {
        return $this->group;
    }
}