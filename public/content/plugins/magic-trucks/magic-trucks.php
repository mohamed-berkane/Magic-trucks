<?php
/**
 * Plugin Name: Magic-Trucks
 * Author: Magic-Trucks team
 * Description: Plugin créé pour le projet d'apotheose 
 */

use magicTrucks\Plugin;
use magicTrucks\Models\WorkshopRegistration;

require __DIR__ . '/vendor-magic-trucks/autoload.php';


// instanciation du plugin
$magictrucks = new Plugin();

 // au moment de l'activation du plugin, lancer les traitements dont il a besoin


// DOC WP PLUGININ activation "hook" : https://developer.wordpress.org/reference/functions/register_activation_hook/
register_activation_hook(
    // le chemin vers le fichier de déclaration du plugin
    __FILE__,
    // appel de la méthode activate sur l'objet $magic-trucks
    [$magictrucks, 'activate']
);


register_deactivation_hook(
    __FILE__,
    [$magictrucks, 'deactivate']
);

/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'Utilisateurs Inscits:', 'textdomain' ), 'wpdocs_my_display_callback', 'workshop','side', 'high' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function wpdocs_my_display_callback( $post ) {
    
    $model = new WorkshopRegistration();

    $users = [];
    $users = $model->getUsersByWorkshopId($post->ID);
    // var_dump($users); die();
    foreach ($users as $key => $user) {
        $userObject = get_user_by( 'id', $user->user_id );
        echo $userObject->data->user_login; 
        echo '<td>'.'<br>';
    }
    
    
    // Display code/markup goes here. Don't forget to include nonces!
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
}
add_action( 'save_post', 'wpdocs_save_meta_box' );
