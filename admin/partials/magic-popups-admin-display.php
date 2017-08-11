<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.vozax.com/magic-popups/
 * @since      1.0.0
 *
 * @package    Magic_Popups
 * @subpackage Magic_Popups/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

	<h2><?php print $GLOBALS['title']; ?></h2>
	<div class="wrap">
	<p style="border-left:3px solid #FFBA00;padding:14px; background:white;">Create Popup to display post in it.</p>
	<div id="vzx-containr">
	<div class="vzx-wrap-inner">
	<form action="#" method="post">
<div class="containerfiled">
    <div class="fieldgroup">
    
        <label for="popuptype" class="labelh">Popup Type</label>
  
        <select id="popuptype" name="popuptype" class="slctbox">
            <option selected="selected" value="1">Full</option>
            <option value="2">Center</option>
            
        </select>
  
</div>
	<div class="fieldgroup" id="ministyle" style="display:none;">
    
        <label for="popupstyle" class="labelh">Popup Style</label>
  
   <div class="fieldslctbox">
        <select id="popupstyle" name="popupstyle" class="slctbox">
            <option selected="selected" value="mfp-zoom-in">Zoom</option>
            <option value="mfp-newspaper">Newspaper</option>
            <option value="mfp-move-horizontal">Horizontal move</option>
            <option value="mfp-move-from-top">Move from top</option>
            <option value="mfp-3d-unfold">3d unfold</option>
            <option value="mfp-zoom-out">Zoom out</option>
            
        </select>
    </div>
</div>
<div class="fieldgroup">
    
        <label for="wppost" class="labelh">Post</label>
    
    <div class="fieldslctbox">
        <select id="popuppost" name="popuppost" class="slctbox">
		<?php 
				global $post;
				$args = array(
				'posts_per_page' => -1, // or -1 if you want all
				'orderby'=>'post_date',
				'order' => 'DESC'
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ):
				$the_query->the_post();
				$post_id = get_the_title();
				
			?>
			<option value="<?php the_ID(); ?>"><?php echo $post_id; ?></option>
			<?php
			endwhile;
			endif;?>
            
        </select>
    </div>
</div>
<div class="fieldgroup">
    
        <label for="popupdisplay" class="labelh">Display</label>
		
        <select id="popupdisplay" name="popupdisplay" class="slctbox">
            <option selected="selected" value="onload">Onload</option>
            <option value="wait">wait</option>
        </select>
		<span id="waitspan"  style="display:none;float:left;">
		<input type="text" name="waitfor" id="waitfor" placeholder="Enter only number">
		seconds</span>
	
</div>

	<div class="fieldgroup"><input class="button-primary" type="submit" name="Save" value='<?php _e('Create Popup'); ?>' id="submitbutton" /></div>
	<div class="fieldgroup" style="display:block;"><?php echo "<input type='text' id='shorttext' style='display:none; width:50%;margin-top: 10px;'>"; ?></div>
	</form>
	</div>
</div>
</div>
</div>
