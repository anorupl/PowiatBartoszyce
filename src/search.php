<?php
/**
* The template for displaying search results pages
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

get_header(); ?>
<div id="content" class="clear-both">
  <div id="breadcrumbs" class="text-center">
    <span><?php _e('You are here: &nbsp;', 'wpg_theme'); ?></span><?php if (function_exists('wpg_breadcrumbs')) wpg_breadcrumbs(); ?>
  </div>
  <div class="container">
    <div id="primary" class="primary-col hentry-multi gutters">
      <main id="main" class="site-main">
        <header id="search-header" class="content-style style__narrow clear-both">
          <h2><?php printf( __( 'Search Results for: <span> %s </span>', 'wpg_theme' ), esc_html( get_search_query())); ?></h2>
        </header>
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
    <div id="secondary" class="secondary-col narrow-col widget-area content-style style__narrow">
      <?php  get_template_part( 'components/site/secondary', 'column'); ?>
    </div><!-- #secondary -->
  </div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
