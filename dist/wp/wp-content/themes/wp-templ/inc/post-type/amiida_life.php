<?php
function my_custom_amiida_life_post_type() {
  register_post_type('amiida_life', array (
    'labels'                  => array (
      'name'                  => __( 'amiida-life' ),
      'singular_name'         => __( 'amiida-life' ),
      'add_new'               => __( '新しくamiida-lifeを書く' ),
      'add_new_item'          => __( 'amiida-life記事を書く' ),
      'edit_item'             => __( 'amiida-life記事を編集' ),
      'new_item'              => __( '新しいamiida-life記事' ),
      'view_item'             => __( 'amiida-life記事を見る' ),
      'search_staff'          => __( 'amiida-life記事を探す' ),
      'not_found'             => __( 'amiida-life記事はありません' ),
      'not_found_in_trash'    => __( 'ゴミ箱にamiida-life記事はありません' ),
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
add_action ( 'init', 'my_custom_amiida_life_post_type' );