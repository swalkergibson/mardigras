<?php

// Initiate the Request handler
$request = new \OAuth2\Util\Request();


// Enable support for the authorization code grant
$oauth->auth->addGrantType(new \OAuth2\Grant\AuthCode());


/* Define our Oauth2 RESTful routes */

// Clients will redirect to this address
$app->get('/oauth2/', function () use ($oauth, $app) {

	// Tell the auth server to check the required parameters are in the query string
	$params = $oauth->auth->checkAuthoriseParams();

	// Save the verified parameters to the user's session
	$_SESSION['params'] = serialize($params);

	// Redirect the user to sign-in
	$app->redirect('signin');

});


// Display sign in form
$app->get('/oauth2/signin', function () {

	// Check the authorization params are set
	if ( ! isset($_SESSION['params']))
	{
		throw new Exception('Missing auth parameters');
	}

	// Get the params from the session
	$params = unserialize($_SESSION['params']);
	?>

	<form method="post">
		<h1>Sign in to <?php echo $params['client_details']['name']; ?></h1>

		<p>
			<label for="username">Username: </label>
			<input type="text" name="username" id="password" value="alex">
		</p>
		<p>
			<label for="password">Password: </label>
			<input type="password" name="password" id="password" value="password">
		</p>
		<p>
			<input type="submit" name="submit" id="submit" value="Sign in">
		</p>
	</form>

	<?php

});


// Process sign-in form submission
$app->post('/oauth2/signin', function () use ($app) {

	// Check the auth params are in the session
	if ( ! isset($_SESSION['params']))
	{
		throw new Exception('Missing auth parameters');
	}

	$params = unserialize($_SESSION['params']);

	// Check the user's credentials
	if ($_POST['username'] === 'alex' && $_POST['password'] === 'password')
	{
		// Add the user ID to the auth params and forward the user to authorise the client
		$params['user_id'] = 1;
		$_SESSION['params'] = serialize($params);
		$app->redirect('authorise');
	}

	// Wrong username/password
	else
	{
		$app->redirect('signin');
	}

});



// The user authorises the app
$app->get('/oauth2/authorise', function () use ($app) {

	// Check the auth params are in the session
	if ( ! isset($_SESSION['params']))
	{
		throw new Exception('Missing auth parameters');
	}

	$params = unserialize($_SESSION['params']);

	// Check the user is signed in
	if ( ! isset($params['user_id']))
	{
		$app->redirect('signin');
	}
	?>

	<h1>Authorise <?php echo $params['client_details']['name']; ?></h1>

	<p>
		The application <strong><?php echo $params['client_details']['name']; ?></strong> would like permission to access your:
	</p>

	<ul>
		<?php foreach ($params['scopes'] as $scope): ?>
			<li>
				<?php echo $scope['name']; ?>
			</li>
		<?php endforeach; ?>
	</ul>

	<p>
		<form method="post" style="display:inline">
			<input type="submit" name="approve" id="approve" value="Approve">
		</form>

		<form method="post" style="display:inline">
			<input type="submit" name="deny" id="deny" value="Deny">
		</form>
	</p>

	<?php
});



// Process authorise form
$app->post('/oauth2/authorise', function() use ($oauth, $app) {
	$auth = $oauth->auth;
	
	// Check the auth params are in the session
	if ( ! isset($_SESSION['params']))
	{
		throw new Exception('Missing auth parameters');
	}

	$params = unserialize($_SESSION['params']);

	// Check the user is signed in
	if ( ! isset($params['user_id']))
	{
		$app->redirect('signin');
	}

	// If the user approves the client then generate an authoriztion code
	if (isset($_POST['approve']))
	{
		$authCode = $oauth->auth->newAuthoriseRequest('user', $params['user_id'], $params);

		// Generate the redirect URI
		$redirectUri = OAuth2\Util\RedirectUri::make($params['redirect_uri'], array(
			'code' => $authCode,
			'state'	=> $params['state']
		));
		$app->redirect($redirectUri);
	}

	// The user denied the request so send them back to the client with an error
	elseif (isset($_POST['deny']))
	{
		$redirectUri = OAuth2\Util\RedirectUri::make($params['redirect_uri'], array(
			'error' => 'access_denied',
			'error_message' => $auth::getExceptionMessage('access_denied'),
			'state'	=> $params['state']
		));
		$app->redirect($redirectUri);
	}

});



// The client will exchange the authorization code for an access token
$app->post('/oauth2/access_token', function() use ($oauth) {

	header('Content-type: application/javascript');

	try {

		// Issue an access token
		$p = $oauth->auth->issueAccessToken();
		echo json_encode($p);

	}

	catch (Exception $e)
	{
		// Show an error message
		echo json_encode(array('error' => $e->getMessage(), 'error_code' => $e->getCode()));
	}

});
