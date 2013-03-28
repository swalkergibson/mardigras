<?php
Namespace MG;

class Clerks extends \MG\MGControllerClass
{
	public function addClerk($clerkGroupId, $code, $name, $password, $passwordConfirm)
	{
		if (!$clerkGroupId)
			$this->throwException('clerkgroup_undefined');

		// Get clerk group
		$clerkGroups = new \MG\ClerkGroups($this->em);
		$group = $clerkGroups->getClerkGroup($clerkGroupId);

		// Password check then hash
		if ($password != $passwordConfirm)
			self::throwException('custom_error', 'Confirmation password does not match the password entered');
		$salt = md5(uniqid(mt_rand(), true));
		$hash = sha1($password . $salt);

		$newClerk = new \Entities\Clerks;
		$newClerk->setClerkGroup($group);
		$newClerk->setCode($code);
		$newClerk->setName($name);
		$newClerk->setPassword($hash);
		$newClerk->setPasswordSalt($salt);

		$this->em->persist($newSession);
		$this->em->flush();

		return $newClerk;
	}
}