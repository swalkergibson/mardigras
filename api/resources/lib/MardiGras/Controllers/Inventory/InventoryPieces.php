<?php
Namespace MardiGras\Controllers\Inventory;

class InventoryPieces extends \MardiGras\Lib\MGControllerClass
{
	private $inventoryID;

	public function __construct($em, $inventoryId)
	{
		$this->inventoryId = $inventoryId;
		parent::__construct($em);
	}

	public function index()
	{
		$dql = 'select p, i from Entities\InventoryPieces p join p.inventory i where i.id = :inventoryId';
		$query = $this->em->createQuery($dql);
		$query->setParameters(array('inventoryId' => $this->inventoryId));
		$result = $query->getResult();

		return $result;
	}

	public function add($title)
	{
		$exists = $this->exists($title);
		if ($exists)
			$this->throwException('custom_error', 'The InventoryPieces title is used by another InventoryPieces');

		$new = new \Entities\InventoryPieces;
		$new->setTitle($title);

		$inventoryCtrl = new \MardiGras\Controllers\Inventory($this->em);
		$inventory = $inventoryCtrl->get($this->inventoryId);
		$new->setInventory($inventory);

		$this->em->persist($new);
		$this->em->flush();

		return $this->index();
	}

	public function update($id, $title)
	{
		$exists = $this->exists($title);
		if ($exists)
			if ($exists->getId() != $id)
				$this->throwException('custom_error', 'The InventoryPieces title is used by another InventoryPieces');

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

	private function get($id)
	{
		$result = $this->em->find('Entities\InventoryPieces', $id);
		if (!$result)
			self::throwException('not_found', 'InventoryPieces');
		else
			return $result;
	}

	private function exists($title)
	{
		$dql = 'select p, i from Entities\InventoryPieces p join p.inventory i where i.id = :inventoryId and p.title = :title';
		$query = $this->em->createQuery($dql);
		$query->setParameters(array('inventoryId' => $this->inventoryId, 'title' => $title));
		$query->setMaxResults(1);
		$result = $query->getResult();

		if ($result)
			return $result[0];
		else
			return false;
	}

}