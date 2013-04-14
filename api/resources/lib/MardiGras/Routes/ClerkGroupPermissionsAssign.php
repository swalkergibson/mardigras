<?php
Namespace MardiGras;

	// ClerkGroupPermissionsAssign index
    $app->get('/clerkgroups/:id/clerkgroupspermissionsassign', function ($id) use ($em, $app) {
        $controller = new Controllers\ClerkGroupPermissionsAssign($id, $em);
        $result = $controller->index();
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Add ClerkGroupPermissionsAssign
    $app->post('/clerkgroups/:id/clerkgroupspermissionsassign', function ($id) use ($em, $app) {
        // Get Json from request body
        $params = $app->getRequestJSON();

        // Add clerk
        $controller = new Controllers\ClerkGroupPermissionsAssign($id, $em);
        $result = $controller->add($params->id);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });

    // Delete ClerkGroupPermissionsAssign
    $app->delete('/clerkgroups/:id/clerkgroupspermissionsassign/:id2', function ($id, $id2) use ($em, $app) {
        $controller = new Controllers\ClerkGroupPermissionsAssign($id, $em);
        $result = $controller->delete($id2);
        $arr = array();
        foreach ($result as $item)
            $arr[] = $item->arrayFy(0);
        $app->responseJSON($arr);
    });
