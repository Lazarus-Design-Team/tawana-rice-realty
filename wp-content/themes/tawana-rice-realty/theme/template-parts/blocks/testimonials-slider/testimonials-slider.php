<?php
$recently_sold_slider = get_field('testimonials_slider');
$heading = $recently_sold_slider['heading'] ?? '';
$buttons = $recently_sold_slider['buttons'] ?? [];
$slides = $recently_sold_slider['testimonials'] ?? [];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';

$vertical_padding = get_field('vertical_padding');
$padding_class = get_vertical_padding_class($vertical_padding ?? 'medium');
?>

<section class="testimonials-slider bg-foreground max-w-full<?php echo esc_attr($className); ?> <?php echo esc_attr($padding_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-stretch gap-y-[2em] lg:gap-y-0 lg:gap-x-[140px]">

            <div class="w-full lg:w-2/3 flex flex-col justify-center overflow-hidden">
                    <?php if (!empty($heading)) : ?>
                        <h2 class="text-primary mt-0 mb-4"> <?php echo esc_html($heading); ?> </h2>
                    <?php endif; ?>

                    <?php if (!empty($slides)) : ?>
                        <div class="testimonials owl-carousel testimonials-carousel">
                            <?php foreach ($slides as $slide) : ?>
                                <div class="testimonial-item overflow-hidden">
                                    <?php if (!empty($slide['testimonial'])) : ?>
                                        <div class="testimonial-content text-black font-medium mb-8 min-h-[250px]">
                                            <?php echo wp_kses_post($slide['testimonial']); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
            </div>

            <div class="w-full lg:w-1/3 flex flex-col justify-center gap-[40px]">
                <?php if (!empty($buttons)) : ?>
                    <?php foreach ($buttons as $button) : ?>
                        <?php if (!empty($button['button'])) : ?>
                            <?php 
                                $link = $button['button'];
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; 
                            ?>
                            <div class="button-wrapper">
                                <a tabindex="0" 
                                class="bg-transparent py-3 px-6 text-xl font-semibold text-primary border-2 border-primary hover:bg-primary hover:text-white no-underline transition duration-300" 
                                href="<?php echo esc_url($link_url); ?>" 
                                target="<?php echo esc_attr($link_target); ?>" 
                                title="<?php echo esc_html($link_title); ?>">
                                    <?php echo esc_html($link_title); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>                
            </div>

            
        </div>
    </div>
</section>