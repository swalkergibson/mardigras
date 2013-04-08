<?php
Namespace MardiGras;

	// ClerkGroup index
    $app->get('/ClerkGroups', function () use ($em, $app) {
        $controller = new Controllers\ClerkGroups($em);
        $result = $controller->index();
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(1);
        $app->responseJSON($arr);
    });

    // Get ClerkGroup
    $app->get('/ClerkGroups/:id', function ($id) use ($em, $app) {
        $controller = new Controllers\ClerkGroups($em);
        $result = $controller->get($id);
        $app->responseJSON($result->arrayFy(1));
    });

    // Add ClerkGroup
    $app->post('/ClerkGroups', function () use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        // Add clerk
        $controller = new Controllers\ClerkGroups($em);
        $result = $controller->add($params->title);
        $app->responseJSON($result->arrayFy(1));
    });

    // Update ClerkGroup
    $app->put('/ClerkGroups/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\ClerkGroups($em);
        $result = $controller->update($id, $params->title);
        $app->responseJSON($result->arrayFy(1));
    });

    // Delete ClerkGroup
    $app->delete('/ClerkGroups/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\ClerkGroups($em);
        $result = $controller->delete($id);
        $app->responseJSON($clerkGroup->arrayFy(1));
    });
