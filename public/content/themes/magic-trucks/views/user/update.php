<?php

    get_header();
    $currentUser = $args['currentUser'];
    $user = wp_get_current_user();
?>

<!-- container -->
<div class="container-fluid" style="margin-top:150px">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">About</li>
    </ol>




    <div class="row" style="display: flex;">

        <div style="color:black; background:#fff; width:50%">
            <header class="page-header">
                <p style="text-align:right; padding: 0 1rem;">&nbsp;<i class="fas fa-long-arrow-alt-left" style="color:#444; margin-right:5px"></i><a href="/apotheose/magic-trucks/public/user/home">Retour à mon profil</a></p>
                <h1 class="page-title">
                    Mettre à jour mon profil
                </h1>
            </header>
            <div class="panel">
                <div class="panel-body">
                    <form action="/apotheose/magic-trucks/public/user/update/" method="POST" action="#">
                        <!-- On fait un traitement spécifique pour éviter le CSRF -->
                        
                        <?php  ?>

                        <label for="user_login">Login : </label>
                        <input id="user_login" type="text" name="user_login"  value="<?= $user->user_login; ?>" class="form-control">
                        <br>

                        <label for="user_firstname">Prénom : </label>
                        <input id="user_firstname" type="text" name="user_firstname" value="<?= $user->user_firstname; ?>" class="form-control">
                        <br>

                        <label for="user_lastname">Nom : </label>
                        <input id="user_lastname" type="text" name="user_lastname"  value="<?= $user->user_lastname; ?>" class="form-control"> 
                        <br>

                        <label for="user_email">Email : </label>
                        <input id="user_email" type="text" name="user_email" value="<?= $currentUser->data->user_email; ?>" class="form-control">
                        <br>
                        
                        <input type="submit" value="Sauvegarder"class="btn btn-primary"/>
                    </form>
                </div>
            </div>
        </div>

        <div style="margin:0; padding:0; background: url('https://images.unsplash.com/photo-1594495894542-a46cc73e081a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80'); background-size: cover; background-repeat:no-repeat; width:50%"> 
        </div>


    </div>
</div>	<!-- /container -->










<?php
    get_footer();