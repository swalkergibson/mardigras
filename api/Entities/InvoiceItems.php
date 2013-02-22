<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceItems
 *
 * @Table(name="invoice_items")
 * @Entity
 */
class InvoiceItems
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
     * @var integer
     *
     * @Column(name="flags", type="integer", nullable=true)
     */
    private $flags;

    /**
     * @var float
     *
     * @Column(name="price", type="decimal", nullable=true)
     */
    private $price;

    /**
     * @var integer
     *
     * @Column(name="rental_rate", type="integer", nullable=true)
     */
    private $rentalRate;

    /**
     * @var float
     *
     * @Column(name="discount", type="float", nullable=true)
     */
    private $discount;

    /**
     * @var integer
     *
     * @Column(name="qty", type="integer", nullable=true)
     */
    private $qty;

    /**
     * @var integer
     *
     * @Column(name="tax_exempt", type="integer", nullable=true)
     */
    private $taxExempt;

    /**
     * @var \DateTime
     *
     * @Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @Column(name="date_out", type="datetime", nullable=true)
     */
    private $dateOut;

    /**
     * @var \DateTime
     *
     * @Column(name="date_due", type="datetime", nullable=true)
     */
    private $dateDue;

    /**
     * @var \DateTime
     *
     * @Column(name="date_returned", type="datetime", nullable=true)
     */
    private $dateReturned;

    /**
     * @var float
     *
     * @Column(name="days_charged", type="decimal", nullable=true)
     */
    private $daysCharged;

    /**
     * @var \Invoices
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Invoices")
     * @JoinColumns({
     *   @JoinColumn(name="invoice_id", referencedColumnName="id")
     * })
     */
    private $invoice;

    /**
     * @var \Inventory
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Inventory")
     * @JoinColumns({
     *   @JoinColumn(name="inventory_id", referencedColumnName="id")
     * })
     */
    private $inventory;


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
     * Set flags
     *
     * @param integer $flags
     * @return InvoiceItems
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;
    
        return $this;
    }

    /**
     * Get flags
     *
     * @return integer 
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return InvoiceItems
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set rentalRate
     *
     * @param integer $rentalRate
     * @return InvoiceItems
     */
    public function setRentalRate($rentalRate)
    {
        $this->rentalRate = $rentalRate;
    
        return $this;
    }

    /**
     * Get rentalRate
     *
     * @return integer 
     */
    public function getRentalRate()
    {
        return $this->rentalRate;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return InvoiceItems
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     * @return InvoiceItems
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    
        return $this;
    }

    /**
     * Get qty
     *
     * @return integer 
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set taxExempt
     *
     * @param integer $taxExempt
     * @return InvoiceItems
     */
    public function setTaxExempt($taxExempt)
    {
        $this->taxExempt = $taxExempt;
    
        return $this;
    }

    /**
     * Get taxExempt
     *
     * @return integer 
     */
    public function getTaxExempt()
    {
        return $this->taxExempt;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return InvoiceItems
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
     * Set dateOut
     *
     * @param \DateTime $dateOut
     * @return InvoiceItems
     */
    public function setDateOut($dateOut)
    {
        $this->dateOut = $dateOut;
    
        return $this;
    }

    /**
     * Get dateOut
     *
     * @return \DateTime 
     */
    public function getDateOut()
    {
        return $this->dateOut;
    }

    /**
     * Set dateDue
     *
     * @param \DateTime $dateDue
     * @return InvoiceItems
     */
    public function setDateDue($dateDue)
    {
        $this->dateDue = $dateDue;
    
        return $this;
    }

    /**
     * Get dateDue
     *
     * @return \DateTime 
     */
    public function getDateDue()
    {
        return $this->dateDue;
    }

    /**
     * Set dateReturned
     *
     * @param \DateTime $dateReturned
     * @return InvoiceItems
     */
    public function setDateReturned($dateReturned)
    {
        $this->dateReturned = $dateReturned;
    
        return $this;
    }

    /**
     * Get dateReturned
     *
     * @return \DateTime 
     */
    public function getDateReturned()
    {
        return $this->dateReturned;
    }

    /**
     * Set daysCharged
     *
     * @param float $daysCharged
     * @return InvoiceItems
     */
    public function setDaysCharged($daysCharged)
    {
        $this->daysCharged = $daysCharged;
    
        return $this;
    }

    /**
     * Get daysCharged
     *
     * @return float 
     */
    public function getDaysCharged()
    {
        return $this->daysCharged;
    }

    /**
     * Set invoice
     *
     * @param \Invoices $invoice
     * @return InvoiceItems
     */
    public function setInvoice(\Invoices $invoice)
    {
        $this->invoice = $invoice;
    
        return $this;
    }

    /**
     * Get invoice
     *
     * @return \Invoices 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set inventory
     *
     * @param \Inventory $inventory
     * @return InvoiceItems
     */
    public function setInventory(\Inventory $inventory)
    {
        $this->inventory = $inventory;
    
        return $this;
    }

    /**
     * Get inventory
     *
     * @return \Inventory 
     */
    public function getInventory()
    {
        return $this->inventory;
    }
}
