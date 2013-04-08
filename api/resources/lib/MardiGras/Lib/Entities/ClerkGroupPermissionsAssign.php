<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * ClerkGroupPermissionsAssign
 *
 * @Table(name="clerk_group_permissions_assign")
 * @Entity
 */
class ClerkGroupPermissionsAssign
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
     * @var integer
     *
     * @Column(name="allow", type="integer", nullable=true)
     */
    private $allow;

    /**
     * @var integer
     *
     * @Column(name="deny", type="integer", nullable=true)
     */
    private $deny;

    /**
     * @var Entities\ClerkGroups
     * @manyToOne(targetEntity="ClerkGroups", inversedBy="permissionAssignments")
     * @JoinColumn(name="clerk_group_id", referencedColumnName="id")
     */
    private $clerkGroup;

    /**
     * @var Entities\ClerkGroupPermissions
     * @manyToOne(targetEntity="ClerkGroupPermissions", inversedBy="permissionAssignments")
     * @JoinColumn(name="clerk_group_permissions_id", referencedColumnName="id")
     */
    private $clerkGroupPermission;


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
     * Set allow
     *
     * @param integer $allow
     * @return ClerkGroupPermissionsAssign
     */
    public function setAllow($allow)
    {
        $this->allow = $allow;
    
        return $this;
    }

    /**
     * Get allow
     *
     * @return integer 
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * Set deny
     *
     * @param integer $deny
     * @return ClerkGroupPermissionsAssign
     */
    public function setDeny($deny)
    {
        $this->deny = $deny;
    
        return $this;
    }

    /**
     * Get deny
     *
     * @return integer 
     */
    public function getDeny()
    {
        return $this->deny;
    }

    /**
     * Set clerkGroup
     *
     * @param Entities\ClerkGroups $clerkGroup
     * @return ClerkGroupPermissionsAssign
     */
    public function setClerkGroup(ClerkGroups $clerkGroup)
    {
        $this->clerkGroup = $clerkGroup;
    
        return $this;
    }

    /**
     * Get clerkGroup
     *
     * @return Entities\ClerkGroups 
     */
    public function getClerkGroup()
    {
        return $this->clerkGroup;
    }

    /**
     * Set clerkGroupPermission
     *
     * @param Entities\ClerkGroupPermissions $clerkGroupPermission
     * @return ClerkGroupPermissionsAssign
     */
    public function setClerkGroupPermission(ClerkGroupPermissions $clerkGroupPermission)
    {
        $this->clerkGroupPermission = $clerkGroupPermission;
    
        return $this;
    }

    /**
     * Get clerkGroupPermission
     *
     * @return Entities\ClerkGroupPermission 
     */
    public function getClerkGroupPermission()
    {
        return $this->clerkGroupPermission;
    }
}
