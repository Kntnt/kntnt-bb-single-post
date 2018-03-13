<?php

namespace Kntnt\BB_Single_Post;

require_once 'classes/class-module.php';

\FLBuilder::register_module( '\Kntnt\BB_Single_Post\Module', [
  'layout' => [
    'title' => __( 'Layout', 'kntnt-bb-single-post' ),
    'sections' => [
      'posts' => [
        'title' => __( 'Posts', 'kntnt-bb-single-post' ),
        'fields' => [
          'post_align' => [
            'type' => 'select',
            'label' => __( 'Post Alignment', 'kntnt-bb-single-post' ),
            'default' => 'default',
            'options' => [
              'default' => __( 'Default', 'kntnt-bb-single-post' ),
              'left' => __( 'Left', 'kntnt-bb-single-post' ),
              'center' => __( 'Center', 'kntnt-bb-single-post' ),
              'right' => __( 'Right', 'kntnt-bb-single-post' ),
            ],
          ],
          'post_padding' => [
            'type' => 'text',
            'label' => __( 'Post Padding', 'kntnt-bb-single-post' ),
            'default' => '20',
            'maxlength' => '3',
            'size' => '4',
            'description' => 'px',
            'preview' => [
              'type' => 'css',
              'selector' => '.fl-post-grid-text',
              'property' => 'padding',
              'unit' => 'px',
            ],
          ],
        ],
      ],
      'image' => [
        'title' => __( 'Featured Image', 'kntnt-bb-single-post' ),
        'fields' => [
          'show_image' => [
            'type' => 'select',
            'label' => __( 'Image', 'kntnt-bb-single-post' ),
            'default' => '1',
            'options' => [
              '1' => __( 'Show', 'kntnt-bb-single-post' ),
              '0' => __( 'Hide', 'kntnt-bb-single-post' ),
            ],
            'toggle' => [
              '1' => [
                'fields' => [
                  'image_position',
                  'image_size',
                  'image_spacing',
                  'image_width',
                ],
              ],
            ],
          ],
          'image_position' => [
            'type' => 'select',
            'label' => __( 'Image Position', 'kntnt-bb-single-post' ),
            'default' => 'above',
            'options' => [
              'underneath' => __( 'Underneath', 'kntnt-bb-single-post' ),
              'above-title' => __( 'Above Title', 'kntnt-bb-single-post' ),
              'above' => __( 'Above Content', 'kntnt-bb-single-post' ),
              'beside' => __( 'Left', 'kntnt-bb-single-post' ),
              'beside-content' => __( 'Left Content', 'kntnt-bb-single-post' ),
              'beside-right' => __( 'Right', 'kntnt-bb-single-post' ),
              'beside-content-right' => __( 'Right Content', 'kntnt-bb-single-post' ),
            ],
            'toggle' => [
              'beside' => [
                'fields' => [
                  'image_width',
                ],
              ],
              'beside-content' => [
                'fields' => [
                  'image_width',
                ],
              ],
              'beside-right' => [
                'fields' => [
                  'image_width',
                ],
              ],
              'beside-content-right' => [
                'fields' => [
                  'image_width',
                ],
              ],
            ],
          ],
          'image_size' => [
            'type' => 'photo-sizes',
            'label' => __( 'Image Size', 'kntnt-bb-single-post' ),
            'default' => 'medium',
          ],
          'image_spacing' => [
            'type' => 'text',
            'label' => __( 'Image Spacing', 'kntnt-bb-single-post' ),
            'default' => '0',
            'maxlength' => '3',
            'size' => '4',
            'description' => 'px',
          ],
          'image_width' => [
            'type' => 'text',
            'label' => __( 'Image Width', 'kntnt-bb-single-post' ),
            'default' => '33',
            'maxlength' => '3',
            'size' => '4',
            'description' => '%',
          ],
        ],
      ],
      'info' => [
        'title' => __( 'Post Info', 'kntnt-bb-single-post' ),
        'fields' => [
          'show_author' => [
            'type' => 'select',
            'label' => __( 'Author', 'kntnt-bb-single-post' ),
            'default' => '1',
            'options' => [
              '1' => __( 'Show', 'kntnt-bb-single-post' ),
              '0' => __( 'Hide', 'kntnt-bb-single-post' ),
            ],
          ],
          'show_date' => [
            'type' => 'select',
            'label' => __( 'Date', 'kntnt-bb-single-post' ),
            'default' => '1',
            'options' => [
              '1' => __( 'Show', 'kntnt-bb-single-post' ),
              '0' => __( 'Hide', 'kntnt-bb-single-post' ),
            ],
            'toggle' => [
              '1' => [
                'fields' => [ 'date_format' ],
              ],
            ],
          ],
          'date_format' => [
            'type' => 'select',
            'label' => __( 'Date Format', 'kntnt-bb-single-post' ),
            'default' => 'default',
            'options' => [
              'default' => __( 'Default', 'kntnt-bb-single-post' ),
              'M j, Y' => date( 'M j, Y' ),
              'F j, Y' => date( 'F j, Y' ),
              'm/d/Y' => date( 'm/d/Y' ),
              'm-d-Y' => date( 'm-d-Y' ),
              'd M Y' => date( 'd M Y' ),
              'd F Y' => date( 'd F Y' ),
              'Y-m-d' => date( 'Y-m-d' ),
              'Y/m/d' => date( 'Y/m/d' ),
            ],
          ],
          'show_comments' => [
            'type' => 'select',
            'label' => __( 'Comments', 'kntnt-bb-single-post' ),
            'default' => '1',
            'options' => [
              '1' => __( 'Show', 'kntnt-bb-single-post' ),
              '0' => __( 'Hide', 'kntnt-bb-single-post' ),
            ],
          ],
          'info_separator' => [
            'type' => 'text',
            'label' => __( 'Separator', 'kntnt-bb-single-post' ),
            'default' => ' | ',
            'size' => '4',
            'preview' => [
              'type' => 'text',
              'selector' => '.fl-sep',
            ],
          ],
        ],
      ],
      'content' => [
        'title' => __( 'Content', 'kntnt-bb-single-post' ),
        'fields' => [
          'show_content' => [
            'type' => 'select',
            'label' => __( 'Content', 'kntnt-bb-single-post' ),
            'default' => '1',
            'options' => [
              '1' => __( 'Show', 'kntnt-bb-single-post' ),
              '0' => __( 'Hide', 'kntnt-bb-single-post' ),
            ],
            'toggle' => [
              '1' => [
                'fields' => [
                  'content_type',
                  'content_length',
                  'show_more_link',
                  'more_link_text',
                ],
              ],
            ],
          ],
          'content_type' => [
            'type' => 'select',
            'label' => __( 'Content Type', 'kntnt-bb-single-post' ),
            'default' => 'excerpt',
            'options' => [
              'excerpt' => __( 'Excerpt', 'kntnt-bb-single-post' ),
              'full' => __( 'Full Text', 'kntnt-bb-single-post' ),
            ],
          ],
          'content_length' => [
            'type' => 'text',
            'label' => __( 'Content Length', 'kntnt-bb-single-post' ),
            'default' => '',
            'size' => '4',
            'description' => __( 'words', 'kntnt-bb-single-post' ),
          ],
          'show_more_link' => [
            'type' => 'select',
            'label' => __( 'More Link', 'kntnt-bb-single-post' ),
            'default' => '0',
            'options' => [
              '1' => __( 'Show', 'kntnt-bb-single-post' ),
              '0' => __( 'Hide', 'kntnt-bb-single-post' ),
            ],
            'toggle' => [
              '1' => [
                'fields' => [ 'more_link_text' ],
              ],
            ],
          ],
          'more_link_text' => [
            'type' => 'text',
            'label' => __( 'More Link Text', 'kntnt-bb-single-post' ),
            'default' => __( 'Read More', 'kntnt-bb-single-post' ),
          ],
        ],
      ],
    ],
  ],
  'content' => [
    'title' => __( 'Content', 'kntnt-bb-single-post' ),
    'sections' => [
      'post' => [
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
