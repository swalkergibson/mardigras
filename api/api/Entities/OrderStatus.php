<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * OrderStatus
 *
 * @Table(name="order_status")
 * @Entity
 */
class OrderStatus
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
     * @Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @Column(name="complete", type="integer", nullable=false)
     */
    private $complete;

    /**
     * @OneToMany(targetEntity="Orders", mappedBy="orderStatus")
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
     * @return OrderStatus
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
     * Set complete
     *
     * @param integer $complete
     * @return OrderStatus
     */
    public function setComplete($complete)
    {
        $this->complete = $complete;
    
        return $this;
    }

    /**
     * Get complete
     *
     * @return integer 
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * Set orders
     *
     * @param Entities\Orders $orders
     * @return OrderStatus
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
