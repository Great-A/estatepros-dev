jQuery(document).ready(function ($) {

		//menu active
		
			$('#menu-header-menu a[href="' + window.location + '"]').addClass('active');
		
		//end menu active

	$(".click-category").click(function (e){

		$(this).parent().addClass('active').siblings().removeClass('active');
		
		e.preventDefault();
		var currentCategoryId = parseInt($(this).data('category-id')),
			professional = $('.prof-box > div.col-lg-4');
		professional.hide();
		for(var i in professional){
			var item = professional[i];
			if (item.nodeName === 'DIV') {
				var jqItem = $(item),
					cats = jqItem.data('post-category-id').toString(),
					catsList = cats.split(',');
				for (var j in catsList) {
					if (parseInt(catsList[j]) === currentCategoryId) {
						jqItem.show();
						
					}
				}
			} 
			
		} 
	});



	$(function () {
		var header = $(".header-container");
		$(window).scroll(function () {
			var scroll = $(window).scrollTop();

			if (scroll) {
				header.addClass("header-bg-scroll");
			} else {
				header.removeClass("header-bg-scroll");
			}
		});
	});

	$(".toggle").click(function () {
		$(".header-menu").slideToggle("slow", function () {
			$(".toggle").hide();
			$(".cross").show();
		});
	});

	$(".cross").click(function () {
		$(".header-menu").slideToggle("slow", function () {
			$(".cross").hide();
			$(".toggle").show();
		});
	});

	$(window).on("resize", function (e) {
		checkScreenSize();
	});

	checkScreenSize();

	function checkScreenSize() {
		var newWindowWidth = $(window).width();
		if (newWindowWidth < 991) {
			$(".cross").hide();
			$(".header-menu").hide();
			$(".toggle").show();
		} else {
			$(".header-menu").show();
			$(".cross").hide();
			$(".toggle").hide();
		}
	}


	$('.slider').slick({
		slidesPerRow: 3,
		rows: 2,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
		prevArrow: $('.prev'),
		nextArrow: $('.next'),
		responsive: [{
				breakpoint: 1201,
				settings: {
					slidesPerRow: 2,
					rows: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesPerRow: 1,
					rows: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesPerRow: 1,
					rows: 1
				}
			}
		]
	});
});