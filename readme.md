# JQLightBox Module for PyroCMS.

A jQuery LightBox gallery where images are shown in popup window.

# Summary

* Use it with Gallery module
* Change design of the gallery
* Configure javascript which images will open in popup window or some other options which uses JQLightBox
* Don't want to use it just unpublish it and thats it

# Compatible with

PyroCMS 2.0

# Usage

	{{ jqlightbox:init }}

# Example of CSS

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
	#gallery ul a:hover { color: #fff; }
 
# Example of JavaScript

	$(function() {
  		$('#gallery ul li a').lightBox({
			imageLoading: '{{ asset:image_path file="lightbox-ico-loading.gif" module="jqlightbox" }}',
 			imageBtnClose: '{{ asset:image_path file="lightbox-btn-close.gif" module="jqlightbox" }}',
 			imageBtnPrev: '{{ asset:image_path file="lightbox-btn-prev.gif" module="jqlightbox" }}',
 			imageBtnNext: '{{ asset:image_path file="lightbox-btn-next.gif" module="jqlightbox" }}',
  		});
	});
	
# That's it. Any questions? 