<?php

add_theme_support('menus');

function prefix_send_quotation_request() {
    /**
     * les variables $_GET/$_POST sont disponibles
     *
     * On fait le traitement de POST
     */ 

    // On recupere les champs du formulaire de demande de devis
    //$_POST['worktype'];
    $worktype_post = filter_input(INPUT_POST, 'worktype', FILTER_SANITIZE_STRING);
    $budget_post = filter_input(INPUT_POST, 'budget', FILTER_SANITIZE_STRING);
    $place_post = filter_input(INPUT_POST, 'place', FILTER_SANITIZE_STRING);
    $placedetail_post = filter_input(INPUT_POST, 'placedetail', FILTER_SANITIZE_STRING);
    $precise_post = filter_input(INPUT_POST, 'otherdetail', FILTER_SANITIZE_STRING);
    var_dump($worktype_post);
    var_dump($budget_post);
    var_dump($place_post);
    var_dump($placedetail_post);
    var_dump($precise_post);
    // créér un nouveau devis dans la BDD
    $quotation_args = array(

        // ‘post_title’    => $_POST[‘cptTitle’],
        // ‘post_content’  => $_POST[‘cptContent’],
        // ‘post_status’   => ‘pending’,
        // ‘post_type’ => $_POST[‘post_type’]
        
        // );

        // insert the post into the database
        
        //$cpt_id = wp_insert_post( $my_cptpost_args, $wp_error);
        
        
    //$new_quotation = new 
    // 
    );
}
//add_action( 'admin_post_quotation_form', 'prefix_send_quotation_request' );

add_action( 'admin_post_quotation_form', 'quotation_form' );
function quotation_form() {
    //var_dump($_REQUEST); die;
    if(!isset($_REQUEST['user_id'])) return;
    do_action('acf/save_post', $_REQUEST['user_id']);

    //wp_redirect(add_query_arg('updated', 'success', wp_get_referer()));
    exit;
}