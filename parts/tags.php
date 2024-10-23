<?php   if ( ot_get_option('off_5') != "off" ) {    ?>
    <div class="card shadow-sm rounded-4 mb-3 border-0">
        <div class="card-body tags">
            <i class="fa-duotone fa-tags"></i> <?php the_tags('',',','')?>
        </div>
    </div>
<?php   }   ?>