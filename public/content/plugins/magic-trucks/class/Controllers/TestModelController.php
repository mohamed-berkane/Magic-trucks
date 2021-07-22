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
            10, // id utilisateur
            5, // id technologie
            5 // niveau de maitrise
        );
        /*
        $model = new DeveloperSkillModel();
        $model->insert(
            10, // id utilisateur
            9, // id de la compétence
            3 // niveau de maitrise
        );
        */
        $model = new WorkshopRegistration();
        $model->insert(
            10, // id utilisateur
            5, // id project
            5 // niveau de maitrise
        );
        /*
        $model->insert(
            12, // id utilisateur
            10, // id technologie
            3 // niveau de maitrise
        );
        */
    }

    public function delete()
    {
        $model = new WorkshopRegistration();
        $model->delete(1);
    }

    public function update()
    {
        $model = new WorkshopRegistration();
        $model->update(
            2,  // id de la ligne a mettre à jour
            10, // id de la technologie
            4 //niveau de maitrise
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
