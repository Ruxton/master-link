<?php
  $upc = get_post_meta( $post->ID, 'master_link_upc', true);
  $subtitle = get_post_meta( $post->ID, 'master_link_subtitle', true);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title(); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head(); ?>
  <?php $wp_master_link->headers(); ?>
  <style type="text/css" media="screen">
  	html { margin-top: 0px !important; }
  	body { margin: 0px 0px 0px 0px !important; }
  </style>
</head>
<body id="master-link" class="h-product">
  <div id="background" class="u-photo">
    <img src="<?php echo $post_image;?>" />
  </div>
  <div id="wrapper">
    <div id="header">
      <div id="cover" style="background-image: url('<?php echo $post_image; ?>')"></div>
      <div class="info">
        <h1 class="p-name">
          <?php echo $post->post_title; ?>
          <?php if(trim($subtitle) != "") : ?>
            <br/><?php echo $subtitle ?>
          <?php endif; ?>
        </h1>
        <p><?php _e("Choose service")?></p>
      </div>
      <div class="pointer"></div>
    </div>
    <div id="service-links">
      <div id="services">
        <?php foreach($app_links as $service => $service_id) {
          include master_link_getDisplayTemplate('service.php');
        } ?>
        <div class="default service">
          <a id="default" href="<?php echo $href; ?>" <?php if(isset($uri)){ echo "data-uri=\"$uri\""; } ?>>
            <span><?php _e("I don't know") ?></span>
          </a>
        </div>
      </div>
    </div>
    <?php if($upc != "") : ?>
    <div id="upc">
      <canvas class="u-identifier" itemprop="upc"><?php echo $upc; ?></canvas>
    </div>
    <?php endif; ?>
  </div>
</body>
</html>
