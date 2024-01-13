<header id="header" class="position-relative hero-nav-overlay z-index-200">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div><!-- nav-logo -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu"
                    aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="d-none pe-50 pe-lg-1" id="not-home">
                <a href="<?php echo esc_url(home_url('/')); ?>">Back</a>
            </div>

            <?php wp_nav_menu([
                'theme_location' => 'primary',
                'container_class' => 'collapse navbar-collapse d-lg-flex',
                'container_id' => 'mainMenu',
                'menu_class' => 'navbar-nav ms-lg-auto align-items-lg-center',
                'fallback_cb' => '',
                'menu_id' => 'main-menu',
                'walker' => new bootstrap_5_wp_nav_menu_walker(),
            ]); ?>

        </div><!-- container-->
    </nav>
</header>
