<?php

namespace magicTrucks\Models;


class CoreModel
{

    // IMPORTANT WP CUSTOMTABLE la propriété $database nous permet de récupérer le composant pour intéragir avec la base de données
    protected $database;

    public function __construct()
    {
        global $wpdb;
        $this->database = $wpdb;
    }

    public function executePreparedStatement($sql, $parameters = [])
    {

        // gestion des requêtes SQL sans partie "variable" (cad qu'il n'y a pas de paramètre)
        // STEP WP CUSTOMTABLE requête sql sans paramètre
        if(empty($parameters)) {
            return $this->database->get_results($sql);
        }
        else {
            // DOC WP CUSTOMTABLE prepared statement https://developer.wordpress.org/reference/classes/wpdb/#examples-9
            $preparedStatement = $this->database->prepare(
                $sql,
                $parameters
            );

            // execution de la requête préparée
            return $this->database->get_results($preparedStatement);
        }
    }
}
