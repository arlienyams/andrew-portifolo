<?php

/************************************
	Theme Support
 ************************************/
function andrew_setup()
{

    //navigation menu
    add_theme_support('menus');

    // //woocommerce
    // add_theme_support('woocommerce');

    //post-formats
    add_theme_support('post-formats', array('aside', 'image', 'video', 'gallery', 'quote', 'link'));

    //featured images
    add_theme_support('post-thumbnails');
    add_image_size('slider-image', 1400, 550, true);

    // Register wp_nav_menu()
    register_nav_menus(array(
        'main_menu' => esc_html__('Main Menu'),
        'footer-menu' => esc_html__('Footer Menu')
    ));

    /* Switch default core markup for search form, comment form, and comments to output valid HTML5. */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'andrew_setup');




/************************************
	Enqueue scripts and styles
 ************************************/
function andrew_scripts()
{
    wp_enqueue_style('bootstrap-css-styles', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1', 'all');
    wp_enqueue_style('andrew-style', get_stylesheet_uri());
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.min.css', false, '1', 'all');
    wp_enqueue_style('aos-css', get_template_directory_uri() . '/css/aos.css', false, '1', 'all');
    wp_enqueue_style('slider-css', get_template_directory_uri() . '/css/owl.carousel.min.css', false, '1', 'all');
    wp_enqueue_style('andrew-css', get_template_directory_uri() . '/css/andrew-primary.css', false, '1', 'all');
    wp_enqueue_style('navigation-css', get_template_directory_uri() . '/css/navigation.css', false, '1', 'all');

    wp_enqueue_script('andrew-jquery', get_theme_file_uri() . '/js/jquery.min.js', true, '1', 'all');
    wp_enqueue_script('aos-jquery', get_theme_file_uri() . '/js/aos.js', true, '1', 'all');
    wp_enqueue_script('bootstrap-js', get_theme_file_uri() . '/js/bootstrap.min.js', true, '1', 'all');
    wp_enqueue_script('andrew-slider-js', get_theme_file_uri() . '/js/owl.carousel.min.js', true, '1', 'all');
    wp_enqueue_script('andrew-vanilla-script', get_theme_file_uri() . '/js/script.js', true, '1', 'all');
}
add_action('wp_enqueue_scripts', 'andrew_scripts');



/************************************
	excerpt_length
 ************************************/
add_filter('excerpt_length', function ($length) {
    return 50;
});



//Function for excerpt
function wpshout_change_and_link_excerpt($more)
{
    if (is_admin()) {
        return $more;
    }

    // Change text, make it link, and return change
    return '&hellip; <a href="' . get_the_permalink() . '">Read More »</a>';
}
add_filter('excerpt_more', 'wpshout_change_and_link_excerpt', 999);


/************************************
	Bread Crumb
 ************************************/
function get_breadcrumb()
{
    echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
        if (is_single()) {
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            the_title();
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}



/************************************
	Pagination
 ************************************/
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged)) $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<div class=\"pagination\"><span>Page " . $paged . " of " . $pages . "</span>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
        if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">Next &rsaquo;</a>";
        if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
        echo "</div>\n";
    }
}




/************************************
	Slider Post Type
 ************************************/
function andrew_slider_post_type()
{
    register_post_type(
        'slider',
        array(
            'labels' => array(
                'name' => __('Slider'),
                'singular_name' => __('Slider'),
                'add_new_item' => 'Add New Slider',
                'add_new' => __('Add New Slider'),
                'attributes' => __('Slider Attributes', 'text_domain'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'slider'
            ),
            'supports' => array(
                'title',
                'thumbnail'
            ),
            'menu_position' => 5,
            'menu_icon' => __('dashicons-controls-repeat')
        )
    );
}
add_action('init', 'andrew_slider_post_type');

/************************************
	Projects Post Type
 ************************************/
function projects_post_type()
{
    register_post_type(
        'projects',
        array(
            'labels' => array(
                'name' => __('Projects'),
                'singular_name' => __('Project'),
                'add_new_item' => 'Add Project',
                'add_new' => __('Add Project'),
                'attributes' => __('Project Attributes', 'text_domain'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'projects'
            ),
            'supports' => array(
                'title',
                'thumbnail'
            ),
            'menu_position' => 6,
            'menu_icon' => __('dashicons-portfolio')
        )
    );
}
add_action('init', 'projects_post_type');

/************************************
	Social Post Type
 ************************************/
function social_post_type()
{
    register_post_type(
        'social',
        array(
            'labels' => array(
                'name' => __('Social Links'),
                'singular_name' => __('Social Links'),
                'add_new_item' => 'Add Social Links',
                'add_new' => __('Add Social Links'),
                'attributes' => __('Social Links Attributes', 'text_domain'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'social'
            ),
            'supports' => array(
                'title',
                // 'thumbnail'
            ),
            'menu_position' => 7,
            'menu_icon' => __('dashicons-share')
        )
    );
}
add_action('init', 'social_post_type');



/************************************
	About Post Type
 ************************************/
function about_post_type()
{
    register_post_type(
        'about',
        array(
            'labels' => array(
                'name' => __('About Me'),
                'singular_name' => __('About'),
                'add_new_item' => 'Add About Me',
                'add_new' => __('Add About Me'),
                'attributes' => __('About Attributes', 'text_domain'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'about'
            ),
            'supports' => array(
                'title',
                'thumbnail'
            ),
            'menu_position' => 8,
            'menu_icon' => __('dashicons-businessperson')
        )
    );
}
add_action('init', 'about_post_type');



/************************************
	Contact Post Type
 ************************************/
function contact_post_type()
{
    register_post_type(
        'contact',
        array(
            'labels' => array(
                'name' => __('Contact Details'),
                'singular_name' => __('Contact Details'),
                'add_new_item' => 'Add Contact Details',
                'attributes' => __('Contact Details Attributes', 'text_domain'),

            ),

            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'contact'
            ),
            'supports' => array(
                'title',
                'thumbnail'
            ),
            'menu_position' => 9,
            'menu_icon' => __('dashicons-phone')
        )


    );
}
add_action('init', 'contact_post_type');


/**********************************************
            Custom LOGIN PAGE
 **********************************************/

/***********Changes the Logo***********/
function wpb_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(./wp-content/themes/andrew/img/Logo.png);
            height: 100px;
            width: 300px;
            background-size: 300px 100px;
            background-repeat: no-repeat;
            padding-bottom: 10px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'wpb_login_logo');

/*******Adds a home link to the logo Image********/
function wpb_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'wpb_login_logo_url');

function wpb_login_logo_url_title()
{
    return 'andrew';
}
add_filter('login_headertitle', 'wpb_login_logo_url_title');
