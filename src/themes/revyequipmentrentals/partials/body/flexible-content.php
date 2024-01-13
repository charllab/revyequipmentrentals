<?php
$body = get_field('body');
$layouts = $body['layout'];
if ($layouts) : ?>
    <?php $counter = 0;
    foreach ($layouts as $layout) : ?>
        <?php if ($layout['acf_fc_layout'] == 'media_and_text'): ?>
            <?php
            //acf fields data
            // structure > media (group)
            $media = $layout['structure']['media'];
            // structure > text (group)
            $text = $layout['structure']['text'];
            // structure > text > button (group)
            $buttons = $layout['structure']['text']['buttons']['button'];
            $image = $media['image'];
            $alignment = $media['alignment'];
            $above_header = $text['above_header'];
            $header = $text['header'];
            $text = $text['content'];
            $sectionid = $layout['structure']['section_id'];
            ?>
            <section class="section--column position-relative" id="<?php echo $sectionid;?>">
                <div class="container position-relative">
                    <div class="row justify-content-md-between align-items-center">
                        <div class="col-lg-6 pt-md-50 order-lg-<?php echo $alignment;?>">
                            <div class="pe-xl-2">
                                <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo $image['alt'];?>"
                                     loading="lazy"
                                     class="ping-pong-image--square img-fluid d-block">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="column-content d-flex flex-column justify-content-center align-content-center">
                                <div class="content bg-white py-1 px-0 px-lg-150">
                                    <div class="column-content--text mb-1">
                                        <?php if (!empty($above_header)): ?>
                                            <h2 class="subhead"><?php echo $above_header;?></h2>
                                        <?php endif;?>
                                        <h3 class="h2 pe-xxl-25"><?php echo $header;?></h3>
                                        <?php echo $text;?>
                                    </div><!-- column-content--text -->
                                    <?php if (!empty($buttons)): ?>
                                        <div class="column-content--button-set">
                                            <?php foreach ($buttons as $button) :
                                                $target = $button['link']['target'] ?>
                                                <a href="<?php echo esc_url($button['link']['url']);?>"
                                                   class="btn <?php echo $button['style'];?>"
                                                    <?php if (!empty($target)): ?>
                                                        target="<?php echo $target ?>"
                                                    <?php endif;?>
                                                >
                                                    <?php echo $button['link']['title'];?>
                                                </a>
                                            <?php endforeach;?>
                                        </div><!-- column-content--button-set -->
                                    <?php endif;?>
                                </div><!-- content -->
                            </div><!-- column-content -->
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php elseif ($layout['acf_fc_layout'] == 'cards_v2'): ?>
            <?php
            //dump($layout);
            $intro_above_header = $layout['section_intro']['above-header_text'];
            $intro_header = $layout['section_intro']['header'];
            $intro_content = $layout['section_intro']['content'];
            $cards_index = $layout['cards']['card'];
            $sectionid = $layout['section_id'];
            ?>
            <section class="section--wrapper section--cards position-relative mb-0" id="<?php echo $sectionid;?>">
                <div class="position-relative">
                    <div class="mb-lg-2">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-xxxl-9">
                                    <div class="text-center">
                                        <?php if (!empty($intro_above_header)) : ?>
                                            <h2 class="subhead"><?php echo $intro_above_header;?></h2>
                                        <?php endif;?>
                                        <h3 class="h2"><?php echo $intro_header ?></h3>
                                        <?php if (!empty($intro_content)) {
                                            echo $intro_content;
                                        } ?>
                                    </div><!-- text-center -->
                                </div><!-- col -->
                            </div><!-- row -->
                        </div><!-- container -->
                    </div>
                    <section class="mb-0 cards-clean">
                        <div class="container">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-0 text-center">
                                <?php foreach ($cards_index as $card):
                                    $cardtext = $card['card_text'];
                                    $price = $card['price'];
                                    $subpricetext = $card['sub_price_text'];
                                    $fineprint = $card['fine_print'];
                                    ?>
                                    <div class="col">
                                        <div class="card h-100">
                                            <div class="card-line">
                                                <div class="px-lg-1">
                                                    <div class="px-1 px-sm-3 px-md-1 px-lg-0">
                                                        <img src="<?php echo esc_url($card['icon']['url']);?>" class="card-img-top" alt="<?php echo $card['icon']['title']?>">
                                                    </div>
                                                    <div class="card-body pb-0">
                                                        <h3 class="mb-50 card-title product-title"><?php echo $card['card_title'];?></h3>
                                                        <?php if($cardtext): ?>
                                                        <p class="card-text"><?php echo $cardtext;?></p>
                                                        <?php endif; ?>
                                                    </div><!-- card-body -->
                                                </div><!-- px -->
                                            </div><!-- card-line -->
                                            <div class="card-footer pt-50">
                                                <?php if($price): ?>
                                                <p class="h4 sun mb-0 price">C$<?php echo $price;?></p>
                                                <?php endif; ?>
                                                <?php if($subpricetext): ?>
                                                    <p class="mb-250 sub subprice"><?php echo $subpricetext;?></p>
                                                <?php endif; ?>
                                                <?php if($fineprint): ?>
                                                    <p class="lead fine-print"><?php echo $fineprint;?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div><!-- card -->
                                    </div><!-- col -->
                                <?php endforeach;?>
                            </div><!-- row -->
                        </div><!-- container -->
                    </section>
                </div><!-- position-relative -->
            </section>
        <?php endif;
        $counter++;
    endforeach;
    wp_reset_postdata();
    ?>
<?php endif;?>


