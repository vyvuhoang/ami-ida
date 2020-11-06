<?php
function my_custom_studio_account_post_type() {
  register_post_type('studio_account', array (
    'labels'                  => array (
      'name'                  => __( 'スタジオアカウント' ),
      'singular_name'         => __( 'スタジオアカウント' ),
      'add_new'               => __( '新しくスタジオアカウントを書く' ),
      'add_new_item'          => __( 'スタジオアカウント記事を書く' ),
      'edit_item'             => __( 'スタジオアカウント記事を編集' ),
      'new_item'              => __( '新しいスタジオアカウント記事' ),
      'view_item'             => __( 'スタジオアカウント記事を見る' ),
      'search_staff'          => __( 'スタジオアカウント記事を探す' ),
      'not_found'             => __( 'スタジオアカウント記事はありません' ),
      'not_found_in_trash'    => __( 'ゴミ箱にスタジオアカウント記事はありません' ),
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
add_action ( 'init', 'my_custom_studio_account_post_type' );