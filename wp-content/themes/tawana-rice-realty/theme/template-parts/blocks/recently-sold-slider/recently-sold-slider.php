<?php
$recently_sold_slider = get_field('recently_sold_slider');
$slides = $recently_sold_slider['slide'];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');
?>

<section class="recently-sold-slider relative <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">

    <?php if ($slides && is_array($slides)) : ?>
        <div class="container mx-auto flex items-center justify-center ">
            <div class="sold owl-carousel owl-theme">
                <?php foreach ($slides as $slide) : 
                    $image = $slide['image'];
                    $heading = $slide['heading'];
                    $description = $slide['description'];
                    $link = $slide['button'];
                ?>
                    <div class="slide relative">
                        <div class="w-full h-full">
                            <?php if ($image) : ?>
                                <?php echo wp_get_attachment_image(
                                    $image['ID'],
                                    'full',
                                    false,
                                    array(
                                        'class' => 'h-[32vh] md:h-[50vh] lg:h-[70vh] object-cover',
                                        'alt' => esc_attr($image['alt']),
                                    )
                                ); ?>
                            <?php endif; ?>
                        </div>

                        <!-- Content Box -->
                        <div class="recently-sold-content bg-white border-b-8 border-primary shadow-lg text-center p-8 w-full lg:w-[60rem] relative lg:absolute lg:bottom-[-9rem] left-1/2 transform -translate-x-1/2 z-20">
                            <?php if ($heading) : ?>
                                <h2 class="text-primary mt-0 mb-0">
                                    <?php echo esc_html($heading); ?>
                                </h2>
                            <?php endif; ?>

                            <?php if ($description) : ?>
                                <div class="recently-sold-description text-secondary mt-4">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>

                            <!--

                            <?php if ($link) : 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; 
                            ?>
                                <div class="button-wrapper mt-[1.2rem] absolute right-0 left-0 z-20">
                                    <a tabindex="0" class="bg-white py-3 px-6 text-xl font-semibold text-primary border-2 border-primary hover:bg-primary hover:text-white no-underline transition duration-300" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_html($link_title); ?>">
                                        <?php echo esc_html($link_title); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            -->
                        </div> 
                    </div>
                <?php endforeach; ?>
            </div> 
        </div> 
    <?php endif; ?>

</section>
