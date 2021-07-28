<?php

namespace magicTrucks\Controllers;

use AltoRouter;

class CoreController
{

    /**
     * @var AltoRouter
     */
    protected $router;

    public function __construct()
    {
        // récupération du router depuis "l'espace" (scope) global
        global $router;
        $this->router = $router;
    }

    // On vérifie la connexion de l'utilisateur
    protected function mustBeConnected()
    {
        if(!is_user_logged_in()) {
            wp_redirect(
                wp_login_url()
            );
            return false;
        }

        return true;
    }

    protected function isAdmin()
    {
        $user = wp_get_current_user();
        $roles = $user->roles;


        // TIPS PHP in_array https://www.php.net/in_array
        // nous vérifions si la valeur "administrator" existes dans le tablea $role
        if(in_array('administrator', $roles)) {
            return true;
        }
        else {
            return false;
        }

    }


    protected function show($viewName, $viewVars = [])
    {

        // nous passons le router à la vue
        $viewVars['router'] = $this->router;

        // DOC WP MVC envoyer des variables à un template https://developer.wordpress.org/reference/functions/get_template_part/
        echo get_template_part(
            $viewName,
            null,
            $viewVars
        );
    }
}
