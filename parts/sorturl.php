<?php   if ( ot_get_option('off_7') != "off" ) {    ?>
    <div class="card shadow-sm rounded-4 mb-3 p-3 border-0">
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