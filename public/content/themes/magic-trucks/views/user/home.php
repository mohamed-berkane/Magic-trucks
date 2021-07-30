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
    display: flex;
    flex-wrap: wrap;
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

.half {
    width: 50%;
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

        <div class="half">
            <h4>Coordonnées :</h4>
            <strong>Prénom</strong> : <?= $currentUser->user_firstname; ?><br>
            <strong>Nom</strong> : <?= $currentUser->user_lastname; ?><br>
            <strong>Email</strong> : <?= $currentUser->data->user_email; ?>
        </div>

        <div class="half">
            <h4>Actions :</h4>
            <a href="/apotheose/magic-trucks/public/user/update/">
                <i class="fas fa-edit"></i> Mettre à jour
            </a><br>
            <a href="/apotheose/magic-trucks/public/user/delete" onclick="return confirm('Are you sure you want to delete this item?');">
                <i class="fas fa-trash-alt"></i> Supprimer
            </a><br>
            <a href="/apotheose/magic-trucks/public/wp/wp-login.php?action=logout">
                <i class="fas fa-sign-out-alt"></i> Déconnecter
            </a>
        </div>

    </div>

    <div class="row">

        <!-- panel 1 -->
        <div class="col-sm-6" style="color:black;">
            <div class="panel panel-default">
                <div class="panel-body">
                <h3 class="thin text-center">Mes ateliers</h3>
                <p class="text-center text-muted"></p><p>Liste des ateliers dans lesquels vous êtes inscrits</p>
                <hr>
                
                
                <?php



                    // Récupération des posts dont on est l'auteur
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'author' => $currentUser->ID,
                        'orderby' => 'post_date',
                        'order' => 'ASC',
                    );

                    // On instancie l'objet auteur
                    $author_query = new WP_Query($args); 
                    
                    // On regarde si l'auteur a un post 
                    $nb_post = count_user_posts($currentUser->ID, 'post', false );

                    echo "blog :" . $nb_post; 

                    // Si l'auteur a des posts, on les affiche
                    if ($nb_post > 0) {

                        while ($author_query->have_posts() ) : $author_query->the_post();

                        $title = get_the_title();
                        $content = substr(get_the_content(), 0, 150);

                        echo $title;
                        echo $content;
    
                        endwhile;
                    }

                    // Sinon, on lui indique qu'il pourrait se bouger un peu
                    else {
                    ?>
                        <p>Vous n'avez pas écrit d'actus pour le moment</p>
                        <p>Voir la <a href="/apotheose/magic-trucks/public/workshop/">liste des actus</a></p>

          
                    <?php
                    }

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

                            echo "<strong>" . $workshop->post_title . "</strong>";
                            echo '<br>';
                            echo $workshop->post_content;

                        ?>
                            <br>
                            <!-- On renvoie ici les paramètres à la vue -->
                            <a href="<?= $workshop->guid; ?>">En savoir plus</a>
                            <br><br>

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
                </div>
            </div>
        </div>
       
        <!-- panel 2 --> 
        <div class="col-sm-6" style="color:black;">
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