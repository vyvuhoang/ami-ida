<?php
function my_custom_lesson_post_type() {
  register_post_type('lesson', array (
    'labels'                  => array (
      'name'                  => __( 'レッスン' ),
      'singular_name'         => __( 'レッスン' ),
      'add_new'               => __( '新しくレッスンを書く' ),
      'add_new_item'          => __( 'レッスン記事を書く' ),
      'edit_item'             => __( 'レッスン記事を編集' ),
      'new_item'              => __( '新しいレッスン記事' ),
      'view_item'             => __( 'レッスン記事を見る' ),
      'search_staff'          => __( 'レッスン記事を探す' ),
      'not_found'             => __( 'レッスン記事はありません' ),
      'not_found_in_trash'    => __( 'ゴミ箱にレッスン記事はありません' ),
      'parent_item_colon'     => ''
    ),
    'public'                  => true,
    'rewrite'                 => true,
    'show_ui'                 => true,
    'supports'                => array ( 'title', 'revisions' ),
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
add_action ( 'init', 'my_custom_lesson_post_type' );