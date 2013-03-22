<?php
// This File just contains test and example slim routes for easy reference
// Route Methods

// Define Routes
    // Show Example options
    $app->get('/examples', function (){
        echo "
        <a href='/".RESTBASE."examples'>Show Examples</a><br/>
        <a href='/".RESTBASE."whoami'>Return ip</a><br/>
        <a href='/".RESTBASE."examples/signin'>Start Oauth2 Auth Flow</a><br/>
        <a href='/".RESTBASE."examples/signinreturn'>returns to this after Oauth2 Auth complete</a><br/>
        ";
    });

    // Return IP
    $app->get('/whoami', function (){
        echo $_SERVER['REMOTE_ADDR'];
    });


    $app->get('/examples/test', function() use ($app,$em){
        $dql = 'SELECT
                    c, g, a, p
                FROM
                    Entities\Clerks c
                join
                    c.clerkGroup g
                join
                    g.permissionAssignments a
                join
                    a.clerkGroupPermission p
                where
                    c.id = :clerkid';
        $query = $em->createQuery($dql);
        $query->setParameters(array(
            'clerkid' => 1
        ));
        $clerks = $query->getResult();
        echo "KahFsckingBoom";
        print_r($clerks);
    });


    // Send user to test Oauth2 Auth Flow
    $app->get('/examples/signin', function () use ($app) {
        $redirect_uri = 'http://localhost:81/api/api/examples/signinreturn';
        $client_id = 'I6Lh72kTItE6y29Ig607N74M7i21oyTo';
        $scope = 'user';
        $state = 'examplestate';
        $app->redirect('/'.RESTBASE.'oauth2/?client_id='.$client_id.'&redirect_uri=' . $redirect_uri . '&response_type=code&scope='.$scope.'&state='.$state);
    });

    // Receive test redirect
    $app->get('/examples/signinreturn', function () use ($app) {
        $request = $app->request();
        $authCode = $request->get('code');
        $state = $request->get('state');

        $service_url = HOSTURL.RESTBASE.'/oauth2/access_token';
        $curl = curl_init($service_url);
        $curl_post_data = array(
            "grant_type" => 'authorization_code',
            "client_id" => 'I6Lh72kTItE6y29Ig607N74M7i21oyTo',
            "client_secret" => 'dswREHV2YJjF7iL5Zr5ETEFBwGwDQYjQ',
            "redirect_uri" => 'http://localhost:81/api/api/examples/signinreturn',
            "code" => $authCode
            );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($curl_response);

        if(isset($response->error))
            print_r($response);
        else
        {
            $_SESSION['Examples']['oauth2'] = $response;
            $app->redirect('/'.RESTBASE.'examples/testclient');
        }
    });

    $app->get('/examples/testclient', function () use ($app) {

        if (!isset($_SESSION['Examples']['oauth2']))
            $app->redirect('/'.RESTBASE.'examples');
        else
            $oauth = $_SESSION['Examples']['oauth2'];

        echo '<form method="post"><input type="textbox" name="requesturl" size="200" value="'.HOSTURL.RESTBASE.'examples/testoauth2resource"/></form>';
    });

    $app->post('/examples/testclient', function () use ($app) {

        if (!isset($_SESSION['Examples']['oauth2']))
            $app->redirect('/'.RESTBASE.'examples');
        else
            $oauth = $_SESSION['Examples']['oauth2'];

        $request = $app->request();
        $requesturl = $request->post('requesturl');


        echo '<form method="post"><input type="textbox" name="requesturl" size="200" value="'.$requesturl.'"/></form>';

        $service_url = $requesturl;
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        echo $curl_response;
    });

    $app->get('/examples/testoauth2resource', function () {
        
    });

    $app->get('/examples/testclient', function () use ($app) {
        
    });

/*
///////////////////
//Doctrine example

$dql = "SELECT a FROM Entities\Clerks a";
try {
    $query = $em->createQuery($dql);
    $query->setMaxResults(30);
    $bugs_qr = $query->getResult();
    print_r($bugs_qr);
} catch (Exception $e) {
    echo $e->getMessage() . '< br />';
}

////////////////////////
//slim routing examples
$app->get('/wines', 'getWines');
$app->get('/wines/:id',  'getWine');
$app->get('/wines/search/:query', 'findByName');
$app->post('/wines', 'addWine');
$app->put('/wines/:id', 'updateWine');
$app->delete('/wines/:id',   'deleteWine');

function getWines() {
    $sql = "select * FROM wine ORDER BY name";
    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"wine": ' . json_encode($wines) . '}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
 
function getWine($id) {
    $sql = "SELECT * FROM wine WHERE id=:id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $wine = $stmt->fetchObject();
        $db = null;
        echo json_encode($wine);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
 
function addWine() {
    $request = Slim::getInstance()->request();
    $wine = json_decode($request->getBody());
    $sql = "INSERT INTO wine (name, grapes, country, region, year, description) VALUES (:name, :grapes, :country, :region, :year, :description)";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("name", $wine->name);
        $stmt->bindParam("grapes", $wine->grapes);
        $stmt->bindParam("country", $wine->country);
        $stmt->bindParam("region", $wine->region);
        $stmt->bindParam("year", $wine->year);
        $stmt->bindParam("description", $wine->description);
        $stmt->execute();
        $wine->id = $db->lastInsertId();
        $db = null;
        echo json_encode($wine);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
 
function updateWine($id) {
    $request = Slim::getInstance()->request();
    $body = $request->getBody();
    $wine = json_decode($body);
    $sql = "UPDATE wine SET name=:name, grapes=:grapes, country=:country, region=:region, year=:year, description=:description WHERE id=:id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("name", $wine->name);
        $stmt->bindParam("grapes", $wine->grapes);
        $stmt->bindParam("country", $wine->country);
        $stmt->bindParam("region", $wine->region);
        $stmt->bindParam("year", $wine->year);
        $stmt->bindParam("description", $wine->description);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $db = null;
        echo json_encode($wine);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
 
function deleteWine($id) {
    $sql = "DELETE FROM wine WHERE id=:id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $db = null;
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
 
function findByName($query) {
    $sql = "SELECT * FROM wine WHERE UPPER(name) LIKE :query ORDER BY name";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $query = "%".$query."%";
        $stmt->bindParam("query", $query);
        $stmt->execute();
        $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"wine": ' . json_encode($wines) . '}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
 
function getConnection() {
    $dbhost="127.0.0.1";
    $dbuser="root";
    $dbpass="";
    $dbname="cellar";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
*/

?>