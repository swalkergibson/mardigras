<?php
Namespace MG;

class ClerkGroups extends \MG\MGControllerClass
{
	public function getClerkGroup($clerkGroupId)
	{
		$clerkGroup = $this->em->find('Entities\ClerkGroups',$clerkGroupId);
		if (!$clerkGroup)
			self::throwException(not_found, 'ClerkGroup');
		else
			return $clerkGroup;
	}
}