jQuery(document).ready(function ($) {

	//menu active

	$('#menu-header-menu a[href="' + window.location + '"]').addClass('active');

	//end menu active


	$('#reset').click(function () {
		$('.prof-box > div.col-lg-4').show();
		$(".prof-category ul li").siblings().removeClass('active');
	});



	$(document).on("change", ".checkItemLocation", function (e) {
		professionalFilter();

	});

	$(document).on("change", ".checkItemCategories", function (e) {
		professionalFilter();
	});


	function professionalFilter() {

		var professional = $('.professional'),
			found = 0,
			checkedLocation = $('.checkItemLocation:checked'),
			checkedCategories = $('.checkItemCategories:checked');

		if (checkedLocation.length == 0 && checkedCategories.length == 0) {
			professional.show();
			$('.nobody-found').remove();

		} else {
			professional.hide();
			var locationArray = [];
			for (var k = 0; checkedLocation.length > k; k++) {
				var itemLocation = checkedLocation[k];
				locationArray.push(itemLocation.value);
			}

			for (var i = 0; professional.length > i; i++) {
				var itemProfessional = professional[i];
				var jqItem = $(itemProfessional);
				var cats = jqItem.data('post-category-id').toString();
				var catsList = cats.split(',');
				var profLocation = jqItem.data('location');

				for (var j = 0; checkedCategories.length > j; j++) {
					var checkedCategoryID = checkedCategories[j].value;

					if ($.inArray(checkedCategoryID, catsList) != -1 && $.inArray(profLocation, locationArray) != -1 || $.inArray(checkedCategoryID, catsList) != -1 && checkedLocation.length == 0) {
						jqItem.show();
					}
				}
				if ($.inArray(profLocation, locationArray) != -1 && checkedCategories.length == 0) {
					jqItem.show();
				}

				if (jqItem.is(':visible')) {
					found++;
				}

			}
			$('.nobody-found').remove();
			if (found === 0) {
				$('.row.prof-box').append('<div class="nobody-found">Nobody found</div>');
			}
		}


		// if (currentCategoryId != 0) {

		// 	for (var i in professional) {
		// 		var item = professional[i];
		// 		if (item.nodeName === 'DIV') {
		// 			var jqItem = $(item),
		// 				cats = jqItem.data('post-category-id').toString(),
		// 				catsList = cats.split(','),
		// 				itemLocation = jqItem.data('location').toString();
		// 			for (var j in catsList) {
		// 				if (parseInt(catsList[j]) === currentCategoryId && (currenLocation === itemLocation || (!currenLocation))) {
		// 					jqItem.show();
		// 				}
		// 			}
		// 			if (jqItem.is(':visible')) {
		// 				found++;
		// 			}
		// 			$('.nobody-found').remove();
		// 			if (found === 0) {
		// 				$('.row.prof-box').append('<div class="nobody-found">Nobody found</div>');
		// 			}
		// 		}
		// 	}
		// } else if (location) {
		// 	$('.nobody-found').remove();
		// 	professional.hide();
		// 	var prof_locations = $(".professional[data-location=" + currenLocation + "]");
		// 	prof_locations.show();
		// 	for (var j in prof_locations) {
		// 		var item = prof_locations[j];
		// 		if (item.nodeName === 'DIV') {
		// 			var jqItem = $(item);
		// 			if (jqItem.is(':visible')) {
		// 				found++;
		// 			}
		// 		}
		// 	}
		// 	if (found === 0) {
		// 		$('.row.prof-box').append('<div class="nobody-found">Nobody found</div>');
		// 	}
		// } else {
		// 	$('.nobody-found').remove();
		// 	professional.show();
		// }
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
		let searchParams = new URLSearchParams(window.location.search);
		if (searchParams.has('cat')) {
			var cat = searchParams.get('cat');		
				jQuery('#filter-category input[value=' + cat +']').trigger('click');
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


	});
});