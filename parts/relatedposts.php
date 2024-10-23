<?php   if ( ot_get_option('off_6') != "off" ) {    ?>
    <div class="card shadow-sm rounded-4 mb-3 border-0">
        <div class="card-body">
            <div class="text-start fs-6">
                <i class="fa-duotone fa-list-radio"></i> <span class="fw-bold">Related Posts</span>
            </div>
            <ul class="list-group mt-3">
                <?php
                    $custom_terms = wp_get_post_terms($post->ID, 'category');

                    if( $custom_terms ){
                        $tax_query = array();
                        foreach( $custom_terms as $custom_term ) {

                            $tax_query[] = array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => $custom_term->slug,
                            );

                        }
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 10,
                            'tax_query' => $tax_query
                        );
                        $loop = new WP_Query($args);
                        if( $loop->have_posts() ) {
                            while( $loop->have_posts() ) : $loop->the_post(); 
                ?>
                <li class="list-group-item mb-3 rounded-5">
                    <a href="<?php the_permalink() ?>" class="text-decoration-none text-dark" title="<?php the_title() ?>">
                        <?php the_title() ?> 
                        <span class="float-end ml-2">
                            <i class="fa-duotone fa-eye"></i> 
                            <?php
                                if ( function_exists( 'get_post_view_count' ) ) {
                                    echo get_post_view_count( get_the_ID() );
                                }
                            ?>
                        </span>
                    </a>
                </li>
                <?php
                endwhile;
                        }
                        wp_reset_query();
                    }
                ?>
            </ul>
        </div>
    </div>
<?php   }   ?>