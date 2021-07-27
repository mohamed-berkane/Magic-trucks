<?php

add_theme_support('menus');

add_action('acf/save_post', 'quotation_post_save');

function quotation_post_save( $post_id ) {
	// on verifie si c'est bien le formulaire de devis
	if( get_post_type($post_id) !== 'quotation' ) {
		return;
	}

	// bail early if editing in admin
	if( is_admin() ) {
		return;
	}

	// on recupere le devis
	$post = get_post( $post_id );
    
    //var_dump($post); die;
	// get custom fields (field group exists for content_form)
	// $name = get_field('name', $post_id);
	// $email = get_field('email', $post_id);
	update_field('post_title', 'Devis_', $post_id);
    do_action('acf/save_post', $post_id);
    wp_redirect(add_query_arg('updated', 'success', wp_get_referer()));
    exit;	
	// email data
	// $to = 'robas@windowslive.com';
	// $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
	// $subject = 'Demande de devis';
	// $body = '<h1>Une nouvelle demande de devis est arrivé:</h1><br>'.$post->post_content;
	
	// // send email
	// wp_mail($to, $subject, $body, $headers );
}


//add_action( 'admin_post_quotation_form', 'prefix_send_quotation_request' );

// add_action( 'admin_post_quotation_form', 'quotation_form' );
// function quotation_form($post_id) {
//     //var_dump($_REQUEST); die;
//     //if(!isset($_REQUEST['user_id'])) return;
//     //do_action('acf/save_post', $_REQUEST['user_id']);
//     //do_action('acf/save_post', 130);
//     do_action('acf/save_post', $post_id);

//     wp_redirect(add_query_arg('updated', 'success', wp_get_referer()));
//     exit;
// }