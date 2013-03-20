<?php



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
     * @param \Inventory $inventory
     * @return InventoryPieces
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
