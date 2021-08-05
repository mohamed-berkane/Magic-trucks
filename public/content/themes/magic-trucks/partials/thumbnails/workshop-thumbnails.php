<?php
	$imageURL = get_the_post_thumbnail_url();
?>

<div class="col-sm-6 workshop-thumbnails">
	<div class="row">
		<div class="col-xs-12">
			<h3><?= get_the_title(); ?></h3>
			<strong><?= the_field('lieux'); ?> - du <?= the_field('date_begin'); ?> au <?= the_field('date_end'); ?></strong>
			<br><br>						
		</div>

		<div class="col-xs-7">
			<p>
				<?php 
                    $content = get_the_excerpt();
                    echo substr($content, 0, 90). '...';
                ?>
			</p>
			<p>
				<strong>Place disponible :</strong> <?php the_field('max_participants'); ?><br>
				<strong>Lieu :</strong> <?php the_field('lieux'); ?><br>
				<strong>horaires :</strong> de <?php the_field('hour_begin'); ?> à <?php the_field('hour_end'); ?><br>
				<strong>Prix :</strong> <?php the_field('prix'); ?>
			</p>

			<a href="<?= get_the_permalink(); ?>">En savoir plus</a>
			
			
		</div>
		<div class="col-xs-5">
			<a href="<?= get_the_permalink(); ?>" class="thumbnail">
				<img src="<?= $imageURL; ?>"/>
			</a>
		</div>					
	</div>
</div>



