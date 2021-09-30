jQuery(document).ready(function ($) {

	//menu active

	$('#menu-header-menu a[href="' + window.location + '"]').addClass('active');

	//end menu active


	$('#reset').click(function () {
		$('.prof-box > div.col-lg-4').show();
		$(".prof-category ul li").siblings().removeClass('active');
	});


	$(document).on("change", "#location-filter", function (e) {
		e.preventDefault();
		var currentCategoryId = parseInt($('#filter-category').val()),
			currenLocation = $(this).val();

		professionalFilter(currentCategoryId, currenLocation);
	});


	$('#filter-category').change(function (e) {

		e.preventDefault();
		var currentCategoryId = parseInt($(this).val()),
			currenLocation = $('#location-filter').val();

		professionalFilter(currentCategoryId, currenLocation);
	});


	function professionalFilter(categoryID, location) {

		var currentCategoryId = categoryID,
			currenLocation = location,
			professional = $('.professional'),
			found = 0;

		console.log(currentCategoryId);
		if (currentCategoryId != 0) {

			professional.hide();
			for (var i in professional) {
				var item = professional[i];
				if (item.nodeName === 'DIV') {
					var jqItem = $(item),
						cats = jqItem.data('post-category-id').toString(),
						catsList = cats.split(','),
						itemLocation = jqItem.data('location').toString();
					for (var j in catsList) {
						if (parseInt(catsList[j]) === currentCategoryId  && (currenLocation === itemLocation || (!currenLocation))) {
							jqItem.show();
						}
					}
					if (jqItem.is(':visible')) {
						found++;
					}
				}
			}
		} else if(location){

			professional.hide();

			$(".professional[data-location=" + currenLocation + "]").show();
		} else {
			professional.show();
		}
	}


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
			type: 'post',
			data: {
				action: "more_post_ajax",
				offset: $('.preload-posts').length

			},
			success: function (data) {

				$('.more-posts-show').append(data);
			},
			error: function (data) {
				console.log(data);
			},
			complete: function () {
				var allPostsCount = $('#postsCount').val();
				var alreadyDisplayCount = $('.preload-posts').length;
				if (allPostsCount == alreadyDisplayCount) {
					$("#more_posts").addClass("disabled-btn");
				}
			}

		});
<<<<<<< HEAD
<<<<<<< HEAD

		$("#more-posts-btn-wrapp").attr("disabled", true); // Disable the button, temp.
=======
>>>>>>> be0665372182f4d0da795a089392b302fefb8bb3
		
=======

>>>>>>> 9a723ee6eb2b6c608f648897fea7020cc18d7a42

	});
});



