<?php
/**
 * Template for displaying the static homepage
 *
 * @package Maghreb
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<main id="primary" class="site-main">

<section class="maghreb-hero-section" style="
    background-image: url('<?php echo esc_url(get_theme_mod('hero_background_image', '')); ?>');
    background-position: <?php echo esc_attr(get_theme_mod('hero_background_position', 'center center')); ?>;
    background-size: <?php echo esc_attr(get_theme_mod('hero_background_size', 'cover')); ?>;
    background-color: <?php echo esc_attr( get_theme_mod( 'hero_background_color', '' ) ) ?>;
    text-align: <?php echo esc_attr( get_theme_mod('hero_text_alignment', 'center') ) ?>;
    display: <?php echo esc_attr( get_theme_mod( 'hero_content_center', 'yes' ) ) === 'yes' ? 'flex' : 'block'; ?>;
    justify-content: <?php echo esc_attr( get_theme_mod( 'hero_content_center', 'yes' ) ) === 'yes' ? 'center' : 'flex-start'; ?>;
    align-items: <?php echo esc_attr( get_theme_mod( 'hero_content_center', 'yes' ) ) === 'yes' ? 'center' : 'flex-start' ?>;
">
    <h1 class="maghreb-hero-title" style="font-size: <?php echo esc_attr(get_theme_mod('hero_title_size', '32')); ?>px;">
        <?php echo esc_html(get_theme_mod('hero_title', 'Welcome to Our Website')); ?>
    </h1>
    <div class="maghreb-hero-description" style="
    font-size: <?php echo esc_attr(get_theme_mod('hero_description_size', '32')); ?>px;
    line-height: <?php echo esc_attr( get_theme_mod('hero_line_height', '1.5') ) ?>;">
        <p><?php echo wp_kses_post(get_theme_mod('hero_description', 'Your customizable description goes here.')); ?></p>
    </div>
    <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '#')); ?>" class="maghreb-hero-button">
        <?php echo esc_html(get_theme_mod('hero_button_text', 'Learn More')); ?>
    </a>
</section>

    <!-- Front Page Widget Section -->
    <section class="maghreb-widget-section">
        <?php for ($i = 1; $i <= 3; $i++) {
        $title = get_theme_mod("maghreb_widget_{$i}_title", "Widget {$i} Title");
        $description = get_theme_mod("maghreb_widget_{$i}_description", "Widget {$i} Description");
        $button_text = get_theme_mod("maghreb_widget_{$i}_button_text", "Learn More {$i}");
        $button_url = get_theme_mod("maghreb_widget_{$i}_button_url", "#");
        $icon = get_theme_mod("maghreb_widget_{$i}_icon", "fa-star");
        $button_size = get_theme_mod("maghreb_widget_{$i}_button_size", "medium");
        ?>

        <div class="widget widget-<?php echo $i; ?>">
            <i class="fa <?php echo esc_attr($icon); ?>"></i>
            <h3><?php echo wp_kses_post($title); ?></h3>
            <p><?php echo wp_kses_post($description); ?></p>
            <a href="<?php echo esc_url($button_url); ?>" 
            class="btn btn-<?php echo esc_attr($button_size); ?>">
                <?php echo esc_html($button_text); ?>
            </a>
        </div>

        <?php } ?>
    
    </section>

    <section class="custom-widgets">
        <h2>Our Services</h2>
        <p>This is the section where we can publish about our services.</p>
        <?php dynamic_sidebar( 'homepage-widgets' ); ?>
        <!-- You can add a button here if necessary -->
    </section>

    <section id="maghreb-six-section">
        <header class="six-header">
            <h2>Our six section</h2>
            <p>This is the section where we can publish about our six section.</p>
        </header>
        <section class="three-section-row">
            <div class="section-item">
                <i class="fa fa-cog"></i>
                <div class="text-content">
                    <?php dynamic_sidebar( 'maghreb-home-1' ) ?>
                </div>
            </div>

            <div class="section-item">
                <i class="fa fa-star"></i>
                <div class="text-content">
                    <?php dynamic_sidebar( 'maghreb-home-2' ); ?>
                </div>
            </div>

            <div class="section-item">
                <i class="fa fa-heart"></i>
                <div class="text-content">
                <?php dynamic_sidebar( 'maghreb-home-3' ); ?>
                </div>
            </div>
        </section>
    </section>

    <div class="latest-posts-grid">
    <?php
    $recent_posts = new WP_Query(array(
        'posts_per_page' => 3, // Fetch the latest 3 posts
        'post_status'    => 'publish',
    ));

    $show_last_posts = get_theme_mod( 'show_last_posts', 'yes' );

    if( $show_last_posts === 'yes' ) {

        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="post-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('small'); ?>
                        </div>
                    <?php endif; ?>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php esc_html_e('No posts found.', 'your-theme-textdomain'); ?></p>
        <?php endif; ?>
    </div>
    <?php } ?>

    <section class="custom-widgets">
        <h2>Our Services</h2>
        <p>This is the section where we can publish about our services.</p>
        <?php dynamic_sidebar( 'homepage-widgets' ); ?>
        <!-- You can add a button here if necessary -->
    </section>

</main><!-- .site-main -->

<?php get_footer(); ?>