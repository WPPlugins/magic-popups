<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.vozax.com/magic-popups/
 * @since      1.0.0
 *
 * @package    Magic_Popups
 * @subpackage Magic_Popups/public/partials
 */
?>
<?php
function vozaxpopup_shortcode($atts,$content) {
	$args = array( 'post_type' => 'post', 'posts_per_page' => 1 , 'p' => $atts['data']); 
	$popup_loop = new WP_Query( $args );
	while ( $popup_loop->have_posts() ) : $popup_loop->the_post(); 
	$array = explode("(", $atts['display']);
	
	$displaytime = $array[0];
	
		if($atts['type']==1 && $displaytime=="onload")
		{
		//$postdata = the_content();

			wp_enqueue_style( 'full-style', plugin_dir_url( __FILE__ ).'../css/monolog.css');
			wp_enqueue_script('full-script', plugin_dir_url( __FILE__ ). '../js/monolog.js','','', true);
			//Register the script
			wp_register_script( 'fpopup-js', plugin_dir_url( __FILE__ ).'../js/popup.js','','',true );
			$translation_array = array(
			'datadisplay' => $atts['display']
			);
			wp_localize_script( 'fpopup-js', 'fullpopup', $translation_array );
			//wp_enqueue_script( 'fpopup-js');
			$html.= wp_enqueue_script( 'fpopup-js');
			?>
			<div id="postcontent" style="display:none;"><?php the_content(); ?></div>
			<?php
			//$html.= $postdata;

		}

		elseif($atts['type']==1 && $displaytime=="wait")
		{

			wp_enqueue_style( 'full-style1', plugin_dir_url( __FILE__ ).'../css/monolog.css');
			wp_enqueue_script('full-script1', plugin_dir_url( __FILE__ ). '../js/monolog.js','','', true);
			//Register the script
			wp_register_script( 'fpopup-js', plugin_dir_url( __FILE__ ).'../js/popup.js','','',true );
			$translation_array = array(
			'datadisplay' => $atts['display']
			);
			wp_localize_script( 'fpopup-js', 'fullpopup', $translation_array );
			//wp_enqueue_script( 'fpopup-js');
			$html.= wp_enqueue_script( 'fpopup-js');
			?>
			<div id="postcontent" style="display:none;"><?php the_content(); ?></div>
			<?php

		}
		
		 elseif($atts['type']==2 && $displaytime=="onload")
		{
			wp_enqueue_style( 'mini_popup', plugin_dir_url( __FILE__ ).'../css/mini.css');
			wp_enqueue_style( 'mini1_popup', plugin_dir_url( __FILE__ ).'../css/mini-popup.css');
			
		 //Register the script
			wp_register_script( 'jquerymini-js', plugin_dir_url( __FILE__ ).'../js/mini.js','','',true );
			$translation_array = array(
			'dataeffect' => $atts['style'],
			'datadisplay' => $atts['display']
			);
			wp_localize_script( 'jquerymini-js', 'style_effect', $translation_array );
			wp_enqueue_script( 'jquerymini-js');
			wp_enqueue_script( 'minipopup-js', plugin_dir_url( __FILE__ ).'../js/mini-popup.js','','', true);
			$html.="<div id='test-popup' class='white-popup mfp-with-anim mfp-hide'>".get_the_content()."<button title='Close (Esc)' type='button' class='mfp-close'>×</button></div>";
		}
		elseif($atts['type']==2 && $displaytime=="wait")
		{
			wp_enqueue_style( 'mini_popupcss', plugin_dir_url( __FILE__ ).'../css/mini.css');
			wp_enqueue_style( 'mini1_popuplib', plugin_dir_url( __FILE__ ).'../css/mini-popup.css');
			wp_enqueue_script( 'minilib-js', plugin_dir_url( __FILE__ ).'../js/mini-popup.js','','',true);
		 //Register the script
			wp_register_script( 'jquerymini-js', plugin_dir_url( __FILE__ ).'../js/mini.js','','',true );
			$translation_array = array(
			'dataeffect' => $atts['style'],
			'datadisplay' => $atts['display']
			);
			wp_localize_script( 'jquerymini-js', 'style_effect', $translation_array );
			wp_enqueue_script( 'jquerymini-js');
			
			$html.="<div id='test-popup' class='white-popup mfp-with-anim mfp-hide'>".get_the_content()."<button title='Close (Esc)' type='button' class='mfp-close'>×</button></div>";
		}
		
		else{
			
			echo "Try Again";
		}

endwhile; 
				return do_shortcode($html);
  }
add_shortcode('magicpopup', 'vozaxpopup_shortcode');
add_filter('widget_text', 'do_shortcode');
?>