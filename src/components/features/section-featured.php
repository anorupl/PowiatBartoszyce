<?php
/**
* The template for displaying the custom category with post on home page.
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
$featuredcat_id = get_theme_mod('wpg_featuredcat', 0);
$sticky         = get_option( 'sticky_posts' );
$category       = false;

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

if ( $query_featuredcat->have_posts()) : ?>
<section id="featured-cat" class="page-section content-style col-7">
  <header class="header-section meta-line" tabindex="0">
    <h2><?php echo esc_html(get_theme_mod('wpg_featuredcat_title',__('Last post', 'wpg_theme'))); ?></h2>
  </header>
  <div class="featured-item hentry-multi">
  <?php while ($query_featuredcat->have_posts()) : $query_featuredcat->the_post(); ?>
    <article class="hentry col-4 gutters">
      <figure class="post-thumbnail">
        <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
          <?php if (has_post_thumbnail()) : the_post_thumbnail('full', array('alt' => get_the_title())); else: ?>
          <img width="1200" height="800" src="<?php echo THEME_URL . 'img/default/no_image_powiat_1200.jpg" class="attachment-full size-full wp-post-image" alt="Grafika z herbem powiatu bartoszyckiego.'; ?>" loading="lazy">
          <?php endif; ?>
        </a>
      </figure>
      <div class="entry-meta">
      <?php wpg_time() ?>
      </div>
      <header class="entry-header">
      <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
      </header>
      <div class="featured-entry-summary">
      <?php echo wpg_get_excerpt(15); ?>
      </div>
    </article>
  <?php endwhile; ?>
    <div class="clear-both">
    <?php
    if ($category === true) {
      printf('<a class="btn btn--center" href="%1$s">%2$s <span class="screen-reader">%3$s</span><i class="icon-angle-right"></i></a>',
        get_category_link($featuredcat_id),
        __('Show all', 'wpg_theme'),
        get_theme_mod('wpg_featuredcat_title',__('Last post', 'wpg_theme'))
      );
    }
    ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php wp_reset_query(); ?> 
