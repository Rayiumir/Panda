<?php   if ( ot_get_option('off_3') != "off" ) {    ?>
<div class="card rounded-4 shadow-sm mb-3 border-0">
    <div class="card-body">
        <h1 class="fs-5 fw-bold mb-3">Search</h1>
        <form role="search" action="<?php bloginfo('url'); ?>" method="get">
            <input class="form-control rounded-5 me-2" name="s" type="search" placeholder="Search Blog ..."
                aria-label="Search">
        </form>
    </div>
</div>
<?php   }   ?>