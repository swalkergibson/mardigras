<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * ClerkGroupPermissions
 *
 * @Table(name="clerk_group_permissions")
 * @Entity
 */
class ClerkGroupPermissions
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
     * @Column(name="slug", type="string", length=45, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=200, nullable=true)
     */
    private $name;

    /**
     * @OneToMany(targetEntity="ClerkGroupPermissionsAssign", mappedBy="permissionAssignment")
    */
    private  $permissionAssignments;

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
     * Set slug
     *
     * @param string $slug
     * @return ClerkGroupPermissions
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
     * Set name
     *
     * @param string $name
     * @return ClerkGroupPermissions
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
     * Set permissionAssignments
     *
     * @param Entities\ClerkGroupPermissionsAssign $permissionAssignments
     * @return ClerkGroupPermissions
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
