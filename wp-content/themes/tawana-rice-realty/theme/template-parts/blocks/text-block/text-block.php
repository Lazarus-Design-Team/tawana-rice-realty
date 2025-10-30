<?php
$text_block = get_field('text_block');
$heading = $text_block['heading'];
$description = $text_block['description'];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');

?>

<section class="text-block relative <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <?php if ($heading) : ?>
                <h2 class="text-primary font-bold text-center mt-0 mb-0">
                    <?php echo esc_html($heading); ?>
                </h2>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="description leading-relaxed mt-9 text-secondary text-center mx-auto w-full lg:max-w-[65rem]">
                    <?php echo ($description); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
