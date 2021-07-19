<?php
/**
 * Plugin Name: Magic-Trucks cours
 * Author: Magic-Trucks team
 * Description: Pligin créé pour le projet d'apotheose 
 */

use magicTrucks\Plugin;

//require __DIR__ . '/vendor-magic-trucks/autoload.php';


// instanciation du plugin
$magictrucks = new Plugin();

 // au moment de l'activation du plugin, lancer les traitements dont il a besoin


// DOC WP PLUGININ activation "hook" : https://developer.wordpress.org/reference/functions/register_activation_hook/
register_activation_hook(
    // le chemin vers le fichier de déclaration du plugin
    __FILE__,
    // appel de la méthode activate sur l'objet $magic-trucks
    [$magictrucks, 'activate']
);


register_deactivation_hook(
    __FILE__,
    [$magictrucks, 'deactivate']
);

