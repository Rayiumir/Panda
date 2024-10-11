<!-- footer -->
<footer class="card rounded-4 shadow-sm mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="fs-5 fw-bold mb-3"><i class="fa-duotone fa-pen-nib"></i> About me</h1>
                        <p><?php echo ot_get_option('textarea_1') ?></p>
                    </div>
                    <div class="col-md-2">
                        <h1 class="fs-5 fw-bold mb-3"><i class="fa-duotone fa-list-tree"></i> Menus </h1>
                        <?php wp_nav_menu( array( 'theme_location' => 'menu-two' ) ); ?>
                    </div>
                    <div class="col-md-4">
                        <h1 class="fs-5 fw-bold mb-3"><i class="fa-duotone fa-share-alt"></i> Share Social </h1>
                        <div class="mt-5 text-center">
                            <a href="<?php echo ot_get_option('texts_1') ?>" class="text-decoration-none"><i class="fa-brands fa-telegram me-2 fa-2x"></i></a>
                            <a href="<?php echo ot_get_option('texts_2') ?>" class="text-decoration-none"><i class="fa-brands fa-instagram me-2 fa-2x"></i></a>
                            <a href="<?php echo ot_get_option('texts_3') ?>" class="text-decoration-none"><i class="fa-brands fa-whatsapp me-2 fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </main>

    <!-- JavaScripts -->
    <?php wp_footer(); ?>
</body>

</html>