<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Jqlightbox extends Module {

	public $version = '1.1';

	public function info()
	{
		return array(
			'name' => array(
				'sl' => 'JQ LightBox',
				'en' => 'JQ LightBox',
			),
			'description' => array(
				'sl' => 'Modul JQ LightBox s pomočjo nastavitev omogoča prikaz slik v pojavnem oknu.',
				'en' => 'With JQ LightBox module you can set up lightbox that images can be shown in popup window.',
			),
			'frontend' => FALSE,
			'backend' => TRUE,
			'menu' => 'design',
		);
	}

	public function install()
	{
		$this->dbforge->drop_table('jqlightbox');

		$jqlightbox = "
			CREATE TABLE ".$this->db->dbprefix('jqlightbox')." (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `updated_on` int(15) DEFAULT NULL,
			  `published` int(1) DEFAULT '0',
			  `css` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
			  `js` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
		";

		$default_settings = "
			INSERT INTO " . $this->db->dbprefix('jqlightbox') . " (`css`, `js`) VALUES
			 ('/* jQuery lightBox plugin - Gallery style */
 #gallery {
  background-color: #444;
  padding: 10px;
  width: 520px;
 }
 #gallery ul { list-style: none; }
 #gallery ul li { display: inline; }
 #gallery ul img {
  border: 5px solid #3e3e3e;
  border-width: 5px 5px 20px;
 }
 #gallery ul a:hover img {
  border: 5px solid #fff;
  border-width: 5px 5px 20px;
  color: #fff;
 }
 #gallery ul a:hover { color: #fff; }',
 
 '$(function() {
  $(\'#gallery ul li a\').lightBox({
        imageLoading: \'{{ asset:image_path file=\"jqlightbox::lightbox-ico-loading.gif\" }}\',
 	imageBtnClose: \'{{ asset:image_path file=\"jqlightbox::lightbox-btn-close.gif\" }}\',
 	imageBtnPrev: \'{{ asset:image_path file=\"jqlightbox::lightbox-btn-prev.gif\" }}\',
 	imageBtnNext: \'{{ asset:image_path file=\"jqlightbox::lightbox-btn-next.gif\" }}\',
  });
});')";

		if($this->db->query($jqlightbox) AND $this->db->query($default_settings))
		{
			return TRUE;
		}
	}

	public function uninstall()
	{
		if($this->dbforge->drop_table('jqlightbox'))
		{
			return TRUE;
		}
	}

	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}

	public function help()
	{
		return TRUE;
	}
}
/* End of file details.php */
