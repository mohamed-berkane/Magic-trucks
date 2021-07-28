<?php

namespace magicTrucks;
use magicTrucks\Models\WorkshopRegistration;


class Plugin
{

    /**
     * @var Router
     */
    
     // On instancie la classe router depuis notre plugin
    protected $router;

    public function __construct()
    {

        $registration = new Registration();

        $this->router = new Router();


        // On crée le CPT "Workshop" au moment de l'initialisation
        add_action(
            'init',
            [$this, 'createWorkshopCustomPostType']
        );

        // On associe une taxonomie difficulté au workshop
        add_action(
            'init',
            [$this, 'createWorkshopDifficultyCustomTaxonomie']
        );

        // On associe une taxonomie catégorie au workshop
        add_action(
            'init',
            [$this, 'createWorkshopCategoryCustomTaxonomie']
        ); 

        // On crée un CPT de type devis (quotation)
        add_action(
            'init',
            [$this, 'createQuotationCustomPostType']
        ); 

        // On associe une taxonomie budget au devis
        add_action(
            'init',
            [$this, 'createQuotationBudgetCustomTaxonomie']
        ); 

        // On associe une taxonomie place disponible au devis
        add_action(
        'init',
        [$this, 'createQuotationPlaceCustomTaxonomie']
        );        
    
        // On associe une taxonomie type d'amenagement au devis
        add_action(
            'init',
            [$this, 'createQuotationTypeCustomTaxonomie']
            );  

        // On crée un CPT de type profile pour que les utilisateurs puissent gérer leurs données
        add_action(
            'init',
            [$this, 'createRegisteredProfileCustomPostType']
        );

        add_action( 
            'save_post', 
            'set_post_default_category', 
            10,
            3 
        );
 
    function set_post_default_category($post_id, $post, $update ) {
        // Only want to set if this is a new post!
        if ( $update ){
            return;
        }
        
        // Only set for post_type = post!
        if ( 'post' !== $post->post_type ) {
            return;
        }
        
        // Get the default term using the slug, its more portable!
        $term = get_term_by( 'slug', 'my-custom-term', 'category' );
    
        wp_set_post_terms( $post_id, $term->term_id, 'category', true );
    }

    }

    public function activate()
    {
        // On appelle la méthode de création des capabilities
        $this->registerRegisteredRole();

        // Création de custom table au moment de l'activation du plugin
        $model = new WorkshopRegistration();
        $model->createTable();
    }

    public function deactivate()
    {
        // Suppression de custom table au moment de l'desactivation du plugin
        $model = new WorkshopRegistration();
        $model->dropTable();
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
                'has_archive' => true,
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
                'label' => 'Devis',
                // true permet d'administrer le CPT dans le BO
                'public' => true,
                'hierarchical' => false,
                'has_archive' => true,
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

    // Taxonomie Budget associé au Devis
    public function createQuotationBudgetCustomTaxonomie()
    {
        register_taxonomy(
            'budget',
            // On assigne cette taxonomie au CPT Quotation (Devis)
            ['quotation'],
            // On configure les options
            [
                'label' => 'Budget',
                'hierachical' => false,
                'public' => true
            ]
        );
    }

    // Taxonomie Place disponible associé au Devis
    public function createQuotationPlaceCustomTaxonomie()
    {
        register_taxonomy(
            'place',
            // On assigne cette taxonomie au CPT Quotation (Devis)
            ['quotation'],
            // On configure les options
            [
                'label' => 'Place disponible',
                'hierachical' => false,
                'public' => true
            ]
        );
    }

       // Taxonomie Type d'amenagement associé au Devis
       public function createQuotationTypeCustomTaxonomie()
       {
           register_taxonomy(
               'worktype',
               // On assigne cette taxonomie au CPT Quotation (Devis)
               ['quotation'],
               // On configure les options
               [
                   'label' => 'Type d\'amenagement',
                   'hierachical' => false,
                   'public' => true
               ]
           );
       }

    // CPT profile
    public function createRegisteredProfileCustomPostType()
    {
        // echo __LINE__; exit();
        register_post_type (
            'registered-profile',
            [
                'label' => 'Profile inscrits',
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-businessman',
                'supports' => [
                    'title',
                    'thumbnail',
                    'editor',
                    'author'
                ],
                'capability_type' => 'post',
                'map_meta_cap' => true,
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

