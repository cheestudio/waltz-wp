<?php
/**
 * Custom Post Types
 */

// Register Custom Post Type
function client_post_type() {
    $labels = array(
        'name'                => _x( 'Clients', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Client', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Clients', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Client:', 'text_domain' ),
        'all_items'           => __( 'All Clients', 'text_domain' ),
        'view_item'           => __( 'View Client', 'text_domain' ),
        'add_new_item'        => __( 'Add New Client', 'text_domain' ),
        'add_new'             => __( 'New Client', 'text_domain' ),
        'edit_item'           => __( 'Edit Client', 'text_domain' ),
        'update_item'         => __( 'Update Client', 'text_domain' ),
        'search_items'        => __( 'Search Clients', 'text_domain' ),
        'not_found'           => __( 'No Clients found', 'text_domain' ),
        'not_found_in_trash'  => __( 'No Clients found in Trash', 'text_domain' ),
    );

    $args = array(
        'label'               => __( 'Client', 'text_domain' ),
        'description'         => __( 'Client information pages', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', ),
        'taxonomies'          => array('client_type' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-admin-users',
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'client', $args );
}
// Hook into the 'init' action
add_action( 'init', 'client_post_type', 0 );



// Register Work Post Type
add_action( 'init', 'work_post_type', 0 );
function work_post_type() {

  $single = 'Work';
  $plural = 'Work';

  $labels = array(
    'name'                => _x( $plural, 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( $single, 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( $plural, 'text_domain' ),
    'parent_item_colon'   => __( 'Parent ' . $single . ':', 'text_domain' ),
    'all_items'           => __( 'All ' . $plural, 'text_domain' ),
    'view_item'           => __( 'View ' . $single, 'text_domain' ),
    'add_new_item'        => __( 'Add New ' . $single, 'text_domain' ),
    'add_new'             => __( 'New ' . $single, 'text_domain' ),
    'edit_item'           => __( 'Edit ' . $single, 'text_domain' ),
    'update_item'         => __( 'Update ' . $single, 'text_domain' ),
    'search_items'        => __( 'Search ' . $plural, 'text_domain' ),
    'not_found'           => __( 'No ' . $plural . ' found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No ' . $plural . ' found in Trash', 'text_domain' ),
  );

  $args = array(
    'label'               => __( $single, 'text_domain' ),
    'description'         => __( $single . ' information pages', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', 'revisions' ),
    'taxonomies'          => array( 'work_tags', 'work_type', 'client_type', 'featured_type'),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'show_in_rest'        => true,
    'menu_icon'           => 'dashicons-art',
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => false,
    'capability_type'     => 'page',
    'rewrite'             => array(
      'slug'       => 'work-entry',
      'with_front' => false
    )
  );
  register_post_type( 'work', $args );
}


// Register Custom Post Type
function team_post_type() {
    $labels = array(
        'name'                => _x( 'Teams', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Team', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Team:', 'text_domain' ),
        'all_items'           => __( 'All Teams', 'text_domain' ),
        'view_item'           => __( 'View Team', 'text_domain' ),
        'add_new_item'        => __( 'Add New Team Member', 'text_domain' ),
        'add_new'             => __( 'New Team Member', 'text_domain' ),
        'edit_item'           => __( 'Edit Team Member', 'text_domain' ),
        'update_item'         => __( 'Update Team', 'text_domain' ),
        'search_items'        => __( 'Search Team Members', 'text_domain' ),
        'not_found'           => __( 'No Team Members found', 'text_domain' ),
        'not_found_in_trash'  => __( 'No Team Members found in Trash', 'text_domain' ),
    );

    $args = array(
        'label'               => __( 'Team', 'text_domain' ),
        'description'         => __( 'Team information pages', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
  'menu_icon'=> 'dashicons-businessman',
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'team', $args );
}
// Hook into the 'init' action
add_action( 'init', 'team_post_type', 0 );

// Register Custom Post Type
function service_post_type() {
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Services', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Service:', 'text_domain' ),
        'all_items'           => __( 'All Services', 'text_domain' ),
        'view_item'           => __( 'View Service', 'text_domain' ),
        'add_new_item'        => __( 'Add New Service', 'text_domain' ),
        'add_new'             => __( 'New Service', 'text_domain' ),
        'edit_item'           => __( 'Edit Service', 'text_domain' ),
        'update_item'         => __( 'Update Service', 'text_domain' ),
        'search_items'        => __( 'Search Services', 'text_domain' ),
        'not_found'           => __( 'No Services found', 'text_domain' ),
        'not_found_in_trash'  => __( 'No Services found in Trash', 'text_domain' ),
    );

    $args = array(
        'label'               => __( 'Service', 'text_domain' ),
        'description'         => __( 'Service information pages', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'          => array('client_type', 'work_type'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
  'menu_icon'=> 'dashicons-heart',
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'service', $args );
}
// Hook into the 'init' action
add_action( 'init', 'service_post_type', 0 );

// Custom  Taxonomies

function client_type_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Industry', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Industry', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Industry', 'text_domain' ),
    'all_items'                  => __( 'All Industries', 'text_domain' ),
    'parent_item'                => __( 'Parent Industry', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Industry:', 'text_domain' ),
    'new_item_name'              => __( 'New Industry Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Industry', 'text_domain' ),
    'edit_item'                  => __( 'Edit Industry', 'text_domain' ),
    'update_item'                => __( 'Update Industry', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate Industries with commas', 'text_domain' ),
    'search_items'               => __( 'Search Industries', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove Industries', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used Industries', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
  );
    $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'client_type', array( 'client', 'work' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'client_type_taxonomy', 0 );

function work_type_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Expertise', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Expertise', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Expertise', 'text_domain' ),
    'all_items'                  => __( 'All Expertise', 'text_domain' ),
    'parent_item'                => __( 'Parent Expertise', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Expertise:', 'text_domain' ),
    'new_item_name'              => __( 'New Expertise Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Expertise', 'text_domain' ),
    'edit_item'                  => __( 'Edit Expertise', 'text_domain' ),
    'update_item'                => __( 'Update Expertise', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate Expertise with commas', 'text_domain' ),
    'search_items'               => __( 'Search Expertise', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove Expertise', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used Expertise', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
  );
    $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'work_type', array( 'client', 'work' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'work_type_taxonomy', 0 );

// Register Tags Taxonomy
 add_action( 'init', 'work_tags_taxonomy', 0 );
 function work_tags_taxonomy()  {
 $single = 'Tag';
 $plural = 'Tags';
 $labels = array(
 'name'                       => _x( $plural, 'Taxonomy General Name', 'text_domain' ),
 'singular_name'              => _x( $single, 'Taxonomy Singular Name', 'text_domain' ),
 'menu_name'                  => __( $plural, 'text_domain' ),
 'all_items'                  => __( 'All ' . $plural, 'text_domain' ),
 'parent_item'                => __( 'Parent ' . $single, 'text_domain' ),
 'parent_item_colon'          => __( 'Parent ' . $single . ':', 'text_domain' ),
 'new_item_name'              => __( 'New ' . $single . ' Name', 'text_domain' ),
 'add_new_item'               => __( 'Add New ' . $single, 'text_domain' ),
 'edit_item'                  => __( 'Edit ' . $single, 'text_domain' ),
 'update_item'                => __( 'Update ' . $single, 'text_domain' ),
 'separate_items_with_commas' => __( 'Separate ' . $plural . ' with commas', 'text_domain' ),
 'search_items'               => __( 'Search ' . $plural, 'text_domain' ),
 'add_or_remove_items'        => __( 'Add or remove ' . $plural, 'text_domain' ),
 'choose_from_most_used'      => __( 'Choose from the most used ' . $plural, 'text_domain' ),
 ); 
$rewrite = array(
 'slug'                       => 'work_tags',
 'with_front'                 => false,
 'hierarchical'               => true,
 ); 
$args = array( 
 'labels'                     => $labels,
 'hierarchical'               => false,
 'public'                     => true,
 'show_ui'                    => true,
 'show_admin_column'          => true,
 'show_in_nav_menus'          => true,
 'show_tagcloud'              => true,
 'show_in_rest'               => true,
 'query_var'                  => 'work_tags',
 'rewrite'                    => $rewrite,
 ); register_taxonomy( 'work_tags', array('work'), $args ); 
}

// Register Featured Taxonomy
 add_action( 'init', 'featured_type_taxonomy', 0 );
 function featured_type_taxonomy()  {
 $single = 'Featured';
 $plural = 'Featured';
 $labels = array(
 'name'                       => _x( $plural, 'Taxonomy General Name', 'text_domain' ),
 'singular_name'              => _x( $single, 'Taxonomy Singular Name', 'text_domain' ),
 'menu_name'                  => __( $plural, 'text_domain' ),
 'all_items'                  => __( 'All ' . $plural, 'text_domain' ),
 'parent_item'                => __( 'Parent ' . $single, 'text_domain' ),
 'parent_item_colon'          => __( 'Parent ' . $single . ':', 'text_domain' ),
 'new_item_name'              => __( 'New ' . $single . ' Name', 'text_domain' ),
 'add_new_item'               => __( 'Add New ' . $single, 'text_domain' ),
 'edit_item'                  => __( 'Edit ' . $single, 'text_domain' ),
 'update_item'                => __( 'Update ' . $single, 'text_domain' ),
 'separate_items_with_commas' => __( 'Separate ' . $plural . ' with commas', 'text_domain' ),
 'search_items'               => __( 'Search ' . $plural, 'text_domain' ),
 'add_or_remove_items'        => __( 'Add or remove ' . $plural, 'text_domain' ),
 'choose_from_most_used'      => __( 'Choose from the most used ' . $plural, 'text_domain' ),
 ); 
$rewrite = array(
 'slug'                       => 'featured',
 'with_front'                 => false,
 'hierarchical'               => true,
 ); 
$args = array( 
 'labels'                     => $labels,
 'hierarchical'               => true,
 'public'                     => true,
 'show_ui'                    => true,
 'show_admin_column'          => true,
 'show_in_nav_menus'          => true,
 'show_tagcloud'              => true,
 'show_in_rest'               => true,
 'query_var'                  => 'featured_type',
 'rewrite'                    => $rewrite,
 ); register_taxonomy( 'featured_type', array('client', 'work'), $args ); 
}