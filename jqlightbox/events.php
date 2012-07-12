<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Jqlightbox Event Class - this class loads the snippets library when the public
 * controller is called.  Keeps from users having to add to config/autoload
 * 
 * @package		PyroCMS
 * @subpackage          Jqlightbox
 * @category            events
 * @author		Bojan Mazej
 */

class Events_Jqlightbox 
{
    protected $ci;
    
    public function __construct()
    {
        $this->ci =& get_instance();
        
        // register the public_controller event when this file is autoloaded
        Events::register('public_controller', array($this, 'run'));
     }
    
    // this will be triggered by the Events::trigger('public_controller') code in Public_Controller.php
    public function run()
    {
        $this->ci->load->model('jqlightbox/jqlightbox_m');
		
        $jqlightbox = $this->ci->jqlightbox_m->get_settings();
        
        if( ! $jqlightbox->published)
        {
                return NULL;	
        }
                
        Asset::add_path('jqlightbox', 'addons/shared_addons/modules/jqlightbox/');
        
        $this->ci->template->append_js('jqlightbox::jquery.lightbox-0.5.pack.js');
        $this->ci->template->append_css('jqlightbox::jquery.lightbox-0.5.css');
        
        if($jqlightbox->css)
	{
            $this->ci->template->append_metadata('<style type="text/css">' . PHP_EOL . $jqlightbox->css . PHP_EOL . '</style>'.PHP_EOL);
        }
	
        if($jqlightbox->js)
        {
            $this->ci->template->append_metadata('<script type="text/javascript">' . PHP_EOL . $jqlightbox->js . PHP_EOL . '</script>'.PHP_EOL);
        }
    }
    
}