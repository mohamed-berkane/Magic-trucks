<footer id="footer" class="top-space" style="color:#fff;">

    <div class="footer1">
        <div class="container">
            <div class="row">
                <div class="col-md-3 widget">
                    <h3 class="widget-title">Contact</h3>
                    <div class="widget-body">
                        <p>
                            06 74 28 54 17<br>
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
                        <?php
                        $comments = get_comments(array("number" => 4));
                        foreach ($comments as $comment) : ?>
                            <p><strong> <?= $comment->comment_author ?>, le <?= $comment->comment_date ?> ★★★★★ </strong>
                            <p><?= $comment->comment_content ?> </p>
                            </p>
                        <?php endforeach;
                        ?>
                        <!-- <p><strong>Robert, le 15/01/21 ★★★★★ </strong>
                            Guillaume a donné vie à mon camion! Le meilleur en conceptions et agencements! Camion fonctionnel et spacieux car réalisé par un <strong>VRAI</strong> professionnel! Bonne continuation à Guillaume aux mains d'or ;-)
                            <div class="rating">
                        </p>
                        <p><strong> Mohamed, le 16/04/21 ★★★★★ </strong>
                            <p> Super travail, professionnel à l'écoute du client, l'aménagement est très bien fait dans les normes, le patron a été de très bon conseils</p>
                        </p>
                        <p><strong>Florent, le 26/06/21 ★★★★★ </strong>
                            <p> J'ai aujourd'hui récupéré mon camion aménagé et j'en suis ravi. Guillaume à travaillé brillamment sur un projet original et a su s'adapter à toutes mes exigences. A savoir optimiser un espace petit en une cuisine fonctionnelle</p>
                        </p>
                        <p><strong>Mickael, le 23/07/21 ★★★★★ </strong>
                             C'était l'interlocuteur idéal pour adapter la conception de notre camion à notre budget.<strong> Nous recommandons sans hésiter</strong>
                        </p> -->
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