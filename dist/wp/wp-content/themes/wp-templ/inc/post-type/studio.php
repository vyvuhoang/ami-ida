<?php
function my_custom_studio_post_type() {
  register_post_type('studio', array (
    'labels'                  => array (
      'name'                  => __( 'スタジオ' ),
      'singular_name'         => __( 'スタジオ' ),
      'add_new'               => __( '新しくスタジオを書く' ),
      'add_new_item'          => __( 'スタジオ記事を書く' ),
      'edit_item'             => __( 'スタジオ記事を編集' ),
      'new_item'              => __( '新しいスタジオ記事' ),
      'view_item'             => __( 'スタジオ記事を見る' ),
      'search_staff'          => __( 'スタジオ記事を探す' ),
      'not_found'             => __( 'スタジオ記事はありません' ),
      'not_found_in_trash'    => __( 'ゴミ箱にスタジオ記事はありません' ),
      'parent_item_colon'     => ''
    ),
    'public'                  => true,
    'rewrite'                 => true,
    'show_ui'                 => true,
    'supports'                => array ( 'title', 'editor', 'thumbnail', 'revisions' ),
    'query_var'               => true,
    'menu_icon'               => 'dashicons-welcome-write-blog',
    // 'taxonomies'              => array ( 'post_tag' ),
    'has_archive'             => true,
    'hierarchical'            => false,
    'menu_position'           => 5,
    'capability_type'         => 'post',
    'show_in_admin_bar'       => true,
    'publicly_queryable'      => true,
  ));
}
add_action ( 'init', 'my_custom_studio_post_type' );

function create_cat_taxonomy_studioarea () {
  register_taxonomy('studioarea', 'studio', array (
    'labels'                  => array (
      'name'                  => __( 'エリア' ),
      'menu_name'             => __( 'エリア' ),
      'edit_item'             => __( 'エリア記事を編集' ),
      'all_items'             => __( 'スタジオエリア' ),
      'parent_item'           => __( '親エリア' ),
      'add_new_item'          => __( 'エリア記事を書く' ),
      'search_items'          => __( 'スタジオエリア' ),
      'singular_name'         => __( 'スタジオエリア' ),
      'parent_item_colon'     => __( '親エリア:' ),
    ),
    'show_ui'                 => true,
    'rewrite'                 => array ( 'slug' => 'studioarea' ),
    'query_var'               => true,
    'has_archive'             => true,
    'hierarchical'            => true,
    'show_admin_column'       => true,
  ));
}
add_action ( 'init', 'create_cat_taxonomy_studioarea', '0' );