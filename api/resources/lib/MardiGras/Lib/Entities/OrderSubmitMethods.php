<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OrderSubmitMethods
 *
 * @Table(name="order_submit_methods")
 * @Entity
 */
class OrderSubmitMethods extends \MardiGras\Lib\MyDoctrineEntity
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
     * @Column(name="title", type="string", length=50, nullable=false)
     */
    protected $title;

    /**
     * @OneToMany(targetEntity="Orders", mappedBy="orderSubmitMethod")
    */
    protected  $orders;

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
     * @return OrderSubmitMethods
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
     * Set orders
     *
     * @param Entities\Orders $orders
     * @return OrderSubmitMethods
     */
    public function setOrders(Orders $orders)
    {
        $this->orders = $orders;
    
        return $this;
    }

    /**
     * Get orders
     *
     * @return Entities\Orders 
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
