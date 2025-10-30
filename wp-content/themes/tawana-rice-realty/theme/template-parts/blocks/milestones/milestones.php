<?php
$milestones = get_field('milestones');

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$title = $milestones['title'];
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');
?>

<section class="milestones relative max-w-full bg-foreground <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="container mx-auto">
    <?php if ($title): ?>
                <h2 class="text-primary text-center mt-0 mb-5"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
        <div class="flex flex-row flex-wrap justify-center sm:gap-[5rem] md:gap-[10rem]">
            <?php if (!empty($milestones['stats'])): ?>
                <?php foreach ($milestones['stats'] as $stat): ?>
                    <div class=" basis-12/12 md:basis-3/12 lg:basis-3/12 text-center">
                        <?php if (!empty($stat['stats_heading'])): ?>
                            <h2 class="text-primary font-bold sm:text-[50px] md:text-[70px] lg:text-[70px] mt-0 mb-2">
                                <?php echo esc_html($stat['stats_heading']); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if (!empty($stat['stats_description'])): ?>
                            <p class="text-secondary">
                                <?php echo esc_html($stat['stats_description']); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
