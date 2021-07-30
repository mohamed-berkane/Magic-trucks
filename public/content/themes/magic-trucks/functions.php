<?php
// Chargement des assets
require __DIR__ . '/includes/load-assets.php';

// Chargement des assets
require __DIR__ . '/includes/load-assets.php';

// gestion des menus via le back office de Wordpress pour le thème Magic-Trucks
add_theme_support('menus');
add_action('acf/save_post', 'quotation_post_save');
add_theme_support('menus');

// On enregistre le menu de navigation principal
register_nav_menu( 'menu-header', 'Menu principal in header');

// On retire la barre d'admin wordpress pour tous les inscrits exceptés ceux qui ont le profil administrateur
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
    }
}



add_action('acf/save_post', 'quotation_post_save');
 function quotation_post_save( $post_id ) {
 	// on verifie si c'est bien le formulaire de devis
 	if( get_post_type($post_id) !== 'quotation' ) {
 		return;
 	}

 	// bail early if editing in admin
 	// if( is_admin() ) {
 	// 	return;
 	// }
	$user = wp_get_current_user();
	
	$args = [
		'ID'           => $post_id,
		'post_title'   => 'Devis_'. $post_id,
	];
	
	// email data
	// florent.zoro@gmail.com
	// florentverney@gmail.com
	// georget.mickael84@gmail.com
	// berkane251994@gmail.com
	$to = 'robas@windowslive.com' . ',';
	$to .= 'robas@free.fr';
	$headers = 'From: ' . $user->user_nicename . ' <' . $user->user_email . '>' . "\r\n";
	$subject = 'Demande de devis';
	$body = '<h1>Une nouvelle demande de devis est arrivé:</h1><br>'.get_the_content($post_id);
	// send email
	wp_mail($to, $subject, $body, $headers );
	//var_dump($headers); die();

	// Update the post into the database
	 wp_update_post( $args );
	 wp_redirect(add_query_arg('updated', 'success', wp_get_referer()));
}

add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->SMTPAuth   = SMTP_AUTH;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->Username   = SMTP_USERNAME;
    $phpmailer->Password   = SMTP_PASSWORD;
    $phpmailer->From       = SMTP_FROM;
    $phpmailer->FromName   = SMTP_FROMNAME;
}


?>