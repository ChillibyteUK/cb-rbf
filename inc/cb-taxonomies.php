<?php

function cb_register_taxes() {

    $args = [
        "label" => __( "Story Tag", "cb-rbf" ),
        "labels" => [
            "name" => __( "Story Tags", "cb-rbf" ),
            "singular_name" => __( "Story Tag", "cb-rbf" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "apis",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "storytags", [ "stories" ], $args );

    $args = [
        "label" => __( "Link Category", "cb-rbf" ),
        "labels" => [
            "name" => __( "Link Categories", "cb-rbf" ),
            "singular_name" => __( "Link Category", "cb-rbf" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "apis",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "linkcats", [ "links" ], $args );

}
add_action( 'init', 'cb_register_taxes' );
