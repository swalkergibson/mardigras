<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * DepositMethods
 *
 * @Table(name="deposit_methods")
 * @Entity
 */
class DepositMethods
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
     * @OneToMany(targetEntity="Invoices", mappedBy="depositMethod")
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
     * @return DepositMethods
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
     * Set invoices
     *
     * @param Entities\Invoices $invoices
     * @return DepositMethods
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
