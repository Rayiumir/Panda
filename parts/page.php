<!-- Page -->
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
                    <i class="fa-duotone fa-list-tree"></i>  <?php the_category(',') ?>
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
            <?php   if ( ot_get_option('off_5') != "off" ) {    ?>
            <div class="card shadow-sm rounded-4 mb-3">
                <div class="card-body tags">
                    <i class="fa-duotone fa-tags"></i> <?php the_tags('',',','')?>
                </div>
            </div>
            <?php   }   ?>
            <?php   if ( ot_get_option('off_9') != "off" ) {    ?>
            <div class="card rounded-4 mb-3">
                <div class="card-body">
                    <?php comments_template(); ?>
                </div>
            </div>
            <?php   }   ?>
        </section>
        <!-- End Posts -->
        <aside class="col-md-4">
            <?php   if ( ot_get_option('off_7') != "off" ) {    ?>
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
            <?php   }   ?>
            <?php get_sidebar() ?>
        </aside>
        
    </div>
</div>
<!-- End Page -->