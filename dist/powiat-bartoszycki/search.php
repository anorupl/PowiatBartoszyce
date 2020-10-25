<?php
/**
* The template for displaying search results pages
*
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

get_header(); ?>
<div id="content" class="site-content clear-both">
  <div class="container">
    <div id="primary" class="content-area col-primary hentry-multi gutters">
      <header class="content-style col-12">
        <h2><?php printf( __( 'Search Results for: <span> %s </span>', 'wpg_theme' ), esc_html( get_search_query())); ?></h2>
      </header>
      <main id="main" class="site-main ">
        <?php
        if ( have_posts() ) :
          /* Start the Loop */
          while ( have_posts() ) : the_post();

            $post_type = get_post_type();

            switch ($post_type) {
              case 'page':
                get_template_part( 'components/content_multi/content', 'page' );

                break;

              default:
                get_template_part( 'components/content_multi/content', get_post_format() );

                break;
            }
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
<?php get_footer(); ?>
