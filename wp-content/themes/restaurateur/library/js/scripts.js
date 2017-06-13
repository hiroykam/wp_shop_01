jQuery(document).ready(function($){
	
	var $window = $(window),
        $menu = $('div.menu');
	
	function checkWindowSize() {
		var width = $window.width();
		if ( width < 824 ) {
			return $menu.addClass('nav-mobile');
		}
		$menu.removeClass('nav-mobile');
	}
	
	$window
        .resize(checkWindowSize)
        .trigger('checkWindowSize');
		
	checkWindowSize();
	
	/* prepend menu icon */
	$('div.menu').prepend('<div id="menu-icon">ナビ（タップすると開きます）</div>');
	$('#menu-filter-wrap').prepend('<div id="menu-item-icon">タップして項目を選択してください</div>');
	
        var $toggle = 0;
        var $is_fired = false;
        $(document).click(function() {
            if ($is_fired) {
                $is_fired = false;
                return;
            }
            if ($toggle & 0x1) {
                $toggle &= ~(0x1);
                $("div.menu > ul").slideToggle();
                $("#menu-icon").toggleClass("active");
            }
            if ($toggle & 0x2) {
                $toggle &= ~(0x2);
                $("#menu-filters").slideToggle();
                $("$menu-filters").toggleClass("active");
            }
      　});

	/* toggle nav */
	$("#menu-icon").on("click", function(){
                if ($toggle & 0x1) $toggle &= ~(0x1);
                else $toggle |= 0x1;
                if ($toggle & 0x2) {
                    $toggle &= ~(0x2);
                    $("#menu-filters").slideToggle();
                    $("$menu-filters").toggleClass("active");
                }  
                $is_fired = true;
		$("div.menu > ul").slideToggle();
		$(this).toggleClass("active");
	});

	$("#menu-item-icon").on("click", function(){
                if ($toggle & 0x2) $toggle &= ~(0x2);
                else $toggle |= 0x2;
                if ($toggle & 0x1) {
                    $toggle &= ~(0x1);
                    $("div.menu > ul").slideToggle();
                    $("#menu-icon").toggleClass("active");
                }
                $is_fired = true;
		$("#menu-filters").slideToggle();
		$(this).toggleClass("active");
	});

	/* preloader */
	$('#load-cycle').hide();
	
	/* jquery cycle */
	$('.cycle-slideshow').show();
	
	
	/* toggle search box */
	$("#search-icon").on("click", function(){
		$("#search-box-wrap").slideToggle();
	});
	
	$("#close-x").on("click", function(){
		$("#search-box-wrap").slideUp();
	});
	
	$(".post-box").bind("mouseenter", function() {
		$(this).find(".post-box-img").fadeOut(400);
	});
	
	$(".post-box").bind("mouseleave", function() {
		$(this).find(".post-box-img").fadeIn(400);
	});
	
	var $container = $('#grid-wrap');
	
	$container.isotope({
	  itemSelector : '.grid-box',
	});

	
	$(window).resize(function() {
		$container.isotope({
		  itemSelector : '.grid-box'
		});
	});
	
	
	$('a.menu-filter-link').click(function(){
	  var selector = $(this).attr('data-filter');

	  $container.isotope({ 
	  	itemSelector : '.grid-box',
	  	filter: selector,
	  });
	  return false;
	});


});
