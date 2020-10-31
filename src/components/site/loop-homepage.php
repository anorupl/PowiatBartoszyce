
<?php
/**
* The template for displaying the post on home page in header.
*
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
?>
  <main id="main" class="site-main hentry-multi">
    <section id="home-posts" class="page-section posts content-style col-12">
      <header class="meta-line">
      <?php
      $category = get_option('default_category');
      $term = get_term_by( 'id', $category, 'category' );
      ?>
      <h2><?php echo $term->name ?> </h2>

      </header>
      <?php
           if (have_posts()):

             $i = 1;

             $post_number = $wp_query->post_count;

             if ($post_number <= 4 ) {
                $close_column_one = $post_number; // 1 2 3 4
             } else {
                // 5 6 7 8
                $close_column_one = 4;

                $open_column_two = 5;
                $close_column_two = $post_number;
             }

             /* Start the Loop */
             while (have_posts()):

               the_post();

               $url_thumb = get_the_post_thumbnail_url($post, 'large');

               if ($url_thumb == false) {
                 $url_thumb = get_template_directory_uri() . '/img/default/no_image.jpg';
               }

               // Otwieram pierwszą kolumne
               if ($i == 1) {
                 echo '<div class="col-one col-home col-7">';
               }
               // otwiera druga kolumne
               if ($i == 5) {
                  echo '<div class="col-two col-home col-5">';
               }
?>

               <article id="post-<?php the_ID(); ?>" <?php post_class('clear-both'); ?>>
                 <?php
                 if (has_post_thumbnail()) : ?>
                 <div class="col-4_5">
                   <figure class="post-thumbnail">
                     <a href="<?php the_permalink(); ?>" aria-hidden="true">
                       <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                     </a>
                   </figure>
                 </div>
                 <div class="col-7_5 gutters">
                   <header class="entry-header">
                     <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                   </header>
                   <div class="entry-meta pad-all">
                     <div class="meta__item"><?php wpg_time() ?></div>
                     <div class="meta__item screen-reader-text">
                       <i class="icon-user"></i><?php _e('Author', 'wpg_theme'); ?><?php the_author();?>
                     </div>
                     <?php if ($post->post_type !== 'page') : ?>
                       <div class="meta__item screen-reader-text"><i class="icon-folder-open"></i><?php the_list_terms(); ?></div>
                     <?php endif; ?>
                   </div><!-- .entry-meta -->
                   <div class="entry-summary">
                    <?php if ($i > 4) {
                       echo wpg_get_excerpt(22);
                    } else {
                      echo wpg_get_excerpt(28);
                    }
                    ?>
                   </div><!-- .entry-summary -->
                 </div>


               <?php else: ?>
                 <header class="entry-header">
                   <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                 </header>
                 <div class="entry-meta pad-all">
                   <div class="meta__item"><?php wpg_time() ?></div>
                   <div class="meta__item screen-reader-text">
                     <i class="icon-user"></i><?php _e('Author', 'wpg_theme'); ?><?php the_author();?>
                   </div>
                   <?php if ($post->post_type !== 'page') : ?>
                     <div class="meta__item screen-reader-text"><i class="icon-folder-open"></i><?php the_list_terms(); ?></div>
                   <?php endif; ?>
                 </div><!-- .entry-meta -->
                 <div class="entry-content">
                   <?php  echo wpg_get_excerpt(25); ?>
                 </div><!-- .entry-content -->

               <?php endif; ?>
               </article>

               <?

               //zamyka pierwszą kolumne
               if ($i == $close_column_one) {
                 echo '</div><!-- end column-one -->';
               }

               //zamyka druga kolumne
               if ($i == $close_column_two) {
                 echo '</div><!-- end column-two -->';
               }

               $i++;

             endwhile; ?>
             <div class="col-6-center">
              <?php

               // Previous/next page navigation.
               the_posts_pagination( array(
                 'prev_text'          => __( 'Previous page', 'wpg_theme' ),
                 'next_text'          => __( 'Next page', 'wpg_theme' ),
                 'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
               ));

               ?>
               </div>
              <?
               else:
              ?>
              <div id="no-post-container" class="col-12">
                  <article id="post-nopost" class="">
                    <div class="f-post-content col-5 gutters text-light">
                      <header class="entry-header a-light a-hover-two">
                        <h2 class="entry-title"><?php _e('Nothing Found', 'wpg_theme') ?></h2>
                      </header>
                      <div class="entry-summary">
                        <p><?php _e('It looks like nothing was found at this location.', 'wpg_theme'); ?></p>
                      </div>
                    </div>
                  </article>
                </div><!-- end .no-post-container -->
                  <?php
                endif;
                ?>
    </section>
</main>
