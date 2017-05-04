<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php endif; ?>

    <!-- Insert Webmaster Tools and Bing Webtools validation codes from options -->
    <?php 
      $WTcbits = get_theme_option('wmtool');
      if (!empty($WTcbits)): ?> 
        <meta name="google-site-verification" content="<?php echo $WTcbits; ?>" />
      <?php else: ?>
      <?php endif 
    ?>
    
    <?php 
      $BTcbits = get_theme_option('bntool'); 
      if (!empty($BTcbits)): ?>
         <meta name="msvalidate.01" content="<?php echo $BTcbits; ?>" /> 
      <?php else: ?>
      <?php endif 
    ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
    queue_css_file(array('iconfonts','style'));
    echo head_css();

    ?>

    <!-- JavaScripts -->
    <?php 
    queue_js_file(array('jquery-accessibleMegaMenu', 'minimalist', 'globals'));
    echo head_js(); 
    ?>

    <!-- Add Theme Configuration Color Changes -->
    <?php include 'IDHPed.php'; ?>

    <!-- Add Google Analytics -->
    <?php
      $GAgme = get_theme_option('gatool'); 
      if (!empty($GAgme)): ?>
         <script>
  	    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '<?php echo $GAgme; ?>', 'auto');
            ga('send', 'pageview');
         </script> 
      <?php else: ?>
      <?php endif 
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">
	      <header role="banner">
            <img id="headbg" src="files/theme_uploads/<?php echo $selectedBg; ?>" />            
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

            <div id="site-title">
	              <div id="logo" class="lg-smsc"><?php echo link_to_home_page('<img id="headbg" src="files/theme_uploads/'. get_theme_option('logo') . '" />'); ?>
                </div>
            </div>

            <div id="search-container" role="search">
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true)); ?>
                <?php else: ?>
                <?php echo search_form(); ?>
                <?php endif; ?>
            </div>
                <!--end search-->
       	</header>
        <nav id="top-nav" role="navigation">
            <?php echo public_nav_main(); ?>
        </nav>
        <!--end header-->
	
        <article id="content" role="main" tabindex="-1">
        
            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
