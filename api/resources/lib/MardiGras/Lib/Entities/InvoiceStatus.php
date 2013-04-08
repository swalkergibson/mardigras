<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceStatus
 *
 * @Table(name="invoice_status")
 * @Entity
 */
class InvoiceStatus
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
     * @Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @Column(name="closed", type="integer", nullable=false)
     */
    private $closed;

    /**
     * @OneToMany(targetEntity="Invoices", mappedBy="invoiceStatus")
    */
    private  $invoices;

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
     * Set title
     *
     * @param string $title
     * @return InvoiceStatus
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set closed
     *
     * @param integer $closed
     * @return InvoiceStatus
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    
        return $this;
    }

    /**
     * Get closed
     *
     * @return integer 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set invoices
     *
     * @param Entities\Invoices $invoices
     * @return InvoiceStatus
     */
    public function setInvoices(Invoices $invoices)
    {
        $this->invoices = $invoices;
    
        return $this;
    }

    /**
     * Get invoices
     *
     * @return Entities\Invoices
     */
    public function getInvoices()
    {
        return $this->invoices;
    }
}
