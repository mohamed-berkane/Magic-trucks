<?php

//instanciation d'un nouveu router

use magicTrucks\Controllers\TestModelController;

// $router = variable globale. 
// global $router;

// On instancie un nouveau router
$router = new AltoRouter();

// On détecte la racine du site 

print_r($_SERVER);

$baseURI = str_replace(
    '/index.php',
    '',
    $_SERVER['SCRIPT_NAME']
);

// configuration d'altorouter
$router->setBasePath($baseURI);

$router->map(
    // methode HTTP a surveiller
    'GET',
    // url à matcher
    '/user/home/',

    // fonction qui devra être appelée si la route est validée
    function() {
    //     // instanciation du controller User
    //    $controller = new UserController();

    //    // appel de la méthode home
    //    $controller->home();
    },
    'user-home'
);

//---------- Routes du projet Magic-Trucks ------------------

$router->map(
    'GET',
    '/test/model/getWorkshopsByUserId/',
    function() {
        $controller = new TestModelController();
       $controller->getWorkshopsByUserId();
    },
    'test-model-get-workshops-by-user-id'
);

$router->map(
    'GET',
    '/test/model/update/',
    function() {
        $controller = new TestModelController();
       $controller->update();
    },
    'test-model-update'
);


// nous demandons à altorouter de vérifier s'il y a une route valide
$match = $router->match();

// si une route a été validée
if($match) {
    // récuration de la fonction a executer
    $functionToCall = $match['target'];

    // execution de la fonction
    $functionToCall();
}

