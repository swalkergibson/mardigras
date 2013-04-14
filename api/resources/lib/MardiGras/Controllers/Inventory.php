<?php
Namespace MardiGras\Controllers;

class Inventory extends \MardiGras\Lib\MGControllerClass
{
    public function get($id)
    {
        $result = $this->em->find('Entities\Inventory', $id);
        if (!$result)
            self::throwException('not_found', 'Inventory');
        else
            return $result;
    }

}