<?php

namespace magicTrucks\Controllers;

use WP_Query;
use magicTrucks\Models\WorkshopRegistration;


class UserController extends CoreController
{
    public function home() 
    {
        // On vérifie que l'utilisateur est connecté via le CoreController
        $this->mustBeConnected();
        
        // On récupère les données de l'utilisateur WP actuel
        $user = wp_get_current_user();

        // On récupère le profil
        $profile = $this->getProfile($user);
        
        $this->show(
            'views/user/home', 
            ['currentUser' => $user]
        );

    }

    public function insert($atelier_id)
    {
        // vérification : est ce que le visiteur est connecté
        // s'il n'est pas connecté, nous le redirigeons vers la page de login
        //$this->mustBeConnected();

        // récupération de l'utilisateur wordpress actuel
        $user = wp_get_current_user();
        // var_dump($user);
        // var_dump($atelier_id);

        $model = new WorkshopRegistration();
        $model->insert(
            $atelier_id, // id atelier
            $user // id utilisateur
        );

    }

    // Récupération du profile via la table custom
    public function getProfile($user)
    {
        $options = [
            'author' => $user->ID,
            'post_type' => 'registered'
        ];

        // On prépare la requête dans une syntaxe propre à WP
        $query = new WP_Query($options);

        // On exécute la requête
        $result = $query->have_posts();

        // On vérifie que le profile de l'utilisateur connecté existe bien
/*         if(count($query->posts) === 0) {
            echo "Votre profil ne s'est pas créé correctement. Veuillez contacter l'administrateur du site";
            // Todo -- trigger email
            exit();
        }

        // Si oui on affiche les données du profil stockées dans un CPT - cf 1:18 e09 n2
        else {
            return $query->posts[0];
        } */

    }
}