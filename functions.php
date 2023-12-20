<?php
    
register_nav_menus(
array('primary-menu'=>'Top Menu')

);

add_theme_support('post-thumbnails');
add_theme_support('custom-header');
add_theme_support('woocommerce');

register_sidebar(
array('name'=>"sidebar",
'id'=>"sidebar"
)
);
add_post_type_support('page','excerpt')


?>
<?php
function theme_load_scripts(){
    wp_enqueue_style("theme-css",get_template_directory_uri()."/style.css",array(),"1.0","all");
    wp_enqueue_style("theme-style",get_stylesheet_uri());
}
add_action("wp_enqueue_scripts","theme_load_scripts");
?>
