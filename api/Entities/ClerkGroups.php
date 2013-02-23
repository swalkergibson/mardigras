<?php
Namespace Entities;



use Doctrine\ORM\Mapping as ORM;

/**
 * ClerkGroups
 *
 * @Table(name="clerk_groups")
 * @Entity
 */
class ClerkGroups
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
     * @Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @OneToMany(targetEntity="Clerks", mappedBy="ClerkGroup")
    */
    protected  $myClerks;

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
     * @return ClerkGroups
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
     * Set myClerks
     *
     * @param Entities\Clerks $myClerks
     * @return Clerks
     */
    public function setmyClerks(ClerkGroups $myClerks)
    {
        $this->myClerks = $myClerks;
    
        return $this;
    }

    /**
     * Get myClerks
     *
     * @return Entities\Clerks 
     */
    public function getmyClerks()
    {
        return $this->myClerks;
    }

}