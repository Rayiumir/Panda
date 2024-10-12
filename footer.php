<!-- footer -->
        <footer class="card rounded-4 shadow-sm mb-3 border-0">
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
                <hr>
                <div class="text-center">Designed and coded by <i class="fa-duotone fa-heart text-danger"></i> <a href="https://github.com/Rayiumir/Panda" class="text-decoration-none">Panda</a> </div>
            </div>
        </footer>
        <!-- End Footer -->
    </main>
    <!-- JavaScripts -->
    <?php wp_footer(); ?>
    <script type="text/javascript">
        window.gtranslateSettings = window.gtranslateSettings || {};
        window.gtranslateSettings['gt'] = {
            "default_language": "en",
            "languages": ["fa", "en"],
            "wrapper_selector": "#gt-mordadam",
            "native_language_names": 1,
            "flag_style": "2d",
            "flag_size": 24,
            "horizontal_position": "inline",
            "flags_location": "<?php echo RAYIUM_URL; ?>/flags\/"
        };
    </script>
    <script src="<?php echo RAYIUM_URL; ?>/js/gt.min.js" data-gt-widget-id="gt"></script>
</body>
</html>