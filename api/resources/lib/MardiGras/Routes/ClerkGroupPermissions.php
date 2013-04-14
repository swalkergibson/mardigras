<?php
Namespace MardiGras;

	// ClerkGroupPermissions index
    $app->get('/clerkgrouppermissions', function () use ($em, $app) {
        $controller = new Controllers\ClerkGroupPermissions($em);
        $result = $controller->index();
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Get ClerkGroupPermissions
    $app->get('/clerkgrouppermissions/:id', function ($id) use ($em, $app) {
        $controller = new Controllers\ClerkGroupPermissions($em);
        $result = $controller->get($id);
        $app->responseJSON($result->arrayFy(1));
    });

    // Update ClerkGroupPermissions
    $app->put('/clerkgrouppermissions/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\ClerkGroupPermissions($em);
        $result = $controller->update($id, $params->title);
        $app->responseJSON($result->arrayFy(1));
    });
