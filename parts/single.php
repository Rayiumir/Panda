<!-- Single Page -->
<div class="mt-3 mb-3">
    <div class="row">
        <!-- Posts -->
        <section class="col-md-8">
            <article class="card shadow-sm rounded-4 mb-3 border-0">
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
            <?php get_template_part('parts/tags'); ?>
            <?php get_template_part('parts/relatedposts'); ?>
            <?php get_template_part('parts/comments'); ?>
        </section>
        <!-- End Posts -->
        <aside class="col-md-4">
            <?php get_template_part('parts/sorturl'); ?>
            <?php get_template_part('parts/author'); ?>
            <?php get_sidebar() ?>
        </aside>
        
    </div>
</div>
<!-- End Single Page -->