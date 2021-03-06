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

        // TODO : déplacer le getWorkshopByUserId dans une autre méthode pour plus de propreté

        // On instancie l'objet WorkshopRegistration
        $model = new WorkshopRegistration;

        // On appelle la méthode getWorkshopsByUserId 
        $workshops = $model->getWorkshopsByUserId($user->ID);

        // On appelle la méthode 
        // $this->getUserQuotation($user->ID);

        // On récupère les données de l'utilisateur
        $userId = $user->data->ID;
        
        // On récupère les données du devis associé à l'utilisateur
        $args = array(  
            'post_type' => 'quotation',
            'post_status' => 'publish',
            'author' => $userId,
            'posts_per_page' => -1, 
            'order' => 'DESC',
        );    
        
        $query = new WP_Query($args); 

        //echo $query->have_posts($userId);
        $quotations = get_posts($args);        

        // On retoure les données à la vue
        $this->show(
            'views/user/home', [
                'currentUser' => $user,
                'profile' => $profile,
                'workshops' => $workshops,
                'quotations' => $quotations
            ]
        );
    }


 /*    public function getUserQuotation($userId) {

        // On vérife que l'utilisateur est bien connecté
        if(!$this->mustBeConnected()) {
            // si l'utilisateur n'est pas connecté, nous faisons un return pour nous assurer qu'aucun traitements ultérieur ne soit exécutés
            return;
        }        


        // On récupère les données de l'utilisateur
        $user = wp_get_current_user();
        $userId = $user->data->ID;
        
        // On récupère les données du devis associé à l'utilisateur
        $args = array(  
            'post_type' => 'quotation',
            'post_status' => 'publish',
            'author' => $userId,
            'posts_per_page' => -1, 
            'order' => 'DESC',
        );    
        
        $query = new WP_Query($args); 

        //echo $query->have_posts($userId);
        $quotations = get_posts($args);

        return $quotations;
    } */


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
            [
                'currentUser' => $user
            ]
            
        );
    }
    
    
    public function updateConfirmed() {

        $user = wp_get_current_user();
        $userId = $user->data->ID;
        $login = filter_input(INPUT_POST, 'user_login');
        $firstname = filter_input(INPUT_POST, 'user_firstname');
        $lastname = filter_input(INPUT_POST, 'user_lastname');
        $nicename = $firstname . " " . $lastname;
        $email = filter_input(INPUT_POST, 'user_email');

        wp_update_user([
            'ID' => $userId,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'display_name' => $nicename,
            'user_nicename' => $nicename,
            'user_email' => $email
        ]);


        $this->show(
            'views/user/update', 
            [
                'currentUser' => $user,
                'message' => "Mise à jour effectuée avec succès"
            ]
        );

    }
    

    public function delete()
    {
        // avant de supprimer l'utilisateur, nous nous assurons que le le visiteur est bien connecté
        if(!$this->mustBeConnected()) {
            // si l'utilisateur n'est pas connecté, nous faisons un return pour nous assurer qu'aucun traitements ultérieur ne soit exécutés
            return;
        }

        if($this->isAdmin()) {
            echo 'Ne fais pas le zouave en supprimant ton compte administrateur';
            exit();
        }

        // récupération de l'utilisateur
        $user = wp_get_current_user();
        // suppresion de l'utilisateur
        // WARNING WP User il faut faire un include manuel des fonction de gestion des utilisateurs avant de pouvoir appeler la fonction wp_delete_user
        require_once(ABSPATH.'wp-admin/includes/user.php');
        wp_delete_user($user->ID);

        // redirection de l'utilisateur sur la home page une fois que son compte est supprimée
        $this->show(
            'views/user/delete', 
            ['message' => 'Votre compte a bien été supprimé']
        );


    }    


    // On s'inscrit à un atelier
    public function register($workshop_id)
    {
        // On vérifie que l'utilisateur est connecté via le CoreController
        $this->mustBeConnected();
        
        // On récupère les données de l'utilisateur WP actuel
        $user = wp_get_current_user();
        //$userId = $user->data->ID;
        $userId = $user->ID;

        $model = new WorkshopRegistration();


        // On récupère la liste des objets Workshop dans lesquels le user est déjà inscrit
        $workshops = $model->getWorkshopsByUserId($userId);

        // S'il n'y a pas de workshop enregistré
        if (!empty($workshops)) {
        
                // On stocke les id de ces ateliers dans un tableau $registrations
            //$registrations = [];
            foreach ($workshops as $workshop) {
                $registrations [] = $workshop['workshop']->ID;
            }

            $checkRegistration = in_array($workshop_id, $registrations);

            // On vérifie si le user est déjà inscrit
            if ($checkRegistration) {
                
                $this->show(
                    'views/user/register', 
                    [
                        'workshops' => $workshops,
                        'currentUser' => $user,
                        'workshopId' => $workshop_id,
                        'message' => 'Vous êtes déjà inscrit à cet atelier'
                        ]
                    );
            }
            else {
                $this->show(
                    'views/user/register', 
                    [
                        'workshops' => $workshops,
                        'currentUser' => $user,
                        'workshopId' => $workshop_id,
                        'message' => ''
                        ]
                    );
            }
        } 

         else {

            $this->show(
                'views/user/register', 
                [
                    'workshops' => $workshops,
                    'currentUser' => $user,
                    'workshopId' => $workshop_id,
                    'message' => ''
                    ]
                );
        } 
    }
            
    // Inscription à l'atelier
    public function insert($workshopId)
    {

        if(!isset($_POST['mt_register_nonce'] ) || !wp_verify_nonce($_POST['mt_register_nonce'], 'mt_register_action')) {
            echo 'vérification ko';
            exit();
        }

        // récupération de l'utilisateur wordpress actuel
        $user = wp_get_current_user();
        $userId = $user->data->ID;

        // Récupération des données du formulaire d'enregistrement à l'atelier
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

        // vérification : est ce que le visiteur est connecté
        // s'il n'est pas connecté, nous le redirigeons vers la page de login
        $this->mustBeConnected();

        $model = new WorkshopRegistration();
        $model->insert(
            $userId, // id user
            $workshopId, // id atelier
            $firstname, // Prénom
            $lastname, // Nom
            $email, // email
            $phone, // nr de tel
            $comment, // commentaire
        );

        // On récupère la liste des objets Workshop dans lesquels le user est déjà inscrit
        $workshops = $model->getWorkshopsByUserId($userId);

        $this->home();

    }

    // Récupération du profile via la table custom
    public function getProfile($user)
    {
        $options = [
            'author' => $user->ID,
            'post_type' => 'registered-profile'
        ];

        // On prépare la requête dans une syntaxe propre à WP
        $query = new WP_Query($options);

        //print_r($query);

        // On exécute la requête
        //$result = $query->have_posts();

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