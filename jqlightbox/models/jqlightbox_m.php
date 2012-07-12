<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * The galleries module enables users to create albums, upload photos and manage their existing albums.
 *
 * @author 		Bojan Mazej
 * @package 	PyroCMS
 * @subpackage 	Jqlightbox Module
 * @category 	Modules
 * @license 	Apache License v2.0
 */
class Jqlightbox_m extends MY_Model
{
	protected $_table = 'jqlightbox';
	
	/**
	 * Get settings for jqlightbox
	 *
	 * @access public
	 * @return mixed
	 */
	public function get_settings()
	{
		return $this->db->get($this->_table)->row();
	}
	
	/**
	 * Update settings
	 *
	 * @author Bojan Mazej
	 * @access public
	 * @param array $input - The data to use for updating the DB record
	 * @return bool
	 */
	public function update($input)
	{
        return parent::update(1, array(
			'updated_on'		=> time(),
			'published'			=> $input['published'],
			'css'				=> $input['css'],
			'js'				=> $input['js']
		));
	}
}