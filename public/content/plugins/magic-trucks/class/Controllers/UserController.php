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


    public function update() 
    {
        // avant de supprimer l'utilisateur, nous nous assurons que le le visiteur est bien connecté
        if(!$this->mustBeConnected()) {
            // si l'utilisateur n'est pas connecté, nous faisons un return pour nous assurer qu'aucun traitements ultérieur ne soit exécutés
            return;
        }

        // récupération de l'utilisateur
        $user = wp_get_current_user();
        // suppresion de l'utilisateur
        // WARNING WP User il faut faire un include manuel des fonction de gestion des utilisateurs avant de pouvoir appeler la fonction wp_delete_user
        require_once(ABSPATH.'wp-admin/includes/user.php');

        $this->show(
            'views/user/update', 
            ['currentUser' => $user]
        );
    }
    
    
    public function updateConfirmed() {

        $user = wp_get_current_user();
        //print_r($user);
        $userId = $user->data->ID;
        // var_dump($userId);
        $login = filter_input(INPUT_POST, 'user_login');
        $firstname = filter_input(INPUT_POST, 'user_firstname');
        $lastname = filter_input(INPUT_POST, 'user_lastname');
        $nicename = $firstname . " " . $lastname;
        $email = filter_input(INPUT_POST, 'user_email');

        //var_dump("id :" . $userId . "    login :" . $login . "      1st :" . $firstname . "    last :" . $lastname . "    nice :" . $nicename . "     email :" . $email);


        wp_update_user([
            'ID' => $userId,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'display_name' => $nicename,
            'user_nicename' => $nicename,
            'user_email' => $email
        ]);

    }
    

    public function delete()
    {
        // avant de supprimer l'utilisateur, nous nous assurons que le le visiteur est bien connecté
        if(!$this->mustBeConnected()) {
            // si l'utilisateur n'est pas connecté, nous faisons un return pour nous assurer qu'aucun traitements ultérieur ne soit exécutés
            return;
        }

        if($this->isAdmin()) {
            echo 'Il n\'est pas possible de supprimer un compte administrateur ainsi';
            exit();
        }

        // récupération de l'utilisateur
        $user = wp_get_current_user();
        // suppresion de l'utilisateur
        // WARNING WP User il faut faire un include manuel des fonction de gestion des utilisateurs avant de pouvoir appeler la fonction wp_delete_user
        require_once(ABSPATH.'wp-admin/includes/user.php');
        wp_delete_user($user->ID);

        // redirection de l'utilisateur sur la home page une fois que son compte est supprimée
        $url = 'user/delete-confirmed/';
        wp_redirect(
            $url
        );
        exit();


    }    


    public function deleteconfirmed() {
        $this->show(
            'views/user/delete-confirmed', 
            ['message' => 'Votre compte a bien été supprimé']
        );
    }


    public function register($workshop_id)
    {
        // On vérifie que l'utilisateur est connecté via le CoreController
        $this->mustBeConnected();
        
        // On récupère les données de l'utilisateur WP actuel
        $user = wp_get_current_user();

        $this->show(
            'views/user/register', 
            [
                'currentUser' => $user,
                'workshopId' => $workshop_id
            ]
        );
   
    }

    public function insert($workshopId)
    {

        // Récupération des données du formulaire d'enregistrement à l'atelier
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

        // vérification : est ce que le visiteur est connecté
        // s'il n'est pas connecté, nous le redirigeons vers la page de login
        $this->mustBeConnected();

        // récupération de l'utilisateur wordpress actuel
        $user = wp_get_current_user();

        $model = new WorkshopRegistration();
        $model->insert(
            $workshopId, // id atelier
            $firstname, // Prénom
            $lastname, // Nom
            $email, // email
            $phone, // nr de tel
            $comment, // commentaire
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