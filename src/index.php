<?php

/**
* The main template file
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
*/

get_header(); ?>

<?php
/* ==============================
* Display Only in front page    *
* ==============================*/
if (is_home() && !is_paged()) {
  echo '<div class="container">';
  get_template_part('components/site/loop', 'homepage' );

  /* ==========================================
  * Section - loop with custom category       *
  * =====================================+====*/
  if (get_theme_mod('wpg_featuredcat_active', false) === true) {
    get_template_part('components/features/section', 'featured' );
  }

  /* ==========================================
  * Section - menu with links to other pages  *
  * =====================================+====*/
  if (get_theme_mod('wpg_links_active', false) === true) {
    get_template_part('components/features/section', 'links' );
  }

  /* ==========================================
  * Section - widget banner                   *
  * =====================================+====*/
  if (get_theme_mod('wpg_primary_baners_active', false) === true) {
    get_sidebar('primary_baners');
  }
  echo '</div><!-- .container -->';
} else { ?>
  <div id="content" class="site-content clear-both">
    <div id="breadcrumbs" class="text-center bg-white">
        <span><?php _e('You are here: &nbsp;', 'wpg_theme'); ?></span><?php if (function_exists('wpg_breadcrumbs')) wpg_breadcrumbs(); ?>
    </div>
    <div class="container">
      <div id="primary" class="content-area col-primary hentry-multi gutters">
        <header class="meta-line col-12">
          <?php
          if ( is_front_page() && is_home() ) {
            echo '<h2>';
            // Default homepage
            echo get_theme_mod('wpg_blog_title', __('Last post', 'wpg_theme'));

            if ( $paged > 1 ) {
              _e(' - page: ', 'wpg_theme');
              echo $paged;
            }

            echo '</h2>';

          } elseif (is_category()){
            echo '<h1>'. single_cat_title( '', false ) . '</h1>';
          } else {
            echo '<h1>'; the_archive_title(); echo '</h1>';
          }
          ?>
        </header>
        <main id="main" class="site-main ">

          <?php
          if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'components/content_multi/content', get_post_format() );
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
              'prev_text'          => __( 'Previous page', 'wpg_theme' ),
              'next_text'          => __( 'Next page', 'wpg_theme' ),
              'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
            ));

          else:
            get_template_part( 'components/content_multi/content', 'none' );
          endif;
          ?>
        </main><!-- .site-main -->
      </div><!-- #primary -->
      <div id="secondary" class="widget-area col-secondary content-style">

        <?php
        /* ==========================================
        * Section - loop with custom category       *
        * =====================================+====*/
        if (get_theme_mod('wpg_featuredcat_active', false) === true) {
          get_template_part('components/features/section', 'featured_sidebar' );
        }
        /* ==========================================
        * Section - widget banner                   *
        * =====================================+====*/
        if (get_theme_mod('wpg_b_bottom_active', false) === true) {
          get_sidebar('bottom_baners');
        }

        get_sidebar('right');

        ?>
      </div><!-- #secondary -->
    </div><!-- .container -->
  </div><!-- #content -->
<?php
}


get_footer(); ?>
