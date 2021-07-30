<footer id="footer" class="top-space">

	<div class="footer1">
		<div class="container">
			<div class="row">

				<div class="col-md-3 widget">
					<h3 class="widget-title">Contact</h3>
					<div class="widget-body">
						<p>06 74 28 54 17<br>
							<a href="mailto:#">contact@magictrucks.com</a><br>
						</p>
					</div>
				</div>

				<div class="col-md-3 widget">
					<h3 class="widget-title">Mes réseaux sociaux</h3>
					<div class="widget-body">
						<p class="follow-me-icons">
							<a href=""><i class="fa fa-twitter fa-2"></i></a>
							<a href=""><i class="fa fa-dribbble fa-2"></i></a>
							<a href=""><i class="fa fa-github fa-2"></i></a>
							<a href=""><i class="fa fa-facebook fa-2"></i></a>
						</p>
					</div>
				</div>

				<div class="col-md-6 widget">
					<h3 class="widget-title">Avis clients</h3>
					<div class="widget-body">


						<p><strong>Robert, le 15/01/21 ★★★★★ </strong>


							Guillaume a donné vie à mon camion! Le meilleur en conceptions et agencements! Camion fonctionnel et spacieux car réalisé par un <strong>VRAI</strong> professionnel! Bonne continuation à Guillaume aux mains d'or ;-)
						<div class="rating">
							</p>

							<p><strong> Mohamed, le 16/04/21 ★★★★★ </strong>


							<p> Super travail, professionnel à l'écoute du client, l'aménagement est très bien fait dans les normes, le patron a été de très bon conseils</p>

							</p>

							<p><strong>Florent, le 26/06/21 ★★★★★


								</strong>
							<p> J'ai aujourd'hui récupéré mon camion aménagé et j'en suis ravi. Guillaume à travaillé brillamment sur un projet original et a su s'adapter à toutes mes exigences. A savoir optimiser un espace petit en une cuisine fonctionnelle</p>


							<p><strong>Mickael, le 23/07/21 ★★★★★


								</strong> C'était l'interlocuteur idéal pour adapter la conception de notre camion à notre budget.<strong> Nous recommandons sans hésiter</strong>

							</p>

							</p>

						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">

				<div class="navbar navbar-inverse navbar-fixed-top headroom">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="<?= substr(get_site_url(), 0, -2) ?>">
                    <img src="<?= get_theme_file_uri('assets/images/magictrucks10.png') ?>" alt="">
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <?php
                $defaults = array(
                    'theme_location'  => '',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'nav navbar-nav pull-right',
                    'menu_id'         => '',
                    'echo'            => false,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                );
                $menu = wp_nav_menu($defaults);

                // On remplace Se connecter par les coordonnées de l'utilisateur connecté
                if (is_user_logged_in()) {

                    // On récupère l'utilisateur courant
                    $user = wp_get_current_user();

                    // On récupère son avatar
                    $avatar = get_avatar_url(
                        $user->data->ID,
                        [
                            'size' => 20,
                            'force_default' => true
                        ]
                    );

                    // On ajoute une class css sur le lien de connexion
                    $menu = str_replace('btn-default', '', $menu);

                    // On remplace le lien connexion par l'utilisateur connecté
                    $menu = str_replace(
                        '<a href="/apotheose/magic-trucks/public/wp-login.php">Se connecter</a></li>',
                        '<a href="/apotheose/magic-trucks/public/user/home">' . $user->data->user_nicename . ' <img style="border-radius:50%;" src="' . $avatar . '"/></a><li class="menu-item"><a style="text-decoration:underline;" href="/apotheose/magic-trucks/public/wp/wp-login.php?action=logout">Se déconnecter</a></li>',
                        $menu
                    );
                }


                echo $menu;
                ?>
            </div>
            <!--/.nav-collapse -->
        </div>

    </div> <!-- /row of widgets -->
				</div>
			</div>

</footer>

<?php
wp_footer();
?>
</body>

</html>