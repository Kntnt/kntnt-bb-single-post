<?php extract( $module->frontend_html_variables() ); ?>
<div class="kntnt-bb-single-post kntnt-bb-single-post-<?php echo $pid; ?> kntnt-bb-single-post-image-<?php echo $layout; ?>">

  <?php switch( $layout ) :
          case 'above-title': ?>
    <?php case 'beside': ?>
    <?php case 'beside-right': ?>
    <?php case 'beside-content-right': ?>

      <a class="image" href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $image; ?></a>
      <div class="text">
        <div class="header">
          <h2><a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $heading; ?></a></h2>
          <?php if ( $info ) : ?><div class="info"><?php echo $info; ?></div><?php endif; ?>
        </div>
        <div class="content">
          <div class="content"><?php echo $content; ?></div>
          <?php if ( $more_link_text ) : ?><a class="more-link" href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $more_link_text; ?></a><?php endif; ?>
        </div>
      </div>
      <div class="fl-clear"></div>

      <?php break; ?>
    <?php case 'above': ?>
    <?php case 'beside-content': ?>

      <div class="text">
        <div class="header">
          <h2><a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $heading; ?></a></h2>
          <?php if ( $info ) : ?><div class="info"><?php echo $info; ?></div><?php endif; ?>
        </div>
      </div>
      <a class="image" href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $image; ?></a>
      <div class="text">
        <div class="content">
          <div class="content"><?php echo $content; ?></div>
          <?php if ( $more_link_text ) : ?><a class="more-link" href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $more_link_text; ?></a><?php endif; ?>
        </div>
      </div>
      <div class="fl-clear"></div>

      <?php break; ?>
    <?php case 'underneath': ?>

      <?php echo $image; ?>
      <a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
        <div class="text">
          <?php if ( 'above' === $icon_position ) ?><span class="icon"><i class="<?php echo $icon; ?>"></i></span><? endif; ?>
          <h2><?php echo $heading; ?></h2>
          <?php if ( $info ) : ?><div class="info"><?php echo $info; ?></div><?php endif; ?>
          <?php if ( 'below' === $icon_position ) ?><span class="icon"><i class="<?php echo $icon; ?>"></i></span><? endif; ?>
        </div>      
      </a>

      <?php break; ?>
    <?php default: /* No image */ ?>

      <div class="text">
        <div class="header">
          <h2><a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $heading; ?></a></h2>
          <?php if ( $info ) : ?><div class="info"><?php echo $info; ?></div><?php endif; ?>
        </div>
        <div class="content">
          <div class="content"><?php echo $content; ?></div>
          <?php if ( $more_link_text ) : ?><a class="more-link" href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $more_link_text; ?></a><?php endif; ?>
        </div>
      </div>

      <?php break; ?>
  <?php endswitch; ?>

</div>
