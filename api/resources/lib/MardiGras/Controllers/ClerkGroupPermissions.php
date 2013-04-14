<?php
Namespace MardiGras\Controllers;

class ClerkGroupPermissions extends \MardiGras\Lib\MGControllerClass
{
	public function index()
	{
		$dql = 'select c from Entities\ClerkGroupPermissions c';
		$query = $this->em->createQuery($dql);
		$result = $query->getResult();

		return $result;
	}

	public function get($id)
	{
		$result = $this->em->find('Entities\ClerkGroupPermissions', $id);
		if (!$result)
			self::throwException('not_found', 'ClerkGroupPermission');
		else
			return $result;
	}

	public function add($title)
	{
		throw new \Exception("Permissions are fixed objects and must be added during development");
		$exists = $this->exists($title);
		if ($exists)
			$this->throwException('custom_error', 'The ClerkGroupPermission title is used by another ClerkGroupPermission');

		$new = new \Entities\ClerkGroupPermissions;
		$new->setTitle($title);

		$this->em->persist($new);
		$this->em->flush();

		return $new;
	}

	public function update($id, $title)
	{
		$exists = $this->exists($title);
		if ($exists)
			if ($exists->getId() != $id)
				$this->throwException('custom_error', 'The ClerkGroupPermission title is used by another ClerkGroupPermission');

		$update = $this->get($id);
		$update->setTitle($title);

		$this->em->persist($update);
		$this->em->flush();

		return $update;
	}

	private function exists($title)
	{
		$dql = 'select c from Entities\ClerkGroupPermissions c where c.title = :title';
		$query = $this->em->createQuery($dql);
		$query->setParameters(array('title' => $title));
		$query->setMaxResults(1);
		$result = $query->getResult();

		if ($result)
			return $result[0];
		else
			return false;
	}

	public function delete($id)
	{
		throw new \Exception('Permission data is needed by the application.');
	}
}