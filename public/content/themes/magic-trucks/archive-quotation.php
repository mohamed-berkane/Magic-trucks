<?php
    acf_form_head();
    get_header();
?>

<br><br><br>
<!-- container -->
<div class="container">

    <ol class="breadcrumb">
        <li><a href="<?=get_home_url() ?>">Home</a></li>
        <li class="active">User access</li>
    </ol>
    <div class="row">
        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Demande de devis</h1>
            </header>
            

            <div class="panel panel-default" style="padding:35px;">
                <div class="panel-body">
                    <h3 class="thin text-center">Ici vous pouvez faire une demande pour un tout nouveau camion. </br> </br> A moins que vous ne vouliez faire des travaux sur votre camion actuel ? 
                    </h3>
                    <p class="text-center text-muted">Vous êtes au bon endroit</p>
                    <hr>
                    <div class="row top-margin">
                        <?php
                            $options = [
                                    'post_id'        => 'new_post',
                                    'post_title'    => false,
                                    'post_content'    => false,
                                    'field_groups' => ['group_60ff07d8deb70'],
                                    'html_before_fields' => sprintf(
                                        '
                                        <div class="top-margin">
                                        <input type="hidden" name="action" value="quotation_form">
                                        '
                                    ),
                                    'html_after_fields' => '</div>',
                                    'new_post'        => [
                                            'post_type'    => 'quotation',
                                            'post_status' => 'publish'
                                    ],
                                    'submit_value'	=> 'Send'
                            ];
                            acf_form($options);
                        ?>
                    </div>
                </div>
            </div>
        </article>
        <!-- /Article -->

    </div>
</div>	<!-- /container -->
<script>
    let radioList = document.querySelector('.acf-radio-list');
    radioList.classList.remove("form-control");
</script>

<?php
    get_footer();