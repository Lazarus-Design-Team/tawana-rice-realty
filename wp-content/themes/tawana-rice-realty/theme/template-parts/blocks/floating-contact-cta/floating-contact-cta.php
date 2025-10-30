<?php
$floating_contact_cta = get_field('floating_contact_cta');

$media_position = $floating_contact_cta['media_position'];
$image = $floating_contact_cta['image'];
$heading = $floating_contact_cta['heading'];
$description = $floating_contact_cta['description'];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');

// Check for media position
$flex_direction = $media_position === 'right' ? 'lg:flex-row-reverse' : 'lg:flex-row';
?>

<section class="floating-cta relative overflow-y-hidden <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="container relative mx-auto lg:-mt-[2rem]">
        <!-- Image Row -->
        <div class="flex <?php echo esc_attr($media_position === 'right' ? 'justify-end' : 'justify-start'); ?> w-full relative z-10 flex-col lg:flex-row"> 
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
        <div class="lg:absolute xl:absolute 2xl:absolute top-0 left-0 w-full h-full flex items-center z-20 flex-col lg:flex-row"> 
            <div class="container mx-auto px-4 relative z-30 w-full">
                <div class="flex flex-col <?php echo esc_attr($media_position === 'right' ? 'items-start' : 'items-end'); ?> w-full"> 
                    <div class="bg-white p-4 lg:p-8 shadow border-b-8 border-primary text-center w-full lg:w-[60%] 2xl:w-[57%]">
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

                        <?php $links = $floating_contact_cta['links']; ?>
                        <?php if (!empty($links)): ?>
                            <div class="flex flex-col lg:flex-row items-center justify-center gap-[0rem] lg:gap-[60px]">
                                <?php foreach ($links as $index => $link_item): ?>
                                    <?php if (!empty($link_item['icon']) && !empty($link_item['link'])): ?>
                                        <a href="<?php echo esc_url($link_item['link']['url']); ?>" 
                                        class="flex items-center text-white hover:text-primary no-underline transition duration-300" 
                                        target="<?php echo esc_attr($link_item['link']['target']); ?>" 
                                        rel="noopener">
                                            <img src="<?php echo esc_url($link_item['icon']['url']); ?>" 
                                                alt="<?php echo esc_attr($link_item['icon']['alt']); ?>" 
                                                class="mr-2">
                                            <span class="font-medium text-secondary text-[20px]"><?php echo esc_html($link_item['link']['title']); ?></span>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
