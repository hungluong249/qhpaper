<footer id="footer">
	Footer
</footer>

<!-- main.js -->
<script src="<?php echo site_url('assets/js/') ?>main.js"></script>
<!-- owl-carousel JS -->
<script src="<?php echo site_url('assets/lib/') ?>owl-carousel/js/owl.carousel.min.js"></script>
<!-- fullPage JS -->
<script src="<?php echo site_url('assets/lib/') ?>fullpage/js/jquery.fullpage.min.js"></script>

<script type="text/javascript">
    $('#fullpage').fullpage({
        scrollBar: true,
        scrollingSpeed: 700,
        loopHorizontal: false,
        verticalCentered: true
    });

    $(".owl-carousel").owlCarousel({
		loop: true,
		nav: true,
		margin: 30,
		responsiveClass: true,
		responsive:{
		    0:{
		        items: 1
			},

			768:{
		        items: 3
			},

			992:{
		        items: 4,
				loop: false
			}
		}
	});
</script>

</body>
</html>