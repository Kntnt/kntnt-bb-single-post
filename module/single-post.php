<?php

namespace Kntnt\BB_Single_Post;

require_once 'classes/class-module.php';

\FLBuilder::register_module( '\Kntnt\BB_Single_Post\Module', [
  'content'  => [
    'title' => __( 'Content', 'kntnt-bb-single-post' ),
    'sections' => [
      'post'  => [
        'title' => '',
        'fields' => [
          'pid' => [
            'type' => 'text',
            'label' => __( 'Post id', 'kntnt-bb-single-post' ),
            'sanitize' => '\Kntnt\BB_Single_Post\Module::sanitize_post_id',
          ],
        ],
      ],
    ],
  ],
] );
