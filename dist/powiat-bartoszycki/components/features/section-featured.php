<?php
/**
* The template for displaying the custom category with post on home page.
*
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
  $featuredcat_id = get_theme_mod('wpg_featuredcat', 0);
  $sticky = get_option( 'sticky_posts' );
  $category = false;

  $query_feat = array(
    'post_type'           =>'post',
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => 1,
    'post__in'            => $sticky
  );

  if (!empty($featuredcat_id) && ($featuredcat_id != 0)) {

    $category = true;

    $query_feat['tax_query'] = array(
      'relation' => 'or',
      array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => $featuredcat_id,
        )
      );
  }

  $query_featuredcat = new WP_Query($query_feat);



  if ( $query_featuredcat->have_posts()) :
    ?>
    <section id="featured-cat" class="page-section posts content-style col-7">
        <header class="header-section meta-line">
              <h2><?php echo esc_html(get_theme_mod('wpg_featuredcat_title',__('Last post', 'wpg_theme'))); ?></h2>
        </header>
        <div class="featured-item">
          <?php while ($query_featuredcat->have_posts()) :

            $query_featuredcat->the_post();

            $url_thumb = get_the_post_thumbnail_url($post, 'medium');

            if ($url_thumb == false) {
              $url_thumb = get_template_directory_uri() . '/img/default/no_image.jpg';
            }
            ?>
            <article <?php post_class('col-4 pad-all'); ?>>
              <figure class="post-thumbnail">
                <a href="<?php the_permalink(); ?>" aria-hidden="true">
                  <img src="<?php echo esc_url($url_thumb); ?>" alt="  <?php the_title() ;?>" />
                </a>
              </figure>
              <div class="entry-meta">
                <div class="meta__item"><?php wpg_time() ?></div>
              </div>
              <header class="entry-header">
                <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
              </header>
              <div class="entry-summary">
              <?php echo wpg_get_excerpt(30); ?>
              </div>
            </article>
          <?php endwhile; ?>
          <div class="clear-both">
            <?php
            if ($category === true) {
              printf('<a class="btn btn--50" href="%1$s">%2$s<i class="icon-angle-right"></i></a>',
              get_category_link($featuredcat_id),
              __('Show all', 'wpg_theme'));
            }
            ?>
          </div>

</div>
</section>
    <?php
  endif;
  wp_reset_query();
?>
