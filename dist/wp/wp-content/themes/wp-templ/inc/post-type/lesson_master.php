<?php
function my_custom_lesson_master_post_type() {
  register_post_type('lesson_master', array (
    'labels'                  => array (
      'name'                  => __( 'レッスンマスター' ),
      'singular_name'         => __( 'レッスンマスター' ),
      'add_new'               => __( '新しくレッスンマスターを書く' ),
      'add_new_item'          => __( 'レッスンマスター記事を書く' ),
      'edit_item'             => __( 'レッスンマスター記事を編集' ),
      'new_item'              => __( '新しいレッスンマスター記事' ),
      'view_item'             => __( 'レッスンマスター記事を見る' ),
      'search_staff'          => __( 'レッスンマスター記事を探す' ),
      'not_found'             => __( 'レッスンマスター記事はありません' ),
      'not_found_in_trash'    => __( 'ゴミ箱にレッスンマスター記事はありません' ),
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
add_action ( 'init', 'my_custom_lesson_master_post_type' );