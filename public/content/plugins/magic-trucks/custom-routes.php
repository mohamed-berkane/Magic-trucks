<?php

//instanciation d'un nouveu router

use magicTrucks\Controllers\TestModelController;
use magicTrucks\Controllers\UserController;

// $router = variable globale. 
// global $router;

// On instancie un nouveau router
$router = new AltoRouter();

// On configure la racine du site en allant chercher l'accueil du site et en retirant l'index
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

    function() {

        //echo __LINE__; exit();

        // On instancie le controller User
        $controller = new UserController();

        // On appelle la méthode home
        $controller->home();
    },

    // Id de la route
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
    '/user/register/[i:id]/',
    function($id) {
        $controller = new UserController();
       $controller->register($id);
    },
    'user-register'
);

$router->map(
    'POST',
    '/user/register/[i:id]/',
    function($id) {
        $controller = new UserController();
       $controller->insert($id);
    },
    'user-insert'
);

// $router->map(
//     'GET',
//     '/user/insert/[i:id]/',
//     function($id) {
//         $controller = new UserController();
//        $controller->insert($id);
//     },
//     'user-insert'
// );

$router->map(
    'GET',
    '/test/model/update/',
    function() {
        $controller = new TestModelController();
       $controller->update();
    },
    'test-model-update'
);

$router->map(
    'GET',
    '/test/model/delete/',
    function() {
        $controller = new TestModelController();
       $controller->delete();
    },
    'test-model-delete'
);

// nous demandons à altorouter de vérifier s'il y a une route valide
$match = $router->match();

// si une route a été validée
if($match) {
    // récuration de la fonction a executer
    $functionToCall = $match['target'];
    // execution de la fonction
    // $functionToCall();

    call_user_func_array( $functionToCall, $match['params'] );

}
