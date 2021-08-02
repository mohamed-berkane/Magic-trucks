<!-- <?php
    get_header();
?> -->

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
            <div class="panel panel-body" style="background:#fff; margin-top:200px; height: 350px;">
                <p><?= $message; ?></p>
                <p>
                    <a href="/apotheose/magic-trucks/public/user/home">Revenir sur mon profil</a>
                    <br>
                    <a href="/apotheose/magic-trucks/public/workshop/">Revenir à la liste des ateliers</a></p>
            </div>
        </div>
    </div>

<?php   
    } else {
?>

    <br><br><br>
    <h2>Merci de confirmer vos coordonnées</h2><br>
    <!-- $nicename = $firstname . " " . $lastname;   -->

    <form action="" method="POST">

            <label for="firstname">Prénom</label><br>
            <input type="text"  id="firstname" name="firstname" placeholder="Prénom" value="<?= get_user_meta( $currentUser->ID, 'first_name', true ) ?>"><br>

            <label for="lastname">Nom</label><br>
            <input type="text"  id="lastname" name="lastname" placeholder="Nom" value="<?= get_user_meta( $currentUser->ID, 'last_name', true ) ?>"><br>
            <!-- <input type="text"  id="lastname" name="lastname" placeholder="Nom" value="<?= $currentUser->data->user_nicename; ?>"><br> -->

            <label for="email">Email</label><br>
            <input type="text"  id="email" name="email" placeholder="Email"  value="<?= $currentUser->data->user_email; ?>"><br>

            <label for="phone">Téléphone</label><br>
            <input type="text"  id="phone" name="phone" placeholder="Phone"  value=""><br>

            <label for="comment">Commentaire</label><br>
            <input type="text"  id="comment" name="comment" placeholder="Commentaire" value=""><br><br>

            <!-- <input type="hidden"  id="workshop-id" name="workshop-id" value="<?= $workshopId ?>"><br> -->

            <!--<input type="hidden" name="user_id" id="user_id" value="<?= $currentUser->data->ID; ?>" disabled>-->

            <button type="submit" >Valider</button>
    </form>
<?php
    
}

?>


<?php
    get_footer();