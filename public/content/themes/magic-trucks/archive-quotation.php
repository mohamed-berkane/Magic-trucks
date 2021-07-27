<?php
    acf_form_head();
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
                   
                    <!-- <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST"> -->
                    <!-- <form> -->
                    <!-- Je redirige le traitement POST vers admin-post.php  avec la fonction admin_url -->

                        <div class="row top-margin">
                            <div class="col-sm-6">

                                <?php
                                    $user = wp_get_current_user();
                                    $options = array(
                                        //acf_form(array(
                                    //acf_register_form(array(
                                        //'post_id' => "quote_{$user->ID}",
                                        //'id' => "new_quotation",
                                        //'post_id' => "new_post",
                                        'post_title'	=> false,
                                        'post_content'	=> false,
                                        'field_groups' => ['group_60ff07d8deb70'],
                                        'form_attributes' => array(
                                            'method' => 'POST',
                                            'action' => admin_url("admin-post.php"),
                                          ),
                                        'html_before_fields' => sprintf(
                                            '
                                            <div class="top-margin">
                                            <input type="hidden" name="action" value="quotation_form">
                                            '
                                        ),
                                        'form' => true,
                                        'html_after_fields' => '</div>',
                                        'new_post'		=> array(
                                            'post_type'		=> 'quotation',
                                            'post_status'	=> 'publish'
                                        ),
                                        'html_submit_button' => '<button class="btn btn-action" type="submit" name="submit" value="quotation">Let\'s Go !</button>'
                                    );
                                    acf_form($options);
                                ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 text-right">

                                <!-- traitement de l'envoie du formulaire en POST -->
                                <!-- <input type="hidden" name="action" value="quotation_form">
                                <input type="hidden" name="user_id" value="user_%s"> -->
                            </div>
                        </div>
					<!-- </form> -->

                </div>
            </div>
        </div>
    </article>
    <!-- /Article -->

</div>
</div>	<!-- /container -->

<div id="content">
	

	
</div>

<?php
    get_footer();