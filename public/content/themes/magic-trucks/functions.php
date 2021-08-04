<?php
// Chargement des assets
require __DIR__ . '/includes/load-assets.php';

// gestion des menus via le back office de Wordpress pour le thème Magic-Trucks
add_theme_support('menus');
add_action('acf/save_post', 'quotation_post_save');

// On enregistre le menu de navigation principal
register_nav_menu( 'menu-header', 'Menu principal in header');

// On enregistre le menu de navigation footer
register_nav_menu( 'menu-footer', 'Menu principal in footer');

// On rajoute link login/logout dans le menu
 add_filter('wp_nav_menu_items', 'wp_add_login_logout_menu', 10, 2);
    
function wp_add_login_logout_menu($items, $args) 
{
/*     
    Ce truc fiche un bazar pas possible : 
    ob_start();
    wp_loginout(substr(get_site_url(), 0, -2));
    $loginoutlink = ob_get_contents();
    ob_end_clean(); 
*/

    // On récupère l'utilisateur courant
    $user = wp_get_current_user();

    // On récupère son avatar si la personne est connectée
    if (is_user_logged_in()) {

        $avatar = get_avatar_url(
            $user->data->ID,
            [
                'size' => 20,
                'force_default' => true
            ]
        );
    
        $avatar_display = "<img src='$avatar' style='border-radius: 50%;' />";
    
        $items .= '<li class="menu-item"><a href="/apotheose/magic-trucks/public/user/home/">' .  $user->data->user_nicename . ' ' . $avatar_display . '</a></li><li class="right"><a href="'. wp_logout_url() .'">Se déconnecter</a></li>';
    } 
    
    else {

        $items .= $userToDisplay . '<li style=" float: right;">'. $loginoutlink .'</li>';
    }
    
    return $items;
}



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
	$to .= 'florent.zoro@gmail.com' . ',';
	$to .= 'florentverney@gmail.com' . ',';
	$to .= 'georget.mickael84@gmail.com' . ',';
	$to .= 'berkane251994@gmail.com';
	$headers = 'From: ' . $user->user_nicename . ' <' . $user->user_email . '>' . "\r\n";
	$subject = 'Demande de devis';
	$body = '<h1>Une nouvelle demande de devis est arrivé:</h1><br>'.get_the_content($post_id);

 	//sending email
	wp_mail($to, $subject, $body, $headers );
	//var_dump($headers); die();

	// Update the post into the database
	 wp_update_post( $args );
     $redurl = get_home_url().'/user/home';
	 wp_redirect($redurl);
     exit();
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

// function enable_comments_project() {
// 	add_post_type_support( 'project', 'comments' );
// }
   
//  add_action( 'init', 'enable_comments_project', 11 );

/* Personnalisation du formulaire ACF */


/* On retire les styles ACF */
add_action('wp_enqueue_scripts', 'acf_form_deregister_styles');

function acf_form_deregister_styles(){
    
    // Deregister ACF Form style
    wp_deregister_style('acf-global');
    wp_deregister_style('acf-input');
    
    // Avoid dependency conflict
    wp_register_style('acf-global', false);
    wp_register_style('acf-input', false);
    
}

/* On ajoute les classes Bootstrap */
add_filter('acf/validate_form', 'acf_form_bootstrap_styles');
function acf_form_bootstrap_styles($args){
    
    // Before ACF Form
    if(!$args['html_before_fields'])
        $args['html_before_fields'] = '<div class="row">'; // May be .form-row
    
    // After ACF Form
    if(!$args['html_after_fields'])
        $args['html_after_fields'] = '</div>';
    
    // Success Message
    if($args['html_updated_message'] == '<div id="message" class="updated"><p>%s</p></div>')
        $args['html_updated_message'] = '<div id="message" class="updated alert alert-success">%s</div>';
    
    // Submit button
    if($args['html_submit_button'] == '<input type="submit" class="acf-button button button-primary button-large" value="%s" />')
        $args['html_submit_button'] = '<input type="submit" class="acf-button button button-default button-large btn btn-default" value="%s" />';
    
    return $args;
    
}

/* On rajoute les contrôles sur le formulaire */
add_filter('acf/prepare_field', 'acf_form_fields_bootstrap_styles');
function acf_form_fields_bootstrap_styles($field){
    
    // Target ACF Form Front only
    if(is_admin() && !wp_doing_ajax())
        return $field;
    
    // Add .form-group & .col-12 fallback on fields wrappers
    $field['wrapper']['class'] .= ' form-group col-12';
    
    // Add .form-control on fields
    $field['class'] .= ' form-control';
    
    return $field;
    
}



/* On ajoute les * pour les champs définis comme obligatoires  */
add_filter('acf/get_field_label', 'acf_form_fields_required_bootstrap_styles');
function acf_form_fields_required_bootstrap_styles($label){
    
    // Target ACF Form Front only
    if(is_admin() && !wp_doing_ajax())
        return $label;
    
    // Add .text-danger
    $label = str_replace('<span class="acf-required">*</span>', '<span class="acf-required text-danger">*</span>', $label);
    
    return $label;
    
}



// wordpress va gérer les balises <title> du thème
add_theme_support('title-tag');
// le thème gère les images de mise en avant des posts
add_theme_support('post-thumbnails');


?>