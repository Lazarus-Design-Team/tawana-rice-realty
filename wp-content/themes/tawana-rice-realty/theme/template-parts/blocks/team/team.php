<?php
$team_display = get_field('team_display');
$heading = $team_display['heading'] ?? '';
$team_members = $team_display['team_members'] ?? [];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');
?>

<section class="team-display relative <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="container mx-auto basis-10/12">
        <div class="flex flex-col text-center">
            <?php if ($heading): ?>
                <h2 class="special-heading text-primary mt-0 mb-5"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <div class="flex flex-wrap justify-center">
                <?php if ($team_members): ?>
                    <?php foreach ($team_members as $post): ?>
                        <?php
                        setup_postdata($post);
                        $name = get_field('name', $post->ID);
                        $position = get_field('position', $post->ID);
                        $name_color = get_field('name_color', $post->ID) ?: 'pink';
                        $links = get_field('links', $post->ID);
                        $featured_image_id = get_post_thumbnail_id($post->ID); // Get the featured image ID
                        ?>
                        <div class="team-member basis-12/12 md:basis-3/12 lg:basis-3/12 p-4 text-center">
                            <?php if ($featured_image_id): ?>
                                <?php echo wp_get_attachment_image(
                                    $featured_image_id,
                                    'full', // Size
                                    false,
                                    array(
                                        'class' => 'w-full h-auto object-cover mb-4',
                                        'alt' => esc_attr(get_post_meta($featured_image_id, '_wp_attachment_image_alt', true)),
                                    )
                                ); ?>
                            <?php endif; ?>
                            <?php if ($name): ?>
                                <h3 class="<?php echo $name_color === 'black' ? 'text-tertiary' : 'text-primary'; ?> my-0 font-medium"><?php echo esc_html($name); ?></h3>
                            <?php endif; ?>
                            <?php if ($position): ?>
                                <p class="text-sm text-secondary my-0"><?php echo esc_html($position); ?></p>
                            <?php endif; ?>
                            <div class="flex justify-center gap-3">
                                <?php if ($links): ?>
                                    <?php foreach ($links as $link_item): ?>
                                        <?php
                                        $link = $link_item['link'] ?? '';
                                        $icon = $link_item['icon'] ?? '';
                                        ?>
                                        <?php if ($link && $icon): ?>
                                            <a href="<?php echo esc_url($link['url']); ?>" 
                                               class="flex items-center hover:opacity-80 transition duration-300" 
                                               target="<?php echo esc_attr($link['target'] ?? '_self'); ?>" 
                                               rel="noopener">
                                                <img src="<?php echo esc_url($icon['url']); ?>" 
                                                     alt="<?php echo esc_attr($icon['alt'] ?? 'Icon'); ?>" 
                                                     class="mb-0 mt-[0.5rem] mx-0 w-6">
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p class="text-gray-500">No team members selected.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
