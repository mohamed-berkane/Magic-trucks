# Installation custom de Wordpress

## Dépots (supermarchés) qui nous seront utiles
- Packagist (le supermarché de PHP) : https://packagist.org/?query=wordpress
- WPackagist (le supermarche de Wordpress) : https://wpackagist.org/search?q=astra&type=any&search=


## Etape 1 Configuration du composer.json
Attention le fichier composer.json doit se trouver à la racine du site web

**ATTENTION IL NE FAUT PAS DE COMMENTAIRES DANS LE FICHIER composer.json**

```json
{
    // nous disons à composer que l'adresse du supermarché de wp se trouve "à tel endroit"
    "repositories":[
        {
            "type":"composer",
            "url":"https://wpackagist.org",
            // nous spécifions à composer qu'il devra aller "faire ses courses" pour les "produits" de type "wpackagist-plugin/" et "wpackagist-theme"
            "only": ["wpackagist-plugin/*", "wpackagist-theme/*"]
        }
    ],

    // nous spécifions à composer que les fichiers source de wordpress se trouveront dans le dossier wp
    "extra": {
        // les plugins et les thèmes seront installés dans le dossier content
        "content/plugins/{$name}/": [
            "type:wordpress-plugin"
        ],
        "content/themes/{$name}/": [
            "type:wordpress-theme"
        ],
        "wordpress-install-dir": "wp"
    },

    // notre liste de courses
    "require": {
        // installer wordpress
        "johnpbloch/wordpress": "^5.6",

        // le theme officiel du gerbotron 2021
        "wpackagist-theme/twentytwentyone": "^1.0",

        // l'éditeur classique de wordpress
        "wpackagist-plugin/classic-editor": "*"
    },

    // cette partie permet de créer de "scripts" (raccouris) utilisables avec composer
    "scripts": {

        "activate-theme": "wp theme activate ",
        "activate-plugins": "wp plugin activate --all",
        "activate-htaccess": "wp rewrite structure '/%year%/%monthnum%/%postname%/' --hard",

        // met les bon droits sur les bon dossiers pour que worpress puisse installer des thèmes/plugins/enregistrer des images
        "chmod": [
            "sudo chgrp -R www-data .",
            "sudo find . -type f -exec chmod 664 {} +",
            "sudo find . -type d -exec chmod 774 {} +",
            "touch .htaccess",
            "sudo chmod 775 .htaccess"
        ],

        "wp-install-application-passwords": "wp plugin install application-passwords --activate",
        "wp-install-classic-editor": "wp plugin install classic-editor --activate",
        "wp-install-jwt": "wp plugin install jwt-auth --activate",
        "wp-install-jwt2": "wp plugin install jwt-authentication-for-wp-rest-api --activate"
    }
}

```

## Etape 2 lancer composer
Se placer en ligne de commandes dans le dossier du site web (dossier public dans le cas présent)

Lancer la commande ```composer install```
_Composer lance une notification comme quoi le fichier composer.lock n'existe pas_


## Etape 3 SURTOUT ne pas oublier de configurer le fichier .gitignore

Dans le cas présent, ignorer les dossiers/fichiers suivants :
- vendor
- wp
- wp-content
- content
- wp-config.php
- .htaccess

## Etape 4 Création de l'index.php dans la racine du site

```php
<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );
/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp/wp-blog-header.php';

```

**attention de bien configurer cette ligne si jamais nous n'installez pas wordpress dans un dossier nommé ```wp```"**
```php
require __DIR__ . '/wp/wp-blog-header.php';
```






## Etape 5 créer le fichier wp-config.php (à la racine du site web)

Utiliser le fichier wp-config-sample.php comme modèle de départ

Si le fichier wp-config-sample.php de wordpress a été utilisé, ne pas oublier de rajouter Et de configurer ce bout de code avant l'appel à ```php require_once ABSPATH . 'wp-settings.php';```
```php
// url vers la home (la racine) du site wordpress
define('WP_HOME', rtrim ( 'http://localhost/URL_VER_LE_DOSSIER_PUBLIC_DE_WORDPRESS', '/' ));

// nous spécifions dans quel dossier sont installés les fichiers de wordpress
define('WP_SITEURL', WP_HOME . '/wp');

define('WP_CONTENT_URL', WP_HOME . '/content');
define('WP_CONTENT_DIR', __DIR__ . '/content');


// on peut installer des plugins/theme directement depuis le backoffice
define('FS_METHOD','direct');
```




**Attention de bien configurer l'url de la racine du site wordpress**

## Etape 6 créer la base de donnée avec adminer (ou autre)



## Etape 7 (si pas déjà installé) Installation du logiciel wp-cli
```sh
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
# ne pas oublier d'appuyer sur la touche entrée
```

## Etape 8, créer le fichier wp-cli.yml
**Créer ce fichier à la racine du dossier "public"**
**Faire attention à la directive ```path: wp```si jamais vous avez installé worpdress dans un dossier différent**
```yml
path: wp
apache_modules:
  - mod_rewrite
```

## Etape 9, lancer la ligne de commande pour installer wordpress

**Ne pas oublie de se placer dans le dossier racine du site wordpress**

```sh
wp core install --url="WORDPRES_URL" --title="WORDPRES_SITE_NAME" --admin_user="WORDPRES_ADMIN_NAME" --admin_password="WORDPRES_ADMIN_PASSWORD" --admin_email="WORDPRES_ADMIN_EMAIL" --skip-email;
```

**Attention de ne pas se tromper avec le paramètre --url**

## Etape 10, lancer les commandes composer "essentielles"
**Ne pas oublie de se placer dans le dossier racine du site wordpress**

```sh
composer run chmod
```

Pour rempir le htaccess avec la bonne configuration, deux possibilités : 
- Soit enregistrer les permaliens dans l'administration
- Soit executer la commande suivante dans le terminal :
```sh
composer run activate-htaccess
```

## Annexes

S'il y a de problème de droit avec le fichier .htaccess, lancer cette commande dans le terminal (attention a être dans le dossier public)

```sh
# nous disons que le fichier .htaccesss appartient au même groupe qu'apache
sudo chgrp www-data .htaccess

# nous donnons les droits d'écriture au propriétaire et au groupe
sudo chmod 775 .htaccess
```
