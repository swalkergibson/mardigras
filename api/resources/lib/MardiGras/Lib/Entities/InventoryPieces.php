<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * InventoryPieces
 *
 * @Table(name="inventory_pieces")
 * @Entity
 */
class InventoryPieces extends \MardiGras\Lib\MyDoctrineEntity
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
     * @Column(name="title", type="string", length=300, nullable=false)
     */
    protected $title;

    /**
     * @var integer
     *
     * @Column(name="disabled", type="integer", nullable=false)
     */
    protected $disabled;

    /**
     * @var Entities\Inventory
     * @manyToOne(targetEntity="Inventory", inversedBy="inventoryPieces")
     * @JoinColumn(name="inventory_id", referencedColumnName="id")
     */
    protected $inventory;

    /**
     * @OneToMany(targetEntity="InvoiceItemsPieces", mappedBy="inventoryPiece")
    */
    protected  $invoiceItemsPieces;

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
     * @return InventoryPieces
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
     * @return InventoryPieces
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
     * Set inventory
     *
     * @param Entities\Inventory $inventory
     * @return InventoryPieces
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
     * Set invoiceItemsPieces
     *
     * @param Entities\InvoiceItemsPieces $invoiceItemPieces
     * @return InventoryPieces
     */
    public function setInvoiceItems(InvoiceItemsPieces $invoiceItemPieces)
    {
        $this->invoiceItemPieces = $invoiceItemPieces;
    
        return $this;
    }

    /**
     * Get invoiceItemPieces
     *
     * @return Entities\InvoiceItemsPieces
     */
    public function getInvoiceItems()
    {
        return $this->invoiceItemPieces;
    }
}
