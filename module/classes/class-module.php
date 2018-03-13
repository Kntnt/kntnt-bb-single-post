<?php

namespace Kntnt\BB_Single_Post;

class Module extends \FLBuilderModule {

  public function __construct() {
    parent::__construct( [
      'name'            => __( 'Single Post', 'kntnt-bb-single-post' ),
      'description'     => __( 'Feature a single post.' ),
      'group'           => __( 'Kntnt Modules', 'kntnt-bb-single-post' ),
      'category'        => __( 'Content', 'kntnt-bb-single-post' ),
      'dir'             => PLUGIN_DIR . 'module/',
      'url'             => PLUGIN_URL . 'module/',
      'icon'            => 'media-default.svg',
      'editor_export'   => true,
      'enabled'         => true,
      'partial_refresh' => false,
    ] );
  }
  
  public static function sanitize_post_id($pid) {
    return get_post_status ( $pid ) === 'publish' ? $pid : '';
  }

}
