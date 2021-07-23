<?php
		get_header();
		?>

<div class='header-workshop'>

</div>
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
            <h1 class="page-title">Création d'un compte</h1>
        </header>
        
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="thin text-center">Vous êtes dejà inscrit ?</h3>
                    <p class="text-center text-muted">Cliquez <a href="signup.html">ICI </a> pour vous connecter à votre compte ! Sinon, suivez les instructions pour vous en créer un. </p>
                    <hr>
                    
                    <form>
								<div class="top-margin">
									<label>Nom</label>
									<input type="text" class="form-control">
								</div>
								<div class="top-margin">
									<label>Prénom</label>
									<input type="text" class="form-control">
								</div>
								<div class="top-margin">
									<label>Adresse mail <span class="text-danger">*</span></label>
									<input type="text" class="form-control">
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe <span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
									<div class="col-sm-6">
										<label>Confirmez votre mot de passe <span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Créer son compte</button>
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
	?>