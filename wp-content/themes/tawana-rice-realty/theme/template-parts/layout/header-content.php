<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tawana_rice_realty
 */


 $header_content = get_field('header_content', 'option');

if ($header_content) {
    $header_logo = $header_content['header_logo']; // Footer logo
}
?>

<header id="masthead" class="bg-foreground py-[32px] border-b-8 border-primary fixed top-0 left-0 w-full z-50 shadow-md transition-transform duration-300">
    <div class="container mx-auto flex items-center justify-between lg:justify-center lg:gap-[2em]">
        
        <!-- Menu 1 (Desktop) -->
        <?php
            wp_nav_menu(
                array(
                    'menu' => 'left-desktop-menu',
                    'menu_class' => 'hidden lg:flex flex-row gap-14 uppercase text-primary font-bold',
                    'menu_id' => 'left-menu',
                    'container' => false,
                )
            );
        ?>

        <!-- Logo -->
        <div class="flex justify-center items-center header-logo">
            <?php if ($header_logo) : ?>
                <a href="<?php echo home_url(); ?>">
                    <?php echo wp_get_attachment_image($header_logo['ID'], 'full'); ?> 
                </a>
            <?php endif; ?>
        </div>

        <!-- Menu 2 (Desktop) -->
        <?php
            wp_nav_menu(
                array(
                    'menu' => 'right-desktop-menu',
                    'menu_class' => 'hidden lg:flex flex-row gap-14 uppercase text-primary font-bold',
                    'menu_id' => 'right-menu',
                    'container' => false,
                )
            );
        ?>

        <!-- Hamburger Button (Mobile) -->
        <button id="mobile-menu-button" class="lg:hidden text-primary text-3xl">
           <!-- &#9776;--> <!-- Hamburger Icon -->
            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path class="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

    </div>

    <!-- Mobile Menu (Initially Hidden) -->
    <div id="mobile-menu" class="hidden fixed inset-0 bg-foreground h-screen bg-opacity-95 flex flex-col items-center justify-center z-50 overflow-y-auto">
        <!-- Close Button -->
        <button id="close-menu-button" class="absolute top-6 right-6 text-primary text-4xl">
            <!--&times;-->
            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path class="close-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
        </button>

        <nav class="flex flex-col gap-6 text-center uppercase text-primary font-bold text-2xl w-full max-w-xs">
            <?php
                wp_nav_menu(
                    array(
                        'menu' => 'mobile-menu',
                        'menu_class' => 'flex flex-col gap-6 w-full',
                        'menu_id' => 'mobile-menu-list',
                        'container' => false,
                    )
                );
            ?>
        </nav>
    </div>
</header>
