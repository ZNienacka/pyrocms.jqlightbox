<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * JQ Lightbox Plugin
 *
 * Create a list of images
 *
 * @package		PyroCMS
 * @author		Bojan Mazej
 * @copyright	Copyright (c) 2011
 *
 */
class Plugin_Jqlightbox extends Plugin
{
	/**
	 * JQ Lightbox init
	 * 
	 * Set js and css for popup images
	 * 
	 * Usage:
	 * 
	 * {{ jqlightbox:init }}
	 * 
	 * @return	string
	 */
	function init()
	{
		$this->load->model('jqlightbox_m');
		
		$jqlightbox = $this->jqlightbox_m->get_settings();

		if( ! $jqlightbox->published)
		{
			return NULL;	
		}
		
		
		$lb = '<script type="text/javascript" src="' .js_path('jquery.lightbox-0.5.pack.js', 'jqlightbox') . '"></script>'."\n";
		$lb .= '<link href="' . css_path('jquery.lightbox-0.5.css', 'jqlightbox') . '" type="text/css" rel="stylesheet" />'.PHP_EOL;

		if($jqlightbox->css)
		{
            $lb .= '<style type="text/css">' . PHP_EOL . $jqlightbox->css . PHP_EOL . '</style>'.PHP_EOL;
        }
		
		if($jqlightbox->js)
        {
            $lb .= '<script type="text/javascript">' . PHP_EOL . $jqlightbox->js . PHP_EOL . '</script>'.PHP_EOL;
        }
		
		return $lb;
	}
}

/* End of file plugin.php */