# JQLightBox Module for PyroCMS.

A jQuery LightBox gallery where images are shown in popup window.

# Summary

* Use it with Gallery module
* Change design of the gallery
* Configure javascript which images will open in popup window or some other options which uses JQLightBox
* Don't want to use it just unpublish it and thats it

# Compatible with

PyroCMS >= 2.1

#Dependencies

You can use it wit module Gallery

# How to integrate on the page
This is the code wich shows your particular gallery on any page and it works great 
with this module. If you change anything here band the gallery doesnt work as you
expected it is probably because you also have to change JS code in the settings.

If you want to use with gallery pages than you have to change the gallery module templates.

        <ul id="gallery">
            {{ galleries:images slug="dive" limit="5" }}
		<li><a href="{{ url:base }}files/large/{{ file_id }}" title="{{ name }}">
                    <img src="{{ url:site }}files/thumb/{{ file_id }}/75/75" alt="{{ description }}"/>
		</a></li>
            {{ /galleries:images }}
        </ul>

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
  		$('#gallery li a').lightBox({
			imageLoading: '{{ asset:image_path file="jqlightbox::lightbox-ico-loading.gif" }}',
 			imageBtnClose: '{{ asset:image_path file="jqlightbox::lightbox-btn-close.gif" }}',
 			imageBtnPrev: '{{ asset:image_path file="jqlightbox::lightbox-btn-prev.gif" }}',
 			imageBtnNext: '{{ asset:image_path file="jqlightbox::lightbox-btn-next.gif" }}',
  		});
	});
	
# That's it. Any questions? 