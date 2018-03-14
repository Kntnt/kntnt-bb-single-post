<?php

namespace Kntnt\BB_Single_Post;

require_once 'classes/class-module.php';

\FLBuilder::register_module( '\Kntnt\BB_Single_Post\Module', [
  'layout' => [
    'title' => __( 'Layout', 'kntnt-bb-single-post' ),
    'sections' => [
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
                'sections' => [
                  'effects',
                  'icons',
                ],
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
              'underneath' => [
                'sections' => [
                  'effects',
                  'icons',
                ],
              ],
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
              'selector' => '.text',
              'property' => 'padding',
              'unit' => 'px',
            ],
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
              'selector' => '.info-sep',
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
  'style' => [
    'title' => __( 'Style', 'kntnt-bb-single-post' ),
    'sections' => [
      'post_style' => [
        'title' => __( 'Posts', 'kntnt-bb-single-post' ),
        'fields' => [
          'bg_color' => [
            'type' => 'color',
            'label' => __( 'Post Background Color', 'kntnt-bb-single-post' ),
            'show_reset' => true,
          ],
          'bg_opacity' => [
            'type' => 'text',
            'label' => __( 'Post Background Opacity', 'kntnt-bb-single-post' ),
            'default' => '100',
            'maxlength' => '3',
            'size' => '4',
            'description' => '%',
          ],
          'border_type' => [
            'type' => 'select',
            'label' => __( 'Post Border Type', 'kntnt-bb-single-post' ),
            'default' => 'default',
            'options' => [
              'default' => _x( 'Default', 'Border type.', 'kntnt-bb-single-post' ),
              'none' => _x( 'None', 'Border type.', 'kntnt-bb-single-post' ),
              'solid' => _x( 'Solid', 'Border type.', 'kntnt-bb-single-post' ),
              'dashed' => _x( 'Dashed', 'Border type.', 'kntnt-bb-single-post' ),
              'dotted' => _x( 'Dotted', 'Border type.', 'kntnt-bb-single-post' ),
              'double' => _x( 'Double', 'Border type.', 'kntnt-bb-single-post' ),
            ],
            'toggle' => [
              'solid' => [
                'fields' => [ 'border_color', 'border_size' ],
              ],
              'dashed' => [
                'fields' => [ 'border_color', 'border_size' ],
              ],
              'dotted' => [
                'fields' => [ 'border_color', 'border_size' ],
              ],
              'double' => [
                'fields' => [ 'border_color', 'border_size' ],
              ],
            ],
          ],
          'border_color' => [
            'type' => 'color',
            'label' => __( 'Post Border Color', 'kntnt-bb-single-post' ),
            'show_reset' => true,
          ],
          'border_size' => [
            'type' => 'text',
            'label' => __( 'Post Border Size', 'kntnt-bb-single-post' ),
            'default' => '1',
            'maxlength' => '3',
            'size' => '4',
            'description' => 'px',
          ],
        ],
      ],
      'text_style' => [
        'title' => __( 'Text', 'kntnt-bb-single-post' ),
        'fields' => [
          'title_color' => [
            'type' => 'color',
            'label' => __( 'Title Color', 'kntnt-bb-single-post' ),
            'show_reset' => true,
          ],
          'title_font_size' => [
            'type' => 'text',
            'label' => __( 'Title Font Size', 'kntnt-bb-single-post' ),
            'default' => '',
            'maxlength' => '3',
            'size' => '4',
            'description' => 'px',
          ],
          'info_color' => [
            'type' => 'color',
            'label' => __( 'Post Info Color', 'kntnt-bb-single-post' ),
            'show_reset' => true,
          ],
          'info_font_size' => [
            'type' => 'text',
            'label' => __( 'Post Info Font Size', 'kntnt-bb-single-post' ),
            'default' => '',
            'maxlength' => '3',
            'size' => '4',
            'description' => 'px',
          ],
          'content_color' => [
            'type' => 'color',
            'label' => __( 'Content Color', 'kntnt-bb-single-post' ),
            'show_reset' => true,
          ],
          'content_font_size' => [
            'type' => 'text',
            'label' => __( 'Content Font Size', 'kntnt-bb-single-post' ),
            'default' => '',
            'maxlength' => '3',
            'size' => '4',
            'description' => 'px',
          ],
          'link_color' => [
            'type' => 'color',
            'label' => __( 'Link Color', 'kntnt-bb-single-post' ),
            'show_reset' => true,
          ],
          'link_hover_color' => [
            'type' => 'color',
            'label' => __( 'Link Hover Color', 'kntnt-bb-single-post' ),
            'show_reset' => true,
          ],
        ],
      ],
      'effects' => [
        'title' => __( 'Effects', 'kntnt-bb-single-post' ),
        'fields' => [
          'hover_transition' => [
            'type' => 'select',
            'label' => __( 'Hover Transition', 'kntnt-bb-single-post' ),
            'default' => 'fade',
            'options' => [
              'fade' => __( 'Fade', 'kntnt-bb-single-post' ),
              'slide-up' => __( 'Slide Up', 'kntnt-bb-single-post' ),
              'slide-down' => __( 'Slide Down', 'kntnt-bb-single-post' ),
              'scale-up' => __( 'Scale Up', 'kntnt-bb-single-post' ),
              'scale-down' => __( 'Scale Down', 'kntnt-bb-single-post' ),
            ],
          ],
          'text_bg_color' => [
            'type' => 'color',
            'label' => __( 'Overlay Background Color', 'kntnt-bb-single-post' ),
            'default' => '333333',
            'help' => __( 'The color applies to the overlay behind text over the background selections.', 'kntnt-bb-single-post' ),
            'show_reset' => true,
          ],
          'text_bg_opacity' => [
            'type' => 'text',
            'label' => __( 'Overlay Background Opacity', 'kntnt-bb-single-post' ),
            'default' => '50',
            'maxlength' => '3',
            'size' => '4',
            'description' => '%',
          ],
        ],
      ],
      'icons' => [
        'title' => __( 'Icons', 'kntnt-bb-single-post' ),
        'fields' => [
          'has_icon' => [
            'type' => 'select',
            'label' => __( 'Use Icon for Posts', 'kntnt-bb-single-post' ),
            'default' => 'no',
            'options' => [
              'yes' => __( 'Yes', 'kntnt-bb-single-post' ),
              'no' => __( 'No', 'kntnt-bb-single-post' ),
            ],
            'toggle' => [
              'yes' => [
                'fields' => [ 'icon', 'icon_position', 'icon_color', 'icon_size' ],
              ],
            ],
          ],
          'icon' => [
            'type' => 'icon',
            'label' => __( 'Post Icon', 'kntnt-bb-single-post' ),
          ],
          'icon_position' => [
            'type' => 'select',
            'label' => __( 'Post Icon Position', 'kntnt-bb-single-post' ),
            'default' => 'above',
            'options' => [
              'above' => __( 'Above Text', 'kntnt-bb-single-post' ),
              'below' => __( 'Below Text', 'kntnt-bb-single-post' ),
            ],
          ],
          'icon_size' => [
            'type' => 'text',
            'label' => __( 'Post Icon Size', 'kntnt-bb-single-post' ),
            'default' => '24',
            'maxlength' => '3',
            'size' => '4',
            'description' => 'px',
          ],
          'icon_color' => [
            'type' => 'color',
            'label' => __( 'Post Icon Color', 'kntnt-bb-single-post' ),
            'show_reset' => true,
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
