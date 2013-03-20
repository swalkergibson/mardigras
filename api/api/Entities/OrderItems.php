<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OrderItems
 *
 * @Table(name="order_items")
 * @Entity
 */
class OrderItems
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
     * @var integer
     *
     * @Column(name="quantity_ordered", type="integer", nullable=false)
     */
    private $quantityOrdered;

    /**
     * @var integer
     *
     * @Column(name="quantity_received", type="integer", nullable=true)
     */
    private $quantityReceived;

    /**
     * @var float
     *
     * @Column(name="current_cost", type="decimal", nullable=false)
     */
    private $currentCost;

    /**
     * @var float
     *
     * @Column(name="price", type="decimal", nullable=false)
     */
    private $price;

    /**
     * @var \Orders
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Orders")
     * @JoinColumns({
     *   @JoinColumn(name="order_id", referencedColumnName="id")
     * })
     */
    private $order;

    /**
     * @var \Inventory
     *
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Inventory")
     * @JoinColumns({
     *   @JoinColumn(name="inventory_id", referencedColumnName="id")
     * })
     */
    private $inventory;


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
     * Set quantityOrdered
     *
     * @param integer $quantityOrdered
     * @return OrderItems
     */
    public function setQuantityOrdered($quantityOrdered)
    {
        $this->quantityOrdered = $quantityOrdered;
    
        return $this;
    }

    /**
     * Get quantityOrdered
     *
     * @return integer 
     */
    public function getQuantityOrdered()
    {
        return $this->quantityOrdered;
    }

    /**
     * Set quantityReceived
     *
     * @param integer $quantityReceived
     * @return OrderItems
     */
    public function setQuantityReceived($quantityReceived)
    {
        $this->quantityReceived = $quantityReceived;
    
        return $this;
    }

    /**
     * Get quantityReceived
     *
     * @return integer 
     */
    public function getQuantityReceived()
    {
        return $this->quantityReceived;
    }

    /**
     * Set currentCost
     *
     * @param float $currentCost
     * @return OrderItems
     */
    public function setCurrentCost($currentCost)
    {
        $this->currentCost = $currentCost;
    
        return $this;
    }

    /**
     * Get currentCost
     *
     * @return float 
     */
    public function getCurrentCost()
    {
        return $this->currentCost;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return OrderItems
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
     * Set order
     *
     * @param \Orders $order
     * @return OrderItems
     */
    public function setOrder(\Orders $order)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return \Orders 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set inventory
     *
     * @param \Inventory $inventory
     * @return OrderItems
     */
    public function setInventory(\Inventory $inventory)
    {
        $this->inventory = $inventory;
    
        return $this;
    }

    /**
     * Get inventory
     *
     * @return \Inventory 
     */
    public function getInventory()
    {
        return $this->inventory;
    }
}
