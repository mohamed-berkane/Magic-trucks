<?php

namespace magicTrucks;

//use magicTrucks\Models\WorkshopRegistration;


class Plugin
{

    /**
     * @var Router
     */
    
     // On instancie la classe router depuis notre plugin
    protected $router;

    public function __construct()
    {

        // $registration = new Registration();

        $this->router = new Router();


        // On crée le CPT "Workshop" au moment de l'initialisation
        add_action(
            'init',
            [$this, 'createWorkshopCustomPostType']
        );

        add_action(
            'init',
            [$this, 'createWorkshopDifficultyCustomTaxonomie']
        );

        add_action(
            'init',
            [$this, 'createWorkshopCategoryCustomTaxonomie']
        ); 

        add_action(
            'init',
            [$this, 'createQuotationCustomPostType']
        );        
    }

    public function activate()
    {
        // On appelle la méthode de création des capabilities
        $this->registerRegisteredRole();
    }

    public function deactivate()
    {

    }



    /* CPT Workshop */

    public function createWorkshopCustomPostType()
    {
        // enregistrement du custom post type "Atelier (Workshop)"
        register_post_type(
            'workshop',
            [
                // L'identifiant du post_type
                'label' => 'Atelier',
                // true permet d'administrer le CPT dans le BO
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-welcome-learn-more',
                // NOTICE WP PLUGIN, fonctionnalités activable poure un cpt :  ‘title’, ‘editor’, ‘comments’, ‘revisions’, ‘trackbacks’, ‘author’, ‘excerpt’, ‘page-attributes’, ‘thumbnail’, ‘custom-fields’, and ‘post-formats’.
                'supports' => [
                    'title',
                    'thumbnail',
                    'editor',
                    'excerpt'
                ],
                // IMPORTANT WP PLUGIN cpt cababilities
                'capability_type' => 'post',
                'map_meta_cap' => true,
            ]
        );
    }


    /* Taxonomie associée aux Workshops */

    public function createWorkshopDifficultyCustomTaxonomie()
    {
        register_taxonomy(
            'difficulty',
            // On assigne cette taxonomie au CPT Workshop (Atelier)
            ['workshop'],
            // On configure les options
            [
                'label' => 'Difficulté',
                'hierachical' => true,
                'public' => true
            ]
        );

    }


    public function createWorkshopCategoryCustomTaxonomie()
    {
        register_taxonomy(
            'category',
            // On assigne cette taxonomie au CPT Workshop (Atelier)
            ['workshop'],
            // On configure les options
            [
                'label' => 'Catégorie',
                'hierachical' => true,
                'public' => true
            ]
        );
    }

       /* CPT Quotation */

       public function createQuotationCustomPostType()
       {
           // enregistrement du custom post type "Dévis (Quotation)"
           register_post_type(
               'quotation',
               [
                   // L'identifiant du post_type
                   'label' => 'Dévis',
                   // true permet d'administrer le CPT dans le BO
                   'public' => true,
                   'hierarchical' => false,
                   'menu_icon' => 'dashicons-money-alt',
                   // NOTICE WP PLUGIN, fonctionnalités activable pour un cpt :  ‘title’, ‘editor’, ‘comments’, ‘revisions’, ‘trackbacks’, ‘author’, ‘excerpt’, ‘page-attributes’, ‘thumbnail’, ‘custom-fields’, and ‘post-formats’.
                   'supports' => [
                       'title',
                       'author',
                       'thumbnail',
                       'editor',
                       'excerpt',
                       'custom-fields'
                   ],
                   // IMPORTANT WP PLUGIN cpt cababilities
                   'capability_type' => 'post',
                   'map_meta_cap' => false,
               ]
           );
       }
   


    // On ajoute le rôle Registered
    public function registerRegisteredRole()
    {
        add_role(
            // Id du rôle
            'registered',
            // Libellé
            'Registered',
            // Liste des autorisations
            [
                'delete_registered' => false,
                'delete_others_registered' => false,
                'delete_private_registered' => false,
                'delete_published_registered' => false,
                'edit_registered' => true,
                'edit_registered' => false,
                'edit_others_registered' => false,
                'edit_private_registered' => false,
                'edit_published_registered' => true,
                'read_private_registered' => true,
            ]
        );
    }

}

