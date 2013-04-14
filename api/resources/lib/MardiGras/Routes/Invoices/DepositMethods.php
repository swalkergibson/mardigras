<?php
Namespace MardiGras;

	// DepositMethods index
    $app->get('/invoices/depositmethods', function () use ($em, $app) {
        $controller = new Controllers\Invoices\DepositMethods($em);
        $result = $controller->index();
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Get DepositMethods
    $app->get('/invoices/depositmethods/:id', function ($id) use ($em, $app) {
        $controller = new Controllers\Invoices\DepositMethods($em);
        $result = $controller->get($id);
        $app->responseJSON($result->arrayFy(1));
    });

    // Add DepositMethods
    $app->post('/invoices/depositmethods', function () use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        // Add clerk
        $controller = new Controllers\Invoices\DepositMethods($em);
        $result = $controller->add($params->title);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Update DepositMethods
    $app->put('/invoices/depositmethods/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\Invoices\DepositMethods($em);
        $result = $controller->update($id, $params->title);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Delete DepositMethods
    $app->delete('/invoices/depositmethods/:id', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        $controller = new Controllers\Invoices\DepositMethods($em);
        $result = $controller->delete($id);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });
