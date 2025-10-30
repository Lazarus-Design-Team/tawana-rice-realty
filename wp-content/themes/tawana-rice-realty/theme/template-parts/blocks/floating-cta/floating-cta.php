<?php
$floating_cta = get_field('floating_cta');

$media_position = $floating_cta['media_position'];
$image = $floating_cta['image'];
$subtitle = $floating_cta['subtitle'];
$heading = $floating_cta['heading'];
$description = $floating_cta['description'];
$link = $floating_cta['button'];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');

// Check for media position
$flex_direction = $media_position === 'right' ? 'lg:flex-row-reverse' : 'lg:flex-row';
?>

<section class="floating-cta relative overflow-y-hidden <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <!-- Full-width background div -->
    <div class="bg-shape absolute top-[8rem] sm:top-[22rem] left-0 w-full h-full bg-foreground z-0"></div> <!-- Ensures no top margin for small screens -->

    <div class="container relative mx-auto -mt-[2rem]">
        <!-- Image Row -->
        <div class="flex <?php echo esc_attr($media_position === 'right' ? 'justify-end' : 'justify-start'); ?> w-full relative z-10 flex-col lg:flex-row"> <!-- Changed to flex-col for small screens -->
            <?php if ($image) : ?>
                <div class="w-full lg:w-[50%] h-auto lg:h-[648px] overflow-hidden">
                    <?php echo wp_get_attachment_image(
                        $image['ID'],
                        'full',
                        false,
                        array(
                            'class' => 'w-full h-full object-cover',
                            'alt' => esc_attr($image['alt']),
                        )
                    ); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Overlay Content (Text Box) -->
        <div class="lg:absolute xl:absolute 2xl:absolute top-0 left-0 w-full h-full flex items-center z-20 flex-col lg:flex-row"> <!-- Changed to flex-col for small screens -->
            <div class="container container-p-mv mx-auto px-4 relative z-30 w-full">
                <div class="flex flex-col <?php echo esc_attr($media_position === 'right' ? 'items-start' : 'items-end'); ?> w-full"> <!-- Stack vertically for small screens -->
                    <div class="text-container bg-white p-4 lg:p-8 shadow border-b-8 border-primary text-center w-full lg:w-[60%] 2xl:w-[57%]">
                        <?php if ($subtitle) : ?>
                            <span class="subtitle text-secondary text-center text-[20px] font-bold tracking-[4px] uppercase mb-[12px]">
                                <?php echo esc_html($subtitle); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($heading) : ?>
                            <h2 class="text-primary font-bold mt-0 mb-0">
                                <?php echo esc_html($heading); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <div class="description leading-relaxed mt-9 mb-9 text-secondary">
                                <?php echo ($description); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($link) : 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    
                                    <div class="button-wrapper relative flex justify-center">
                                        <a tabindex="0" class="button bg-white py-[12px] px-[24px] text-[24px] no-underline border-2 border-primary text-primary hover:bg-primary hover:text-white transition duration-300 hover:border-primary cursor-pointer" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_html($link_title); ?>">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


