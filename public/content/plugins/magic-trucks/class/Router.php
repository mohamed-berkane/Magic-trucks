<?php
namespace magicTrucks;

class Router
{
    public function __construct()
    {
        add_action(
            'init',
            [$this, 'registerRoutes']
        );
    }


    public function registerRoutes()
    {
        // DOC WP PLUGIN Custom route https://developer.wordpress.org/reference/functions/add_rewrite_rule/

        // STEP WP PLUGIN ROUTING déclaration d'une nouvelle route custom
        add_rewrite_rule(
            // regexp de validation de l'url demandée par le visiteur
            // lorsque dans l'url il y aura la chaine "user" suivi d'un "/" optionnel, suivi de n'importe quoi
            'user/?.*',

            // "URL virtuelle" comprise par wordpress
            // de façon nous définissons une variable "$_GET" custom-route=true
            'index.php?customRoute=true',

            // la règle se mettre en haut de la pile de priorité (donc sera prioritaire)
            'top'
        );

        // add_rewrite_rule(
        //     'test/?.*',
        //     'index.php?cEstNousQuOnVaGererNousMemeLaRoute=true',
        //     'top'
        // );



        // STEP WP PLUGIN ROUTING rafraichissement du cache des règle de routing de wp
        // WARNING WP PLUGIN ROUTING  attention faire un flush des routes de cette manière est mauvais pour les perfomances
        // Wp enregistre les routes en bdd, il faut rafraichir les routes
        flush_rewrite_rules();

        // STEP WP PLUGIN ROUTING nous demandons à wordpress de surveiller certaines "variables" passées dans l'url "virtuelle"

        add_filter('query_vars', function($query_vars) {
            //Wordpress surveille la variable "virtuelle" custom-route
            $query_vars[] = 'customRoute';
            return $query_vars;
        });

        //Vérification est ce qu'une route custom a été détectée

        add_filter('template_include', function($template) {

            // récupération de la variable "virtuelle" custom-route
            // "Equivalent" à  $customRoute = filter_input(INPUT_GET, 'custom-route');
            $customRoute = get_query_var('customRoute');
            if($customRoute) {
               //une custom route a été détecté, 
               // nous indiquons à wordpress quel fichier il doit charger
               return __DIR__ .'/../custom-routes.php';
            }

            // nous retournons le template que wordpress comptait utiliser
            return $template;
        });
    }
}
