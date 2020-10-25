<?php
    // Get WordPress' media upload URL
    $upload_link = esc_url( get_upload_iframe_src( 'image', $item->ID ) );

    // See if there's a media id already saved as post meta
    $your_img_id = get_post_meta( $item->ID, 'jt_hover_image', true );

    // Get the image src
    $your_img_src = wp_get_attachment_image_src( $your_img_id, 'full' );

    // For convenience, see if the array is valid
    $you_have_img = is_array( $your_img_src );
    ?>

    <div class="description description-wide jt-bg-image-upload-wrapper">
        <!-- Your image container, which can be manipulated with js -->
        <div class="custom-img-container">
            <?php if ( $you_have_img ) : ?>
                <img src="<?php echo $your_img_src[0] ?>" alt="" style="max-width:100%;" />
            <?php endif; ?>
        </div>

            <!-- Your add & remove image links -->
            <p class="hide-if-no-js">
                <a class="upload-custom-img <?php if ( $you_have_img  ) { echo 'hidden'; } ?>" 
                   href="<?php echo $upload_link ?>">
                    <?php _e('Set custom image') ?>
                </a>
                <a class="delete-custom-img <?php if ( ! $you_have_img  ) { echo 'hidden'; } ?>" 
                  href="#">
                    <?php _e('Remove this image') ?>
                </a>
            </p>

        <!-- A hidden input to set and post the chosen image id -->
        <input class="jt-img-id" name="jt-img-id[<?php echo $item->ID; ?>]" type="hidden" value="<?php echo esc_attr( $your_img_id ); ?>" />
    </div>

