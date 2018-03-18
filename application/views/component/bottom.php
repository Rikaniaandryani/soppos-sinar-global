
		<!-- jQuery 2.1.4 -->
		<script src="<?php echo base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- bxslider -->
		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.min.js"></script>
		<!-- owl-carousel -->
		<script src="<?php echo base_url();?>plugins/owl-carousel/owl.carousel.min.js"></script>
		<!-- jQueryUI -->
		<script src="<?php echo base_url();?>plugins/jQueryUI/jquery-ui.min.js"></script>



		<!-- SlimScroll -->
		<script src="<?php echo base_url();?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?php echo base_url();?>plugins/ckeditor/ckeditor.js"></script>


		<script>
		function openNav() {
		    document.getElementById("mySidenav").style.width = "250px";
		}

		function closeNav() {
		    document.getElementById("mySidenav").style.width = "0";
		}




		$(function(){
		  $('.bxslider').bxSlider({
				mode: 'fade',
		    auto: true,
				speed: 1000,
				captions: false,
				controls: false,
				pager: false,
				wrapperClass: 'bx-wrapper',
				touchEnabled: true
		  });
		});

	// 	$(document).ready(function() {
	// 			$('.owl-article').owlCarousel({
	// 	    loop:true,
	// 			dots: false,
	// 			autoplay:true,
	// 	    autoplayTimeout:10000,
	// 	    margin:10,
	// 	    nav:false,
	// 			responsive:{
	// 				0:{
	// 					items: 1
	// 				},
	// 				480: {
	// 					items: 1
	// 				},
	// 				600: {
	// 					items: 2
	// 				},
	// 				1000: {
	// 					items: 3
	// 				}
	// 			}
	// 	});
	//
	// });

	$(document).ready(function() {
		jQuery('.owl-new1').owlCarousel({
		loop:false,
		dots: false,
		autoplay:false,
		autoplayTimeout:3000,
		margin:20,
		navContainer: '.nextprev',
		nav: true,
		navText: [$('.owl-prev'), $('.owl-next')],
		responsive:{
			0:{
				items: 1, nav: true
			},
			480:{
				items: 1, nav: true
			},
			600:{
				items: 2, nav: true
			},
			768:{
				items: 2, nav: true
			},
			1000: {
				items: 3, nav: true
			}
		}


});
});

$(document).ready(function() {
jQuery('.owl-new2').owlCarousel({
loop:false,
dots: false,
autoplay:false,
autoplayTimeout:3000,
margin:20,
navContainer: '.nextprev2',
nav: true,
navText: [$('.owl-prev2'), $('.owl-next2')],
responsive:{
	0:{
		items: 1, nav: true
	},
	480:{
		items: 1, nav: true
	},
	600:{
		items: 2, nav: true
	},
	768:{
		items: 2, nav: true
	},
	1000: {
		items: 3, nav: true
	}
}


});

});

$(document).ready(function() {
jQuery('.owl-new3').owlCarousel({
loop:false,
dots: false,
autoplay:false,
autoplayTimeout:3000,
margin:20,
navContainer: '.nextprev3',
nav: true,
navText: [$('.owl-prev3'), $('.owl-next3')],
responsive:{
	0:{
		items: 1, nav: true
	},
	480:{
		items: 1, nav: true
	},
	600:{
		items: 2, nav: true
	},
	768:{
		items: 2, nav: true
	},
	1000: {
		items: 3, nav: true
	}
}

});


		});

		$(document).ready(function() {

		$('.thumb').hover(function(){
			$(this).find('.caption').fadeIn();
		},
		function(){
			$(this).find('.caption').fadeOut();
		}
	);
});

$(document).ready(function() {

$('.thumb2').hover(function(){
	$(this).find('.caption2').fadeToggle();
}
);
});

// $(function() {
//
// $('.thumb3').hover(function(){
// 	$(this).find('.caption3').fadeIn();
// },
// function(){
// 	$(this).find('.caption3').fadeOut();
// }
// );
// });



		</script>

	</body>
</html>
