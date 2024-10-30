<?php
/*
Plugin Name: Mootools Libraries
Plugin URI: http://wordpress.org/extend/plugins/mootools-libraries/
Description: Attach a flexible Mootools Libraries.
Version: 1.1
Author: E.R. Nurwijayadi
Author URI: http://iluni.org
*/

// To-do:  
// -- what if empty form?

define('MOOTOOLS_LIBRARIES', 1);

if (!is_admin()) {
	add_action('init','mootools_libraries');
	add_shortcode('clientcide', 'shortcode_clientcide');
	add_shortcode('mediabox-advance', 'shortcode_mediaboxadvance');
}	
else {
	add_action('admin_menu', 'menu_plugin_moolib');	
	
	// WP>2.8 required
	global $wp_version;
	if ( version_compare( $wp_version, '2.8', '>=' ) )
		add_filter( 'plugin_row_meta', 'set_plugin_meta_moolib', 10, 2 );
}

function get_moolib_fullpath($path, $script) 	
{
	if (strpos($script, 'http://') === false)
		$script = $path.$script;
	return	$script;
}

function mootools_libraries() 
{
	$plugin = new MooLibPlugin;
	$options = $plugin->get_options();
	
	$jsmoo	= get_bloginfo('wpurl').$options['path'].'/';
	
	$core = get_moolib_fullpath($jsmoo, $options['core']);
	$more = get_moolib_fullpath($jsmoo, $options['more']);
	$cide = get_moolib_fullpath($jsmoo, $options['cide']);
	$mbox = get_moolib_fullpath($jsmoo, $options['mbox']);

	wp_register_script('mootools-core',		$core);
	wp_register_script('mootools-more',		$more, array('mootools-core'));
	wp_register_script('clientcide', 		$cide, array('mootools-more'));
	wp_register_script('mediabox-advance',	$mbox, array('mootools-more'));
	
	wp_register_style('mediabox-advance', 	$jsmoo.$options['style-mbox']);

	if ($options['allpages'])	{
		wp_enqueue_script('mootools-core');
		wp_enqueue_script('mootools-more');
	}	
}

function menu_plugin_moolib() 
{
	add_options_page(
  		'Options: Mootools Libraries', 
  		'Plugin: Mootools Lib', 
  		9, basename(__FILE__), 
 		'options_plugin_moolib');
}

// WP>2.8 required
function set_plugin_meta_moolib($links, $file) {
	// after other links
	if ($file == plugin_basename(__FILE__)) 
	{		
		$url	= 'options-general.php?page=mootools-libraries.php';
		$link	= '<a href="'.$url.'">'.__('Settings').'</a>';	
		return array_merge( $links, array($link) ); 
	}
	else
		return $links;
}

function options_plugin_moolib() {
	$plugin = new MooLibPlugin;
	$plugin->display_options();		
}

/*-- ShortCode --*/
function shortcode_mootools()
{
	wp_enqueue_script('mootools-core');
	wp_enqueue_script('mootools-more');
}	

function shortcode_clientcide()
{
	wp_enqueue_script('clientcide');
}	

function shortcode_mediaboxadvance()
{
	wp_enqueue_script('mediabox-advance');
	wp_enqueue_style('mediabox-advance');
}	

/*-- The Mootools Library Plugin Class --*/
/*---------------------------------------*/

class MooLibPlugin 
{	// PHP 4 Class
	var $options;
	var $option_name = 'plugin_moolib';
	
	var $hidden_field_name = 'plg_submit_hidden';
	var $isPost = false;
	

	/*-- View/ Template --*/
	
	function display_options()
	{
		$this->init_options_value();
		
		$isPost	= $this->isPost;
		$options =& $this->options;
		$hidden_field_name = $this->hidden_field_name;
		
		include('tmpl/form.php');
	}
		
	function get_default_options()
	{
    	return array (
    		// each css in a file    	
    		'allpages' => true,
    		'path' => '/wp-includes/js/mootools',
    		'core' => 'mootools-1.2.4-core-nc.js',
    		'more' => 'mootools-1.2.4.2-more-nc.js',
    		'cide' => 'clientcide.2.2.0.compressed.js',
    		'mbox' => 'mediaboxAdv-1.1.6.js',
    		'style-mbox' => 'mediaboxAdvBlack.css'
    	); 
	} 	
	
	function get_options()
	{
		$this->init_options_value();
		return $this->options;
	}	
	
	function init_options_value()
	{
		$default = $this->get_default_options();
    	$this->override_default_options($default, $this->option_name);	

    	// See if the user has posted us some information
    	// If they did, this hidden field will be set to 'Y'
    	$this->isPost = ($_POST[ $this->hidden_field_name ] == 'Y');
    	if( $this->isPost ) {
		
			// Read their posted value
			foreach($this->options as $opt_name => $opt_val)
        		$this->options[$opt_name] = $_POST[ $opt_name ];
        	
			// Save the posted value in the database
			update_option( $this->option_name, $this->options );	
		}
	}	
	
	function override_default_options($default, $key)
	{
    	// Read in existing option value from database
    	$saved_options = get_option( $key );

    	if (!empty($saved_options))	
			foreach($saved_options as $opt_name => $opt_val)
				$default[$opt_name] = $saved_options[$opt_name];
				
		$this->options =& $default;				
	}	
	
}
