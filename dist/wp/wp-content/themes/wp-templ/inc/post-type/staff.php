<?php
function my_custom_staff_post_type() {
  register_post_type('staff', array (
    'labels'                  => array (
      'name'                  => __( 'スタッフ' ),
      'singular_name'         => __( 'スタッフ' ),
      'add_new'               => __( '新しくスタッフを書く' ),
      'add_new_item'          => __( 'スタッフ記事を書く' ),
      'edit_item'             => __( 'スタッフ記事を編集' ),
      'new_item'              => __( '新しいスタッフ記事' ),
      'view_item'             => __( 'スタッフ記事を見る' ),
      'search_staff'          => __( 'スタッフ記事を探す' ),
      'not_found'             => __( 'スタッフ記事はありません' ),
      'not_found_in_trash'    => __( 'ゴミ箱にスタッフ記事はありません' ),
      'parent_item_colon'     => ''
    ),
    'public'                  => true,
    'rewrite'                 => true,
    'show_ui'                 => true,
    'supports'                => array ( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
    'query_var'               => true,
    'menu_icon'               => 'dashicons-welcome-write-blog',
    'taxonomies'              => array ( 'post_tag' ),
    'has_archive'             => true,
    'hierarchical'            => false,
    'menu_position'           => 5,
    'capability_type'         => 'post',
    'show_in_admin_bar'       => true,
    'publicly_queryable'      => true,
  ));
}
add_action ( 'init', 'my_custom_staff_post_type' );