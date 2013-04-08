<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * GroupTypes
 *
 * @Table(name="group_types")
 * @Entity
 */
class GroupTypes
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
     * @Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @OneToMany(targetEntity="Groups", mappedBy="groupType")
    */
    private  $groups;

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
     * @return GroupTypes
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
     * Set groups
     *
     * @param Entities\Groups $groups
     * @return GroupTypes
     */
    public function setGroups(Groups $groups)
    {
        $this->groups = $groups;
    
        return $this;
    }

    /**
     * Get groups
     *
     * @return Entities\Groups
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
