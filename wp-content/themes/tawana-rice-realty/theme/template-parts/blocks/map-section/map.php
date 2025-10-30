<?php
$map_feature = get_field('map_feature');
$heading = $map_feature['heading'];
$map_embed = $map_feature['map_embed'];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');

?>

<section class="map-feature-section relative <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="container mx-auto basis-10/12">
        <div class="flex flex-col justify-center align-middle">
            <?php if ($heading): ?>
                <h2 class="special-heading text-primary text-center mt-0 mb-[2em]"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <?php if ($map_embed) : ?>
                <div class="map-embed">
                    <?php echo ($map_embed); ?>
                </div>
            <?php endif; ?>

            
        </div>
    </div>
</section>
