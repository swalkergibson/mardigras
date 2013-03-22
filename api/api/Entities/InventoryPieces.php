<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * InventoryPieces
 *
 * @Table(name="inventory_pieces")
 * @Entity
 */
class InventoryPieces
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
     * @Column(name="name", type="string", length=300, nullable=false)
     */
    private $name;


    /**
     * @var Entities\Inventory
     * @manyToOne(targetEntity="Inventory", inversedBy="inventoryPieces")
     * @JoinColumn(name="inventory_id", referencedColumnName="id")
     */
    private $inventory;

    /**
     * @OneToMany(targetEntity="InvoiceItemsPieces", mappedBy="inventoryPiece")
    */
    private  $invoiceItemsPieces;

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
     * Set name
     *
     * @param string $name
     * @return InventoryPieces
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
