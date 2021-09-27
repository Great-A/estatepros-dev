jQuery(document).ready(function ($) {

	//menu active

	$('#menu-header-menu a[href="' + window.location + '"]').addClass('active');

	//end menu active


	$('#reset').click(function () {
		$('.prof-box > div.col-lg-4').show();
		$(".prof-category ul li").siblings().removeClass('active');
	});



	$(".click-category").click(function (e) {


		$('.click-category.active').removeClass('active');
		$(this).addClass('active');


		e.preventDefault();
		var currentCategoryId = parseInt($(this).data('category-id')),
			professional = $('.prof-box > div.col-lg-4'),
			found = 0;
		professional.hide();
		for (var i in professional) {
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
				if (jqItem.is(':visible')) {
					found++;
				}
			}
		}
		$('.nobody-found').remove();
		if (found === 0) {
			$('.row.prof-box').append('<div class="nobody-found">Nobody found</div>');
		}
	});



	$(function () {
		var header = $(".header-container");
		$(window).scroll(function () {
			var scroll = $(window).scrollTop();

			if (scroll > 400) {
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
		if (newWindowWidth < 992) {
			$(".cross").hide();
			$(".header-menu").hide();
			$(".toggle").show();
		} else {
			$(".header-menu").show();
			$(".cross").hide();
			$(".toggle").hide();
		}
	}
	jQuery(window).on('load', function () {
		if (window.location.search) {
			$('#menu-item-27 a').addClass('active');
			var cat = window.location.search.split('=');
			if (cat && cat[1] !== undefined) {
				jQuery('.click-category[data-category-id=' + cat[1] + ']').trigger('click');
			}
		}
	});

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

	$("#more_posts").on("click", function (e) {

		e.preventDefault();
		$.ajax({
			url: my_ajax_object.ajax_url,
			data: {
				action: "more_post_ajax",
				offset: page * 2 //  page # x your default posts per page
			},
			success: function (data) {
				// add the posts to the container and add to your page count
				page++;
				$('.more-posts-show').append(data);

			},
			error: function (data) {
				// test to see what you get back on error
				console.log(data);
			}
		});

		$("#more_posts").attr("disabled", true); // Disable the button, temp.
		

	});
});



