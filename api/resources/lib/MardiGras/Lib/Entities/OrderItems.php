<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OrderItems
 *
 * @Table(name="order_items")
 * @Entity
 */
class OrderItems extends \MardiGras\Lib\MyDoctrineEntity
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
     * @var integer
     *
     * @Column(name="quantity_ordered", type="integer", nullable=false)
     */
    protected $quantityOrdered;

    /**
     * @var integer
     *
     * @Column(name="quantity_received", type="integer", nullable=true)
     */
    protected $quantityReceived;

    /**
     * @var float
     *
     * @Column(name="current_cost", type="decimal", nullable=false)
     */
    protected $currentCost;

    /**
     * @var float
     *
     * @Column(name="price", type="decimal", nullable=false)
     */
    protected $price;

    /**
     * @var Entities\Orders
     * @manyToOne(targetEntity="Orders", inversedBy="orderItems")
     * @JoinColumn(name="order_id", referencedColumnName="id")
     */
    protected $order;

    /**
     * @var Entities\Inventory
     * @manyToOne(targetEntity="Inventory", inversedBy="orderItems")
     * @JoinColumn(name="inventory_id", referencedColumnName="id")
     */
    protected $inventory;


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
     * @param Entities\Orders $order
     * @return OrderItems
     */
    public function setOrder(Orders $order)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return Entities\Orders 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set inventory
     *
     * @param Entities\Inventory $inventory
     * @return OrderItems
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
}
