<?php
/**
 * Template part for displaying the footer content
 *
 * @package tawana_rice_realty
 */

// Fetch the footer_content field group from the options page
$footer_content = get_field('footer_content', 'option');

// Check if footer_content exists and extract its subfields
if ($footer_content) {
    $footer_logo = $footer_content['footer_logo']; // Footer logo
    $contact_information = $footer_content['contact_information']; // Repeater field
    $socials = $footer_content['socials']; // Repeater field
    $copyright_information = $footer_content['copyright_information']; // WYSIWYG field
    $mls_logo = $footer_content['mls_logo'];
}
?>

<footer class="bg-primary text-white py-8">
    <div class="container mx-auto text-center flex flex-col items-center relative">
        
        <?php if ($footer_logo) : ?>
        <a href="<?php echo home_url(); ?>">
            <?php echo wp_get_attachment_image($footer_logo['ID'], 'full'); ?> 
        </a>
        <?php endif; ?>


        <?php
             wp_nav_menu(
                array(
                    'menu' => 'footer-menu',
                    'menu_class' => 'flex flex-col lg:flex-row gap-2 lg:gap-14 uppercase pt-14',
                    'menu_id' => 'footer-menu',
                    'container' => false,
                                )
                            );
       ?>

        <?php if (!empty($contact_information)): ?>
            <div class="flex flex-col lg:flex-row gap-2 lg:gap-8 pt-10 lg:pb-20">
                <?php foreach ($contact_information as $contact): ?>
                    <?php if (!empty($contact['icon']) && !empty($contact['link'])): ?>
                        <a href="<?php echo esc_url($contact['link']['url']); ?>" class="flex items-center justify-center text-white hover:text-white" target="<?php echo esc_attr($contact['link']['target']); ?>" rel="noopener">
                            <img src="<?php echo esc_url($contact['icon']['url']); ?>" alt="<?php echo esc_attr($contact['icon']['alt']); ?>" class="h-6 w-6 mr-[22px]">
                            <span><?php echo esc_html($contact['link']['title']); ?></span>
                        </a> 
                            <div class="divider hidden md:block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="28" viewBox="0 0 4 28" fill="none">
                                <path d="M2 0V27.9395" stroke="#8F2B4F" stroke-width="3"/>
                            </svg>
                            </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                 <div class="flex gap-[24px] lg:justify-start justify-center lg:py-0 py-[20px]">
                <?php foreach ($socials as $social): ?>
                    <?php if (!empty($social['social_icon']) && !empty($social['social_link'])): ?>
                            <a href="<?php echo esc_url($social['social_link']['url']); ?>" class="flex items-center justify-center text-white hover:text-white social" target="<?php echo esc_attr($social['social_link']['target']); ?>" rel="noopener">
                                <img src="<?php echo esc_url($social['social_icon']['url']); ?>" alt="<?php echo esc_attr($social['social_icon']['alt']); ?>" class="h-6 w-6">
                            </a>
                    <?php endif; ?>
                <?php endforeach; ?>
                    </div>
            </div>
        <?php endif; ?>
        <?php if ($mls_logo) : ?>
            <div class="relative lg:hidden pt-2 pb-2 md:pt-0 max-w-[58%] md:max-w-[12%]">
                <?php echo wp_get_attachment_image($mls_logo['ID'], 'full'); ?> 
            </div>
        <?php endif; ?>

        <?php if (!empty($copyright_information)): ?>
            <div class="text-sm text-white px-4 md:px-0">
                <?php echo wp_kses_post($copyright_information); ?>
            </div>
        <?php endif; ?>


        <?php if ($mls_logo) : ?>
            <div class="relative hidden lg:block md:absolute md:right-1 md:bottom-1 pt-2 md:pt-0 max-w-[58%] md:max-w-[12%]">
                <?php echo wp_get_attachment_image($mls_logo['ID'], 'full'); ?> 
            </div>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
