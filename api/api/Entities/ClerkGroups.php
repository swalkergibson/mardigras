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
     * @OneToMany(targetEntity="Clerks", mappedBy="clerkGroup")
    */
    protected  $clerksInGroup;

    /**
     * @OneToMany(targetEntity="ClerkGroupPermissionsAssign", mappedBy="clerkGroup")
    */
    protected  $permissionAssignments;

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
     * Set clerksInGroup
     *
     * @param Entities\Clerks $clerksInGroup
     * @return ClerkGroups
     */
    public function setClerksInGroup(Clerks $clerksInGroup)
    {
        $this->clerksInGroup = $clerksInGroup;
    
        return $this;
    }

    /**
     * Get clerksInGroup
     *
     * @return Entities\Clerks 
     */
    public function getClerksInGroup()
    {
        return $this->clerksInGroup;
    }

    /**
     * Set permissionAssignments
     *
     * @param Entities\ClerkGroupPermissionsAssign $permissionAssignments
     * @return ClerkGroups
     */
    public function setPermissionAssignments(ClerkGroupPermissionsAssign $permissionAssignments)
    {
        $this->permissionAssignments = $permissionAssignments;
    
        return $this;
    }

    /**
     * Get permissionAssignments
     *
     * @return Entities\ClerkGroupPermissionsAssign 
     */
    public function getPermissionAssignments()
    {
        return $this->permissionAssignments;
    }

}
