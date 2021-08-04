<style>
    .carousel-indicators {
        bottom: 0;
    }
    .carousel-caption{
        left:0;
        right:0;
        position: relative;
    }

    .carousel-control {
        display: none;
    }

    .footer1, #footer>div.footer1, .footer1 a {
        color: #fff;
        font-size: 14px;
        line-height: 2;
    }

    .menu-footer {
        padding: 25px 0;
    }
</style>



<footer id="footer" class="top-space" style="color:#fff;">

    <div class="footer1">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-12 widget">
                    <h3 class="widget-title">Contact</h3>
                    <div class="widget-body">
                        <p>
                            06 74 28 54 17<br>
                            <a href="mailto:#">contact@magictrucks.com</a><br>
                        </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 ">
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

                <div class="col-md-6 col-sm-12 col-xs-12 widget">
                    <?php
                        $defaults = array(
                            'theme_location'  => '',
                            'menu'            => 'menu-footer',
                            'container'       => 'div',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu-footer',
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
                        echo $menu;   
                    
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Avis clients</h3>
                    <div>

                        <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-captions" data-slide-to="1"></li>
                                <li data-target="#carousel-example-captions" data-slide-to="2"></li>
                                <li data-target="#carousel-example-captions" data-slide-to="3"></li>                     
                            </ol>


                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="carousel-caption">
                                        <h3>Robert, le 15/01/21 ★★★★★ </h3>
                                        <p>Guillaume a donné vie à mon camion! Le meilleur en conceptions et agencements! Camion fonctionnel et spacieux car réalisé par un <strong>VRAI</strong> professionnel! Bonne continuation à Guillaume aux mains d'or ;-)</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="carousel-caption">
                                        <h3>Mohamed, le 16/04/21 ★★★★★ </h3>
                                        <p>Super travail, professionnel à l'écoute du client, l'aménagement est très bien fait dans les normes, le patron a été de très bon conseils.</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="carousel-caption">
                                        <h3>Florent, le 26/06/21 ★★★★★</h3>
                                        <p>J'ai aujourd'hui récupéré mon camion aménagé et j'en suis ravi. Guillaume à travaillé brillamment sur un projet original et a su s'adapter à toutes mes exigences. A savoir optimiser un espace petit en une cuisine fonctionnelle</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="carousel-caption">
                                        <h3>Mickael, le 23/07/21 ★★★★★</h3>
                                        <p>C'était l'interlocuteur idéal pour adapter la conception de notre camion à notre budget.<strong> Nous recommandons sans hésiter</p>
                                    </div>
                                </div>



                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
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