<?php
$featured_in = get_field('featured_in');
$logos = $featured_in['logos'] ?? [];
$heading = $featured_in['heading'] ?? '';

$className = $block['className'] ?? '';
$anchor = $block['anchor'] ?? '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');
?>

<section class="featured-in relative <?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
  <div class="container mx-auto text-center">
    <!-- Display Heading -->
    <?php if ($heading): ?>
      <h2 class="special-heading text-primary mt-0 mb-5"><?php echo esc_html($heading); ?></h2>
    <?php endif; ?>

    <!-- Display Logos -->
    <?php if (!empty($logos)): ?>
      <div class="flex flex-wrap justify-center align-middle items-center md:gap-12 lg:gap-16 flex-col md:flex-row">
        <?php foreach ($logos as $logo_item): ?>
          <?php
          $link = $logo_item['link'] ?? null;
          $logo = $logo_item['logo'] ?? null;
          ?>
          <?php if ($logo): ?>
            <div class="w-full md:w-1/5 lg:max-w-[150px] flex justify-center items-center">
              <?php if ($link): 
                $link_url = $link['url'] ?? '#';
                $link_title = $link['title'] ?? '';
                $link_target = $link['target'] ?? '_self';
              ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_attr($link_title); ?>">
                  <?php echo wp_get_attachment_image(
                    $logo['ID'],
                    'full',
                    false,
                    ['class' => 'h-auto cursor-pointer', 'alt' => esc_attr($logo['alt'] ?? '')]
                  ); ?>
                </a>
              <?php else: ?>
                <?php echo wp_get_attachment_image(
                  $logo['ID'],
                  'full',
                  false,
                  ['class' => 'h-auto', 'alt' => esc_attr($logo['alt'] ?? '')]
                ); ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
