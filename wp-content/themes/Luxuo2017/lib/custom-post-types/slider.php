<?php
add_action('init', function() {
  $post_type_name_singular = "Slider";
  $post_type_name_plural = "Sliders";
  $post_type_name_slug = 'sliders';

  $labels = array(
    'name' => $post_type_name_plural,
    'singular_name' => $post_type_name_singular,
    'add_new' => 'Add New',
    'add_new_item' => 'Add New ' . $post_type_name_singular,
    'edit_item' => 'Edit ' . $post_type_name_singular,
    'new_item' => 'New ' . $post_type_name_singular,
    'all_items' => 'All ' . $post_type_name_plural,
    'view_item' => 'View ' . $post_type_name_singular,
    'search_items' => 'Search ' . $post_type_name_plural,
    'not_found' => 'No ' . $post_type_name_plural . ' found',
    'not_found_in_trash' => 'No ' . $post_type_name_plural . ' found in Trash',
    'parent_item_colon' => '',
    'menu_name' => $post_type_name_plural,
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => $post_type_name_slug),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title', 'custom-fields'),
    'taxonomies' => array(),
  );

  register_post_type($post_type_name_slug, $args);
});
