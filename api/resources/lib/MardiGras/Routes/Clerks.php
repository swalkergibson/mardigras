<?php
Namespace MardiGras;

	// Get list of clerks
    $app->get('/clerks', function () use ($em, $app) {
        $clerks = new Controllers\Clerks($em);
        $result = $clerks->searchClerks();
        $arr = array();
        foreach ($result as $clerk)
            $arr[] = $clerk->arrayFy(1);
        $app->responseJSON($arr);
    });

    // Get clerk by id
    $app->get('/clerks/:id', function ($id) use ($em, $app) {
        $clerks = new Controllers\Clerks($em);
        $clerk = $clerks->getClerk($id);
        $app->responseJSON($clerk->arrayFy(1));
    });

    // Add a clerk
    $app->post('/clerks', function () use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        // Add clerk
        $clerks = new Controllers\Clerks($em);
        $clerk = $clerks->addClerk(
            $params->clerkGroupId,
            $params->code,
            $params->name,
            $params->password,
            $params->passwordConfirm);
        $app->responseJSON($clerk->arrayFy(1));
    });

    // Update a clerk
    $app->put('/clerks/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $clerks = new Controllers\Clerks($em);
        $clerk = $clerks->updateClerk(
            $id,
            $params->clerkGroupId,
            $params->code,
            $params->name,
            $params->updatePassword,
            $params->password,
            $params->passwordConfirm);
        $app->responseJSON($clerk->arrayFy(1));
    });

    // Delete a clerk
    $app->delete('/clerks/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $clerks = new Controllers\Clerks($em);
        $clerk = $clerks->deleteClerk($id);
        $app->responseJSON($clerk->arrayFy(1));
    });
