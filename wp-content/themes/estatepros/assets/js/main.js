jQuery(document).ready(function ($) {

	//menu active

	$('#menu-header-menu a[href="' + window.location + '"]').addClass('active');

	//end menu active


	$('#reset').click(function () {
		$('.prof-box > div.col-lg-4').show();
		$(".prof-category ul li").siblings().removeClass('active');
	});


	// $(document).on("change", "#location-filter", function (e) {
	// 	e.preventDefault();
	// 	var currentCategoryId = parseInt($('#filter-category').val()),
	// 		currenLocation = $(this).val();
	//     $('.nobody-found').remove();
	// 	professionalFilter(currentCategoryId, currenLocation);
	// });

	$(document).on("change", ".checkItemLocation", function (e) {

		professionalFilter(0, 0);

	});

	$(document).on("change", ".checkItemCategories", function (e) {
		// e.preventDefault();
		// var currentCategoryId = parseInt($(this).val()),
		// 	currenLocation = $('#location-filter').val();
		// $('.nobody-found').remove();
		// professionalFilter(currentCategoryId, currenLocation);
		professionalFilter(0, 0);
	});


	function professionalFilter(categoryID, location) {

		var currentCategoryId = categoryID,
			currenLocation = location,
			professional = $('.professional'),
			found = 0,
			checkedLocation = $('.checkItemLocation:checked');
		checkedCategories = $('.checkItemCategories:checked');

		professional.hide();
		for (var i in checkedLocation) {
			var itemLocation = checkedLocation[i];
			var itemLocationVal = itemLocation.value;
			var prof_locations = $(".professional[data-location=" + itemLocationVal + "]");
			prof_locations.show();
		}

		for (var j in checkedCategories) {
			var itemCategories = checkedCategories[j];
			var itemCategoriesVal = itemCategories.value;

			for (var i in professional) {
				var itemProfessional = professional[i],
				jqItem = $(itemProfessional),
				cats = jqItem.data('post-category-id').toString(),
				catsList = cats.split(',');
				if ($.inArray( itemCategoriesVal, catsList )!= -1) {
					jqItem.show();
				}
			}
		



			// var prof_locations = $(".professional[post-category-id=" + itemCategoriesVal + "]");
			// prof_locations.show();
		}

		if (checkedLocation.length == 0) {
			professional.show();
		}

		if (checkedCategories.length == 0) {
			professional.show();
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
		if (window.location.search) {
			var cat = window.location.search.split('=');

			if (cat && cat[1] !== undefined) {
				jQuery('#filter-category').val(cat[1]).trigger('change');
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


	});
});