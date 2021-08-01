<?php get_header(); ?>
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <div class="post">
      <h1 class="post__title"><?php the_title(); ?></h1>

      <div class="post__content">
        <?php the_content(); ?>
      </div>

    </div>

  <?php endwhile; endif; ?>

<?php
    // Si le commentaires sont ouverts ou s'il y a au moins 1 commentaire afficher les.
  if ( comments_open() || get_comments_number() ) :
      //var_dump(comments_open());
      comments_template();
  endif;
?>

</div>
 <?php
    get_footer();
?>