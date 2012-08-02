'use strict';
/* Set the favicon to the same color as theme background.
 * Will not override a user set favicon.
 */
jQuery().ready(function() {
	var icon_size = 32;
	var link = document.querySelector("link[rel~='icon']");
	if (!link) {
		link = document.createElement("link");
		link.setAttribute("rel", "shortcut icon");
		document.head.appendChild(link);
		
		var canvas = document.createElement("canvas");
		canvas.width = icon_size;
		canvas.height = icon_size;
		var context = canvas.getContext("2d");
	
		/* Get color */
		var color = jQuery("body").css("background-color");
		
		/* Color canvas */
		context.beginPath();
		context.rect(0,0,icon_size,icon_size);
		context.fillStyle = color;
		context.fill();
	
		/* set canvas as favicon */
		link.type = "image/x-icon";
		link.href = canvas.toDataURL();
	}
});
