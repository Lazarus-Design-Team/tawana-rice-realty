<?php
$recently_sold_slider = get_field('gallery_slider');
$slides = $recently_sold_slider['gallery'];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');
?>

<section class="gallery-slider relative <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">

    <?php if ($slides && is_array($slides)) : ?>
        <div class="container mx-auto flex items-center justify-center">
            <div class="gallery owl-carousel owl-theme">
                <?php foreach ($slides as $slide) : 
                    $image = $slide['image'];
                ?>
                    <div class="slide relative">
                        <div class="container relative">
                            <?php if ($image) : ?>
                                <?php echo wp_get_attachment_image(
                                    $image['ID'],
                                    'full',
                                    false,
                                    array(
                                        'class' => 'object-cover object-top h-[20em] md:h-[30em] lg:h-[650px] xl:h-[880px] w-full m-0 p-0 ',
                                        'alt' => esc_attr($image['alt']),
                                    )
                                ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> 
        </div> 
    <?php endif; ?>

</section>
