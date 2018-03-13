<?php

namespace Kntnt\BB_Single_Post;

class Module extends \FLBuilderModule {

  private $link_href = null;

  private $link_title_attr = null;

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
  
  public static function sanitize_post_id($pid) {
    return get_post_status ( $pid ) === 'publish' ? $pid : '';
  }
  
  public function layout() {
    return $this->settings->show_image ? $this->settings->image_position : 'none';
  }
  
  public function render_image_before_heading() {
    if ( in_array( $this->layout(), [ 'above-title', 'beside', 'underneath' ] ) ) $this->render_image();
  }

  public function render_image_before_content() {
    if ( in_array( $this->layout(), [ 'above', 'beside-content' ] ) ) $this->render_image();
  }

  public function render_image_after_content() {
    if ( in_array( $this->layout(), [ 'beside-right', 'beside-content-right' ] ) ) $this->render_image();
  }
  
  public function render_image() {
    $link = $this->link_href();
    $title = $this->link_title_attr();
    $img = get_the_post_thumbnail( $this->settings->pid, $this->settings->image_size );
    include $this->dir . 'includes/featured-image.php';
  }

  public function render_heading() {
    $link = $this->link_href();
    $title = $this->link_title_attr();
    $heading = get_the_title( $this->settings->pid );
    include $this->dir . 'includes/heading.php';
  }

  public function render_info() {

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
		  $comments = ob_get_clean();
    }
    
    if ( $info ) {
      $info = implode ( $this->settings->info_separator, $info );
      include $this->dir . 'includes/info.php';
    }
    
  }

  public function render_content() {
    if ( ! $this->settings->show_content ) return;
    $content = 'full' === $this->settings->content_type ? $this->content() : $this->excerpt();
    include $this->dir . 'includes/content.php';
  }  
  
  public function render_more_link() {
    if ( ! $this->settings->show_more_link ) return;
    $link = $this->link_href();
    $title = $this->link_title_attr();
    $more_link_text = $this->settings->more_link_text;
    include $this->dir . 'includes/more-link.php';
  }
 
  
  private function link_href() {
    if ( ! $this->link_href ) {
      $this->link_href = esc_url( apply_filters( 'the_permalink', get_permalink( $this->settings->pid ), $this->settings->pid ) );
    }
    return $this->link_href;
  }

  private function link_title_attr() {
    if ( ! $this->link_title_attr ) {
      $this->link_title_attr = esc_attr( strip_tags( get_the_title( $this->settings->pid ) ) );
    }
    return $this->link_title_attr;
  }
  
  private function excerpt() {

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

  private function content() {

    $content = get_post($this->settings->pid)->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

		if ( $this->settings->content_length > 0 ) {
			$content = wpautop( wp_trim_words( $content, $this->settings->content_length, '...' ) );
		}

    return $content;

  }

}
