<?php
$hero = get_field('inner_hero');

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');

$bg_image = $hero['bg_image'] ?? null;
$heading = $hero['heading'] ?? '';
?>

<section class="inner-hero relative h-[17vh] lg:h-[45vh] max-w-full <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <?php if ($bg_image) : ?>
        <div class="absolute inset-0">
            <?php echo wp_get_attachment_image(
                $bg_image['ID'],
                'full',
                false,
                array(
                    'class' => 'w-full h-full object-cover mt-0',
                    'alt' => esc_attr($bg_image['alt']),
                )
            ); ?>
        </div>
    <?php endif; ?>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/70"></div>

    <div class="relative z-10 flex items-center justify-center text-center h-full w-full px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto flex flex-row justify-center">
            <?php if ($heading) : ?>
                <h1 class="text-white mb-0 text-center">
                    <?php echo esc_html($heading); ?>
                </h1>
            <?php endif; ?>
        </div>
    </div>
</section>
