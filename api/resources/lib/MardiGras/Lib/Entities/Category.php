<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @Table(name="category")
 * @Entity
 */
class Category extends \MardiGras\Lib\MyDoctrineEntity
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
     * @Column(name="title", type="string", length=25, nullable=true)
     */
    protected $title;

    /**
     * @var string
     *
     * @Column(name="slug", type="string", length=7, nullable=true)
     */
    protected $slug;

    /**
     * @OneToMany(targetEntity="Inventory", mappedBy="category")
    */
    protected  $inventoryItems;

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
     * @return Category
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
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set inventoryItems
     *
     * @param Entities\Inventory $inventoryItems
     * @return Category
     */
    public function setInventoryItems(Inventory $inventoryItems)
    {
        $this->inventoryItems = $inventoryItems;
    
        return $this;
    }

    /**
     * Get inventoryItems
     *
     * @return Entities\Inventory
     */
    public function getInventoryItems()
    {
        return $this->inventoryItems;
    }
}
