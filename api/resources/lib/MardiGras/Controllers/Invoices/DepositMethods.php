<?php
Namespace MardiGras\Controllers\Invoices;
use MardiGras;

class DepositMethods extends \MardiGras\Lib\MGControllerClass
{
	public function index()
	{
		$dql = 'select c from Entities\DepositMethods c where c.disabled != 1';
		$query = $this->em->createQuery($dql);
		$result = $query->getResult();

		return $result;
	}

	public function get($id)
	{
		$result = $this->em->find('Entities\DepositMethods', $id);
		if (!$result)
			self::throwException('not_found', 'DepositMethods');
		else
			return $result;
	}

	public function add($title)
	{
		$exists = $this->exists($title);
		if ($exists)
			$this->throwException('custom_error', 'The DepositMethods title is used by another DepositMethod');

		$new = new \Entities\DepositMethods;
		$new->setTitle($title);
		$new->setDisabled(0);

		$this->em->persist($new);
		$this->em->flush();

		return $this->index();
	}

	public function update($id, $title)
	{
		$exists = $this->exists($title);
		if ($exists)
			if ($exists->getId() != $id)
				$this->throwException('custom_error', 'The DepositMethods title is used by another DepositMethods');

		$update = $this->get($id);
		$update->setTitle($title);

		$this->em->persist($update);
		$this->em->flush();

		return $this->index();
	}

	public function delete($id)
	{
		if (!$id)
			$this->throwException('not_defined', 'id');

		$delete = $this->get($id);
		$delete->setDisabled(1);
		$this->em->persist($delete);
		$this->em->flush();

		return $this->index();
	}

	private function exists($title)
	{
		$dql = 'select c from Entities\DepositMethods c where c.title = :title and c.disabled != 1';
		$query = $this->em->createQuery($dql);
		$query->setParameters(array('title' => $title));
		$query->setMaxResults(1);
		$result = $query->getResult();

		if ($result)
			return $result[0];
		else
			return false;
	}
}