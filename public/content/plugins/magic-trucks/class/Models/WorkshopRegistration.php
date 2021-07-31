<?php

namespace magicTrucks\Models;


class WorkshopRegistration extends CoreModel
{


    public function createTable()
    {

        $sql = "
        CREATE TABLE `workshop_registration` (
            `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `first_name` varchar(255) CHARACTER SET utf8mb4 NULL,
            `last_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
            `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
            `phone` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
            `comment` text COLLATE utf8mb4_general_ci NULL,
            `workshop_id` bigint(24) unsigned NOT NULL,
            `user_id` bigint(24) unsigned NOT NULL,
            `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
            `updated_at` datetime NULL
        );
    ";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public function dropTable()
    {
        $sql = "DROP TABLE `workshop_registration`";
        $this->database->query($sql);
    }


    public function insert($userId, $workshopId, $firstname, $lastname, $email, $phone = '', $comment = '')
    {

        // STEP WP CUSTOMTABLE insert
        // le tableau data stocke les données à insérer dans la table
        $data = [
            'user_id' => $userId,
            'workshop_id' => $workshopId,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'comment' => $comment,
            "created_at" => date('Y-m-d H:i:s')
        ];

        $this->database->insert(
            'workshop_registration', // table dans laquelle insérer les données
            $data // les données à insérer dans la table
        );

    }

    public function delete($id)
    {
        $where = [
            'id' => $id
        ];
        $this->database->delete(
            'workshop_registration',
            $where
        );
    }

    public function update($id, $workshopId, $userId, $comment)
    {
        $data = [
            'workshop_id' => $workshopId,
            'user_id' => $userId,
            'comment' => $comment,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $where = [
            'id' => $id
        ];

        $this->database->update(
            'workshop_registration',
            $data,
            $where
        );
    }


    public function getWorkshopsByUserId($userId)
    {
        // var_dump($userId);
        // exit();
        // Syntaxe WP : %d = partie variable qui est un entier - cf. sprintf
        $sql = "
                SELECT *
                FROM `workshop_registration`
                WHERE
                user_id = %d
            ";


        $rows = $this->executePreparedStatement($sql,
            [
                $userId
            ]
        );
        

        $results = [];
        // Pour chaque ligne de résultat, nous ajoutons l'id du Workshop à récupérer
        foreach($rows as $values) {

            $workshop = get_post($values->workshop_id, 'workshop', 'raw');

            // On stocke le résultat dans un tableau
            $results[] = [
                'workshop' => $workshop
            ];
        } 

        return $results;
    }

    public function getUsersByWorkshopId($workshopId)
    {
        $sql = "
            SELECT
                user_id
            FROM `workshop_registration`
            WHERE
                workshop_id = %d
        ";

        $rows = $this->executePreparedStatement(
            $sql,
            [
                $workshopId
            ]
        );

        return $rows;
    }
}

