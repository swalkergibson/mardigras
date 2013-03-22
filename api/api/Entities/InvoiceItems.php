<?php
Namespace Entities;


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
     * @var float
     *
     * @Column(name="price", type="decimal", nullable=true)
     */
    private $price;

    /**
     * @var float
     *
     * @Column(name="rental_rate", type="decimal", nullable=true)
     */
    private $rentalRate;

    /**
     * @var float
     *
     * @Column(name="discount", type="decimal", nullable=true)
     */
    private $discount;

    /**
     * @var integer
     *
     * @Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var integer
     *
     * @Column(name="tax_exempt", type="integer", nullable=true)
     */
    private $taxExempt;

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
     * @var Entities\Invoices
     * @manyToOne(targetEntity="Invoices", inversedBy="invoiceItems")
     * @JoinColumn(name="invoice_id", referencedColumnName="id")
     */
    private $invoice;

    /**
     * @var Entities\Inventory
     * @manyToOne(targetEntity="Inventory", inversedBy="invoiceItems")
     * @JoinColumn(name="inventory_id", referencedColumnName="id")
     */
    private $inventory;

    /**
     * @OneToMany(targetEntity="InvoiceItemPieces", mappedBy="invoiceItem")
    */
    private  $invoiceItemPieces;

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
     * @param float $rentalRate
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
     * @return float 
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
     * Set quantity
     *
     * @param integer $quantity
     * @return InvoiceItems
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
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
     * @param Entities\Invoices $invoice
     * @return InvoiceItems
     */
    public function setInvoice(Invoices $invoice)
    {
        $this->invoice = $invoice;
    
        return $this;
    }

    /**
     * Get invoice
     *
     * @return Entities\Invoices 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set inventory
     *
     * @param Entities\Inventory $inventory
     * @return InvoiceItems
     */
    public function setInventory(Inventory $inventory)
    {
        $this->inventory = $inventory;
    
        return $this;
    }

    /**
     * Get inventory
     *
     * @return Entities\Inventory 
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Set invoiceItemPieces
     *
     * @param Entities\InvoiceItemsPieces $invoiceItemPieces
     * @return InvoiceItems
     */
    public function setInvoiceItems(InvoiceItemPieces $invoiceItemPieces)
    {
        $this->invoiceItemPieces = $invoiceItemPieces;
    
        return $this;
    }

    /**
     * Get invoiceItemPieces
     *
     * @return Entities\InvoiceItemPieces
     */
    public function getInvoiceItems()
    {
        return $this->invoiceItemPieces;
    }
}
