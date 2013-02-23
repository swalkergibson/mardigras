<?php
Namespace Entities;



use Doctrine\ORM\Mapping as ORM;

/**
 * Inventory
 *
 * @Table(name="inventory")
 * @Entity
 */
class Inventory
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
     * @Column(name="sku", type="string", length=16, nullable=true)
     */
    private $sku;

    /**
     * @var string
     *
     * @Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @Column(name="qty", type="integer", nullable=false)
     */
    private $qty;

    /**
     * @var float
     *
     * @Column(name="last_cost", type="decimal", nullable=true)
     */
    private $lastCost;

    /**
     * @var float
     *
     * @Column(name="price", type="decimal", nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @Column(name="vendor_stock", type="string", length=50, nullable=true)
     */
    private $vendorStock;

    /**
     * @var integer
     *
     * @Column(name="size_id", type="integer", nullable=true)
     */
    private $sizeId;

    /**
     * @var integer
     *
     * @Column(name="min_qty", type="integer", nullable=true)
     */
    private $minQty;

    /**
     * @var integer
     *
     * @Column(name="do_not_order", type="integer", nullable=true)
     */
    private $doNotOrder;

    /**
     * @var integer
     *
     * @Column(name="online", type="integer", nullable=true)
     */
    private $online;

    /**
     * @var \Vendors
     *
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Vendors")
     * @JoinColumns({
     *   @JoinColumn(name="vendor_id", referencedColumnName="id")
     * })
     */
    private $vendor;

    /**
     * @var \Category
     *
     * @GeneratedValue(strategy="IDENTITY")
     * @OneToOne(targetEntity="Category")
     * @JoinColumns({
     *   @JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;


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
     * Set sku
     *
     * @param string $sku
     * @return Inventory
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    
        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Inventory
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     * @return Inventory
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    
        return $this;
    }

    /**
     * Get qty
     *
     * @return integer 
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set lastCost
     *
     * @param float $lastCost
     * @return Inventory
     */
    public function setLastCost($lastCost)
    {
        $this->lastCost = $lastCost;
    
        return $this;
    }

    /**
     * Get lastCost
     *
     * @return float 
     */
    public function getLastCost()
    {
        return $this->lastCost;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Inventory
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
     * Set vendorStock
     *
     * @param string $vendorStock
     * @return Inventory
     */
    public function setVendorStock($vendorStock)
    {
        $this->vendorStock = $vendorStock;
    
        return $this;
    }

    /**
     * Get vendorStock
     *
     * @return string 
     */
    public function getVendorStock()
    {
        return $this->vendorStock;
    }

    /**
     * Set sizeId
     *
     * @param integer $sizeId
     * @return Inventory
     */
    public function setSizeId($sizeId)
    {
        $this->sizeId = $sizeId;
    
        return $this;
    }

    /**
     * Get sizeId
     *
     * @return integer 
     */
    public function getSizeId()
    {
        return $this->sizeId;
    }

    /**
     * Set minQty
     *
     * @param integer $minQty
     * @return Inventory
     */
    public function setMinQty($minQty)
    {
        $this->minQty = $minQty;
    
        return $this;
    }

    /**
     * Get minQty
     *
     * @return integer 
     */
    public function getMinQty()
    {
        return $this->minQty;
    }

    /**
     * Set doNotOrder
     *
     * @param integer $doNotOrder
     * @return Inventory
     */
    public function setDoNotOrder($doNotOrder)
    {
        $this->doNotOrder = $doNotOrder;
    
        return $this;
    }

    /**
     * Get doNotOrder
     *
     * @return integer 
     */
    public function getDoNotOrder()
    {
        return $this->doNotOrder;
    }

    /**
     * Set online
     *
     * @param integer $online
     * @return Inventory
     */
    public function setOnline($online)
    {
        $this->online = $online;
    
        return $this;
    }

    /**
     * Get online
     *
     * @return integer 
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Set vendor
     *
     * @param \Vendors $vendor
     * @return Inventory
     */
    public function setVendor(\Vendors $vendor)
    {
        $this->vendor = $vendor;
    
        return $this;
    }

    /**
     * Get vendor
     *
     * @return \Vendors 
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Set category
     *
     * @param \Category $category
     * @return Inventory
     */
    public function setCategory(\Category $category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}