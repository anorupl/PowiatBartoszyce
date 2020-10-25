<?php
/**
* Template part for displaying slider (customizer).
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
*/

?>

    <section id="slider" class="radius">
        <?php
        $slider_number = absint( get_theme_mod('wpg_slider_number', 1 ) );
        $slider_category = absint( get_theme_mod('wpg_slider_category', 0 ) );

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $slider_number,
            'no_found_rows' => true,
        );

        if (!empty($slider_category) && $slider_category != 0) {
          $args['cat'] = $slider_category;
        }

            $query_slajd = new WP_Query($args);

            if (isset($query_slajd) && $query_slajd->have_posts()) :
                while ($query_slajd->have_posts()) : $query_slajd->the_post();
            ?>
                <div class="slides" class="pad-all">
                  <article id="header-post-<?php the_ID(); ?>" class="pad-all">
                      <div class="header-post-meta meta-line">
                        <span class="pad-all">
                          <?php wpg_time() ?>
                        </span>
                      </div>
                      <div class="text-center-left">
                        <header class=""><?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?></header>
                        <a href="<?php the_permalink();?>" class="btn alignleft"><? printf(__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wpg_theme' ), get_the_title()); ?> <i class="icon-angle-right"></i></a>
                      </div>
                  </article>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();// Restore original Post Data
        else: ?>
        <div class="slides"></div>
        <?php endif; ?>
</section>
