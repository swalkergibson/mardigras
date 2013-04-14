<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * GroupTypes
 *
 * @Table(name="group_types")
 * @Entity
 */
class GroupTypes extends \MardiGras\Lib\MyDoctrineEntity
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
     * @Column(name="title", type="string", length=150, nullable=false)
     */
    protected $title;

    /**
     * @var integer
     *
     * @Column(name="disabled", type="integer", nullable=false)
     */
    protected $disabled;

    /**
     * @OneToMany(targetEntity="Groups", mappedBy="groupType")
    */
    protected  $groups;

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
     * @return GroupTypes
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
     * Set disabled
     *
     * @param integer $disabled
     * @return GroupTypes
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    
        return $this;
    }

    /**
     * Get disabled
     *
     * @return integer 
     */
    public function getDisabled()
    {
        return $this->disabled;
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
