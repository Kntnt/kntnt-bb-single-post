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
      'partial_refresh' => true,
    ] );    
  }
  
  public static function sanitize_post_id( $pid ) {
    return get_post_status( $pid ) === 'publish' ? $pid : '';
  }
  
  public function frontend_html_variables() {

    $image = get_the_post_thumbnail( $this->settings->pid, $this->settings->image_size );
    $layout = ( $image && $this->settings->show_image ) ? $this->settings->image_position : 'none';

    return [
      'pid' =>            $this->settings->pid,
      'layout' =>         $layout,
      'link' =>           esc_url( apply_filters( 'the_permalink', get_permalink( $this->settings->pid ), $this->settings->pid ) ),
      'title' =>          $this->link_title_attr = esc_attr( strip_tags( get_the_title( $this->settings->pid ) ) ),
      'image' =>          $image,
      'heading' =>        get_the_title( $this->settings->pid ),
      'info' =>           $this->info(),
      'content' =>        $this->content(),
      'more_link_text' => $this->settings->show_more_link ? $this->settings->more_link_text : '',
      'icon_position' =>  ( $this->settings->has_icon && 'yes' === $this->settings->has_icon ) ? $this->settings->icon_position : '',
      'icon' =>           $this->settings->icon,
    ];

  }

  public function frontend_css_variables() {

    $image = get_the_post_thumbnail( $this->settings->pid, $this->settings->image_size );
    $layout = ( $image && $this->settings->show_image ) ? $this->settings->image_position : 'none';

    return [
      'fl_node_id' =>         ".fl-node-$this->node",
      'layout' =>              $layout,
      'bg_color'  =>           $this->settings->bg_color,
      'bg_color_rgba' =>       $this->rgba( $this->settings->bg_color, $this->settings->bg_opacity ),
      'border_type'=>          $this->settings->border_type,
      'border_color' =>        $this->settings->border_color,
      'border_size' =>         $this->settings->border_size,
      'post_align' =>          $this->settings->post_align,
      'title_color' =>         $this->settings->title_color,
      'title_font_size' =>     $this->settings->title_font_size,
      'info_color' =>          $this->settings->info_color,
      'info_font_size' =>      $this->settings->info_font_size,
      'post_padding' =>        $this->settings->post_padding,
      'content_color' =>       $this->settings->content_color,
      'content_font_size' =>   $this->settings->content_font_size,
      'link_color' =>          $this->settings->link_color,
      'link_hover_color' =>    $this->settings->link_hover_color,
      'image_width' =>         $this->settings->image_width,
      'image_spacing' =>       ( $this->settings->show_image && $this->settings->image_spacing ) ? $this->settings->image_spacing : '',
      'image_position' =>      $this->settings->image_position,
      'image_beside_margin' => $this->settings->image_spacing ? $this->settings->image_width : $this->settings->image_width + 4,
      'text_bg_color' =>       $this->settings->text_bg_color ? $this->settings->text_bg_color : 'ffffff',
      'text_bg_color_rgba' =>  $this->rgba( $this->settings->text_bg_color, $this->settings->text_bg_opacity ),
      'icon_position' =>       ( $this->settings->has_icon && 'yes' === $this->settings->has_icon ) ? $this->settings->icon_position : '',
      'icon_color' =>          $this->settings->icon_color,
      'icon_size' =>           $this->settings->icon_size,
      'hover_transition' =>    $this->settings->hover_transition,
    ];

  }
  
  private function info() {

    $info = [];
  
    if ( $this->settings->show_author ) {
      $aid = get_post_field( 'post_author', $this->settings->pid );
      $author_name = get_the_author_meta( 'display_name', $aid );
      $author_link = get_author_posts_url( $aid );    
      $info[] = sprintf( _x( 'By %s', '%s is author name', 'kntnt-bb-single-post' ), "<a href=\"$author_link\">$author_name</a>" );
    }

    if ( $this->settings->show_date ) {
      $format = 'default' === $this->settings->date_format ? '' : $this->settings->date_format;
      $info[] = get_the_date( $format, $this->settings->pid );
    }    
    
    if ( $this->settings->show_comments ) {
		  ob_start();
		  comments_popup_link( '0 <i class="fa fa-comment"></i>', '1 <i class="fa fa-comment"></i>', '% <i class="fa fa-comment"></i>' );
		  $info[] = ob_get_clean();
    }
    
    $sep = '<span class="info-sep">' . $this->settings->info_separator . '</span>';
    return implode ( $sep, $info );
    
  }

  private function content() {
    if ( ! $this->settings->show_content ) return;
    return 'full' === $this->settings->content_type ? $this->get_content() : $this->get_excerpt();
  }  
  
  private function get_excerpt() {

    if ( $this->settings->content_length > 0 ) {
      $custom_excerpt_length = function() { return $this->settings->content_length; };
		  add_filter( 'excerpt_length', $custom_excerpt_length, 9999 );
	  }

    global $post;  
    $orig = $post;
    $post = get_post( $this->settings->pid );
    $content = apply_filters( 'get_the_excerpt', $post->post_excerpt, $post );
    $post = $orig;

	  if ( $this->settings->content_length > 0 ) {
		  remove_filter( 'excerpt_length', $custom_excerpt_length, 9999 );
	  }
	  
	  return $content;

  }

  private function get_content() {

    $content = get_post($this->settings->pid)->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

		if ( $this->settings->content_length > 0 ) {
			$content = wpautop( wp_trim_words( $content, $this->settings->content_length, '...' ) );
		}

    return $content;

  }

  private function rgba( $rgb, $opacity ) {
  
    $rgb = $rgb ? $rgb : 'ffffff';
    $opacity = $opacity ? $opacity : '100';

    $color = \FLBuilderColor::hex_to_rgb( $rgb );
    $color[] = $opacity / 100;
    return implode ( ',', $color );

  }

}
