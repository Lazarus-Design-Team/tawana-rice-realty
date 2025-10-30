<?php
$hero_slider = get_field('hero_slider');
$slides = $hero_slider['slide'];

$className = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : '';
?>

<section class="hero-slider relative max-w-full h-full <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($anchor); ?>">
    <?php if ($slides && is_array($slides)) : ?>
        <div class="hero owl-carousel owl-theme h-full">
            <?php foreach ($slides as $slide) : 
                $image = $slide['image'];
                $heading = $slide['heading'];
                $description = $slide['description'];
                $link = $slide['button'];
                ?>

                <div class="slide relative w-full h-full">
                    <?php if ($image) : ?>
                        <?php echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'absolute w-full h-full object-cover brightness-50 my-0',
                                'alt' => esc_attr($image['alt']),
                            )
                        ); ?>
                    <?php endif; ?>

                    <div class="relative z-10 h-full flex items-end justify-center w-full px-4 sm:px-6 lg:px-8">
                        <div class="container mx-auto flex items-center justify-center lg:py-0 py-2em] h-[40em] lg:h-[calc(100vh-121px)] xl:h-[calc(100vh-166px)] ">
                            <div class="hero-content mx-auto lg:max-w-[90%] xl:max-w-[83%]">

                                <?php if ($heading) : ?>
                                    <h1 class="my-0 text-white text-center mx-auto text-[30px] md:text-[35px] lg:text-[44px] leading-[1.2]">
                                        <?php echo esc_html($heading); ?>
                                    </h1>
                                <?php endif; ?>

                                <?php if ($description) : ?>
                                    <div class="hero-body text-white text-center mx-auto ">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($link) : 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                                    
                                    <div class="button-wrapper relative flex justify-center">
                                        <a tabindex="0" class="button z-20 bg-white py-[12px] px-[24px] text-[24px] no-underline border-2 border-transparent text-primary hover:bg-foreground transition duration-300 hover:border-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" title="<?php echo esc_html($link_title); ?>">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>