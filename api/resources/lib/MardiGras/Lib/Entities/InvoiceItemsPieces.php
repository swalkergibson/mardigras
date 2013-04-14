<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceItemsPieces
 *
 * @Table(name="invoice_items_pieces")
 * @Entity
 */
class InvoiceItemsPieces extends \MardiGras\Lib\MyDoctrineEntity
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
     * @var Entities\InvoiceItems
     * @manyToOne(targetEntity="InvoiceItems", inversedBy="invoiceItemPieces")
     * @JoinColumn(name="invoice_items_id", referencedColumnName="id")
     */
    protected $invoiceItem;

    /**
     * @var Entities\InventoryPieces
     * @manyToOne(targetEntity="InventoryPieces", inversedBy="invoiceItemPieces")
     * @JoinColumn(name="inventory_pieces_id", referencedColumnName="id")
     */
    protected $inventoryPiece;


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
     * Set invoiceItem
     *
     * @param Entities\InvoiceItems $invoiceItem
     * @return InvoiceItemsPieces
     */
    public function setInvoiceItem(InvoiceItems $invoiceItem)
    {
        $this->invoiceItem = $invoiceItem;
    
        return $this;
    }

    /**
     * Get invoiceItem
     *
     * @return Entities\InvoiceItems 
     */
    public function getInvoiceItem()
    {
        return $this->invoiceItem;
    }

    /**
     * Set inventoryPiece
     *
     * @param Entities\InventoryPieces $inventoryPiece
     * @return InvoiceItemsPieces
     */
    public function setInventoryPiece(InventoryPieces $inventoryPiece)
    {
        $this->inventoryPiece = $inventoryPiece;
    
        return $this;
    }

    /**
     * Get inventoryPiece
     *
     * @return Entities\InventoryPieces 
     */
    public function getInventoryPiece()
    {
        return $this->inventoryPiece;
    }
}
