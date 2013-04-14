<?php
Namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * ClerkGroupPermissions
 *
 * @Table(name="clerk_group_permissions")
 * @Entity
 */
class ClerkGroupPermissions extends \MardiGras\Lib\MyDoctrineEntity
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
     * @Column(name="slug", type="string", length=45, nullable=true)
     */
    protected $slug;

    /**
     * @var string
     *
     * @Column(name="title", type="string", length=200, nullable=true)
     */
    protected $title;

    /**
     * @OneToMany(targetEntity="ClerkGroupPermissionsAssign", mappedBy="clerkGroupPermission")
    */
    protected $permissionAssignments;

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
     * Set title
     *
     * @param string $title
     * @return ClerkGroupPermissions
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
