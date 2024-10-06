<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary rounded-4 shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo RAYIUM_URL; ?>/img/LogoParch.png" style="width: 100%;" alt="" srcset="">
                </a>
                <button class="navbar-toggler rounded-4" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-one',
                                'container' => false,
                                'menu_class' => '',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                                'depth' => 2,
                                'walker' => new bootstrap_5_wp_nav_menu_walker()
                            )
                        );
                    ?>
                    <div class="d-flex" role="search">
                        Test
                    </div>
                </div>
            </div>
        </nav>
        <!-- EndNavbar -->