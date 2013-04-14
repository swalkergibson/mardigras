<?php
Namespace MardiGras\Controllers;

class ClerkGroupPermissionsAssign extends \MardiGras\Lib\MGControllerClass
{
	private $clerkGroupId;

	public function __construct($clerkGroupId, $em)
	{
		if (!$clerkGroupId)
			$this->throwException('not_defined', 'clerkGroupId');

		// Check if clerk group exists, if not found this will throw an exception
		$clerkGroups = new ClerkGroups($em);
		$clerkGroups->get($clerkGroupId);

		$this->clerkGroupId = $clerkGroupId;
		parent::__construct($em);
	}

	public function index()
	{
		$dql = 'select p from Entities\ClerkGroupPermissionsAssign p join p.clerkGroup c where c.id = :clerkGroupId';
		$query = $this->em->createQuery($dql);
        $query->setParameters(array(
            'clerkGroupId' => $this->clerkGroupId
        ));
		$result = $query->getResult();

		return $result;
	}

	public function add($permissionsId)
	{
		$exists = $this->exists($permissionsId);
		if ($exists)
			$this->throwException('custom_error', 'The ClerkGroup is already assigned to this permission');

		// Get clerk group
		$clerkGroups = new ClerkGroups($this->em);
		$group = $clerkGroups->get($this->clerkGroupId);

		// Get clerk group permission
		$clerkGroupPermissions = new ClerkGroupPermissions($this->em);
		$permission = $clerkGroupPermissions->get($permissionsId);

		$new = new \Entities\ClerkGroupPermissionsAssign;
		$new->setClerkGroup($group);
		$new->setClerkGroupPermission($permission);

		$this->em->persist($new);
		$this->em->flush();

		return $this->index();
	}

	public function delete($id)
	{
		if (!$id)
			$this->throwException('not_defined', 'ClerkGroupPermission ID');

		$delete = $this->get($id);
		if ($delete)
			$this->em->remove($delete);
		$this->em->flush();
		return $this->index();
	}

	private function exists($permissionsId)
	{
		$dql = 'select p from Entities\ClerkGroupPermissionsAssign p join p.clerkGroup c join p.clerkGroupPermission cp where c.id = :clerkGroupId and cp.id = :permissionsId';
		$query = $this->em->createQuery($dql);
		$query->setParameters(array('permissionsId' => $permissionsId, 'clerkGroupId' => $this->clerkGroupId));
		$query->setMaxResults(1);
		$result = $query->getResult();

		if ($result)
			return $result[0];
		else
			return false;
	}

	private function get($id)
	{
		$dql = 'select p from Entities\ClerkGroupPermissionsAssign p join p.clerkGroup c where c.id = :clerkGroupId and p.id = :id';
		$query = $this->em->createQuery($dql);
		$query->setParameters(array('id' => $permissionsAssignId, 'id' => $this->clerkGroupId));
		$query->setMaxResults(1);
		$result = $query->getResult();

		if ($result)
			return $result[0];
		else
			self::throwException('not_found', 'ClerkGroupPermissionsAssign');
	}
}