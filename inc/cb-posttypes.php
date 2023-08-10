<?php

function cb_register_post_types() {

$labels = [
    "name" => __( "Stories", "cb-rbf" ),
    "singular_name" => __( "Story", "cb-rbf" ),
];

$args = [
    "label" => __( "Stories", "cb-rbf" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "menu_icon" => "dashicons-format-quote",
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    // "rewrite" => [ "slug" => "stories", "with_front" => false ],
    "query_var" => true,
    "supports" => [ "title",  "thumbnail", "editor" ],
    "show_in_graphql" => false,
    "exclude_from_search" => true
];

register_post_type( "stories", $args );

$labels = [
    "name" => __( "Partners", "cb-rbf" ),
    "singular_name" => __( "Partner", "cb-rbf" ),
];

$args = [
    "label" => __( "Partner", "cb-rbf" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "menu_icon" => "dashicons-portfolio",
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => false,
    "query_var" => true,
    "supports" => [ "title", "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "partners", $args );

$labels = [
    "name" => __( "Links", "cb-rbf" ),
    "singular_name" => __( "Link", "cb-rbf" ),
];

$args = [
    "label" => __( "Link", "cb-rbf" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "menu_icon" => "dashicons-portfolio",
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => false,
    "query_var" => true,
    "supports" => [ "title" ],
    "show_in_graphql" => false,
    "exclude_from_search" => true
];

register_post_type( "links", $args );

$labels = [
    "name" => __( "Documents", "cb-rbf" ),
    "singular_name" => __( "Document", "cb-rbf" ),
];

$args = [
    "label" => __( "Document", "cb-rbf" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "menu_icon" => "dashicons-portfolio",
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "documents", "with_front" => false ],
    "query_var" => true,
    "supports" => [ "title" ],
    "show_in_graphql" => false,
    "exclude_from_search" => true
];

// register_post_type( "documents", $args );

}

add_action( 'init', 'cb_register_post_types' );

add_action( 'after_switch_theme', 'cb_rewrite_flush' );
function cb_rewrite_flush() {
    cb_register_post_types();
    flush_rewrite_rules();
}

