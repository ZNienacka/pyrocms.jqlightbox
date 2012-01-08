<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * The galleries module enables users to create albums, upload photos and manage their existing albums.
 *
 * @author 		PyroCMS Dev Team
 * @package 	PyroCMS
 * @subpackage 	Gallery Module
 * @category 	Modules
 * @license 	Apache License v2.0
 */
class Admin extends Admin_Controller
{
	/**
	 * Validation rules for settings of jqlightbox
	 *
	 * @var array
	 * @access private
	 */
	private $settings_validation_rules = array(
		array(
			'field' => 'published',
			'label' => 'lang:jqlightbox:published_label',
			'rules' => 'trim'
		),
		array(
			'field'	=> 'css',
			'label'	=> 'lang:jqlightbox:css_label',
			'rules'	=> 'trim'
		),
		array(
			'field'	=> 'js',
			'label'	=> 'lang:jqlightbox:js_label',
			'rules'	=> 'trim'
		)
	);

	public function __construct()
	{
		parent::__construct();

		// Load all the required classes
		$this->load->model('jqlightbox_m');
		$this->load->library('form_validation');
		$this->lang->load('jqlightbox');
		
		$this->load->helper('html');
	}

	/**
	 * Index method
	 *
	 * @access public
	 * @return void
	 */
	public function index()
	{
		$this->settings();
	}

	/**
	 * settings
	 *
	 * @access public
	 * @return void
	 */
	public function settings()
	{
		// Get jqlightbox settings
		$settings = $this->jqlightbox_m->get_settings();
		
		$this->form_validation->set_rules($this->settings_validation_rules);

		// Valid form data?
		if ($this->form_validation->run())
		{
			// Try to update the gallery
			if ($this->jqlightbox_m->update($this->input->post()) === TRUE )
			{
				$this->session->set_flashdata('success', lang('jqlightbox:update_success'));
			}
			else
			{
				$this->session->set_flashdata('error', lang('jqlightbox:update_error'));
			}
			
			redirect('admin/jqlightbox');
		}

		// Required for validation
		foreach ($this->settings_validation_rules as $rule)
		{
			if ($this->input->post($rule['field']))
			{
				$settings->{$rule['field']} = $this->input->post($rule['field']);
			}
		}
		
		$this->template
			->title($this->module_details['name'], lang('jqlightbox:jq_label'))
			->set('settings', $settings)
			->build('admin/form');
	}
}
