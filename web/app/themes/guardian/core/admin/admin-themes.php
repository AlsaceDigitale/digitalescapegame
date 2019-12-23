<?php if (!function_exists('guardian_info_page')) {
	function guardian_info_page() {
	$page1=add_theme_page(__('Welcome to Guardian', 'guardian'), __('About Guardian  <i class="fa fa-star theme-icon"></i>', 'guardian'), 'edit_theme_options', 'guardian', 'guardian_display_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'guardian_admin_info');
	}	
}
add_action('admin_menu', 'guardian_info_page');

function guardian_admin_info(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/core/admin/css/bootstrap.css');
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin-themes.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome-4.7.0/css/font-awesome.css');
	//JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js',get_template_directory_uri() .'/core/admin/js/bootstrap.js');
} 
if (!function_exists('guardian_display_theme_info_page')) {
	function guardian_display_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
	<div class="wrap elw-page-welcome about-wrap seting-page">

    <div class="col-md-12 settings">
         <div class=" col-md-9">
            <div class="col-md-12" style="padding:0">
				<?php $wl_th_info = wp_get_theme(); ?>
				<h2><span class="elw_shortcode_heading">Welcome to Guardian - Version <?php echo esc_html( $wl_th_info->get('Version') ); ?> </span></h2>
				<p style="font-size:19px;color: #555d66;">Guardian is an incredibly flexible, multipurpose WordPress theme that can help you create an amazing website easier than ever, by drag and drop. We focussed on usability across various devices, starting with smartphones which makes Guardian a fully responsive theme. Guardian is a Cross-Browser Compatible theme that works on All leading web browsers. Guardian is Retina ready and it has 4 page layouts, 2 page templates. It has five widgets available (one sidebar, four footers), and by using the sidebar widget, you can make a two-column design for your website. In addition, footer widget display is automatically adjusted depending on how many are used. </p>
            </div>
			
		</div>
       
        <div class=" col-md-3">
			<div class="update_pro">
				<h3> Upgrade Pro </h3>
				<a class="demo" href="https://weblizar.com/themes/guardian-premium-theme/">Get Pro In $29</a>
			</div>
		</div>
	</div>

            <!-- Themes & Plugin -->
            <div class="col-md-12  product-main-cont">
                <ul class="nav nav-tabs product-tbs">
				    <li class="active"><a data-toggle="tab" href="#start"> Getting Started </a></li>
                    <li><a data-toggle="tab" href="#themesd"> Guardian premium </a></li>
					<li><a data-toggle="tab" href="#freepro">Free Vs Pro</a></li>
                </ul>

                <div class="tab-content">
				
				
				<div id="start" class="tab-pane fade in active">
                        <div class="space  theme active">

                            <div class=" p_head theme">
                                <!--<h1 class="section-title">WordPress Themes</h1>-->
                            </div>							

                            <div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-7 col-md-7 p_plugin_pic">
                                    <h4>Step 1: Create a Homepage</h4>
									<ol>
									<li> Create a new page -> home and publish. </li>
									<li> Go to Appearance -> Customize > Homepage Settings -> select A static page option. </li>
									<li> In "Homepage", select the page that you created as a home page. </li>
									<li> Now Go to Customize -> Theme Options -> Theme General Options. </li>
									<li> select Show Front Page option </li>
									<li> Save changes </li>
									</ol>
									<a class="add_page" target="_blank" href="<?php echo admin_url('/post-new.php?post_type=page') ?>">Add New Page</a>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                    <div class="row p-box">
                                         <div class="img-thumbnail">
										<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" class="img-responsive" alt="img"/>
                                    </div>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-12 p_plugin_pic">
                                    <h4>Step 2: Customizer Options Panel </h4>
									<ol>
									<li> Go to Appearance -> Customize > Theme Options </li>
									<li> Theme General Options - Theme General Options use for logo width and height, and add custom css. </li>
									<li> Theme Slider Options - It is use to add slider image, title, description and enable/disable slider on homepage. </li>
									<li> Service Options - It is use to add service icon, title, description and enable/disable service on homepage. </li>
									<li> Portfolio Options - It is use to add portfolio image, title, link and enable/disable portfolio on homepage. </li>
									<li> Home Blog Options - Use to add blog title, description, blog excerpt length and enable/disable blog section on homepage and select category. </li>
									<li> Typography Settings - use to change the font of the site.  </li>
									<li> Social Options - enable/disable social option on header and footer, add social links, phone number, address and Email-ID. </li>
									<li> Footer Call-Out Options - use to add Footer callout Title, Footer callout Button Text, Footer callout Button Link and Footer callout Icon </li>
									<li> Footer Options - Use to add Customization text, developed by text and developed by link. </li>
									<li> Home Page Layout Option - use for front page section order and box layout option. </li>
									</ol>
									<a class="add_page" target="_blank" href="<?php echo esc_url(admin_url('customize.php')); ?>">Go to Customizer</a>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery visit_pro">
                                <p>Visit Our Latest Pro Themes & See Demos</p>
								<p style="font-size: 17px !important;">We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.</p>
								<a href="https://weblizar.com/themes/">Visit Themes</a>
                            </div>	
                        </div>
                    </div>
				
				<!-- end 1st tab -->
				
				
                    <div id="themesd" class="tab-pane fade">
                        <div class="space theme">

                            <div class=" p_head theme">
                                <!--<h1 class="section-title">WordPress Themes</h1>-->
                            </div>							

                            <div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
                                    <div class="img-thumbnail">
										<img src="<?php echo get_template_directory_uri(); ?>/images/Guardian-R.png" class="img-responsive" alt="img"/>
                                    </div>
									
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                    <div class="row p-box">
                                        <div>
                                            <p><strong>Description: </strong>Guardian Premium Theme is a super professional WordPress theme for modern businesses. Ideal for creative agencies, startups, small businesses, and freelancers and best of all it’s so easy to use that you can have your website up in minutes. Perfect to promote your work or your creative business. It is cross-browser compatible, fully responsive, and retina ready.</p>
                                        </div>
										<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business, WordPress, Corporate, dark, real estate, shop, restaurant.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
                                    <div class="price1">
                                        <span class="currency">USD</span>
                                        <span class="price-number">$<span>29</span></span>
                                    </div>
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/guardian-premium-theme/">Detail</a>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/images/492X-CORPO.jpg" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="https://weblizar.com/themes/eatos-premium-restaurant-theme/">Eatos Premium WordPress Theme</a></h4>
										</div>
                                    </div>
									
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/images/Responsive-Beauty.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="https://weblizar.com/themes/beautyspa-premium/">Beautyspa Premium</a></h4>
										</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/images/healthcare1.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="https://weblizar.com/themes/healthcare/">Healthcare Premium</a></h4>
										</div>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery visit_pro">
                                <p>Visit Our Latest Pro Themes & See Demos</p>
								<p style="font-size: 17px !important;">We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.</p>
								<a href="https://weblizar.com/themes/">Visit Themes</a>
                            </div>	
                        </div>
                    </div>
					
					<div id="freepro" class="tab-pane fade">
							<div class=" p_head theme">
                                <!--<h1 class="section-title">Weblizar Offers</h1>-->
                            </div>
						<div class="row p_plugin blog_gallery">		
						<div class="columns">
						  <ul class="price">
							<li class="header" style="background:#31A3DD">Guardian</li>
							<li class="grey">Features</li>
							<li>Theme Option Panel</li>
							<li>Front Page</li>
							<li>Unlimited Color Skins</li>
							<li>Multiple Background Patterns</li>
							<li>Multiple Theme Templates</li>
							<li>3 Portfolio Layout</li>
							<li>3 Page Layout</li>
							<li>Multilingual</li>
							<li>Blog Page(Variations)</li>
							<li>Service Page Template</li>
						  </ul>
						</div>
						
						 <div class="columns">
						  <ul class="price">
							<li class="header">Free</li>
							<li class="grey">$ 00</li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
						  </ul>
						</div>

						<div class="columns">
						  <ul class="price">
							<li class="header" style="background-color:#31A3DD">Guardian Pro</li>
							<li class="grey">$ 29</li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li class="grey"><a href="http://demo.weblizar.com/guardian-premium/" class="pro_btn">Visit Demo</a></li>
						  </ul>
						</div>
						</div>
					</div>
                </div>
            </div>            
<?php
	}
}
?>