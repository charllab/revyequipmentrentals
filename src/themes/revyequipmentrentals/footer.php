<footer>
    <?php if (is_front_page()):
        $footer = get_field('footer');
        $footer_img_assoc = $footer['background_image'];
        ?>
        <section class="mb-0 py-175 py-md-3 position-relative"
                 style="background-image: url(<?php echo esc_url($footer_img_assoc['url']); ?>); background-size: cover; background-position: center bottom; background-repeat: no-repeat;">
            <div class="block__whitedown-overlay position-absolute h-100 z-index-1"></div>
            <section id="contact" class="mb-0 position-relative z-index-200">
                <div class="container">
                    <div class="row align-items-lg-center">
                        <div class="col-lg-6 order-lg-1">
                            <h2 class="text-center text-lg-start"><?php echo esc_attr($footer['contact_title']) ?></h2>
                            <p class="mb-lg-2"><?php echo esc_attr($footer['contact_content']) ?></p>
                            <p class="fw-medium mb-1 mb-lg-0">
                                <?php
                                $tel = esc_attr($footer['contact_number']);
                                $email = $footer['email_address'];
                                ?>
                                <span>t:</span> <a href="tel:<?php echo strip_tel($tel) ?>"><?php echo $tel; ?></a><br>
                                <span>e:</span> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                            </p>
                        </div><!-- col -->
                        <div class="col-lg-6 order-lg-0">
                            <div class="pe-lg-2">

                                <?php $mapurl = $footer['map_embed_code']; ?>
                                <iframe src="<?php echo $mapurl; ?>"
                                        width="890" height="540"
                                        style="border:0;"
                                        allowfullscreen="" loading="lazy">
                                </iframe>
                            </div><!-- pe-lg-2 -->
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        </section>
    <?php endif; ?>
    <section class="pt-50">
        <div class="container">
            <div class="row text-white">
                <div class="col-lg-5 text-center text-lg-start">
                    <p class="small">&copy; <?php echo Date('Y') . ' ' . get_bloginfo('name'); ?></p>
                </div>
                <div class="col-lg-2 text-center text-lg-start">
                    <p class="small"><a href="<?php echo esc_url(home_url('/terms-and-conditions')); ?>" class="text-white">Terms & Conditions</a></p>
                </div>
                <div class="col-lg-5 text-center text-lg-end">
                    <p class="small">Designed, Developed and Hosted by <a href="https://sproing.ca" target="_blank" class="text-white">Sproing&nbsp;Creative</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>

</body>

</html>
