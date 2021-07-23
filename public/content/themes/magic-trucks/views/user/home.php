<?php

    get_header();

    $currentUser = $args['currentUser'];
    
    print_r($currentUser);

    
?>

    <br><br><br>

    <strong>Nom</strong> : <?= $currentUser->data->user_nicename; ?>
    <br>
    <strong>Email</strong> : <?= $currentUser->data->user_email; ?>
    <br>


<?php
    get_footer();