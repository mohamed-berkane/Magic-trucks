<?php
    get_header();
?>

<?php    
    $currentUser = $args['currentUser'];
    $workshopId = $args['workshopId'];
    $message = $args['message'];
    //var_dump(get_user_meta( $currentUser->ID, 'last_name', true ));
    //get_user_meta( $currentUser->ID, 'first_name', true )
?>

<?php 
    if (isset($message) & $message !='') {
?>
    <div class="container">
        <div class="row">
            <div class="panel panel-body" style="margin-top: 150px;">
                <div class="panel panel-body">
                    <article class="col-md-12">
                        <header class="page-header">
                            <h1 class="workshop-title">Déjà inscrit</h1>
                        </header>
                        
                        <h3><?= $message; ?></h3>
                        <br><br>
                        <div class="article-buttons">    
                            <span>
                                <a class="btn btn-default" href="/apotheose/magic-trucks/public/user/home">Mon profil</a>
                            </span>
                            <span>
                                <a class="btn btn-info"href="/apotheose/magic-trucks/public/workshop/">Liste des ateliers</a>
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

<?php   
    } else {
?>

<div class="container">
        <div class="row">
            <div class="panel panel-body" style="background:#fff; margin-top:200px;">
                <h2>Merci de confirmer vos coordonnées</h2><br>
                <!-- $nicename = $firstname . " " . $lastname;   -->

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="firstname">Prénom</label><br>
                        <input type="text"  id="firstname" name="firstname" placeholder="Prénom" value="<?= get_user_meta( $currentUser->ID, 'first_name', true ) ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Nom</label><br>
                        <input type="text"  id="lastname" name="lastname" class="form-control" placeholder="Nom" value="<?= get_user_meta( $currentUser->ID, 'last_name', true ) ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label><br>
                        <input type="text"  id="email" name="email" class="form-control" placeholder="Email"  value="<?= $currentUser->data->user_email; ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label><br>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"  value=""><br>
                    </div>
                    <div class="form-group">
                        <label for="comment">Commentaire</label><br>
                        <input type="text" class="form-control"  id="comment" name="comment" placeholder="Commentaire" value=""><br><br>
                    </div>

                <button type="submit" class="btn btn-default">Valider</button>
                </form>
            </div>
        </div>
    </div>
<?php
    
}

?>


<?php
    get_footer();