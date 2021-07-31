<?php

namespace magicTrucks;

use WP_User;


class Registration
{

    public function __construct()
    {
        // On ajoute un hook pour customizer le formulaire de Wordpress
        add_action(
            'register_form',
            [$this, 'customizeForm'],
        );
 
        // On ajoute un hook pour ajouter du HTML custom dans la page
/*         add_action(
            'login_enqueue_scripts', 
            [$this, 'loginAddDiv'],
        ); */

        // On ajoute un hook de validation du formulaire
        add_filter(
            'user_register',
            [$this, 'customUserRegistration'],
            10, // Priorité du hook
            3  // Nombre d'arguments de la méthode 
        );

        // On ajoute un hook pour renvoyer vers un CSS personnalisé 
        add_action(
            'login_enqueue_scripts',
            [$this, 'customizeCSS']
        );

        // On ajoute un hook pour vérifier les erreurs
        add_filter(
            'registration_errors',
            [$this, 'checkRegistration'],
            10,
            3
        );

        add_filter(
            'login_redirect', 
            [$this, 'defaultUserPageRedirect'], 
            10, 
            3 
        );

        add_filter(
            'registration_redirect', 
            [$this, 'successfulRegistrationRedirect'] 
        );

        

    }


    public function customizeCSS() {
        wp_enqueue_style(
            'custom-login',
            get_theme_file_uri('assets/css/register.css')
        );
        
    }

    public function customizeForm()
    {
        // On ajoute des champs de formulaire custom en plus des champs de WP
        $customFields = '
        <p>
            <label for="user_firstname">Prénom *</label>
            <input type="text" name="user_firstname" id="user_firstname" class="input" value="" size="20" autocapitalize="off" required="required">
        </p>
        <p>
            <label for="user_lastname">Nom *</label>
            <input type="text" name="user_lastname" id="user_lastname" class="input" value="" size="20" autocapitalize="off" required="required">
        </p>
        <p>
            <label for="user_password">Mot de passe *</label>
            <span style="font-size:10px; margin: -15px 0 10px;">8 caractères dont 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial</span>
            <input type="password" name="user_password" id="user_password" class="input" value="" size="20" autocapitalize="off" required="required">

        </p>
        <p>
            <label for="user_password_check">Confirmation du mot de passe *</label>
            <input type="password" name="user_password_check" id="user_password_check" class="input" value="" size="20" autocapitalize="off" required="required">
        </p>  
        <p>
            <input type="hidden" name="user_role" id="user_role" class="input" value="registered" size="20" autocapitalize="off">
        </p>  
        ';
        echo $customFields;
    }


    // Méthodes de vérification des données

    public function checkRegistration($errors, $login, $email)
    {

        // On récupère le rôle du champ caché - On va aussi contrôler qu'il n'a pas été manipulé
        $role = filter_input(INPUT_POST, 'user_role');

        // On laisse la vérification du rôle même si actuellement, il n'y en a qu'un seul. Ca peut servir en cas d'évolution du processus de connexion
        if(!$role) {
            $errors->add(
                // identifiant de l'erreur
                'user_role_empty',
                // message d'erreur
                '<strong>Rôle vide</strong> : ce message ne devrait jamais apparaitre de toute manière'
            );
        }

        if($role !== 'registered') {
            $errors->add(
                'password_unmatched',
                '<strong>Rôle inconnu</strong> : screugnieugnieu, vous essayez de faire des bêtises'
            );
        }
         
        // récupération du mot de passe choisi par l'utilisateur
        $password = filter_input(INPUT_POST, 'user_password');

        // récupération de la vérification du mot de passe 
        $passwordMatch = filter_input(INPUT_POST, 'user_password_check');

        // s'il n'y a pas de mdp, il faut enregistrer une erreur
        if(!$this->checkPassword($password)) {
            $errors->add(
                // identifiant de l'erreur
                'user_password_invalid',
                // message d'erreur
                '<strong>Mot de passe invalide : </strong>il doit contenir 8 caractères dont 1 majuscule, 1 minuscule, 1 caractère spécial et 1 chiffre'
            );
        }

        // Le mot de passe n'est pas vérifié
        if (!$this->checkPasswordConfirmation()) {
            $errors->add(
                'user_passwords_unmatched',
                '<strong>Mot de passe non confirmé</strong> : vous devez avoir la berlue'
            );
        }

        $firstname = filter_input(INPUT_POST, 'user_firstname');
        $lastname = filter_input(INPUT_POST, 'user_lastname');

        if(!$firstname || !$lastname) {
            $errors->add(
                'empty_names',
                '<strong>Nom et/ou prénom absent(s)</strong> : vous devez compléter le nom et le prénom'
            );
        }

        // On retourne la variable $errors qui gère tout comme un chef
        return $errors;
    }


    public function checkPasswordConfirmation()
    {

        // récupération du mot de passe choisi par l'utilisateur
        $password = filter_input(INPUT_POST, 'user_password');

        // récupération de la vérification du mot de passe 
        $passwordMatch = filter_input(INPUT_POST, 'user_password_check');
        
        if($password === $passwordMatch) {
            return true;
        }
    }


    public function checkPassword($password)
    {

        // contrôle de la longueur de 8 caractères - !mb_strlen
        if(mb_strlen($password) < 8) {
            return false;
        }

        // On vérifie qu'il y ait au moins une minuscule dans le mdp
        if(!preg_match('/[a-z]+/', $password)) {
            return false;
        }

        // On vérifie qu'il y ait au moins une majuscule dans le mdp
        if(!preg_match('/[A-Z]+/', $password)) {
            return false;
        }

        // On vérifie qu'il y ait au moins un chiffre dans le mdp
        if(!preg_match('/[0-9]+/', $password)) {
            return false;
        }

        // On vérifie qu'il y au moins un caratère spécial 
        if(!preg_match('/\W/', $password)) {
            return false;
        }

        return true;

    }


    // IMPORTANT WP PLUGIN REGISTRATION FORM, customisation de l'enregistrement d'un utilisateur
    public function customUserRegistration($userId)
    {
        // On récupère l'utilisateur créé par WP_User (mécanisme de WP)
        $userObject = new WP_User($userId);

        // On supprime le rôle subscriber affecté par défaut
        $userObject->remove_role('subscriber');

        // On récupère le rôle choisi sachant qu'il n'y en a qu'un seul possible pour l'instant
        $currentRole = filter_input(INPUT_POST, 'user_role');

        // On l'affecte à notre user
        $userObject->add_role($currentRole);

        // On enregistre le mdp choisi par l'utilisateur
        $password = filter_input(INPUT_POST, 'user_password');

        // On l'associe à l'utilisateur
        wp_set_password($password, $userId);

        // On ajoute le rôle à l'utilisateur (1 seul choix pour le moment)
        $userObject->add_role($currentRole);

        $firstname = filter_input(INPUT_POST, 'user_firstname');
        $lastname = filter_input(INPUT_POST, 'user_lastname');   
        $nicename = $firstname . " " . $lastname;  
        
        // var_dump($firstname . $lastname . $nicename);



        // On crée le profil associé
        if ($currentRole === 'registered') {

            wp_insert_post([
                'post_author' => $userId,
                'post_status' => 'publish',
                'post_title' => 'Profil' . " : " . $nicename,
                'post_type' => 'registered-profile'
            ]);

        }

        // On associe au nouveau profil les informations complémentaires
        if($currentRole === 'registered') {
            wp_update_user([
                'ID' => $userId,
                'first_name' => $firstname,
                'last_name' => $lastname,
                'display_name' => $nicename,
                'user_nicename' => $nicename
            ]);
        }

    }

    public function defaultUserPageRedirect() {
        return home_url( '/user/home' );
    }


    function successfulRegistrationRedirect() {
        return home_url( '/user/home' );
    }

}


