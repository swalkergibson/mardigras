<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceItemsPieces
 *
 * @Table(name="invoice_items_pieces")
 * @Entity
 */
class InvoiceItemsPieces
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
     * @var \InvoiceItems
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="InvoiceItems")
     * @JoinColumns({
     *   @JoinColumn(name="invoice_items_id", referencedColumnName="id")
     * })
     */
    private $invoiceItems;

    /**
     * @var \InventoryPieces
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="InventoryPieces")
     * @JoinColumns({
     *   @JoinColumn(name="inventory_pieces_id", referencedColumnName="id")
     * })
     */
    private $inventoryPieces;


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
     * Set invoiceItems
     *
     * @param \InvoiceItems $invoiceItems
     * @return InvoiceItemsPieces
     */
    public function setInvoiceItems(\InvoiceItems $invoiceItems)
    {
        $this->invoiceItems = $invoiceItems;
    
        return $this;
    }

    /**
     * Get invoiceItems
     *
     * @return \InvoiceItems 
     */
    public function getInvoiceItems()
    {
        return $this->invoiceItems;
    }

    /**
     * Set inventoryPieces
     *
     * @param \InventoryPieces $inventoryPieces
     * @return InvoiceItemsPieces
     */
    public function setInventoryPieces(\InventoryPieces $inventoryPieces)
    {
        $this->inventoryPieces = $inventoryPieces;
    
        return $this;
    }

    /**
     * Get inventoryPieces
     *
     * @return \InventoryPieces 
     */
    public function getInventoryPieces()
    {
        return $this->inventoryPieces;
    }
}
