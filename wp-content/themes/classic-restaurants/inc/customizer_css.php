<?php
function cl_res_customize_css(){
	global $cl_res_fonttotal;
	$cl_res_global_fontfamily = get_theme_mod("cl_res_global_fontfamily",0);
    $cl_res_global_fontfamily = $cl_res_fonttotal[$cl_res_global_fontfamily];
    $cl_res_global_heading_fontfamily = get_theme_mod("cl_res_global_heading_fontfamily",0);
    $cl_res_global_heading_fontfamily = $cl_res_fonttotal[$cl_res_global_heading_fontfamily];
    $cl_res_global_heading1_fontfamily = get_theme_mod("cl_res_global_heading1_fontfamily",0);
    $cl_res_global_heading1_fontfamily = $cl_res_fonttotal[$cl_res_global_heading1_fontfamily];
    $cl_res_global_heading2_fontfamily = get_theme_mod("cl_res_global_heading2_fontfamily",0);
    $cl_res_global_heading2_fontfamily = $cl_res_fonttotal[$cl_res_global_heading2_fontfamily];
    $cl_res_global_heading3_fontfamily = get_theme_mod("cl_res_global_heading3_fontfamily",0);
    $cl_res_global_heading3_fontfamily = $cl_res_fonttotal[$cl_res_global_heading3_fontfamily];

	$cl_res_menu_btn_link = get_theme_mod( 'cl_res_menu_btn_link','#' );

	$cl_res_header_option = get_theme_mod('cl_res_header_option',true);

	$cl_res_header_select = get_theme_mod( 'cl_res_header_select' ,'header_layout1');

	if ($cl_res_header_option != ''){
		?>
		<style>
		    .cla_ras_menu_button .reservation {
		    	display:inline-block;
		    	background-color: <?php echo esc_attr(get_theme_mod('cl_res_bg_color','#c8504b')); ?>;
		    	color: <?php echo esc_attr(get_theme_mod('cl_res_color','#ffffff')); ?>!important;
		    	border: 1px solid <?php echo esc_attr(get_theme_mod('cl_res_header_border_color','#3b3131')); ?>;
		    	transition-property: color, background-color, border-color, opacity;
			    transition-duration: 0.4s;
			    transition-timing-function: ease;
		    }
		    a.menu-custom-button.reservation:hover{
				color: <?php echo esc_attr(get_theme_mod('cl_res_texthover_color','#c8504b')); ?>!important;			
				background-color: <?php echo esc_attr(get_theme_mod('cl_res_bghover_color','#ffffff')); ?>;
		    }
		</style>
		<?php
	}

	if (get_theme_mod( 'cl_res_link_underline',true ) != ''){
		?>
		<style>			
			.entry-content a{
				text-decoration: underline;
				text-decoration-color: <?php echo esc_attr(get_theme_mod('cl_res_link_underline_color','#c8504b')); ?>;
				
			}		   
		</style>
		<?php
	}
	if (get_theme_mod( 'cl_res_layout_select','boxed' ) == 'boxed'){
		?>
		<style>
			main.site-main {
				background: #3c3232;
			}	
			.widget {
			    background-color: #3c3232;
			    margin-bottom: 20px;
			    padding: 10px;
			}	   
		</style>
		<?php
	}

	if(get_theme_mod( 'cl_res_sidebar_select' )=='no_sidebar'){
		?>
		<style type="text/css">
		    .cl_res_sidebar.no_sidebar main.site-main{
		    	padding: 0px;
		    }
		</style>
		<?php
	}
	if(get_theme_mod( 'feature_product' )){
		?>
		<style type="text/css">
			.site-info {
			    background-color: rgba(0, 0, 0, 0.7);
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'cl_res_post_sidebar_select'.get_post_type())){
		?>
		<style type="text/css">
			aside.widget-area{
				width: <?php echo esc_attr(get_theme_mod('cl_res_post_sidebar_width'.get_post_type(),'30'));?>%;
			}
		</style>
		<?php
	}
	else{
		?>
		<style type="text/css">
			aside.widget-area{
				width: <?php echo esc_attr(get_theme_mod('cl_res_sidebar_width','30'));?>%;
			}
		</style>
		<?php
	}
	if($cl_res_global_fontfamily!='Select Font'){
		?>
		<style type="text/css">
	        body{
	            font-family: <?php echo  esc_attr( $cl_res_global_fontfamily );?>            
	        }
        </style>
        <?php
    }
    if($cl_res_global_heading_fontfamily!='Select Font'){
        ?>
		<style type="text/css">
	        h1,h2,h3,h4,h5,h6{
	            font-family: <?php echo  esc_attr( $cl_res_global_heading_fontfamily );?>
	    	}
    	</style>
    <?php
    }
    if($cl_res_global_heading1_fontfamily!='Select Font'){
        ?>
		<style type="text/css">
	        #page.site h1{
	            font-family: <?php echo  esc_attr( $cl_res_global_heading1_fontfamily );?>
	    	}
    	</style>
    <?php
    }
    if($cl_res_global_heading2_fontfamily!='Select Font'){
        ?>
		<style type="text/css">
	        #page.site h2{
	            font-family: <?php echo  esc_attr( $cl_res_global_heading2_fontfamily );?>
	    	}
    	</style>
    <?php
    }
    if($cl_res_global_heading3_fontfamily!='Select Font'){
        ?>
		<style type="text/css">
	        #page.site h3{
	            font-family: <?php echo  esc_attr( $cl_res_global_heading3_fontfamily );?>
	    	}
    	</style>
    <?php
    }
    if (get_theme_mod( 'cl_res_blog_date',true ) == ''){
    ?>
		<style type="text/css">
	       .entry-meta span.posted-on {
			    display: none;
			}
    	</style>
    <?php
    }
    if (get_theme_mod( 'cl_res_blog_authore',false ) == ''){
    ?>
		<style type="text/css">
	       .entry-meta span.byline {
			    display: none;
			}
    	</style>
    <?php
    }
    if (get_theme_mod( 'cl_res_blog_discription',false ) == ''){
    	?>
			<style type="text/css">
		        .blog .entry-content {
					display: none;
				}
	    	</style>
	    <?php
    }
    if (get_theme_mod( 'cl_res_post_sidebar_select' . get_post_type())== 'left-sidebar'){
    	?>
			<style type="text/css">
			@media only screen and (max-width: 768px){
		        .cl_res_sidebar.page {
				    flex-direction: column-reverse; 
				}
				.cl_res_sidebar.product {
				    flex-direction: column-reverse;
				}
				.cl_res_sidebar.post {
				    flex-direction: column-reverse;
				}
			}
	    	</style>
	    <?php
    }
    if (get_theme_mod( 'cl_res_sidebar_select' ) == 'left-sidebar'){
    	?>
			<style type="text/css">
			@media only screen and (max-width: 768px){
		        .cl_res_sidebar{
				    flex-direction: column-reverse; 
				}
			}
	    	</style>
	    <?php
    }
    if (get_theme_mod( 'cl_res_post_sidebar_select'.get_post_type())== 'no_sidebar'){
    	?>
			<style type="text/css">
		        .cl_res_sidebar.no_sidebar main.site-main {
				    width: 97%;
				}
	    	</style>
	    <?php
    }
	
    ?>
    <style type="text/css">
    	a { color: <?php echo esc_attr(get_theme_mod('link_textcolor', '#c8504b')); ?>; }
    	a:hover { color: <?php echo esc_attr(get_theme_mod('link_hovor_color','#ffffff')); ?>; }
        h2 { color: <?php echo esc_attr(get_theme_mod('header_textcolor')); ?>; }

    	/*header option in change css*/
    	header.site-header .main_heder_site{
    		background-color: <?php echo esc_attr(get_theme_mod('cl_res_header_bg_color','#3b3131')); ?>;
    	}
    	header.site-header .main_header{
    		color: <?php echo esc_attr(get_theme_mod('cl_res_header_text_color','#ffffff')); ?>;
    	}
    	header.site-header .main_header a{
    		color: <?php echo esc_attr(get_theme_mod('cl_res_header_link_color','#c8504b')); ?>;
    	}
    	header.site-header .main_header a:hover{
    		color: <?php echo esc_attr(get_theme_mod('cl_res_header_linkhover_color','#ffffff')); ?>;
    	}
    	header.entry-header h1 {
		    text-align: <?php echo esc_attr(get_theme_mod('cl_res_header_selected','left')); ?>;
		}
		header .top_header{
			width: 100%;
			background-color: <?php echo esc_attr(get_theme_mod('cl_res_topbar_bgcolor','#463c3c')); ?>;
		}
		header .top_branding {
			color: <?php echo esc_attr(get_theme_mod('cl_res_topbar_textcolor', '#aea9a9')); ?>;
		}
		header .top_branding a.social_icon i{
			color: <?php echo esc_attr(get_theme_mod('cl_res_social_icon_color', '#aea9a9')); ?>;
		}
		header .top_branding a.social_icon i:hover{
			color: <?php echo esc_attr(get_theme_mod('cl_res_social_icon_hovercolor','#ffffff')); ?>;
		}
    	p {
		    margin-bottom: <?php echo esc_attr(get_theme_mod('cl_res_margin_bottom','20'));?>px;
		}
    	body {
    		background-color: <?php echo esc_attr(get_theme_mod('content_background_textcolor','#463c3c')); ?>;
    		color: <?php echo esc_attr(get_theme_mod('body_textcolor','#aea9a9')); ?>;
			font-size: <?php echo esc_attr(get_theme_mod('cl_res_global_font_size','16')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('cl_res_global_font_weight','400')); ?>;
			text-transform : <?php echo esc_attr(get_theme_mod('cl_res_global_text_transform','capitalize')); ?>;
			line-height: <?php echo esc_attr(get_theme_mod('cl_res_global_lineheight','1.5')); ?>;
		}
		h1, h2, h3, h4, h5, h6 {
		    font-weight: <?php echo esc_attr(get_theme_mod('cl_res_global_heading_font_weight','400')); ?>;
			text-transform : <?php echo esc_attr(get_theme_mod('cl_res_glo_headingtext_transform','capitalize')); ?>;
		}
		#page.site h1 { 
			font-size: <?php echo esc_attr(get_theme_mod('cl_res_heading1_font_size','26')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('cl_res_heading1_font_weight','400')); ?>;
			text-transform : <?php echo esc_attr(get_theme_mod('cl_res_heading1text_transform','capitalize')); ?>;
		}
		#page.site h2{
			font-size: <?php echo esc_attr(get_theme_mod('cl_res_heading2_font_size','25')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('cl_res_heading2_font_weight','400')); ?>;
			text-transform : <?php echo esc_attr(get_theme_mod('cl_res_heading2text_transform','capitalize')); ?>;
		}
		#page.site h3 {
			font-size: <?php echo esc_attr(get_theme_mod('cl_res_heading3_font_size','20')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('cl_res_heading3_font_weight','400')); ?>;
			text-transform : <?php echo esc_attr(get_theme_mod('cl_res_heading3text_transform','capitalize')); ?>;
		}
		main.site-main{
			color: <?php echo esc_attr(get_theme_mod('content_textcolor','#aea9a9')); ?>;
			display: flex;
		    width: 100%;
		    flex-wrap: wrap;
		}
		main.site-main a{
			color: <?php echo esc_attr(get_theme_mod('content_textlink_textcolor','#c8504b')); ?>;
		}
		main.site-main a:hover{
			color: <?php echo esc_attr(get_theme_mod('content_linkhover_textcolor','#ffffff')); ?>;
		}
		main.site-main h1, h2, h3, h4, h5, h6{
			color: <?php echo esc_attr(get_theme_mod('content_heading_textcolor','#ffffff')); ?>;
		}

		.main_containor.grid_view{
			grid-template-columns: repeat(<?php echo esc_attr(get_theme_mod('cl_res_grid_column','2')); ?>, 1fr);
			grid-column-gap: <?php echo esc_attr(get_theme_mod('cl_res_grid_column_gap','20')); ?>px;
		}
		.site-main .nav-links a{
			color: <?php echo esc_attr(get_theme_mod('button_textcolor','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
			border: <?php echo esc_attr(get_theme_mod('cl_res_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('cl_res_border_radius','5')); ?>px;
			padding : <?php echo esc_attr(get_theme_mod('cl_res_border_padding','10px 10px')); ?>;
		}
		.site-main .nav-links a:hover {
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bghover_color','#c8504b')); ?>;
		}
		a.read_more{
			color: <?php echo esc_attr(get_theme_mod('button_textcolor','#ffffff')); ?> !important;
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
			border: <?php echo esc_attr(get_theme_mod('cl_res_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('cl_res_border_radius','5')); ?>px;
			padding : <?php echo esc_attr(get_theme_mod('cl_res_border_padding','10px 10px')); ?>;
		}
		a.read_more:hover {
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bghover_color','#c8504b')); ?>;
		}
		
		.wp-block-search .wp-block-search__button{
			color: <?php echo esc_attr(get_theme_mod('button_textcolor','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
			border: <?php echo esc_attr(get_theme_mod('cl_res_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('cl_res_border_radius','5')); ?>px;
			padding : <?php echo esc_attr(get_theme_mod('cl_res_border_padding','10px 10px')); ?>;
		}
		.wp-block-search .wp-block-search__button:hover{
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bghover_color','#c8504b')); ?>;
		}
		button, input[type="button"], input[type="reset"], input[type="submit"]{
			color: <?php echo esc_attr(get_theme_mod('button_textcolor','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
			border: <?php echo esc_attr(get_theme_mod('cl_res_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('cl_res_border_radius','5')); ?>px;
			padding : <?php echo esc_attr(get_theme_mod('cl_res_border_padding','10px 10px')); ?>;
		}
		button, input[type="button"], input[type="reset"], input[type="submit"]:hover{
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bghover_color','#c8504b')); ?>;
		}
		

    	/*footer in change css*/
    	footer.site-footer {
    		background-color: <?php echo esc_attr(get_theme_mod('cl_res_footer_bg_color','#3c3232')); ?>;
    		background-image: url(<?php echo esc_attr(get_theme_mod('feature_product'));?>);
    		background-size: <?php echo esc_attr(get_theme_mod('cl_res_background_size','cover'));?>;
    		background-position: <?php echo esc_attr(get_theme_mod('cl_res_background_position','center center'));?>;
    		background-attachment: <?php echo esc_attr(get_theme_mod('cl_res_background_attachment','Scroll'));?>;
    	}
    	.site-info{
    		color: <?php echo esc_attr(get_theme_mod('cl_res_footer_text_color','#aea9a9')); ?>;
    		text-align: <?php echo esc_attr(get_theme_mod('footer_text_alignment','center'));?>;
    		padding: <?php echo esc_attr(get_theme_mod('cl_res_footer_padding','10px 20px')); ?>;
    		font-size: <?php echo esc_attr(get_theme_mod('cl_res_footer_font_size','18')); ?>px;
    	}
    	.fooret_text {
		    margin: <?php echo esc_attr(get_theme_mod('cl_res_footer_margin','10')); ?>;
		}

		/*woocommerce in change css*/
		.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{
			color: <?php echo esc_attr(get_theme_mod('button_textcolor','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
			border: <?php echo esc_attr(get_theme_mod('cl_res_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('cl_res_border_radius','5')); ?>px;
			padding : <?php echo esc_attr(get_theme_mod('cl_res_border_padding','10px 10px')); ?>;
		}
		.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover{
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bghover_color','#c8504b')); ?>;
		}
		.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
			color: <?php echo esc_attr(get_theme_mod('button_textcolor','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
			border: <?php echo esc_attr(get_theme_mod('cl_res_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('cl_res_border_radius','5')); ?>px;
			padding : <?php echo esc_attr(get_theme_mod('cl_res_border_padding','10px 10px')); ?>;
		}
		.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bghover_color','#c8504b')); ?>;
		}
		.woocommerce ul.products li.product a.button {
			color: <?php echo esc_attr(get_theme_mod('button_textcolor','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
			border: <?php echo esc_attr(get_theme_mod('cl_res_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
			border-radius: <?php echo esc_attr(get_theme_mod('cl_res_border_radius','5')); ?>px;
			padding : <?php echo esc_attr(get_theme_mod('cl_res_border_padding','10px 10px')); ?>;			
		}
		.woocommerce ul.products li.product a.button:hover{
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bghover_color','#c8504b')); ?>;
		}
		.woocommerce-error, .woocommerce-info, .woocommerce-message{
			    background-color: <?php echo esc_attr(get_theme_mod('content_background_textcolor','#463c3c')); ?>;
    			color: <?php echo esc_attr(get_theme_mod('content_textcolor','#aea9a9')); ?>;
    			border-top: none;
		}
		.woocommerce div.product p.price, .woocommerce div.product span.price{
			color: <?php echo esc_attr(get_theme_mod('link_textcolor', '#c8504b')); ?>;
		}
		.woocommerce ul.products li.product .price{
			color: <?php echo esc_attr(get_theme_mod('link_textcolor', '#c8504b')); ?>;
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active{
			color: <?php echo esc_attr(get_theme_mod('button_textcolor','#ffffff')); ?>;
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
			border-bottom-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a:hover{
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;			
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active:hover{
			background-color: <?php echo esc_attr(get_theme_mod('button_bghover_color','#c8504b')); ?>;
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li{
			border: 1px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
    		background-color: <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover{
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li:hover{
			background-color: <?php echo esc_attr(get_theme_mod('button_bg_color','#3c3232')); ?>;
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li a{
			color: <?php echo esc_attr(get_theme_mod('button_texthover_color','#ffffff')); ?>;
		}		
		.woocommerce div.product .woocommerce-tabs ul.tabs::before{
			border-bottom: 1px solid <?php echo esc_attr(get_theme_mod('button_border_color','#c8504b')); ?>;
		}
		.woocommerce span.onsale{
			background-color: <?php echo esc_attr(get_theme_mod('cl_res_header_border_color','#3b3131')); ?>;
		}
		main.site-main{
			display: block;
		}
    	@media only screen and (max-width: 768px){
			.site-main h1 {
			    font-size: <?php echo esc_attr(get_theme_mod('cl_res_mobile_heading1_font_size','20')); ?>px;
			}
			.site-main h2 {
			    font-size: <?php echo esc_attr(get_theme_mod('cl_res_mobile_heading2_font_size','20')); ?>px;
			}
			.site-main h3 {
			    font-size: <?php echo esc_attr(get_theme_mod('cl_res_mobile_heading3_font_size','20')); ?>px;
			}
		}
		@media (min-width: 922px){
			.cl_res_sidebar {
			    max-width: <?php echo esc_attr(get_theme_mod('cl_res_global_width','1300'));?>px;
			    margin-left: auto;
			    margin-right: auto;
			    padding-left: 20px;
    			padding-right: 20px;
			}
			header.site-header .top_branding{
				max-width: <?php echo esc_attr(get_theme_mod('cl_res_global_width','1300'));?>px;
				margin-left: auto;
			    margin-right: auto;
			}
			header.site-header .main_header{
				max-width: <?php echo esc_attr(get_theme_mod('cl_res_global_width','1300'));?>px;
				margin-left: auto;
			    margin-right: auto;
			}
			.fooret_text {
			    max-width: <?php echo esc_attr(get_theme_mod('cl_res_global_width','1300'));?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		}
    </style>  
    <?php
}
add_action( 'wp_head', 'cl_res_customize_css');
?>