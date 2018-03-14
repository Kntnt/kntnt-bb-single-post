<?php extract( $module->frontend_css_variables() ); ?>

<?php echo $fl_node_id; ?> .kntnt-bb-single-post {

	<?php if ( $bg_color ) : ?>
	  background-color: #<?php echo $bg_color; ?>;
	  background-color: rgba(<?php echo $bg_color_rgba; ?>);
	<?php endif; ?>

	<?php if ( 'none' === $border_type ) : ?>
  	border: none;
	<?php elseif ( 'default' !== $border_type &&  $border_color ) : ?>
  	border: <?php echo $border_size; ?>px <?php echo $border_type; ?> #<?php echo $border_color; ?>;
	<?php endif; ?>

	<?php if ( 'default' !== $post_align ) : ?>
  	text-align: <?php echo $post_align; ?>;
	<?php endif; ?>

}

<?php echo $fl_node_id; ?> .kntnt-bb-single-post .image {

  <?php if ( $image_spacing ) : ?>
    <?php switch( $layout ) :
            case 'above-title': ?>
        padding: <?php echo "{$image_spacing}px {$image_spacing}px 0 {$image_spacing}px"; ?>
        <?php break; ?>
      <?php case 'above': ?>
        padding: <?php echo "0 {$image_spacing}px"; ?>
        <?php break; ?>
      <?php case 'beside': ?>
      <?php case 'beside-right': ?>
      <?php case 'beside-content': ?>
      <?php case 'beside-content-right': ?>
        padding: <?php echo "{$image_spacing}px"; ?>
        <?php break; ?>
    <?php endswitch; ?>
  <?php endif; ?>

  <?php if ( $image_width && in_array( $layout, [ 'beside', 'beside-right', 'beside-content', 'beside-content-right' ] ) ) : ?>
    width: <?php echo "$image_width%"; ?>
  <?php endif; ?>

}

<?php echo $fl_node_id; ?> .kntnt-bb-single-post .text {

  <?php if ( $image_width ) : ?>
    <?php switch( $layout ) :
            case 'beside': ?>
      <?php case 'beside-content': ?>
        margin-left: <?php echo "$image_beside_margin%"; ?>
        <?php break; ?>
      <?php case 'beside-right': ?>
      <?php case 'beside-content-right': ?>
        margin-right: <?php echo "$image_beside_margin%"; ?>
        <?php break; ?>
    <?php endswitch; ?>
  <?php endif; ?>

}

<?php echo $fl_node_id; ?> .kntnt-bb-single-post h2 a {

  <?php if ( $title_color ) : ?>
    color: #<?php echo $title_color; ?>;
  <?php endif; ?>

  <?php if ( $title_font_size ) : ?>
    font-size: <?php echo $title_font_size; ?>px;
  <?php endif; ?>

}

<?php echo $fl_node_id; ?> .kntnt-bb-single-post .info,
<?php echo $fl_node_id; ?> .kntnt-bb-single-post .info a {

  <?php if ( $info_color ) : ?>
	  color: #<?php echo $info_color; ?>;
  <?php endif; ?>

  <?php if ( $info_font_size ) : ?>
	  font-size: <?php echo $info_font_size; ?>px;
  <?php endif; ?>

}

<?php echo $fl_node_id; ?> .kntnt-bb-single-post .text {
  <?php if ( $post_padding && in_array( $layout, [ 'above-title', 'above' ] ) ) : ?>
  	padding: <?php echo $post_padding; ?>px;
  <?php endif; ?>
}

<?php echo $fl_node_id; ?> .kntnt-bb-single-post .text,
<?php echo $fl_node_id; ?> .kntnt-bb-single-post .text p {
  <?php if (  $content_color ) : ?>
    color: #<?php echo $content_color; ?>;
  <?php endif; ?>
  <?php if (  $content_font_size ) : ?>
	  font-size: <?php echo $content_font_size; ?>px;
  <?php endif; ?>

}

<?php echo $fl_node_id; ?> .kntnt-bb-single-post .text a {
  <?php if ( $link_color ) : ?>
	  color: #<?php echo $link_color; ?>;
  <?php endif; ?>
}

<?php echo $fl_node_id; ?> .kntnt-bb-single-post .text a:hover {
  <?php if ( $link_hover_color ) : ?>
	  color: #<?php echo $link_hover_color; ?>;
  <?php endif; ?>
}

<?php if ( 'underneath' === $layout ) : ?>
  
  /* Extra CSS for the layout when the image is underneath the text. */

  <?php echo $fl_node_id; ?> .kntnt-bb-single-post-image-underneath > a {
    background-color: #<?php echo $text_bg_color; ?>;
    background-color: <?php echo $text_bg_color_rgba; ?>;
  }

  <?php echo $fl_node_id; ?> .kntnt-bb-single-post-image-underneath .icon {
    <?php if ( 'above' === $icon_position ) : ?>
      margin-bottom: 10px;
    <?php else : ?>
      margin-top: 10px;
    <?php endif; ?>
  }

  <?php echo $fl_node_id; ?> .kntnt-bb-single-post-image-underneath .icon i,
  <?php echo $fl_node_id; ?> .kntnt-bb-single-post-image-underneath .icon i:before {
    <?php if ( $icon_size ) : ?>
      width: <?php echo $icon_size ?>px;
      height: <?php echo $icon_size ?>px;
      font-size: <?php echo $icon_size ?>px;
    <?php endif; ?>
    <?php if ( $icon_color ) : ?>
      color: #<?php echo $icon_color ?>;
    <?php endif; ?>
  }

  <?php echo $fl_node_id; ?> .kntnt-bb-single-post-image-underneath .text {
    <?php if ( 'slide-up' == $hover_transition ) : ?>
      transform: translate3d(-50%,-30%, 0);
    <?php elseif ( 'slide-down' == $hover_transition ) : ?>
      transform: translate3d(-50%,-70%, 0);
    <?php elseif ( 'scale-up' == $hover_transition ) : ?>
      transform: translate3d(-50%,-50%, 0) scale(.7);
    <?php elseif ( 'scale-down' == $hover_transition ) : ?>
  	  transform: translate3d(-50%,-50%, 0) scale(1.3);
    <?php endif; ?>
  }

<?php endif; ?>
