<?php

namespace magicTrucks\Controllers;



use magicTrucks\Models\CoreModel;

use magicTrucks\Models\WorkshopRegistration;



class TestModelController extends CoreController

{







    public function insert()

    {

        $model = new WorkshopRegistration();

        $model->insert(

            17, // id atelier

            1 // id utilisateur

        );

    }



    public function delete()

    {

        $model = new WorkshopRegistration();

        $model->delete(5);

    }



    public function update()

    {

        $model = new WorkshopRegistration();

        $model->update(

            2,  // id de la ligne a mettre à jour

            15, // id atelier

            2 //id utilisateur

        );

    }





    public function getWorkshopsByUserId()

    {

        $model = new WorkshopRegistration();

        $rows = $model->getWorkshopsByUserId(

            12

            // 12 . '; DROP TABLE developer_technology'

        );



        echo '<div style="border: solid 2px #F00">';

            echo '<div style="; background-color:#CCC">@'.__FILE__.' : '.__LINE__.'</div>';

            echo '<pre style="background-color: rgba(255,255,255, 0.8);">';

            print_r($rows);

            echo '</pre>';

        echo '</div>';

    }

}

