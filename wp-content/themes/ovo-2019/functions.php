<?php




//
add_filter('show_admin_bar', '__return_false');


//
function add_style_sheet() {
  wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'add_style_sheet' );


//
function add_main_scripts() {
    wp_register_script('primary_script', get_template_directory_uri() . '/scripts.js', array('jquery'),'1.1', true);
    wp_enqueue_script('primary_script');
}
add_action( 'wp_enqueue_scripts', 'add_main_scripts' ); add_action( 'wp_enqueue_scripts', 'add_main_scripts' );  


// ?
function register_site_menu() {
  register_nav_menu('Site menu',__( 'site-menu' ));
}
add_action( 'init', 'register_site_menu' );

if ( is_admin() ) {
    add_filter( 'dashboard_recent_posts_query_args', 'add_page_to_dashboard_activity' );
    function add_page_to_dashboard_activity( $query ) {
        // Return all post types
        $post_types = get_post_types();
        // Return post types of your choice
        // $post_types = ['post', 'foo', 'bar'];
        if ( is_array( $query['post_type'] ) ) {
            $query['post_type'] = $post_types;
        } else {
            $temp = $post_types;
            $query['post_type'] = $temp;
        }
        return $query;
    }
}




// if you create a field named 'block_title' it will be added to the block for visual help!
add_filter('acf/fields/flexible_content/layout_title', function($title) {
    $ret = $title;
    if ($custom_title = get_sub_field('block_title')) {
        $ret = sprintf($title . ': ' . '<strong>' . $custom_title . '</strong>');
    }
    return $ret;
});




function icon($name) {
    if (!$name) {
        $name = "bam";
    }
    return "<svg class='svg-icon'><use xlink:href='#icon-" . $name . "'></use></svg>";
}



function moduleTitle($title) {
    $styleGuide = is_page('style-guide');
    if ($styleGuide) {
        echo "<span class='module-title'>" . $title . "</span>";
    }
}









// END FILE - no new lines after this ?>