<?php
Namespace MardiGras;

    // Get InventoryPieces
    $app->get('/inventory/:inventoryId/inventorypieces', function ($inventoryId) use ($em, $app) {
        $controller = new Controllers\Inventory\InventoryPieces($em, $inventoryId);
        $result = $controller->index();
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Add InventoryPieces
    $app->post('/inventory/:inventoryId/inventorypieces', function ($inventoryId) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        // Add clerk
        $controller = new Controllers\Inventory\InventoryPieces($em, $inventoryId);
        $result = $controller->add($params->title);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Update InventoryPieces
    $app->put('/inventory/:inventoryId/inventorypieces/:id', function ($inventoryId, $id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\Inventory\InventoryPieces($em, $inventoryId);
        $result = $controller->update($id, $params->title);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Delete InventoryPieces
    $app->delete('/inventory/:inventoryId/inventorypieces/:id', function ($inventoryId, $id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\Inventory\InventoryPieces($em, $inventoryId);
        $result = $controller->delete($id);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });
