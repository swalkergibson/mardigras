<?php
Namespace MardiGras;

	// GroupTypes index
    $app->get('/groups/grouptypes', function () use ($em, $app) {
        $controller = new Controllers\Groups\GroupTypes($em);
        $result = $controller->index();
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Get GroupTypes
    $app->get('/groups/grouptypes/:id', function ($id) use ($em, $app) {
        $controller = new Controllers\Groups\GroupTypes($em);
        $result = $controller->get($id);
        $app->responseJSON($result->arrayFy(1));
    });

    // Add GroupTypes
    $app->post('/groups/grouptypes', function () use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        // Add clerk
        $controller = new Controllers\Groups\GroupTypes($em);
        $result = $controller->add($params->title);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Update GroupTypes
    $app->put('/groups/grouptypes/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\Groups\GroupTypes($em);
        $result = $controller->update($id, $params->title);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Delete GroupTypes
    $app->delete('/groups/grouptypes/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\Groups\GroupTypes($em);
        $result = $controller->delete($id);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });
