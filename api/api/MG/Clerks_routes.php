<?php

	// Get list of clerks
    $app->get('/clerks', function () {

    });

    // Get clerk by id
    $app->get('/clerks/:id', function () {
        
    });

    // Add a clerk
    $app->post('/clerks', function () use ($em, $app) {
        // Get Json from request body
        $request = $app->request();
        $clerk = json_decode($request->getBody());

        $clerks = new \MG\Clerks($em);
        $clerks->addClerk($clerk->clerkGroupId, $clerk->code, $clerk->name, $clerk->password,
            $clerk->passwordConfirm);
    });

    // Update a clerk
    $app->put('/clerks', function () use ($em, $app) {
        // Get Json from request body
        $request = $app->request();
        $clerk = json_decode($request->getBody());

        $clerks = new \MG\Clerks($em);
        $clerks->updateClerk(
            $clerk->clerkId,
            $clerk->clerkGroupId,
            $clerk->code,
            $clerk->name,
            $clerk->updatePassword,
            $clerk->password,
            $clerk->passwordConfirm);
    });

    // Delete a clerk
    $app->delete('/clerks', function () use ($em, $app) {
        // Get Json from request body
        $request = $app->request();
        $clerk = json_decode($request->getBody());

        $clerks = new \MG\Clerks($em);
        $clerks->deleteClerk($clerk->clerkId);
    });
