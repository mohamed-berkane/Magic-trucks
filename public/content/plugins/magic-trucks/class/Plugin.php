<?php

namespace magicTrucks;

use magicTrucks\Models\WorkshopRegistration;
// use OProfile\Models\DeveloperTechnologyModel;
// use OProfile\Models\DeveloperProjectModel;


class Plugin
{

    /**
     * @var Router
     */
    protected $router;


    public function __construct()
    {

        $registration = new Registration();

        $this->router = new Router();


        // au moment de l'initialisation de worpress enregistrement du cpt "project"
        add_action(
            'init',
            [$this, 'createProjectCustomPostType']
        );

    }

    public function activate()
    {
        // STEP WP PLUGIN ROLE activation des rôles pour le plugin
        // $this->registerDeveloperRole();
        // $this->registerCustomerRole();

        // Création des custom tables au moment de l'activation du plugin
        $model = new WorkshopRegistration();
        // $model->createTable();


    }

    public function deactivate()
    {
        // IMPORTANT WP PLUGIN ROLE ne pas oublier de supprimer les rôles lors de la désactivation du plugin !
        // remove_role('developer');
        // remove_role('customer');

        // Suppresion des custom tables au moment de la désactivation du plugin
        // Attention ceci devrait être fait lors de la désinstallation du plugin ! (exemple ici à titre pédagogique)
        $model = new WorkshopRegistration();
        // $model->dropTable();


    }



    public function createActivitySectorCustomTaxonomie()
    {
        register_taxonomy(
            // identifiant de la taxonomy
            'activity-sector',
            // la taxonomy 'technology" est application sur le cpt "project
            ['customer-profile'],
            // tableau d'options
            [
                'label' => 'Secteur d\'activité',
                'hierarchical' => false,
                'public' => true
            ]
        );
    }


    public function createSkillCustomTaxonomie()
    {
        register_taxonomy(
            // identifiant de la taxonomy
            'skill',
            // la taxonomy 'technology" est application sur le cpt "project
            ['developer-profile'],
            // tableau d'options
            [
                'label' => 'Compétence',
                'hierarchical' => false,
                'public' => true
            ]
        );
    }

    public function createTechnologyCustomTaxonomie()
    {
        register_taxonomy(
            // identifiant de la taxonomy
            'technology',
            // la taxonomy 'technology" est application sur le cpt "project
            ['project', 'developer-profile'],
            // tableau d'options
            [
                'label' => 'Technologie',
                'hierarchical' => true,
                'public' => true
            ]
        );
    }



    public function createProjectCustomPostType()
    {
        // enregistrement du custom post type "Project"
        // DOC WP PLUGIN cpt https://developer.wordpress.org/reference/functions/register_post_type/
        register_post_type(
            // peremier argument : l'identifiant du post type
            'project',
            // second argument les options pour configurer le post type
            [
                'label' => 'Project',

                // option public true : le cpt est administrable dans le backoffice
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-admin-tools',

                // NOTICE WP PLUGIN, fonctionnalités activable poure un cpt :  ‘title’, ‘editor’, ‘comments’, ‘revisions’, ‘trackbacks’, ‘author’, ‘excerpt’, ‘page-attributes’, ‘thumbnail’, ‘custom-fields’, and ‘post-formats’.

                'supports' => [
                    'title',
                    'thumbnail',
                    'editor',
                ],
                // IMPORTANT WP PLUGIN cpt cababilities
                'capability_type' => 'project',
                'map_meta_cap' => true,
            ]
        );
    }


    public function createDeveloperProfileCustomPostType()
    {
        register_post_type(
            'developer-profile',
            [
                'label' => 'Developer Profile',
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-admin-tools',
                'supports' => [
                    'title',
                    'thumbnail',
                    'editor',
                    'author',
                ],
                'capability_type' => 'developer',
                'map_meta_cap' => true,
            ]
        );
    }

    public function createCustomerProfileCustomPostType()
    {
        register_post_type(
            'customer-profile',
            [
                'label' => 'Customer Profile',
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-admin-tools',
                'supports' => [
                    'title',
                    'thumbnail',
                    'editor',
                    'author',
                ],
                'capability_type' => 'customer',
                'map_meta_cap' => true,
            ]
        );
    }

    // STEP WP PLUGIN ROLE création
    public function registerDeveloperRole()
    {
        // DOC WP PLUGIN add_role https://developer.wordpress.org/reference/functions/add_role/
        add_role(
            // identifiant du rôle
            'developer',
            // libellé
            'Developpeur',
            // liste des autorisations
            [
                'delete_developers' => false,
                'delete_others_developers' => false,
                'delete_private_developers' => false,
                'delete_published_developers' => false,
                'edit_developers' => true,
                'edit_others_developers' => false,
                'edit_private_developers' => false,
                'edit_published_developers' => true,
                'publish_developers' => true,
                'read_private_developers' => false,
            ]
        );

        // $developerRole = get_role('developer');
        // $developerRole->add_cap('edit_customers');
        // $developerRole->add_cap('publish_customers');
        // $developerRole->add_cap('edit_published_customers');
    }

    public function registerCustomerRole()
    {
        add_role(
            'customer',
            // libellé
            'Client',
            // liste des autorisations
            [
                'delete_others_projects'=> false,
                'delete_private_projects'=> false,
                'delete_projects'=> true,
                'delete_published_projects'=> false,
                'edit_others_projects'=> false,
                'edit_private_projects'=> false,
                'edit_projects'=> true,
                'edit_published_projects'=> true,
                'publish_projects'=> true,
                'read_private_projects'=> false,
            ]
        );


        // NOTICE WP PLUGIN ROLE modification
        // DOC WP PLUGIN ROLE Récupération : https://developer.wordpress.org/reference/functions/get_role/
        // Récupération du role "customer"
        $customerRole = get_role('customer');
        $customerRole->add_cap('edit_customers');
        $customerRole->add_cap('publish_customers');
        $customerRole->add_cap('edit_published_customers');


    }
}

