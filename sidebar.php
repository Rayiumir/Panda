<!-- Sidebars -->
<?php   if ( ot_get_option('off_3') != "off" ) {    ?>
<div class="card rounded-4 shadow-sm mb-3">
    <div class="card-body">
        <h1 class="fs-5 fw-bold mb-3">Search</h1>
        <form role="search" action="<?php bloginfo('url'); ?>" method="get">
            <input class="form-control rounded-5 me-2" name="s" type="search" placeholder="Search Blog ..."
                aria-label="Search">
        </form>
    </div>
</div>
<?php   }   ?>
<?php   if ( ot_get_option('off_4') != "off" ) {    ?>
<div class="card rounded-4 shadow-sm mb-3">
    <div class="card-body">
        <nav>
            <div class="nav nav-pills nav-fill gap-2 p-1 small bg-light rounded-5" id="nav-tab"
                role="tablist">
                <button class="nav-link rounded-5 active" id="new-tab" data-bs-toggle="tab"
                    data-bs-target="#new" type="button" role="tab" aria-controls="new"
                    aria-selected="true"><i class="fa-duotone fa-sparkles"></i> News</button>
                <button class="nav-link rounded-5" id="comments-tab" data-bs-toggle="tab"
                    data-bs-target="#comments" type="button" role="tab" aria-controls="comments"
                    aria-selected="false"><i class="fa-duotone fa-comments"></i> Comments</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane mt-3 fade show active" id="new" role="tabpanel"
                aria-labelledby="new" tabindex="0">
                <ul class="list-group">
                        <?php 
                            $recent_post= new WP_Query(
                                array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'order' => 'DESC',
                                'orderby' => 'ID',
                                'posts_per_page' =>'10',
                                )
                            );
                            if($recent_post->have_posts()) :
                                while($recent_post->have_posts()) : 
                                $recent_post->the_post();
                        ?> 
                        <li class="mb-2 list-group-item list-group-item-action rounded-5">
                            <a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?><i class="fa-duotone fa-angle-double-right float-end mt-1"></i></a>
                        </li>
                        <?php 
                            endwhile;
                            endif;
                            wp_reset_query(); 
                        ?>
                    </ul>              
            </div>
            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments"
                tabindex="0">
                <ul class="list-group mt-3">
                    <?php 
                        $comments = get_comments('status=approve&number=10');
                        foreach ($comments as $comment) { 
                    ?>
                    <li class="mb-2 list-group-item list-group-item-action rounded-4">
                        <h1 class="fs-6 mt-3 text-success"><?php echo strip_tags($comment->comment_author); ?> says : </h1>
                        <p class="fs-6 textcomment"><?php echo strip_tags($comment->comment_content); ?></p>
                    </li>
                    <?php }  ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php   }   ?>
<?php dynamic_sidebar("sidebar"); ?> 
<!-- End Sidebars -->