<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="container-fluid feature_section1">
	<div class="container">
		<h2><?php 			
			if($wl_theme_options['home_service_title'] !='') { 	echo '<span class="guardian_home_service_title">'.esc_attr($wl_theme_options['home_service_title']).'</span>'; } 
			if($wl_theme_options['home_service_description'] !='') {  ?>
			<b><?php echo '<span class="guardian_home_service_description">'.get_theme_mod('home_service_description' , $wl_theme_options['home_service_description']).'</span>'; ?></b>
			<?php } ?>
		</h2>
		<!-- <div class="margin_top3"></div> -->
		<?php if($wl_theme_options['service_1_icons'] !='' || $wl_theme_options['service_1_title'] !='') {  ?>
		<div class="col-md-3 col-sm-6 one_fourth animate" data-anim-type="fadeIn" data-anim-delay="100">		
			<a href="<?php echo esc_url($wl_theme_options['service_1_link']);  ?>"><?php if($wl_theme_options['service_1_icons'] !='') { ?><div class="arrow_box guardian_service_1_icons"><i class="fa <?php echo esc_attr($wl_theme_options['service_1_icons']); ?>"></i></div><?php } ?>
			
			<?php if($wl_theme_options['service_1_title'] !='') { ?><h5 class="caps guardian_service_1_title"><?php echo esc_attr($wl_theme_options['service_1_title']);  ?></h5></a><?php } ?>
			<?php if($wl_theme_options['service_1_text'] !='') { echo "<p class='guardian_service_1_text'>".apply_filters('the_content', get_theme_mod('service_1_text' , $wl_theme_options['service_1_text']), true). "</p>"; } ?>
		</div>	
		<?php } if($wl_theme_options['service_2_icons'] !='' || $wl_theme_options['service_2_title'] !='') { ?>	
		<div class="col-md-3 col-sm-6 one_fourth animate" data-anim-type="fadeIn" data-anim-delay="200">		
			<a href="<?php echo esc_url($wl_theme_options['service_2_link']);  ?>"><?php if($wl_theme_options['service_2_icons'] !='') { ?><div class="arrow_box guardian_service_2_icons"><i class="fa <?php echo esc_attr($wl_theme_options['service_2_icons']); ?>"></i></div><?php } ?>				
			<?php if($wl_theme_options['service_2_title'] !='') { ?><h5 class="caps guardian_service_2_title"><?php echo esc_attr($wl_theme_options['service_2_title']);  ?></h5></a><?php } ?>
			<?php if($wl_theme_options['service_2_text'] !='') { echo "<p class='guardian_service_2_text'>".apply_filters('the_content', get_theme_mod('service_2_text' , $wl_theme_options['service_2_text']), true). "</p>"; } ?>
		</div>	
		<?php } if($wl_theme_options['service_3_icons'] !='' || $wl_theme_options['service_3_title'] !='') { ?>		
		<div class="col-md-3 col-sm-6 one_fourth animate" data-anim-type="fadeIn" data-anim-delay="300">			
			<a href="<?php echo esc_url($wl_theme_options['service_3_link']);  ?>"><?php if($wl_theme_options['service_3_icons'] !='') { ?><div class="arrow_box guardian_service_3_icons"><i class="fa <?php echo esc_attr($wl_theme_options['service_3_icons']); ?>"></i></div><?php } ?>				
			<?php if($wl_theme_options['service_3_title'] !='') { ?><h5 class="caps guardian_service_3_title"><?php echo esc_attr($wl_theme_options['service_3_title']);  ?></h5></a><?php } ?>
			<?php if($wl_theme_options['service_3_text'] !='') { echo "<p class='guardian_service_3_text'>".apply_filters('the_content', get_theme_mod('service_3_text' , $wl_theme_options['service_3_text']), true). "</p>"; } ?>	
		</div>	
		<?php } if($wl_theme_options['service_4_icons'] !='' || $wl_theme_options['service_4_title'] !='') { ?>		
		<div class="col-md-3 col-sm-6 one_fourth last animate" data-anim-type="fadeIn" data-anim-delay="400">
			<a href="<?php echo esc_url($wl_theme_options['service_4_link']);  ?>"><?php if($wl_theme_options['service_4_icons'] !='') { ?><div class="arrow_box guardian_service_4_icons"><i class="fa <?php echo esc_attr($wl_theme_options['service_4_icons']); ?>"></i></div><?php } ?>	
					
			<?php if($wl_theme_options['service_4_title'] !='') { ?><h5 class="caps guardian_service_4_title"><?php echo esc_attr($wl_theme_options['service_4_title']);  ?></h5></a><?php } ?>
			<?php if($wl_theme_options['service_4_text'] !='') { echo "<p class='guardian_service_4_text'>".apply_filters('the_content', get_theme_mod('service_4_text' , $wl_theme_options['service_4_text']), true). "</p>"; } ?>	
		</div>	
		<?php } ?>
	</div>
</div><!-- end of service section1 -->
<div class="clearfix"></div>