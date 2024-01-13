<?php get_header(); ?>

    <main>
        <?php if (is_front_page()):
            $hero = get_field('hero');
            $text = $hero['text'];
            $above_header = $text['above_header'];
            $header = $text['header'];
            $text = $text['content'];
            $buttons = $hero['text']['buttons']['button'];
            $image = $hero['hero_product'];
            $banner_img_assoc = $hero['background_image'];
            ?>
            <section class="mb-0 position-relative"
                     style="background-image: url(<?php echo esc_url($banner_img_assoc['url']); ?>); background-size: cover; background-position: center top; background-repeat: no-repeat;">
                <div class="block__whiteup-overlay position-absolute z-index-1"></div>
                <div class="container py-2 py-lg-4 position-relative z-index-200">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-5 col-lg-4 text-center text-md-start">
                            <?php if (!empty($above_header)): ?>
                                <h1 class="fake-h3"><?php echo $above_header; ?></h1>
                            <?php endif; ?>
                            <h2 class="h1"><?php echo $header; ?></h2>
                            <div class="subhead mb-150">
                                <?php echo $text; ?>
                            </div>
                            <?php if (!empty($buttons)): ?>
                                <div class="column-content--button-set mb-1 mb-md-0">
                                    <?php foreach ($buttons as $button) :
                                        $target = $button['link']['target'] ?>
                                        <a href="<?php echo esc_url($button['link']['url']); ?>"
                                           class="btn <?php echo $button['style']; ?>"
                                            <?php if (!empty($target)): ?>
                                                target="<?php echo $target ?>"
                                            <?php endif; ?>
                                        >
                                            <?php echo $button['link']['title']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div><!-- column-content--button-set -->
                            <?php endif; ?>
                        </div><!-- col -->
                        <div class="col-md-7">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt']; ?>"
                                 loading="lazy"
                                 class="img-fluid d-block">
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php endif; ?>

        <?php get_template_part('partials/body/flexible-content'); ?>
    </main>
<?php get_footer();
