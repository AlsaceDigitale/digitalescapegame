<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<meta charset="<?php bloginfo('charset'); ?>" />
	<?php $wl_theme_options = weblizar_get_options(); ?>
	<?php if($wl_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url($wl_theme_options['upload_image_favicon']); ?>" /> 
	<?php } ?>	
	<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
<div>
<header id="header">
<a class="skip-content" href="#main"><?php esc_html_e( 'Skip to content', 'guardian' ); ?></a>
	<!-- Top header bar -->
	<div id="topHeader">
		<div class="wrapper" <?php if ( has_header_image() ) { ?> style='background-image: url("<?php header_image(); ?>")' <?php  } ?>>  
			<div class="container-fluid top_nav"  >
				<div class="container">					
					<div class="col-md-12 right">
						<ul> <?php if($wl_theme_options['contact_email']!=''){ ?>           	
							<li class="g_email guardian_contact_email"><a href="mailto:<?php echo ($wl_theme_options['contact_email']); ?>"><i class="fa fa-envelope"></i> <?php echo ($wl_theme_options['contact_email']); ?></a></li> <?php } ?>
							<?php if($wl_theme_options['contact_phone_no']!=''){ ?> 
							<li class="g_contact guardian_contact_phone"><a href="tel:<?php echo ($wl_theme_options['contact_phone_no']); ?>"><i class="fa fa-phone"></i> + <?php echo ($wl_theme_options['contact_phone_no']); ?></a></li>
							<?php } ?>
							<?php if($wl_theme_options['header_section_social_media_enbled'] =='on'){ 
								if($wl_theme_options['facebook_link']!=''){  ?>
								<li class="guardian_facebook_link"><a href="<?php echo esc_url($wl_theme_options['facebook_link']); ?>"><i class="fa fa-facebook"></i></a></li>
								<?php }  if($wl_theme_options['twitter_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['twitter_link']); ?>"><i class="fa fa-twitter"></i></a></li>
								<?php }  if($wl_theme_options['linkedin_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li>
								<?php }  if($wl_theme_options['flicker_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['flicker_link']); ?>"><i class="fa fa-flickr"></i></a></li>
								<?php }  if($wl_theme_options['youtube_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li>
								<?php }  if($wl_theme_options['rss_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['rss_link']); ?>"><i class="fa fa-rss"></i></a></li>
								<?php } 
							}	?>
							</ul>					
					</div><!-- end right social links -->			
				</div>
			</div>            
		</div>    
	</div><!-- end top navigation -->
	<div id="trueHeader">    
		<div class="wrapper">    
			<div class="container">    
				<!-- Logo -->
				<div class="col-md-3 col-sm-3 logo">
					<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="logo" >
						<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id,'full' );
						if(has_custom_logo()) { ?>
						<img src="<?php echo $image[0]; ?>" style="height:<?php if($wl_theme_options['height']!='') { echo $wl_theme_options['height']; }  else { "50"; } ?>px; width:<?php if($wl_theme_options['width']!='') { echo $wl_theme_options['width']; }  else { "180"; } ?>px;" />
						<?php } else { echo '<span class="site-title">'.get_bloginfo('name').'</span>'; } ?>						
					</a>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
				<!-- Menu -->
				<div class="col-md-9 col-sm-9 menu_main">				
					<div class="navbar yamm navbar">
						<div class="navbar-header">
								<div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  ><span><?php __('Menu','guardian'); ?></span>
									<button type="button" ><i class="fa fa-bars"></i></button>
								</div>
							</div>
							<!-- /Navigation  menus -->
						<div id="navbar-collapse-1" class="navbar-collapse collapse">  
						<?php
								wp_nav_menu( array(  
										'theme_location' => 'primary',
										'menu_class' => 'nav navbar-nav navbar-right',
										'fallback_cb' => 'weblizar_fallback_page_menu',
										'walker' => new weblizar_nav_walker()
										)
									);	
								?>	
						</div>		
					</div>			 
				</div><!-- end menu -->				
			</div>			
		</div>    
	</div>    
</header>
<div class="clearfix"></div>