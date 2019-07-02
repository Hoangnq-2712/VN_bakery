
// ANIMATION

// (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
// 	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
// 	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

// ga('create', 'UA-51797107-1', 'auto');
// ga('send', 'pageview');

// END ANIMATION

 // GO TOP
 $(function () {
 	$(window).scroll(function () {
 		if ($(this).scrollTop() > 150)
 			$('.goTop').fadeIn();
 		else
 			$('.goTop').fadeOut();
 	});
 	$('.goTop').click(function () {
 		$('body,html').animate({scrollTop: 0}, 'slow');
 	});
 });


 $(function() {
 	var w = $(window).innerWidth();
 	var h = $(window).innerHeight();
 	var fixHeight = $("#fixHeight").height();
 	// alert(fixHeight);
 	if (w >768){
 		$('.height_h').css({'height': fixHeight-20});
 	}

 	

 	var dem = 0;
 	$('.menu2').hide();
 	$('.has_sub1').click(function(){
 		dem ++;
 		if(dem %2 != 0){
 			$(this).find('.menu2').slideToggle();
 		} else {
 			$(this).find('.menu2').slideUp();
 		}
 	});
 });

