<?php

namespace magicTrucks;

// use WP_User;


class Registration
{

    public function __construct()
    {

        
    }

    public function customizeCSSS() {

        wp_enqueue_style(
            'custom-login',
            get_theme_file_uri('assets/css/register.css')
        );
        /*
        echo '
            <style type="text/css">
                body {
                    background: black !important;
                }
                .login h1 a {
                    background-image: none !important;
                }
            </style>
        ';
        */
    }



    public function customizeForm()
    {
        $customFields = '
            <p>
                <label for="user_password">Password</label>
                <input type="text" name="user_password" id="user_password" class="input" value="" size="20" autocapitalize="off">
            </p>

            <p>
                <label>Vous êtes : </label>
                <div>
                    <label>
                        <input type="radio" name="user_role" value="customer" /> Une entreprise
                    </label>
                    <label>
                        <input type="radio" name="user_role" value="developer" /> Un(e) developpeur(se)
                    </label>
                </div>
            </p>
        ';
        echo $customFields;
    }


    public function checkRegistration($errors, $login, $email)
    {

        // récupération du role choisi par l'utilsiateur
        $role = filter_input(INPUT_POST, 'user_role');
        // s'il n'y a pas de rôle, il faut enregistrer une erreur
        if(!$role) {
            $errors->add(
                // identifiant de l'erreur
                'user_role_empty',
                // message d'erreur
                'Vous devez choisir un rôle'
            );
        }

        // récupération du mot de passe choisi par l'utilsiateur
        $password = filter_input(INPUT_POST, 'user_password');
        // s'il n'y a pas de rôle, il faut enregistrer une erreur
        if(!$this->checkPassword($password)) {
            $errors->add(
                // identifiant de l'erreur
                'user_password_invalid',
                // message d'erreur
                'Votre mot de passe est invalide'
            );
        }

        // wordpress a besoin de récupérer la variable $errors
        return $errors;
    }


    public function checkPassword($password)
    {
        // un mot de passe doit faire 8 caractère de long
        // un mot de passe doit avoir des minuscules + majuscules
        // un mot de passe doit avoir un chiffre
        // un mot de passe doit avoir un caractère spécial

        // TIPS PHP longueur d'un chaine : utiliser mb_strlen

        // contrôle de la longueur
        if(mb_strlen($password) < 8) {
            return false;
        }

        // TIPS REGEX vérification est ce qu'il y au moins une minuscule dans le mdp
        if(!preg_match('/[a-z]+/', $password)) {
            return false;
        }

        // TIPS REGEX vérification est ce qu'il y au moins une majuscule dans le mdp
        if(!preg_match('/[A-Z]+/', $password)) {
            return false;
        }

        // TIPS REGEX vérification est ce qu'il y au moins un chiffre dans le mdp
        if(!preg_match('/[0-9]+/', $password)) {
            return false;
        }

        // TIPS REGEX vérification est ce qu'il y au moins un caratère spécial dans le mdp
        // \W signifie tout ce qui n'est pas une lettre (majuscule ou minuscule) et n'est pas un chiffre
        // \w  signifie tout ce est une lettre (majuscule ou minuscule) ou n'est pas un chiffre
        if(!preg_match('/\W/', $password)) {
            return false;
        }

        return true;

    }


    // IMPORTANT WP PLUGIN REGISTRATION FORM, customisation de l'enregistrement d'un utilisateur
    public function customUserRegistration($userId)
    {
        // récupération de l'utilisateur qui vient d'être créé (c'est un objet de type "WP_User" )
        $userObject = new WP_User($userId);

        // suppression du rôle "subscriber"
        $userObject->remove_role('subscriber');

        // enregistrement du mot de passe de l'utilisateur
        // DOC WP USER set password https://developer.wordpress.org/reference/functions/wp_set_password/

        // récupération du mot de passe choisi par l'utilsiateur
        $password = filter_input(INPUT_POST, 'user_password');
        wp_set_password($password, $userId);

        // récupération du rôle choisi par l'utilisateur
        $choosedRole = filter_input(INPUT_POST, 'user_role');

        // contrôle : est ce que le rôle choisi est valide
        if($choosedRole === 'developer' || $choosedRole === 'customer') {
            // nous ajoutons le rôle choisi par l'utilisateur
            $userObject->add_role($choosedRole);
        }

        // création du profil utilisateur (cpt developer ou cpt customer)
        if($choosedRole === 'developer') {
            // DOC WP CREATE POST : https://developer.wordpress.org/reference/functions/wp_insert_post/

            /* NOTICE WP POST default status
            Publish #
            Future #
            Draft #
            Pending #
            Private #
            Trash #
            Auto-Draft #
            Inherit #
            */

            wp_insert_post([
                'post_author' => $userId,
                'post_status' => 'publish',
                'post_title' => 'DevProfile',
                'post_type' => 'developer-profile'
            ]);
        }

        // gestion de la création du profil customer
        if($choosedRole === 'customer') {
            wp_insert_post([
                'post_author' => $userId,
                'post_status' => 'publish',
                'post_title' => 'Customer Profile',
                'post_type' => 'customer-profile'
            ]);
        }
    }
}
