'use strict';

(function ($) {
	"use strict";

	// Internet Explorer 10 in Windows Phone 8 viewport bug

	if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		var msViewportStyle = document.createElement('style');
		msViewportStyle.appendChild(document.createTextNode('@-ms-viewport{width:auto!important}'));
		document.head.appendChild(msViewportStyle);
	}

	/*Функционал кнопок сайдбара (open/close)*/
	function sidebarBtns() {

		if (window.matchMedia("(max-width: 1024px)").matches) {
			var btnClose = "<button class='btn-close'>" + '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="11" height="11" viewBox="0 0 11 11"><defs><path id="vm6qa" d="M1199.965 1621.858a.512.512 0 0 1 0-.713.512.512 0 0 1 .713 0l4.278 4.285 4.285-4.285a.503.503 0 0 1 .706 0c.2.199.2.52 0 .713l-4.278 4.278 4.278 4.286a.5.5 0 0 1 0 .713.503.503 0 0 1-.705 0l-4.286-4.286-4.278 4.286a.512.512 0 0 1-.713 0 .512.512 0 0 1 0-.713l4.278-4.286z"/></defs><g><g transform="translate(-1199 -1621)"><use  xlink:href="#vm6qa"/></g></g></svg>' + "</button>";
			var btnSidebar = "<button class='btn-sidebar'></button>";

			if ($('.sidebar .btn-close').length < 1) {
				/* Добавление кнопки для закрытия сайдбара */
				$('.sidebar').append(btnClose);
			}
			if ($('.btn-sidebar').length < 1) {
				/* Добавление кнопки для открытия сайдбара */
				$('.main-wrap').append(btnSidebar);
			}

			/* Кник на кнопку для закрытия сайдбара */
			$('.sidebar .btn-close').click(function () {
				$('.sidebar').removeClass('active');
			}); // end click

			/* Кник на кнопку для открытия сайдбара */
			$('.main-wrap .btn-sidebar').click(function () {
				$('.sidebar').addClass('active');
				/*
    * Закрытие сайдбара при книке на иную обл.
    * */
				$(document).click(function (e) {
					var $tgt = $(e.target);
					if (!$tgt.closest('.sidebar, .btn-sidebar').length) {
						$('.sidebar').removeClass('active');
					}
				}); // end click
			}); // end click
		} // end max-width: 1024px
		else {
				$('.sidebar .btn-close').remove();
				$('.main-wrap .btn-sidebar').remove();
			}
	} // end of function declaration 'sidebarBtns'


	/* Если хедер в позиции "absolute" , то следующему блоку задаем верхний паддинг
 *соответсвенно высоты хедера
 * */
	function headerHelperAutoHeight() {
		var headerAbs = $(".header-abs");
		var mainBanner = $('.main-banner');
		mainBanner.css('padding-top', headerAbs.outerHeight());
	} // end of function declaration 'headerHelperAutoHeight'

	function mobMenuBtnAddition() {
		if (window.matchMedia("(max-width: 768px)").matches) {
			/*Добавление кнопки моб.меню для + открытия мобильного меню*/
			var mobMenuBtn = "<button class='btn-mob-menu'></button>";
			if ($('.btn-mob-menu').length < 1) {
				$('.header-nav .logo').after(mobMenuBtn);
				$('.btn-mob-menu').click(function () {
					$(this).toggleClass('active');
					$('.header .main-menu').toggleClass('active');
					$(document).click(function (e) {
						var $tgt = $(e.target);
						if (!$tgt.closest('.header .main-menu, .btn-mob-menu').length) {
							$('.header .main-menu, .btn-mob-menu').removeClass('active');
						}
					}); // end click
				}); // end click
			}
		} // end max-width: 768px
		else {
				$('.header-nav .btn-mob-menu').remove();
			}
	} // end of func declaration  "mobMenuBtnAddition"


	function btnToUpAddition() {
		var btnToUp = '<button class="btn-to-up"><svg version="1.1" id="angleUp" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n' + '\t width="30.728px" height="30.729px" viewBox="0 0 30.728 30.729" style="enable-background:new 0 0 30.728 30.729;"\n' + '\t xml:space="preserve">\n' + '<g>\n' + '\t<path d="M29.996,24.08c-0.977,0.978-2.561,0.978-3.535,0L15.365,12.985L4.268,24.081C3.78,24.568,3.14,24.812,2.5,24.812\n' + '\t\ts-1.28-0.244-1.768-0.731c-0.977-0.978-0.977-2.56,0-3.535L15.364,5.915l14.63,14.629C30.972,21.521,30.972,23.104,29.996,24.08z"\n' + '\t\t/>\n' + '</g>\n' + '</svg></button>';
		$('body').append(btnToUp);
		$('.btn-to-up').click(function () {
			$("html, body").animate({ scrollTop: 0 }, 1000);
		});
		$(window).scroll(function () {
			$(this).scrollTop() > $(this).outerHeight() ? $('.btn-to-up').fadeIn() : $('.btn-to-up').fadeOut();
		});
	} // end of func declaration 'btnToUpAddition'


	// $("body").prepend('<div id="preloader">Loading...</div>');

	$(document).ready(function () {
		// $("#preloader").remove();

		function cl(data) {
			console.log(data);
		}

		/*TABS*/
		$('ul.tabs__caption').on('click', 'li:not(.active)', function () {
			var that = $(this);
			$(this).addClass('active').siblings().removeClass('active').closest('.tabs').find('.tabs__wrap').each(function () {
				$(this).children('.tabs__content').removeClass('active').eq(that.index()).addClass('active');
			}); // end each
		});

		/* Функционал кнопок и поля в карточке товара */
		$('.plus-minus-group').each(function () {
			if (parseInt($(this).children('input').val()) === 1) {
				$(this).find($('button.btn-minus')).addClass('disable');
			}
			var input = $(this).find('input');
			var productPrice = $(this).parent().find($('.price-value'));
			var productPriceValue = parseInt(productPrice.text());
			input.on('input', function () {
				var inputVal = parseInt($(this).val());
				if (!isNaN(inputVal)) {
					productPrice.text(productPriceValue * inputVal);
				}
			});
			$(this).find('button').click(function () {
				var inputCurrentVal = parseInt(input.val());
				var quality = $(this).data('quality');
				if (quality === 'plus') {
					inputCurrentVal++;
					input.val(inputCurrentVal);
					productPrice.text(productPriceValue * inputCurrentVal);
					$(this).parent().find($('button.btn-minus')).removeClass('disable');
				} else if (quality === 'minus') {
					if (inputCurrentVal >= 2) {
						inputCurrentVal--;
						input.val(inputCurrentVal);
						productPrice.text(productPriceValue * inputCurrentVal);
					}
					if (inputCurrentVal == 1) {
						$(this).addClass('disable');
					}
				}
			}); // end click
		}); // end each

		/*Функционал кастомного селекта (одиночный выбор)*/
		$('.single-select>ul>li').click(function () {
			var that = $(this);
			$(this).closest('.custom-select ul').find('li').removeClass('selected');
			$(this).addClass('selected');
		}); // end click
		/*Функционал кастомного селекта (множественный выбор)*/
		$('.multiple-select>ul>li').click(function () {
			$(this).toggleClass('selected');
		}); // end click
		/*Функционал кастомного селекта - кнопка выпадения списка*/
		$('.custom-select .btn-drop').click(function () {
			$(this).siblings('ul').toggleClass('active');
		}); // end click

		$(window).resize(function () {
			headerHelperAutoHeight();
			sidebarBtns();
			mobMenuBtnAddition();
		});

		headerHelperAutoHeight();
		sidebarBtns();
		mobMenuBtnAddition();
		btnToUpAddition();

		// let papers = [1,10,20,30,40,100];
		//
		// function myFunc (arr){
		// 	let fstFolder = [];
		// 	let sndFolder = [];
		// 	let totalFstFolder = 0;
		// 	let totalSndFolder = 0;
		// 	for (let i=0; i<arr.length; i++){
		//
		// 		if(i % 2 === 0){
		// 			fstFolder.push(arr[i]);
		// 			totalFstFolder+=arr[i];
		// 		} else {
		// 			sndFolder.push(arr[i]);
		// 			totalSndFolder+=arr[i];
		// 		}
		// 	}
		//
		//
		// 	if(totalFstFolder < totalSndFolder){
		// 		let diff = totalSndFolder - totalFstFolder;
		// 		for(let i=0; i<sndFolder.length; i++){
		// 			if(sndFolder[i] < diff && sndFolder[i -1 ] < diff){
		// 				fstFolder.splice(0, 1, sndFolder[i]);
		// 			}
		// 		}
		// 		sndFolder.splice(0, 1, Math.min(fstFolder));
		//
		// 	}
		// 	cl("totalFstFolder " + totalFstFolder);
		// 	cl("totalSndFolder " + totalSndFolder);
		//
		//
		//
		// 	for(let i=0; i<fstFolder.length; i++){
		// 		cl("fstFolder " + fstFolder[i]);
		// 	}
		// 	for(let i=0; i<sndFolder.length; i++){
		// 		cl("sndFolder " + sndFolder[i]);
		// 	}
		//
		//
		// }
		//
		//
		// myFunc(papers);

		//
		// let pechatNakleyek = $('#pechatNakleyek');
		// pechatNakleyek.submit(function (e) {
		// 	$(this).find('input').each(function () {
		// 		let formaVal =  $(this).find('input').attr('name', 'forma').val();
		// 		let sizeVal =  $(this).attr('name', 'size').val();
		// 		let heightVal =  $(this).attr('name', 'custom-height').val();
		// 		let widthVal =  $(this).attr('name', 'customWidth').val();
		// 		let widthValwww =  $(this).attr('name', 'customWidth');
		// 		e.preventDefault();
		// 	});
		// });

		$('#pechatNakleyek .set-sizes input').on('focus', function () {
			$('.kinds-of-forms.sizes input').each(function () {
				$(this).prop("checked", false);
			});
		});

		$('#pechatNakleyek').submit(function (e) {

			e.preventDefault();

			var forma = $('input[name="forma"]:checked').val();
			var size = $('input[name="size"]:checked').val();
			var customHeight = $('input[name="customHeight"]').val();
			var customWidth = $('input[name="customWidth"]').val();
			var customQauntity = $('input[name="qauntity"]').val();

			$('#testform input[name="forma"]').val(forma);
			$('#testform input[name="size"]').val(size);
			$('#testform input[name="customHeight"]').val(customHeight);
			$('#testform input[name="customWidth"]').val(customWidth);
			$('#testform input[name="qauntity"]').val(customQauntity);
		});

		$('#pechatNakleyek').submit(function (e) {
			e.preventDefault();
		});

		$("[data-fancybox]").fancybox({
			afterShow: function afterShow() {

				var forma = $('input[name="forma"]:checked').val();
				var size = $('input[name="size"]:checked').val();
				var customHeight = $('input[name="customHeight"]').val();
				var customWidth = $('input[name="customWidth"]').val();
				var customQauntity = $('input[name="qauntity"]').val();

				$('#testform input[name="forma"]').val(forma);
				$('#testform input[name="size"]').val(size);
				$('#testform input[name="customHeight"]').val(customHeight);
				$('#testform input[name="customWidth"]').val(customWidth);
				$('#testform input[name="qauntity"]').val(customQauntity);
			}
		});

		$('.examples-of-work a').fancybox({
			beforeShow: function beforeShow() {},
			afterShow: function afterShow() {
				$('.fancybox-content .examples-of-work__descr').remove();
				var descr = $('.examples-of-work a')[this.index];
				$(descr).find('.examples-of-work__descr').clone().appendTo($('.fancybox-content'));
			}
		});
	}); // end ready
})(jQuery);