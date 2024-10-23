<?php   if ( ot_get_option('off_8') != "off" ) {    ?>
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
<?php   }   ?>