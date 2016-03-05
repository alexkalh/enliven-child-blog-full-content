<?php

global $wp_query;

$classes = array('e_item', 'clearfix');
if(0 === $wp_query->current_post){
    $classes[] = 'e_first';
}else{
    $classes[] = 'e_other';
}
?>

<article itemprop="liveBlogUpdate"
  itemscope="itemscope"
  itemtype="http://schema.org/BlogPosting"
  <?php post_class($classes); ?>>

  <div class="row">

    <div class="col-xs-12 col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">

      <?php
      if( 1 === (int)get_theme_mod('blog_metadata_icon_format', 1) ):
        $icon = enliven_get_icon_by_format();
        ?>
        <p class="e_meta clearfix e_line_1">
          <i class="e_icon <?php echo esc_attr($icon); ?>"></i>
        </p>
      <?php endif; ?>

      <?php if( has_category() && ( 1 === (int)get_theme_mod('blog_metadata_categories', 1) )) : ?>
        <p class="e_meta clearfix e_line_2">
        <?php the_category(', '); ?>
        </p>
      <?php endif;?>

      <h3 itemprop="headline" class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
      </h3>

      <?php
      $blog_metadata_date     = (int)get_theme_mod('blog_metadata_date', 1);
      $blog_metadata_author   = (int)get_theme_mod('blog_metadata_author', 1);
      $blog_metadata_comments = (int)get_theme_mod('blog_metadata_comments', 1);

      if( (1 === $blog_metadata_date) || (1 === $blog_metadata_author) || (1 === $blog_metadata_comments) ):
      ?>
        <p class="e_meta clearfix e_line_3">

          <?php
          if( 1 === $blog_metadata_author ){
            get_template_part('template/metadata/author', 'without-icon');
          }
          ?>

          <?php
          if( 1 === $blog_metadata_date ){
            get_template_part('template/metadata/date', 'without-icon');
          }
          ?>

          <?php
          if( 1 === $blog_metadata_comments) {
            get_template_part('template/metadata/comment', 'without-icon');
          }
          ?>

        </p>
      <?php endif; ?>

      <?php get_template_part('template/blog/solid/thumbnail'); ?>

      <div class="entry-content">
        <?php the_content(''); ?>
      </div>

      <?php if( 1 === (int)get_theme_mod('blog_metadata_button_more', 1) ): ?>
        <p class="e_meta clearfix e_line_4">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="e_button e_icon e_primary e_solid e_small"><?php esc_html_e( 'Read more', 'enliven' ); ?></a>
        </p>
      <?php endif; ?>

    </div>

  </div>

</article>
