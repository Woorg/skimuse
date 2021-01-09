<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style('swiper', get_template_directory_uri() . '/front/static/dev/assets/css/separate-css/swiper-bundle.min.css', false, null);
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/front/static/dev/assets/css/separate-css/magnific-popup.css', false, null);
    wp_enqueue_style('main-dev', get_template_directory_uri() . '/front/static/dev/assets/css/main.css', false, null);

    // wp_enqueue_style('main-prod', get_template_directory_uri() . '/front/static/prod/assets/css/main.min.css', false, null);

    // wp_enqueue_script('jquery');
    // wp_script_add_data('jquery', 'defer', true);
    // wp_script_add_data('jquery', 'async', true);


    wp_enqueue_script('lazyload', get_template_directory_uri() . '/front/static/prod/assets/js/separate-js/lazyload.min.js', ['jquery'], null, true);

    // wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/front/static/prod/assets/js/separate-js/swiper-bundle.min.js', ['jquery'], null, true);

    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/front/static/prod/assets/js/separate-js/jquery.magnific-popup.min.js', ['jquery'], null, true);


    // register our main script but do not enqueue it yet
    wp_register_script('loadmore', get_stylesheet_directory_uri() . '/front/static/dev/assets/js/separate-js/myloadmore.js', ['jquery']);

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script('loadmore', 'load_more', array(
        'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages,
        'security' => wp_create_nonce('load_more_posts'),
    ));

    wp_enqueue_script('loadmore');


    wp_enqueue_script('main-dev', get_template_directory_uri() . '/front/static/dev/assets/js/main.js', ['jquery'], null, true);
    wp_script_add_data('main-dev', 'defer', true);


    //    wp_enqueue_script('main-prod', get_template_directory_uri() . '/front/static/prod/assets/js/main.min.js', ['jquery'], null, true);
    //    wp_script_add_data('main-prod', 'defer', true);


    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];
    register_sidebar([
            'name' => __('Primary', 'sage'),
            'id' => 'sidebar-primary'
        ] + $config);
    register_sidebar([
            'name' => __('Footer', 'sage'),
            'id' => 'sidebar-footer'
        ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });


    /**
     * Initialize ACF Builder
     */
    add_action('init', function () {
        if (function_exists('acf_add_local_field_group')) {
            // general fields
            collect(glob(config('theme.dir') . '/app/fields/*.php'))->map(function ($field) {
                return require_once($field);
            })->map(function ($field) {
                if ($field instanceof FieldsBuilder) {
                    acf_add_local_field_group($field->build());
                }
            });

            // custom gutenberg blocks
            collect(glob(config('theme.dir') . '/app/fields/blocks/*.php'))->map(function ($field) {
                return require_once($field);
            })->map(function ($field) {
                if ($field instanceof FieldsBuilder) {
                    acf_add_local_field_group($field->build());
                }
            });
        }
    });


});
