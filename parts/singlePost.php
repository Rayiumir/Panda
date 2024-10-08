<!-- Single Page -->
<div class="mt-3 mb-3">
    <div class="row">
        <!-- Posts -->
        <section class="col-md-8">
            <article class="card shadow-sm rounded-4 mb-3">
                <div class="card-body">
                    <figure>
                        <?php echo the_post_thumbnail('full', ['class' => 'img-fluid rounded-4 mb-3'])?>
                    </figure>
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="fs-4 fw-bold"><?php the_title() ?></h1>
                        </div>
                        <div class="col-md-2 time">
                            <i class="fa-duotone fa-timer"></i> <?php echo do_shortcode( '[studyduration]' ); ?>
                        </div>
                    </div>
                    <?php the_content() ?>
                    <?php echo get_simple_likes_button(get_the_ID()); ?>
                    <i class="fa-duotone fa-calendar-days"></i>  <?php the_time('F j, Y') ?>
                    <i class="fa-duotone fa-eye"></i>
                    <span>
                        <?php
                            if ( function_exists( 'get_post_view_count' ) ) {
                                echo get_post_view_count( get_the_ID() );
                            }
                        ?>
                    </span>
                    <div class="float-end">
                        <i class="fa-duotone fa-comments"></i> <?php echo get_comments_number(); ?>
                    </div>
                </div>
            </article>
            <div class="card shadow-sm rounded-4 mb-3">
                <div class="card-body tags">
                    <i class="fa-duotone fa-tags"></i> <?php the_tags('',',','')?>
                </div>
            </div>
            <div class="card rounded-4 mb-3">
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
            <div class="card rounded-4 mb-3">
                <div class="card-body">
                    <?php comments_template(); ?>
                </div>
            </div>
        </section>
        <!-- End Posts -->
        <aside class="col-md-4">
            <div class="card rounded-4 mb-3 p-3">
                <h2 class="fs-5 fw-bold">
                    Sort URL
                </h2>
                <span class='box text-center'>
                    <span id="c1"><?php bloginfo('url'); ?>/?p=<?php the_ID(); ?></span>
                    <button class="btn btn-light" onclick="copyFunc('#c1')">
                        <i class="fa-duotone fa-copy"></i>
                    </button>
                </span>
            </div>
            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <figure class="imgauthor">
                            <?php echo get_avatar( get_the_author_meta('user_email'), '80', '' ); ?>
                        </figure>
                        <h1 class="fs-4 fw-bold mb-3 text-dark"><?php the_author(); ?></h1>
                    </div>
                    <?php the_author_meta('description'); ?>
                </div>
            </div>
            <?php get_sidebar() ?>
        </aside>
        
    </div>
</div>
<!-- End Single Page -->