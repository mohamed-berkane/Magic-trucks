<?php

    get_header();

    $currentUser = $args['currentUser'];

    // workshop 
    $workshops = $args['workshops'];

    if (isset($args['message'])) {
        $message = $args['message'];
        print_r($message);
    }

?>

<style>
.jumbotron {
    margin-top:20px; 
    background:#fff;
}

.jumbotron img {
    max-height:60px;
}

.jumbotron .centered {
    text-align: center;
}

.mon-profil {
    padding: 0 10px;
}

.mt {
    margin-top:150px;
}

.jumbotron-wrapper {
    width: 100%;
}

</style>

<!-- container -->
<div class="container mt">

    <div class="jumbotron">
        <div class="jumbotron-wrapper">
            <div class="centered">
                <img src="<?= get_theme_file_uri()?>/assets/images/magictrucks6.png"/>
            </div>
            <h1 class="page-title">Mon profil</h1>
            <p class="lead">Bienvenue dans votre espace personnel. Vous pouvez modifier vos coordonnées ou consulter votre historique d'actions sur le site. </p>
        </div>

        <p>
            <h4>Coordonnées :</h4>
            <strong>Prénom</strong> : <?= $currentUser->user_firstname; ?><br>
            <strong>Nom</strong> : <?= $currentUser->user_lastname; ?><br>
            <strong>Email</strong> : <?= $currentUser->data->user_email; ?><br><br>
        </p>

        <p>
            <a class="btn btn-default" href="/apotheose/magic-trucks/public/user/update/">
                <i class="fas fa-edit"></i> Mettre à jour
            </a>
            <a class="btn btn-success" href="/apotheose/magic-trucks/public/user/delete" onclick="return confirm('Etes-vous sûr de vouloir supprimer votre compte ? Cette action est définitive');">
                <i class="fas fa-trash-alt"></i> Supprimer
            </a>
            <a class="btn btn-info" href="/apotheose/magic-trucks/public/wp/wp-login.php?action=logout">
                <i class="fas fa-sign-out-alt"></i> Déconnecter
            </a>
        </p>

    </div>

    <div class="row">

        <!-- panel 1 -->
        <div class="col-sm-12" style="color:black;">
            <div class="panel panel-default">
                <div class="panel-body">
                <h3 class="thin text-center">Mes ateliers</h3>
                <p class="text-center text-muted"></p><p>Liste des ateliers dans lesquels vous êtes inscrits</p>
                <hr>
                
                
                <?php

                    // print_r($workshops[0]);

                    // Workshops
                    $nb_workshops = count($workshops);
                    //echo "Atelier :" . $nb_workshops . "<br>";
                    
                    if ($nb_workshops > 0){

                        // On stocke les id des workshops dans lesquels le user est enregistré pour les communiqués à single workshop
                        $registeredWorkshops = [];
                        for ($i = 0; $i < count($workshops); $i++) {

                            $workshop = $workshops[$i]['workshop'];
                            $registeredWorkshops[] += $workshop->ID;

                        ?>

                        <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                            <img class="media-object" style="float:left; max-width: 100px; padding:5px 10px 0 0px;" src="<?= get_the_post_thumbnail_url($workshop->ID); ;?>" alt="Vignette atelier">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?= $workshop->post_title; ?></h4>
                            <p><?= $workshop->post_content; ?></p>
                            <a href="<?= $workshop->guid; ?>">En savoir plus</a>
                        </div>
                        </div>

                        <?php
                        }
                        
                    }

                    else {

                    ?>    
                        <p>Vous êtes inscrit à aucun atelier pour l'intant</p>
                        <p>Voir la <a href="/apotheose/magic-trucks/public/workshop/">liste des ateliers</a></p>
                    <?php        
                    }
                    
 
                    ?>
                    <br> 
                    <p></p>
                    <p class="text-center">
                        <a class="btn btn-success" href="/apotheose/magic-trucks/public/workshop/">Liste des ateliers</a>
                    </p>
                </div>

            </div>
        </div>
       
        <!-- panel 2 --> 
        <div class="col-sm-12" style="color:black;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="thin text-center">Mes demandes de devis</h3>
                    <p class="text-center text-muted"></p><p>Hello world</p>
                    <hr>
                    <div class="workshop-img ">
                        <ul>
                            <li>Lieu : Avignon</li>
                            <li>Durée : 4h00</li>
                            <li>Prix : 160 euros</li>
                        </ul>
                        <p>image</p>
                    </div>

                    <!-- <button onclick=">En savoir plus</button"> -->
                    <a href="http://localhost/apotheose/magic-trucks/public/workshop/mon-tout-1er-atelier/">En savoir plus</a>
                </div>
            </div>
        </div>  

    </div>     

</div>	<!-- /container -->









<?php
    get_footer();