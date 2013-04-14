<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Invoices
 *
 * @Table(name="invoices")
 * @Entity
 */
class Invoices extends \MardiGras\Lib\MyDoctrineEntity
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @Column(name="transaction_date", type="datetime", nullable=false)
     */
    protected $transactionDate;

    /**
     * @var float
     *
     * @Column(name="sale_total", type="decimal", nullable=false)
     */
    protected $saleTotal;

    /**
     * @var float
     *
     * @Column(name="tax", type="decimal", nullable=true)
     */
    protected $tax;

    /**
     * @var string
     *
     * @Column(name="balance_due", type="string", length=45, nullable=false)
     */
    protected $balanceDue;

    /**
     * @var float
     *
     * @Column(name="rent_dep", type="decimal", nullable=true)
     */
    protected $rentDep;

    /**
     * @var string
     *
     * @Column(name="deposit_card", type="string", length=40, nullable=true)
     */
    protected $depositCard;

    /**
     * @var \DateTime
     *
     * @Column(name="deposit_card_exp", type="datetime", nullable=true)
     */
    protected $depositCardExp;

    /**
     * @var Entities\Clerks
     * @manyToOne(targetEntity="Clerks", inversedBy="invoices")
     * @JoinColumn(name="clerk_id", referencedColumnName="id")
     */
    protected $clerk;

    /**
     * @var Entities\InvoiceStatus
     * @manyToOne(targetEntity="InvoiceStatus", inversedBy="invoices")
     * @JoinColumn(name="invoice_status_id", referencedColumnName="id")
     */
    protected $invoiceStatus;

    /**
     * @var Entities\DepositMethods
     * @manyToOne(targetEntity="DepositMethods", inversedBy="invoices")
     * @JoinColumn(name="deposit_method_id", referencedColumnName="id")
     */
    protected $depositMethod;

    /**
     * @var Entities\Customers
     * @manyToOne(targetEntity="Customers", inversedBy="invoices")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @OneToMany(targetEntity="InvoiceItems", mappedBy="invoice")
    */
    protected  $invoiceItems;

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
     * Set transactionDate
     *
     * @param \DateTime $transactionDate
     * @return Invoices
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    
        return $this;
    }

    /**
     * Get transactionDate
     *
     * @return \DateTime 
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * Set saleTotal
     *
     * @param float $saleTotal
     * @return Invoices
     */
    public function setSaleTotal($saleTotal)
    {
        $this->saleTotal = $saleTotal;
    
        return $this;
    }

    /**
     * Get saleTotal
     *
     * @return float 
     */
    public function getSaleTotal()
    {
        return $this->saleTotal;
    }

    /**
     * Set tax
     *
     * @param float $tax
     * @return Invoices
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    
        return $this;
    }

    /**
     * Get tax
     *
     * @return float 
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set balanceDue
     *
     * @param string $balanceDue
     * @return Invoices
     */
    public function setBalanceDue($balanceDue)
    {
        $this->balanceDue = $balanceDue;
    
        return $this;
    }

    /**
     * Get balanceDue
     *
     * @return string 
     */
    public function getBalanceDue()
    {
        return $this->balanceDue;
    }

    /**
     * Set rentDep
     *
     * @param float $rentDep
     * @return Invoices
     */
    public function setRentDep($rentDep)
    {
        $this->rentDep = $rentDep;
    
        return $this;
    }

    /**
     * Get rentDep
     *
     * @return float 
     */
    public function getRentDep()
    {
        return $this->rentDep;
    }

    /**
     * Set depositCard
     *
     * @param string $depositCard
     * @return Invoices
     */
    public function setDepositCard($depositCard)
    {
        $this->depositCard = $depositCard;
    
        return $this;
    }

    /**
     * Get depositCard
     *
     * @return string 
     */
    public function getDepositCard()
    {
        return $this->depositCard;
    }

    /**
     * Set depositCardExp
     *
     * @param \DateTime $depositCardExp
     * @return Invoices
     */
    public function setDepositCardExp($depositCardExp)
    {
        $this->depositCardExp = $depositCardExp;
    
        return $this;
    }

    /**
     * Get depositCardExp
     *
     * @return \DateTime 
     */
    public function getDepositCardExp()
    {
        return $this->depositCardExp;
    }

    /**
     * Set clerk
     *
     * @param Entities\Clerks $clerk
     * @return Invoices
     */
    public function setClerk(Clerks $clerk)
    {
        $this->clerk = $clerk;
    
        return $this;
    }

    /**
     * Get clerk
     *
     * @return Entities\Clerks 
     */
    public function getClerk()
    {
        return $this->clerk;
    }

    /**
     * Set invoiceStatus
     *
     * @param Entities\InvoiceStatus $invoiceStatus
     * @return Invoices
     */
    public function setInvoiceStatus(InvoiceStatus $invoiceStatus)
    {
        $this->invoiceStatus = $invoiceStatus;
    
        return $this;
    }

    /**
     * Get invoiceStatus
     *
     * @return Entities\InvoiceStatus 
     */
    public function getInvoiceStatus()
    {
        return $this->invoiceStatus;
    }

    /**
     * Set depositMethod
     *
     * @param Entities\DepositMethods $depositMethod
     * @return Invoices
     */
    public function setDepositMethod(DepositMethods $depositMethod = null)
    {
        $this->depositMethod = $depositMethod;
    
        return $this;
    }

    /**
     * Get depositMethod
     *
     * @return Entities\DepositMethods 
     */
    public function getDepositMethod()
    {
        return $this->depositMethod;
    }

    /**
     * Set customer
     *
     * @param Entities\Customers $customer
     * @return Invoices
     */
    public function setCustomer(Customers $customer)
    {
        $this->customer = $customer;
    
        return $this;
    }

    /**
     * Get customer
     *
     * @return Entities\Customers 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set invoiceItems
     *
     * @param Entities\InvoiceItems $invoiceItems
     * @return Invoices
     */
    public function setInvoiceItems(InvoiceItems $invoiceItems)
    {
        $this->invoiceItems = $invoiceItems;
    
        return $this;
    }

    /**
     * Get invoiceItems
     *
     * @return Entities\InvoiceItems
     */
    public function getInvoiceItems()
    {
        return $this->invoiceItems;
    }
}
