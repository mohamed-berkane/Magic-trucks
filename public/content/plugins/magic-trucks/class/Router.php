<?php
namespace magicTrucks;

class Router
{
    public function __construct()
    {
        // hook permettant de lancer la méthode registerRoutes à l'initialisation du plugin
        add_action(
            'init',
            [$this, 'registerRoutes']
        );
    }


    public function registerRoutes()
    {


        // STEP WP PLUGIN ROUTING déclaration d'une nouvelle route custom
        add_rewrite_rule(
            // regexp de validation de l'url demandée par le visiteur
            'user/?.*',

            // "URL virtuelle" comprise par wordpress
            // de façon nous définissons une variable "$_GET" custom-route=true
            'index.php?custom-route=true',

            // la règle se mettre en haut de la pile de priorité (donc sera prioritaire)
            'top'
        );

         add_rewrite_rule(
            'hello.php',
            'index.php?routeTest=true',
            'top'
        );



        // On rafraichit le cache des règle de routing de wp
        flush_rewrite_rules();

        // On demande à WP de surveiller certaines "variables" passées dans l'url "virtuelle"
        add_filter('query_vars', function($query_vars) {

            $query_vars[] = 'custom-route';
            return $query_vars;
        });

        
        // Si on détecte la route, on lui affecte un template
        add_filter('template_include', function($template) {

            // récupération de la variable "virtuelle" custom-route
            $customRoute = get_query_var('custom-route');

            if($customRoute) {
               // On indiquons à wordpress quel fichier il doit charger si la route est détectée
               return __DIR__ .'/../custom-routes.php';
            }

            // nous retournons le template que wordpress comptait utiliser
            return $template;
        }); 
    }
}
