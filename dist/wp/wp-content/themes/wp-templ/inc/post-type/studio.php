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

function create_cat_taxonomy_studiocat () {
  register_taxonomy('studiocat', 'studio', array (
    'labels'                  => array (
      'name'                  => __( 'スタジオカテゴリー' ),
      'menu_name'             => __( 'カテゴリー' ),
      'edit_item'             => __( 'カテゴリ記事を編集' ),
      'all_items'             => __( 'スタジオカテゴリー' ),
      'parent_item'           => __( '親カテゴリー' ),
      'add_new_item'          => __( 'カテゴリ記事を書く' ),
      'search_items'          => __( 'スタジオカテゴリー' ),
      'singular_name'         => __( 'スタジオカテゴリー' ),
      'parent_item_colon'     => __( '親カテゴリー:' ),
    ),
    'show_ui'                 => true,
    'rewrite'                 => array ( 'slug' => 'studiocat' ),
    'query_var'               => true,
    'has_archive'             => true,
    'hierarchical'            => true,
    'show_admin_column'       => true,
  ));
}
add_action ( 'init', 'create_cat_taxonomy_studiocat', '0' );