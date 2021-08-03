<?php
    $imageURL = get_the_post_thumbnail_url();
?>
<style>
.blog-image__thumbnail {
	width: auto;
	height: 265px;
    overflow: hidden;
}

.blog-image__thumbnail img {
	min-width: 100%;
	height: 250px;
	border-radius: 3px;
} 


.blog-thumbnail {
	border: none;
	background: rgba(255, 255, 255, 1);
	margin-bottom: 25px;
	padding: 10px;
    height: 430px;
    border-radius: 3px;    
}

.top-space {
    color: #fff;
}
</style>

    <!-- actu 1 -->
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="blog-thumbnail">

            <div class="blog-image__thumbnail">
                <img src="<?= $imageURL; ?>">
            </div>
            
            <h5><?= get_the_title(); ?></h5>
            <p>
                <?php 
                    $content = get_the_excerpt();
                    echo substr($content, 0, 90). '...';
                ?>
            </p>
            <p>
 <!--                <strong>Auteur : </strong>
                <a class="color-info" href="<?= get_the_author_link(); ?>">
                    <?= get_the_author(); ?>
                </a> -->
                <a class="next" href="<?= get_the_permalink(); ?>">
                    Lire la suite
                </a>
            </p>

        </div>
    </div>
    




