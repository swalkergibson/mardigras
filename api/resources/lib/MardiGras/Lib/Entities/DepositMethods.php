<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * DepositMethods
 *
 * @Table(name="deposit_methods")
 * @Entity
 */
class DepositMethods extends \MardiGras\Lib\MyDoctrineEntity
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
     * @var string
     *
     * @Column(name="title", type="string", length=45, nullable=false)
     */
    protected $title;

    /**
     * @OneToMany(targetEntity="Invoices", mappedBy="depositMethod")
    */
    protected  $invoices;

    /**
     * @var integer
     *
     * @Column(name="disabled", type="integer", nullable=false)
     */
    protected $disabled;

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
     * Set disabled
     *
     * @param integer $disabled
     * @return DepositMethods
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    
        return $this;
    }

    /**
     * Get disabled
     *
     * @return integer 
     */
    public function getDisabled()
    {
        return $this->disabled;
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
