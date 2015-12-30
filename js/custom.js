/*
	Project Name : Cleaning Landing page
	Author Company : Ewebcraft
	Project Date: 10 june, 2015
	Author Website : http://www.ewebcraft.com
	Author Email : ewebcraft@gmail.com
*/

$(window).load(function(){
            $('#loader').fadeOut("slow");
        });

(function($) {
	"use strict";

		new WOW().init();

		// $("#client-logo-slider").owlCarousel({
		// 	 		loop:true,
		// 	 		autoplay:true,
		// 	 		autoplayHoverPause:true,
		// 	 		autoPlay: 3000, //Set AutoPlay to 3 seconds
		// 			items : 4,
		// 			itemsDesktop : [1199,3],
		// 			itemsDesktopSmall : [979,3]
		// 		});

			/* Back-to-top */

			var offset =650;
			var duration = 300;
			$('.back-to-top').fadeOut(200);
			$(window).scroll(function() {
					if ($(this).scrollTop() > offset) {
						$('.back-to-top').fadeIn(200);
					} else {
						$('.back-to-top').fadeOut(200);
					}
				});

			$('.back-to-top').on("click",function(event) {
					event.preventDefault();
					$('html, body').animate({scrollTop: 0}, 500);
					return false;
				});

 })(jQuery);
