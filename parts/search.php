<!-- Page Search Index -->
<div class="mt-3 mb-3">
    <div class="row">
        <!-- Posts -->
        <section class="col-md-8">
            <div class="alert alert-success rounded-4 border-0" role="alert">
                <i class="fa-duotone fa-search"></i> <?php printf( __( 'Search Results for : %s' ), get_search_query() ); ?>
            </div>
            <?php
                if(have_posts(  )){
                    while(have_posts(  )){
                        the_post();
            ?>
            <a href="<?php the_permalink() ?>" class="text-decoration-none">
                <article class="card shadow-sm rounded-4 mb-3 border-0">
                    <div class="card-body">
                        <figure>
                            <?php echo the_post_thumbnail('full', ['class' => 'img-fluid rounded-4 mb-3'])?>
                        </figure>
                        <h1 class="fs-3 fw-bold"><?php the_title() ?></h1>
                        <?php the_excerpt() ?>
                        <?php echo get_simple_likes_button(get_the_ID()); ?>
                        <div class="float-end">
                            <i class="fa-duotone fa-comments"></i> <?php echo get_comments_number(); ?>
                        </div>

                    </div>
                </article>
            </a>
            <?php   }   }   ?>
            <?php echo bootstrap_pagination(); ?>
        </section>
        <!-- End Posts -->
        <aside class="col-md-4">
            <?php get_sidebar() ?>
        </aside>
    </div>
</div>
<!-- End Page Search Index -->