<?php
Namespace MG;

class Clerks extends \MG\MGControllerClass
{
	private function createSHA1Hash($password, $passwordConfirm)
	{
		// Password check then hash
		if ($password != $passwordConfirm)
			$this->throwException('custom_error', 'Confirmation password does not match the password entered');

		$salt = md5(uniqid(mt_rand(), true));
		$hash = sha1($password . $salt);
		return array ('hash' => $hash, 'salt' => $salt);
	}

	public function addClerk($clerkGroupId, $code, $name, $password, $passwordConfirm)
	{
		if (!$clerkGroupId)
			$this->throwException('not_defined', 'clerkGroupId');

		$exists = $this->clerkExists($code);
		if ($exists)
			$this->throwException('custom_error', 'Clerk code is already in use by another user');

		// Get clerk group
		$clerkGroups = new \MG\ClerkGroups($this->em);
		$group = $clerkGroups->getClerkGroup($clerkGroupId);

		$hash = $this->createSHA1Hash($password, $passwordConfirm);

		$newClerk = new \Entities\Clerks;
		$newClerk->setClerkGroup($group);
		$newClerk->setCode($code);
		$newClerk->setName($name);
		$newClerk->setPasswordHash($hash['hash']);
		$newClerk->setPasswordSalt($hash['salt']);
		$newClerk->setDateCreated(new \DateTime);
		$newClerk->setDeleted(0);

		$this->em->persist($newClerk);
		$this->em->flush();

		return $newClerk;
	}

	public function updateClerk($clerkId, $clerkGroupId, $code, $name, $updatePassword, $password, $passwordConfirm)
	{
		// Do some input checks
		if (!$clerkId)
			$this->throwException('not_defined', 'clerkId');

		if (!$clerkGroupId)
			$this->throwException('not_defined', 'clerkGroupId');

		$exists = $this->clerkExists($code);
		if ($exists)
			if ($exists->getId() != $clerkId)
				$this->throwException('custom_error', 'Clerk code is already in use by another user');

		// Get clerk group
		$clerkGroups = new \MG\ClerkGroups($this->em);
		$group = $clerkGroups->getClerkGroup($clerkGroupId);

		$updateClerk = $this->getClerk($clerkId);
		$updateClerk->setClerkGroup($group);
		$updateClerk->setCode($code);
		$updateClerk->setName($name);

		if ($updatePassword)
		{
			$hash = $this->createSHA1Hash($password, $passwordConfirm);
			$updateClerk->setPasswordHash($hash['hash']);
			$updateClerk->setPasswordSalt($hash['salt']);
		}

		$this->em->persist($updateClerk);
		$this->em->flush();

		return $updateClerk;
	}

	public function getClerk($clerkId)
	{
		$clerk = $this->em->find('Entities\Clerks',$clerkId);
		if (!$clerk)
			$this->throwException('not_found', 'Clerk');
		else
			return $clerk;
	}

	private function clerkExists($clerkCode)
	{
		$dql = 'select c from Entities\Clerks c where c.code = :clerkCode and c.deleted != 1';
		$query = $this->em->createQuery($dql);
		$query->setParameters(array('clerkCode' => $clerkCode));
		$query->setMaxResults(1);
		$result = $query->getResult();

		if ($result)
			return $result[0];
		else
			return false;
	}

	public function DeleteClerk($clerkId)
	{
		if (!$clerkId)
			$this->throwException('not_defined', 'clerkId');

		$deleteClerk = $this->getClerk($clerkId);
		$deleteClerk->setDeleted(1);

		$this->em->persist($deleteClerk);
		$this->em->flush();

		return $deleteClerk;
	}
}