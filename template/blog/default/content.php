<?php

global $wp_query;

$classes = array('e_item', 'e_large', 'clearfix');
if(0 == $wp_query->current_post){
    $classes[] = 'e_first';
}else{
    $classes[] = 'e_other';
}
?>

<article itemprop="liveBlogUpdate"
  itemscope="itemscope"
  itemtype="http://schema.org/BlogPosting"
  <?php post_class($classes); ?>>

  <?php if(is_sticky() & !is_paged()) : ?>
    <p class="e_meta e_line_1">
      <?php get_template_part('template/metadata/sticky'); ?>
    </p>
  <?php endif; ?>

  <?php get_template_part('template/blog/default/thumbnail'); ?>

  <div class="e_meta e_line_2 clearfix">

    <span class="hidden"><?php get_template_part('template/metadata/date'); ?></span>

    <?php
    if( 1 === (int)get_theme_mod('blog_metadata_date', 1) ){
      get_template_part('template/metadata/date', 'block');
    }
    ?>

    <h3 itemprop="headline" class="entry-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h3>

    <?php
    $blog_metadata_author = (int)get_theme_mod('blog_metadata_author', 1);
    $blog_metadata_comments = (int)get_theme_mod('blog_metadata_comments', 1);

    if( ( 1 === $blog_metadata_author ) || ( 1 === $blog_metadata_comments) ):
    ?>
      <p class="e_meta">
        <?php
        if( 1 === $blog_metadata_author ){
          get_template_part('template/metadata/author');
        }
        ?>

        <?php
        if( 1 === $blog_metadata_comments ){
          get_template_part('template/metadata/comment');
        }
        ?>
      </p>
    <?php endif;?>
  </div>

  <div class="entry-content">
    <?php the_content('') ?>
  </div>

</article>
