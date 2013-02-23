<?php
Namespace Entities;



use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @Table(name="orders")
 * @Entity
 */
class Orders
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
     * @var \DateTime
     *
     * @Column(name="order_date", type="datetime", nullable=true)
     */
    private $orderDate;

    /**
     * @var \DateTime
     *
     * @Column(name="last_update_date", type="datetime", nullable=true)
     */
    private $lastUpdateDate;

    /**
     * @var string
     *
     * @Column(name="order_key", type="string", length=180, nullable=true)
     */
    private $orderKey;

    /**
     * @var \DateTime
     *
     * @Column(name="cancel_date", type="datetime", nullable=true)
     */
    private $cancelDate;

    /**
     * @var \DateTime
     *
     * @Column(name="ship_date", type="datetime", nullable=true)
     */
    private $shipDate;

    /**
     * @var string
     *
     * @Column(name="order_discount", type="string", length=50, nullable=true)
     */
    private $orderDiscount;

    /**
     * @var string
     *
     * @Column(name="payment_terms", type="string", length=50, nullable=true)
     */
    private $paymentTerms;

    /**
     * @var \DateTime
     *
     * @Column(name="delivery_date", type="datetime", nullable=true)
     */
    private $deliveryDate;

    /**
     * @var \DateTime
     *
     * @Column(name="submit_date", type="datetime", nullable=true)
     */
    private $submitDate;

    /**
     * @var \OrderStatus
     *
     * 
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="OrderStatus")
     * @JoinColumns({
     *   @JoinColumn(name="order_status_id", referencedColumnName="id")
     * })
     */
    private $orderStatus;

    /**
     * @var \OrderSubmitMethods
     *
     * @ManyToOne(targetEntity="OrderSubmitMethods")
     * @JoinColumns({
     *   @JoinColumn(name="order_submit_method_id", referencedColumnName="id")
     * })
     */
    private $orderSubmitMethod;

    /**
     * @var \Vendors
     *
     * 
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Vendors")
     * @JoinColumns({
     *   @JoinColumn(name="vendor_id", referencedColumnName="id")
     * })
     */
    private $vendor;

    /**
     * @var \Clerks
     *
     * 
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Clerks")
     * @JoinColumns({
     *   @JoinColumn(name="clerk_id", referencedColumnName="id")
     * })
     */
    private $clerk;


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
     * Set orderDate
     *
     * @param \DateTime $orderDate
     * @return Orders
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    
        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \DateTime 
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     * @return Orders
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
     * Set orderKey
     *
     * @param string $orderKey
     * @return Orders
     */
    public function setOrderKey($orderKey)
    {
        $this->orderKey = $orderKey;
    
        return $this;
    }

    /**
     * Get orderKey
     *
     * @return string 
     */
    public function getOrderKey()
    {
        return $this->orderKey;
    }

    /**
     * Set cancelDate
     *
     * @param \DateTime $cancelDate
     * @return Orders
     */
    public function setCancelDate($cancelDate)
    {
        $this->cancelDate = $cancelDate;
    
        return $this;
    }

    /**
     * Get cancelDate
     *
     * @return \DateTime 
     */
    public function getCancelDate()
    {
        return $this->cancelDate;
    }

    /**
     * Set shipDate
     *
     * @param \DateTime $shipDate
     * @return Orders
     */
    public function setShipDate($shipDate)
    {
        $this->shipDate = $shipDate;
    
        return $this;
    }

    /**
     * Get shipDate
     *
     * @return \DateTime 
     */
    public function getShipDate()
    {
        return $this->shipDate;
    }

    /**
     * Set orderDiscount
     *
     * @param string $orderDiscount
     * @return Orders
     */
    public function setOrderDiscount($orderDiscount)
    {
        $this->orderDiscount = $orderDiscount;
    
        return $this;
    }

    /**
     * Get orderDiscount
     *
     * @return string 
     */
    public function getOrderDiscount()
    {
        return $this->orderDiscount;
    }

    /**
     * Set paymentTerms
     *
     * @param string $paymentTerms
     * @return Orders
     */
    public function setPaymentTerms($paymentTerms)
    {
        $this->paymentTerms = $paymentTerms;
    
        return $this;
    }

    /**
     * Get paymentTerms
     *
     * @return string 
     */
    public function getPaymentTerms()
    {
        return $this->paymentTerms;
    }

    /**
     * Set deliveryDate
     *
     * @param \DateTime $deliveryDate
     * @return Orders
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    
        return $this;
    }

    /**
     * Get deliveryDate
     *
     * @return \DateTime 
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Set submitDate
     *
     * @param \DateTime $submitDate
     * @return Orders
     */
    public function setSubmitDate($submitDate)
    {
        $this->submitDate = $submitDate;
    
        return $this;
    }

    /**
     * Get submitDate
     *
     * @return \DateTime 
     */
    public function getSubmitDate()
    {
        return $this->submitDate;
    }

    /**
     * Set orderStatus
     *
     * @param \OrderStatus $orderStatus
     * @return Orders
     */
    public function setOrderStatus(\OrderStatus $orderStatus)
    {
        $this->orderStatus = $orderStatus;
    
        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return \OrderStatus 
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Set orderSubmitMethod
     *
     * @param \OrderSubmitMethods $orderSubmitMethod
     * @return Orders
     */
    public function setOrderSubmitMethod(\OrderSubmitMethods $orderSubmitMethod = null)
    {
        $this->orderSubmitMethod = $orderSubmitMethod;
    
        return $this;
    }

    /**
     * Get orderSubmitMethod
     *
     * @return \OrderSubmitMethods 
     */
    public function getOrderSubmitMethod()
    {
        return $this->orderSubmitMethod;
    }

    /**
     * Set vendor
     *
     * @param \Vendors $vendor
     * @return Orders
     */
    public function setVendor(\Vendors $vendor)
    {
        $this->vendor = $vendor;
    
        return $this;
    }

    /**
     * Get vendor
     *
     * @return \Vendors 
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Set clerk
     *
     * @param \Clerks $clerk
     * @return Orders
     */
    public function setClerk(\Clerks $clerk)
    {
        $this->clerk = $clerk;
    
        return $this;
    }

    /**
     * Get clerk
     *
     * @return \Clerks 
     */
    public function getClerk()
    {
        return $this->clerk;
    }
}