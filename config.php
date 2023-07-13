<?php 

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Google\Cloud\Firestore\FirestoreClient;
$factory = (new Factory)    
    ->withServiceAccount('plant-329fc-firebase-adminsdk-u1xtz-14de828fc9.json')
    ->withDatabaseUri('https://plant-329fc-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
$auth = $factory->createAuth();
$dbURL = "https://trying-plantera-default-rtdb.firebaseio.com";


// function setup_client_create(string $projectId = 'plant-329fc')
// {
//     // Create the Cloud Firestore client
//     if (empty($projectId)) {
//         // The `projectId` parameter is optional and represents which project the
//         // client will act on behalf of. If not supplied, the client falls back to
//         // the default project inferred from the environment.
//         $firestore = new FirestoreClient();
//         printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);
//     } else {
//         $firestore = new FirestoreClient([
//             'projectId' => $projectId,
//         ]);
//         printf('Created Cloud Firestore client with project ID: %s' . PHP_EOL, $projectId);
//     }
// }



