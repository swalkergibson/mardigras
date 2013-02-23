<?php
Namespace Entities;



use Doctrine\ORM\Mapping as ORM;

/**
 * Invoices
 *
 * @Table(name="invoices")
 * @Entity
 */
class Invoices
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
     * @Column(name="transaction_date", type="datetime", nullable=false)
     */
    private $transactionDate;

    /**
     * @var float
     *
     * @Column(name="sale_total", type="decimal", nullable=false)
     */
    private $saleTotal;

    /**
     * @var float
     *
     * @Column(name="tax", type="decimal", nullable=true)
     */
    private $tax;

    /**
     * @var string
     *
     * @Column(name="balance_due", type="string", length=45, nullable=false)
     */
    private $balanceDue;

    /**
     * @var float
     *
     * @Column(name="rent_dep", type="decimal", nullable=true)
     */
    private $rentDep;

    /**
     * @var string
     *
     * @Column(name="deposit_card", type="string", length=40, nullable=true)
     */
    private $depositCard;

    /**
     * @var \DateTime
     *
     * @Column(name="deposit_card_exp", type="datetime", nullable=true)
     */
    private $depositCardExp;

    /**
     * @var \Clerks
     *
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Clerks")
     * @JoinColumns({
     *   @JoinColumn(name="clerk_id", referencedColumnName="id")
     * })
     */
    private $clerk;

    /**
     * @var \InvoiceStatus
     *
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="InvoiceStatus")
     * @JoinColumns({
     *   @JoinColumn(name="invoice_status_id", referencedColumnName="id")
     * })
     */
    private $invoiceStatus;

    /**
     * @var \DepositMethods
     *
     * @ManyToOne(targetEntity="DepositMethods")
     * @JoinColumns({
     *   @JoinColumn(name="deposit_method_id", referencedColumnName="id")
     * })
     */
    private $depositMethod;

    /**
     * @var \Customers
     *
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Customers")
     * @JoinColumns({
     *   @JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;


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
     * @param \Clerks $clerk
     * @return Invoices
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

    /**
     * Set invoiceStatus
     *
     * @param \InvoiceStatus $invoiceStatus
     * @return Invoices
     */
    public function setInvoiceStatus(\InvoiceStatus $invoiceStatus)
    {
        $this->invoiceStatus = $invoiceStatus;
    
        return $this;
    }

    /**
     * Get invoiceStatus
     *
     * @return \InvoiceStatus 
     */
    public function getInvoiceStatus()
    {
        return $this->invoiceStatus;
    }

    /**
     * Set depositMethod
     *
     * @param \DepositMethods $depositMethod
     * @return Invoices
     */
    public function setDepositMethod(\DepositMethods $depositMethod = null)
    {
        $this->depositMethod = $depositMethod;
    
        return $this;
    }

    /**
     * Get depositMethod
     *
     * @return \DepositMethods 
     */
    public function getDepositMethod()
    {
        return $this->depositMethod;
    }

    /**
     * Set customer
     *
     * @param \Customers $customer
     * @return Invoices
     */
    public function setCustomer(\Customers $customer)
    {
        $this->customer = $customer;
    
        return $this;
    }

    /**
     * Get customer
     *
     * @return \Customers 
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}