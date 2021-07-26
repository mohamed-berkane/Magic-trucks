<?php
    get_header();
?>
<?php
    // $table_name = 'quotation'; // table devis à créer dans la BDD de WP
    // global $wpdb;
    // $retrieve_data = $wpdb->get_results( “SELECT * FROM $table_name where isbn = ‘”.$field.”‘”);
    //     foreach ($retrieve_data as $retrieved_data) {

    //     echo $retrieved_data->title;
    //     // echo $retrieved_data->image; // for image
    //     }

?>



    <br><br><br>
        <!-- container -->
        <div class="container">

<ol class="breadcrumb">
    <li><a href="index.html">Home</a></li>
    <li class="active">User access</li>
</ol>

<div class="row">
    
    <!-- Article main content -->
    <article class="col-xs-12 maincontent">
        <header class="page-header">
            <h1 class="page-title">Demande de devis</h1>
        </header>
        
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="thin text-center">Ici vous pouvez faire une demande pour un tout nouveau camion. </br> </br> A moins que vous ne vouliez faire des travaux sur votre camion actuel ? 
                    </h3>
                    <p class="text-center text-muted">Vous êtes au bon endroit</p>
                    <hr>

                    <!-- traitement de l'envoie du formulaire en POST -->
                   
                    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
                    <!-- Je redirige le traitement POST vers admin-post.php  avec la fonction admin_url -->

                        <div class="top-margin">
                            <label>Je veux</label>
                            <?php 
                                // récupération des types des travaux associées au devis
                                $worktypes = get_terms( array(
                                    'taxonomy' => 'worktype',
                                    'hide_empty' => false
                                ) );
                                // récupération des budgets associées au devis
                                $budgets = get_terms( array(
                                    'taxonomy' => 'budget',
                                    'hide_empty' => false
                                ) );  
                               // récupération des options sur place disponible associées au devis
                               $places = get_terms( array(
                                'taxonomy' => 'place',
                                'hide_empty' => false
                            ) );                                                               
                            ?>                           
                            <select name="worktype" id="work-select" class="form-control">
                                <?php foreach($worktypes as $worktype): ?>
                                        <option  value="<?= $worktype->name ?>" name="worktype"><?= $worktype->name ?>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="top-margin">
                            <label>Mon Budget</label>
                            <select name="budget" id="budget-select" class="form-control">
                                <?php foreach($budgets as $budget): ?>
                                        <option  value="<?= $budget->name ?>"  name="budget"><?= $budget->name ?>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="top-margin">
                            <label>J'ai de la place pour accueillir Guillaume (...)</label>
                            <select name="place" id="insite-select" class="form-control">

                                <?php foreach($places as $place): ?>
                                        <option  value="<?= $place->name ?>"  name="place"><?= $place->name ?>
                                <?php endforeach; ?>

                                <textarea name="placedetail" id="placedetail" rows="3" cols="40" placeholder="Précisez."></textarea>
                                </textarea>
                            </select>
                        </div>
                        <div class="row top-margin">
                            <div class="col-sm-6">
                                <label for="precise">Autre indications</label>
                                <textarea name="precise" id="precise" rows="3" cols="40" placeholder="Si vous avez d'autres précisions à nous donner, décrivez les ici"></textarea>
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 text-right">

                                <!-- traitement de l'envoie du formulaire en POST -->
                                <input type="hidden" name="action" value="quotation_form">
                                <button class="btn btn-action" type='submit' name='submit'>Let's Go !</button>
                            </div>
                        </div>
					</form>

                </div>
            </div>
        </div>
    </article>
    <!-- /Article -->

</div>
</div>	<!-- /container -->

<?php
    get_footer();