<?php

//instanciation d'un nouveu router

// use OProfile\Controllers\TestModelController;
// use OProfile\Controllers\UserController;
// use OProfile\Models\CoreModel;

// $router = variable globale. 
global $router;

$router = new AltoRouter();

// Calcul du base URI, altorouter en a besoin pour fonctionner
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




// nous demandons à altorouter de vérifier s'il y a une route valide
$match = $router->match();

// si une route a été validée
if($match) {
    // récuration de la fonction a executer
    $functionToCall = $match['target'];

    // execution de la fonction
    $functionToCall();
}

