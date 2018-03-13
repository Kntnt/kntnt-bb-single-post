<?php

namespace Kntnt\BB_Single_Post;

class Module_Single_Post extends \FLBuilderModule {

  public function __construct() {
    parent::__construct(array(
    'name'            => __( 'Single Post', 'kntnt-bb-single-post' ),
    'description'     => __( 'Feature a single post.' ),
    'group'           => __( 'Kntnt', 'kntnt-bb-single-post' ),
    'category'        => __( 'Posts', 'kntnt-bb-single-post' ),
    'dir'             => PLUGIN_DIR . 'module/',
    'url'             => PLUGIN_URL . 'module/',
    'icon'            => 'button.svg',
    'editor_export'   => true,
    'enabled'         => true,
    'partial_refresh' => false,
    ));
  }

}
