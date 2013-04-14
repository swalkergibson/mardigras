<?php
Namespace MardiGras;

	// OrderStatus index
    $app->get('/orderstatus', function () use ($em, $app) {
        $controller = new Controllers\ClerkGroups($em);
        $result = $controller->index();
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Add OrderStatus
    $app->post('/orderstatus', function () use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        // Add clerk
        $controller = new Controllers\ClerkGroups($em);
        $result = $controller->add($params->title, $params->complete, $params->);
        $app->responseJSON($result->arrayFy(1));
    });

    // Update OrderStatus
    $app->put('/orderstatus/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\ClerkGroups($em);
        $result = $controller->update($id, $params->title);
        $app->responseJSON($result->arrayFy(1));
    });