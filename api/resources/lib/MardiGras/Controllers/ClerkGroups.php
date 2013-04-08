<?php
Namespace MardiGras\Controllers;

class ClerkGroups extends \MardiGras\Lib\MGControllerClass
{
	public function index()
	{
		$dql = 'select c from Entities\ClerkGroups c';
		$query = $this->em->createQuery($dql);
		$result = $query->getResult();

		return $result;
	}

	public function get($id)
	{
		$result = $this->em->find('Entities\ClerkGroups', $id);
		if (!$result)
			self::throwException('not_found', 'ClerkGroup');
		else
			return $result;
	}

	public function add($title)
	{
		$exists = $this->clerkGroupExists($title);
		if ($exists)
			$this->throwException('custom_error', 'The ClerkGroup title is used by another ClerkGroup');

		$new = new \Entities\ClerkGroups;
		$new->setTitle($title);

		$this->em->persist($new);
		$this->em->flush();

		return $new;
	}

	public function update($id, $title)
	{
		$exists = $this->clerkGroupExists($title);
		if ($exists)
			if ($exists->getId() != $id)
				$this->throwException('custom_error', 'The ClerkGroup title is used by another ClerkGroup');

		$update = $this->get($id);
		$update->setTitle($title);

		$this->em->persist($update);
		$this->em->flush();

		return $updateClerk;
	}

	private function clerkGroupExists($title)
	{
		$dql = 'select c from Entities\ClerkGroups c where c.title = :title';
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
		if (!$id)
			$this->throwException('not_defined', 'id');

		$delete = $this->get($id);

		// TODO
		throw new exception('Cannot create until controllers for dependant resources are made, due to constraints');

		return $delete;
	}
}