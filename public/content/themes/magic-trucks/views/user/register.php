<?php
    get_header();
?>

<?php    
    $currentUser = $args['currentUser'];
    $workshopId = $args['workshopId'];
    //print_r($currentUser);
?>

    <br><br><br>
    <h2>Merci de confirmer vos coordonnées</h2><br>

    <form action="" method="POST">

            <label for="firstname">Prénom</label><br>
            <input type="text"  id="firstname" name="firstname" placeholder="Prénom" value=""><br>

            <label for="lastname">Nom</label><br>
            <input type="text"  id="lastname" name="lastname" placeholder="Nom" value=""><br>
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
    get_footer();