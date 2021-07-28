<?php

// gestion des menus via le back office de Wordpress pour le thème Magic-Trucks
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

?>

