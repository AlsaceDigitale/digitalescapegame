 <?php
function weblizar_customizer( $wp_customize ) {
	wp_enqueue_style('customizr', WL_TEMPLATE_DIR_URI .'/css/customizr.css'); 
	wp_enqueue_style('customizr-fa', get_template_directory_uri() .'/css/font-awesome-5.8.1/css/all.min.css');
	
	$ImageUrl1 = get_template_directory_uri() ."/images/slide-1.jpg";
	$ImageUrl2 = get_template_directory_uri() ."/images/slide-2.jpg";
	$ImageUrl3 = get_template_directory_uri() ."/images/slide-3.jpg";

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	'selector' => '.site-title',
	'render_callback' => 'blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	'selector' => '.site-description',
	'render_callback' => 'blogdescription',
	) );
	$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
	'selector' => '.site-custom_logo',
	'render_callback' => 'custom_logo',
	) );
	/* Genral section */
		/* Slider Section */
	$wp_customize->add_panel( 'weblizar_theme_option', array(
    'title' => __( 'Guardian Options','guardian' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
	) );
	
	
	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __('Theme General Options','guardian'),
            'description' => __('Here you can customize Your theme\'s general Settings','guardian'),
			'panel'=>'weblizar_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
        )
    );
	$wl_theme_options = weblizar_get_options();
	//var_dump($wl_theme_options['upload_image_logo']); die;
	$wp_customize->add_setting(
		'guardian_options[_frontpage]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['_frontpage'],
			'sanitize_callback'=>'weblizar_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'weblizar_front_page', array(
		'label'        => __( 'Show Front Page', 'guardian' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'guardian_options[_frontpage]',
	) );
	
	$wp_customize->add_setting(
		'guardian_options[snoweffect]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['snoweffect'],
			'sanitize_callback'=>'weblizar_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'snoweffect', array(
		'label'        => __( 'Snow effect on/off', 'guardian' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'guardian_options[snoweffect]',
	) );
	
	$wp_customize->add_setting(
		'guardian_options[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'weblizar_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'guardian_options[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'weblizar_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control( 'weblizar_logo_height', array(
		'label'        => __( 'Logo Height', 'guardian' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'guardian_options[height]',
	) );
	$wp_customize->add_control( 'weblizar_logo_width', array(
		'label'        => __( 'Logo Width', 'guardian' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'guardian_options[width]',
	) );
	
	$wp_customize->add_setting(
		'guardian_options[custom_css]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['custom_css'],
			'sanitize_callback'=>'weblizar_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
		$wp_customize->add_control( 'custom_css', array(
		'label'        => __( 'Custom CSS', 'guardian' ),
		'type'=>'textarea',
		'section'    => 'general_sec',
		'settings'   => 'guardian_options[custom_css]'
	) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'guardian_upload_image', array(
		'label'        => __( 'Header Image', 'guardian' ),
		'section'    => 'general_sec',
		'settings'   => 'guardian_options[upload__header_image]',
	) ) );
	
	/* Font Family Section */
	$wp_customize->add_section('font_section', array(
	'title' => __('Typography Setting', 'guardian'),
	'panel' => 'weblizar_theme_option',
	'capability' => 'edit_theme_options',
	'priority' => 35
	));
	
	$wp_customize->add_setting(
	'guardian_options[main_heading_font]',
	array(
	'default' => esc_attr($wl_theme_options['main_heading_font']),
	'type' => 'option',
	'sanitize_callback'=>'weblizar_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new guardian_Font_Control($wp_customize, 'main_heading_font', array(
	'label' => __('Logo Font Style', 'guardian'),
	'section' => 'font_section',
	'settings' => 'guardian_options[main_heading_font]'
	)));
	
	$wp_customize->add_setting(
	'guardian_options[menu_font]',
	array(
	'default' => esc_attr($wl_theme_options['menu_font']),
	'type' => 'option',
	'sanitize_callback'=>'weblizar_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new guardian_Font_Control($wp_customize, 'menu_font', array(
	'label' => __('Header Menu Font Style', 'guardian'),
	'section' => 'font_section',
	'settings' => 'guardian_options[menu_font]'
	)));
	
	$wp_customize->add_setting(
	'guardian_options[theme_title]',
	array(
	'default' => esc_attr($wl_theme_options['theme_title']),
	'type' => 'option',
	'sanitize_callback'=>'weblizar_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new guardian_Font_Control($wp_customize, 'theme_title', array(
	'label' => __('Theme Title Font Style', 'guardian'),
	'section' => 'font_section',
	'settings' => 'guardian_options[theme_title]'
	)));
	
	$wp_customize->add_setting(
	'guardian_options[desc_font_all]',
	array(
	'default' => esc_attr($wl_theme_options['desc_font_all']),
	'type' => 'option',
	'sanitize_callback'=>'weblizar_sanitize_text',
	'capability'=>'edit_theme_options'
    ));
	$wp_customize->add_control(new guardian_Font_Control($wp_customize, 'desc_font_all', array(
	'label' => __('Theme Description Font Style', 'guardian'),
	'section' => 'font_section',
	'settings' => 'guardian_options[desc_font_all]'
	)));

	/* Slider Section */
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' => __('Theme Slider Options','guardian'),
			'panel'=>'weblizar_theme_option',
            'description' => __('Here you can add slider images','guardian'),
			'capability'=>'edit_theme_options',
            'priority' => 35,
			'active_callback' => 'is_front_page',
        )
    );
	
	$wp_customize->add_setting(
		'guardian_options[guardian_slider]',
		array(
			'type'    => 'option',
			'default'=>'1',
			'sanitize_callback'=>'weblizar_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'guardian_slider', array(
		'label'        => __( 'Set Your Home Slider', 'guardian' ),
		'description' => 'You can only set slider 1 or 2',
		'type'=>'select',
		'choices' => array(
			'1' => __( 'Slider 1', 'guardian' ),
			'2' => __( 'Slider 2', 'guardian' )),
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[guardian_slider]',
	) );
	$wp_customize->add_setting(
		'guardian_options[slider_image_speed]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_image_speed'],
			'sanitize_callback'=>'weblizar_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'slider_image_speed', array(
		'label'        => __( 'Slider Speed Option', 'guardian' ),
		'description' => 'Value will be in milliseconds',
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slider_image_speed]',
	) );
	$wp_customize->add_setting(
		'guardian_options[slide_image]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl1,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'guardian_options[slide_image_1]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl2,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'guardian_options[slide_image_2]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl3,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'guardian_options[slide_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[slide_title]', array(
	'selector' => '.guardian_slide_title',
	'render_callback' => 'guardian_options[slide_title]',
	) );
	$wp_customize->add_setting(
		'guardian_options[slide_title_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[slide_title_1]', array(
	'selector' => '.guardian_slide_title_1',
	'render_callback' => 'guardian_options[slide_title_1]',
	) );
	$wp_customize->add_setting(
		'guardian_options[slide_title_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[slide_title_2]', array(
	'selector' => '.guardian_slide_title_2',
	'render_callback' => 'guardian_options[slide_title_2]',
	) );
	$wp_customize->add_setting(
		'slide_desc',
		array(
			'default'=>$wl_theme_options['slide_desc'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'slide_desc', array(
	'selector' => '.guardian_slide_desc',
	'render_callback' => 'slide_desc',
	) );
	$wp_customize->add_setting(
		'slide_desc_1',
		array(
			'default'=>$wl_theme_options['slide_desc_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'slide_desc_1', array(
	'selector' => '.guardian_slide_desc_1',
	'render_callback' => 'slide_desc_1',
	) );
	$wp_customize->add_setting(
		'slide_desc_2',
		array(
			'default'=>$wl_theme_options['slide_desc_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'slide_desc_2', array(
	'selector' => '.guardian_slide_desc_2',
	'render_callback' => 'slide_desc_2',
	) );
	$wp_customize->add_setting(
		'guardian_options[slide_btn_text]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'guardian_options[slide_btn_text_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'guardian_options[slide_btn_text_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_sanitize_text'
		)
	);
	$wp_customize->add_setting(
		'guardian_options[slide_btn_link]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'guardian_options[slide_btn_link_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'guardian_options[slide_btn_link_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_slider_image_1', array(
		'label'        => __( 'Slider Image One', 'guardian' ),
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_image]'
	) ) );
	$wp_customize->add_control( 'weblizar_slide_title_1', array(
		'label'        => __( 'Slider title one', 'guardian' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_title]'
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'slide_desc', array(
		'label'        => __( 'Slider description one', 'guardian' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc',
	)
	) );
	$wp_customize->add_control( 'Slider button one', array(
		'label'        => __( 'Slider Button Text One', 'guardian' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_btn_text]'
	) );
	
	$wp_customize->add_control( 'weblizar_slide_btnlink_1', array(
		'label'        => __( 'Slider Button Link', 'guardian' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_btn_link]'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_slider_image_2', array(
		'label'        => __( 'Slider Image Two ', 'guardian' ),
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_image_1]'
	) ) );
	
	$wp_customize->add_control( 'weblizar_slide_title_2', array(
		'label'        => __( 'Slider Title Two', 'guardian' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_title_1]'
	) );
	$wp_customize->add_control( new One_Page_Editor($wp_customize,'slide_desc_1', array(
		'label'        => __( 'Slider Description Two', 'guardian' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc_1'
	)
	) );
	$wp_customize->add_control( 'weblizar_slide_btn_2', array(
		'label'        => __( 'Slider Button Text Two', 'guardian' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_btn_text_1]'
	) );
	$wp_customize->add_control( 'weblizar_slide_btnlink_2', array(
		'label'        => __( 'Slider Link Two', 'guardian' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_btn_link_1]'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_slider_image_3', array(
		'label'        => __( 'Slider Image Three', 'guardian' ),
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_image_2]'
	) ) );
	$wp_customize->add_control( 'weblizar_slide_title_3', array(
		'label'        => __( 'Slider Title Three', 'guardian' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_title_2]'
	) );
	
	$wp_customize->add_control( new One_Page_Editor($wp_customize,'slide_desc_2', array(
		'label'        => __( 'Slider Description Three', 'guardian' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc_2'
	)
	) );
	$wp_customize->add_control( 'weblizar_slide_btn_3', array(
		'label'        => __( 'Slider Button Text Three', 'guardian' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_btn_text_2]'
	) );
	$wp_customize->add_control( 'weblizar_slide_btnlink_3', array(
		'label'        => __( 'Slider Button Link Three', 'guardian' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'guardian_options[slide_btn_link_2]'
	) );

	/*Editor Option */
	$wp_customize->add_section('extra_section',array(
	'title'      => __('Home Text Editor Section Options','guardian'),
	'panel'      => 'weblizar_theme_option',
	'capability' => 'edit_theme_options',
    'priority'   => 35
	));
	$wp_customize->add_setting(
	'guardian_options[editor_home]',
		array(
		'default'           => esc_attr( $wl_theme_options['editor_home'] ),
		'type'              => 'option',
		'sanitize_callback' => 'weblizar_sanitize_checkbox',
		'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'editor_home', array(
		'label'    => __( 'Enable extra section on homepage.', 'guardian' ),
		'type'     => 'checkbox',
		'section'  => 'extra_section',
		'settings' => 'guardian_options[editor_home]'
	) );

	$wp_customize->add_setting(
	'extra_sec_desc',
		array(
		'default'           => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'weblizar_sanitize_text',
		'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( new One_Page_Editor( $wp_customize, 'extra_sec_desc', array(
		'label'                      =>  __( 'Extra section content', 'guardian' ),
		'active_callback'            => 'show_on_front',
		'include_admin_print_footer' => true,
		'section'                    => 'extra_section',
		'settings'                   => 'extra_sec_desc'
	) ) );
	

	/* Blog Option */
	$wp_customize->add_section('blog_section',array(
	'title'=>__('Home Blog Options','guardian'),
	'panel'=>'weblizar_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 37
	));

	/*show/hide blog*/
	$wp_customize->add_setting(
		'guardian_options[blog_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['blog_home'],
			'sanitize_callback'=>'weblizar_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'guardian_show_blog', array(
		'label'        => __( 'Enable Blogs on Home', 'guardian' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'guardian_options[blog_home]'
	) );
	/*show/hide blog*/
	
	$wp_customize->add_setting(
	'guardian_options[guardian_blog_title]',
		array(
		'default'=>esc_attr($wl_theme_options['guardian_blog_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[guardian_blog_title]', array(
	'selector' => '.guardian_blog_title',
	'render_callback' => 'guardian_options[guardian_blog_title]',
	) );
	$wp_customize->add_control( 'guardian_blogs_title', array(
		'label'        => __( 'Blog Title', 'guardian' ),
		'type'	=>'text',
		'section'    => 'blog_section',
		'settings'   => 'guardian_options[guardian_blog_title]'
	) );
	
	
	$wp_customize->add_setting(
	'guardian_options[blog_title]',
		array(
		'default'=>esc_attr($wl_theme_options['blog_title']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[blog_title]', array(
	'selector' => '.guardian_blog_title',
	'render_callback' => 'guardian_options[blog_title]',
	) );
	$wp_customize->add_control( 'weblizar_blog_title', array(
		'label'        => __( 'Home Blog Title', 'guardian' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'guardian_options[blog_title]'
	) );
	
	$wp_customize->add_setting(
	'home_blog_description',
		array(
		'default'=>esc_attr($wl_theme_options['home_blog_description']),
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_sanitize_text',
		)
	);
	
	
	$wp_customize->selective_refresh->add_partial( 'home_blog_description', array(
    'selector' => '.guardian_home_blog_description',
    'render_callback' => 'home_blog_description',
    ) );

	
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'home_blog_description', array(
		'label'        => __( 'Blog Description', 'guardian' ),
		'section'    => 'blog_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'home_blog_description'
	)
	

	) );
	
	$wp_customize->add_setting('guardian_options[btn_text]',
		array(
		'default'=>esc_attr($wl_theme_options['btn_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	
	$wp_customize->add_control( 'weblizar_blog_title', array(
		'label'        => __( 'Home Blog Read More Text', 'guardian' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'guardian_options[btn_text]'
	) );

	/* Service Section */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options","guardian"),
	'panel'=>'weblizar_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	'active_callback' => 'is_front_page',
	));
	
	/*show/hide Service*/
	$wp_customize->add_setting(
		'guardian_options[services_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['services_home'],
			'sanitize_callback'=>'weblizar_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'guardian_show_service', array(
		'label'        => __( 'Enable Service on Home', 'guardian' ),
		'type'=>'checkbox',
		'section'    => 'service_section',
		'settings'   => 'guardian_options[services_home]'
	) );
	/*show/hide Service*/		

	$wp_customize->add_setting(
	'guardian_options[home_service_title]',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[home_service_title]', array(
	'selector' => '.guardian_home_service_title',
	'render_callback' => 'guardian_options[home_service_title]',
	) );
	$wp_customize->add_setting(
	'home_service_description',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_description']),
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'home_service_description', array(
	'selector' => '.guardian_home_service_description',
	'render_callback' => 'home_service_description',
	) );
	$wp_customize->add_control( 'weblizar_service_title', array(
		'label'        => __( 'Service Title', 'guardian' ),
		'type'	=>'text',
		'section'    => 'service_section',
		'settings'   => 'guardian_options[home_service_title]'
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'home_service_description', array(
		'label'        => __( 'Service Description', 'guardian' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'home_service_description'
	)
	) );
	for($i=1;$i<=4;$i++){
	$wp_customize->add_setting(
	'guardian_options[service_'.$i.'_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_'.$i.'_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_sanitize_text',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[service_'.$i.'_icons]', array(
	'selector' => '.guardian_service_'.$i.'_icons',
	'render_callback' => 'guardian_options[service_'.$i.'_icons]',
	) );
	$wp_customize->selective_refresh->add_partial( 'guardian_options[blog_title]', array(
	'selector' => '.guardian_blog_title',
	'render_callback' => 'guardian_options[blog_title]',
	) );
	$wp_customize->add_setting(
	'guardian_options[service_'.$i.'_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_'.$i.'_title']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_sanitize_text',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[service_'.$i.'_title]', array(
	'selector' => '.guardian_service_'.$i.'_title',
	'render_callback' => 'guardian_options[service_'.$i.'_title]',
	) );
	$wp_customize->add_setting(
	'service_'.$i.'_text',
		array(
		'default'=>esc_attr($wl_theme_options['service_'.$i.'_text']),
		'sanitize_callback'=>'weblizar_sanitize_text',
		'capabilit'=>'edit_theme_options',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'service_'.$i.'_text', array(
	'selector' => '.guardian_service_'.$i.'_text',
	'render_callback' => 'service_'.$i.'_text',
	) );
	$wp_customize->add_setting(
	'guardian_options[service_'.$i.'_link]',
		array(
		'type'    => 'option',
		'default'=>$wl_theme_options['service_'.$i.'_link'],
		'capability' => 'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	}
	for($i=1;$i<=4;$i++){
	$j = array('', ' One', ' Two', ' Three');
	$wp_customize->add_control( new weblizar_Customize_Misc_Control($wp_customize, 'guardian_options1-line', array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( new Guardian_Customizer_Icon_Picker_Control($wp_customize,'weblizar_service_icon'.$i, array(
		'label'        => __( 'Service Icon', 'guardian' ) .$i,
		'type'=>'text',
		'section'  => 'service_section',
		'settings'   => 'guardian_options[service_'.$i.'_icons]',
	)
    ) );
	$wp_customize->add_control( 'weblizar_service_title'.$i, array(
		'label'        => __( 'Service Icon', 'guardian' ) .$i,
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'guardian_options[service_'.$i.'_title]'
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'service_'.$i.'_text', array(
		'label'        => __( 'Service Text', 'guardian' ) .$i,
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_'.$i.'_text'
	)
	) );
	$wp_customize->add_control( 'weblizar_service_link_'.$i, array(
		'label'        => __( 'Service Icon', 'guardian' ) .$i,
		'type'=>	'url',
		'section'    => 'service_section',
		'settings'   => 'guardian_options[service_'.$i.'_link]',
	) );
	}

	/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options","guardian"),
	'panel'=>'weblizar_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 41
	));
	$wp_customize->add_setting(
	'guardian_options[header_section_social_media_enbled]',
		array(
		'default'=>esc_attr($wl_theme_options['header_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_sanitize_checkbox',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Header Section', 'guardian' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[header_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'guardian_options[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_sanitize_checkbox',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[footer_section_social_media_enbled]', array(
	'selector' => '.guardian_footer_section_social_media',
	'render_callback' => 'guardian_options[footer_section_social_media_enbled]',
	) );
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'guardian' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'guardian_options[facebook_link]',
		array(
		'default'=>esc_attr($wl_theme_options['facebook_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[facebook_link]', array(
	'selector' => '.guardian_facebook_link',
	'render_callback' => 'guardian_options[facebook_link]',
	) );
	$wp_customize->add_control( 'facebook_link', array(
		'label'        => __( 'Facebook URL', 'guardian' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[facebook_link]'
	) );
	$wp_customize->add_setting(
	'guardian_options[twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter URL', 'guardian' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'guardian_options[linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn URL', 'guardian' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[linkedin_link]'
	) );
	
	$wp_customize->add_setting(
	'guardian_options[flicker_link]',
		array(
		'default'=>esc_attr($wl_theme_options['flicker_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'flicker_link', array(
		'label'        => __( 'Flicker URL', 'guardian' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[flicker_link]'
	) );
	$wp_customize->add_setting(
	'guardian_options[rss_link]',
		array(
		'default'=>esc_attr($wl_theme_options['rss_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'rss_link', array(
		'label'        => __( 'RSS URL', 'guardian' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[rss_link]'
	) );
	$wp_customize->add_setting(
	'guardian_options[youtube_link]',
		array(
		'default'=>esc_attr($wl_theme_options['youtube_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube URL', 'guardian' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[youtube_link]'
	) );
	
	$wp_customize->add_setting(
	'guardian_options[contact_email]',
		array(
		'default'=>esc_attr($wl_theme_options['contact_email']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'is_email',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[contact_email]', array(
	'selector' => '.guardian_contact_email',
	'render_callback' => 'guardian_options[contact_email]',
	) );
		$wp_customize->add_control( 'contact_email', array(
		'label'        => __( 'Email-ID', 'guardian' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'guardian_options[contact_email]'
	) );
	$wp_customize->add_setting(
	'guardian_options[contact_phone_no]',
		array(
		'default'=>esc_attr($wl_theme_options['contact_phone_no']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[contact_phone_no]', array(
	'selector' => '.guardian_contact_phone',
	'render_callback' => 'guardian_options[contact_phone_no]',
	) );
		$wp_customize->add_control( 'contact_phone_no', array(
		'label'        => __( 'Phone Number', 'guardian' ),
		'type'=>'text',
		'section'    => 'social_section',
		'sanitize_callback'=>'weblizar_sanitize_text',
		'settings'   => 'guardian_options[contact_phone_no]'
	) );

	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options","guardian"),
	'panel'=>'weblizar_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 40
	));
	$wp_customize->add_setting(
	'guardian_options[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'guardian_options[footer_customizations]', array(
	'selector' => '.guardian_footer_customizations',
	'render_callback' => 'guardian_options[footer_customizations]',
	) );
	$wp_customize->add_control( 'weblizar_footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'guardian' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'guardian_options[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'guardian_options[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'weblizar_developed_by_text', array(
		'label'        => __( 'Footer Developed By Text', 'guardian' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'guardian_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'guardian_options[developed_by_weblizar_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_weblizar_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'weblizar_developed_by_weblizar_text', array(
		'label'        => __( 'Footer Company Text', 'guardian' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'guardian_options[developed_by_weblizar_text]'
	) );
	$wp_customize->add_setting(
	'guardian_options[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'weblizar_developed_by_link', array(
		'label'        => __( 'Footer Customization Link', 'guardian' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'guardian_options[developed_by_link]'
	) );
			
	// excerpt option 
    $wp_customize->add_section('excerpt_option',array(
    'title'=>__("Excerpt Option",'guardian'),
    'panel'=>'weblizar_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 37,
    ));
    
    $wp_customize->add_setting( 'guardian_options[excerpt_blog]', array(
        'default'=>_($wl_theme_options['excerpt_blog']),
        'type'=>'option',
        'sanitize_callback'=>'weblizar_sanitize_integer',
        'capability'=>'edit_theme_options'
    ) );
        $wp_customize->add_control( 'excerpt_blog', array(
        'label'        => __( 'Excerpt length blog section', 'guardian' ),
        'type'=>'number',
        'section'    => 'excerpt_option',
		'description' => esc_html__('Excerpt length only for home blog section.', 'guardian'),
		'settings'   => 'guardian_options[excerpt_blog]'
    ) );
        	// home layout //
	$wp_customize->add_section('Home_Page_Layout',array(
    'title'=>__("Home Page Layout Option",'guardian'),
    'panel'=>'weblizar_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 50,
    ));
	$wp_customize->add_setting('home_reorder',
            array(
				'type'=>'theme_mod',
                'sanitize_callback' => 'sanitize_json_string',
				'capability'        => 'edit_theme_options',
            )
        );
        $wp_customize->add_control(new guardian_Custom_sortable_Control($wp_customize,'home_reorder', array(
			'label'=>__( 'Front Page Layout Option', 'guardian' ),
            'section' => 'Home_Page_Layout',
            'type'    => 'home-sortable',
            'choices' => array(
                'services'      => __('Home Services', 'guardian'),
                'blog'        => __('Home Blog', 'guardian'),
                'editor'    => __( 'Home Text Editor', 'guardian')
            ),
			'settings'=>'home_reorder',
        )));
	// home layout close //
}

add_action( 'customize_register', 'weblizar_customizer' );
function weblizar_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function weblizar_sanitize_checkbox( $input ) {
    if ( $input == 'on' ) {
        return 'on';
    } else {
        return '';
    }
}
function weblizar_sanitize_integer( $input ) {
    return (int)($input);
}
function sanitize_json_string($json){
    $sanitized_value = array();
    foreach (json_decode($json,true) as $value) {
        $sanitized_value[] = esc_attr($value);
    }
    return json_encode($sanitized_value);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'weblizar_Customize_Misc_Control' ) ) :
class weblizar_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;

/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'guardian_Font_Control' ) ) :
class guardian_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
  <?php  $google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyC8GQW0seCcIYbo8xt_gXuToPK8xAMx83A';
			//lets fetch it
			$response = wp_remote_retrieve_body( wp_remote_get($google_api_url, array('sslverify' => false )));
			if($response==''){ echo '<script>jQuery(document).ready(function() {alert("Something went wrong! this works only when you are connected to Internet....!!");});</script>'; }
			if( is_wp_error( $response ) ) {
			   echo 'Something went wrong!';
			} else {
			$json_fonts = json_decode($response,  true);
			// that's it
			$items = $json_fonts['items'];
			$i = 0; ?>
   <select <?php $this->link(); ?> >
   <?php foreach( $items as $item) { $i++; $str = $item['family']; ?>
    <option  value="<?php echo esc_attr($str); ?>" <?php if($this->value()== $str) echo 'selected="selected"';?>><?php echo esc_attr($str); ?></option>
   <?php } ?>
    </select>
	<?php 
 }
}
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Guardian_Customizer_Icon_Picker_Control' ) ) :
	class Guardian_Customizer_Icon_Picker_Control extends WP_Customize_Control {
		public function enqueue() {
			wp_enqueue_script( 'fontawesome-iconpicker', get_template_directory_uri() . '/iconpicker-control/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'iconpicker-control', get_template_directory_uri() . '/iconpicker-control/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'iconpicker-css', get_template_directory_uri() . '/iconpicker-control/assets/css/fontawesome-iconpicker.css', array(), rand() );	
			wp_enqueue_style('font-awesome-latest', get_template_directory_uri(). '/css/font-awesome-5.8.1/css/all.min.css');

		}
		
		
		public function render_content() {
			?>
			<label>
				<style>
				input.icp.icp-auto.iconpicker-element.iconpicker-input {
				width: 90% !important;
				}
				</style>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<div class="input-group icp-container">
					<input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon"></span>
				</div>
			</label>
			<?php
		}
	}
endif;


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'One_Page_Editor' ) ) :
/* Class to create a custom tags control */
class One_Page_Editor extends WP_Customize_Control {	
	private $include_admin_print_footer = false;
	private $teeny = false;
	public $type = 'text-editor';
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['include_admin_print_footer'] ) ) {
			$this->include_admin_print_footer = $args['include_admin_print_footer'];
		}
		if ( ! empty( $args['teeny'] ) ) {
			$this->teeny = $args['teeny'];
		}
	}
	/* Enqueue scripts */
	public function enqueue() {
		wp_enqueue_script( 'one_lite_text_editor', get_template_directory_uri() . '/inc/customizer-page-editor/js/one-lite-text-editor.js', array( 'jquery' ), false, true );
	}
	/* Render the content on the theme customizer page */
	public function render_content() {
		?>

		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
		<?php
		$settings = array(
			'textarea_name' => $this->id,
			'teeny' => $this->teeny,
		);
		$control_content = $this->value();
		wp_editor( $control_content, $this->id, $settings );

		if ( $this->include_admin_print_footer === true ) {
			do_action( 'admin_print_footer_scripts' );
		}
	}
}
endif;

function show_on_front() {
	if(is_front_page())
	{
		return is_front_page() && 'posts' !== get_option( 'show_on_front' );
	}
	elseif(is_home()) 
	{
		return is_home();
	}
}


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'guardian_Custom_sortable_Control' ) ) :
class guardian_Custom_sortable_Control extends WP_Customize_Control
{
    public $type = 'home-sortable';
    /*Enqueue resources for the control*/
    public function enqueue()
    {

        wp_enqueue_style('customizer-repeater-admin-stylesheet', get_template_directory_uri() . '/assets/customizer_js_css/css/guardian-admin-style.css', time());

        wp_enqueue_script('customizer-repeater-script', get_template_directory_uri() . '/assets/customizer_js_css/js/guardian-customizer_repeater.js', array('jquery', 'jquery-ui-draggable'), time(), true);

    }
    public function render_content()
    {
        if (empty($this->choices)) {
            return;
        }
        $values = json_decode($this->value());
        $name         = $this->id;
        ?>

		<span class="customize-control-title">
			<?php echo esc_attr($this->label); ?>
		</span>

		<?php if (!empty($this->description)): ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
		<?php endif;?>

		<div class="customizer-repeater-general-control-repeater customizer-repeater-general-control-droppable">
			<?php 
			if(!empty($values)){ 
				foreach ($values as $value) {?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo $this->choices[$value]; ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo $value; ?>">
					</div>	
				<?php }?>
				
			<?php }else{
			foreach ($this->choices as $value => $label): ?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo $label; ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo $value; ?>">
					</div>

				<?php endforeach;
			}
        		if (!empty($value)) {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo $this->id; ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"
					       value="<?php echo esc_textarea(json_encode($value)); ?>"/>
					<?php
				} else {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo $this->id; ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"/>
					<?php
				}?>
		</div>
		<?php
}
}
endif;
?>