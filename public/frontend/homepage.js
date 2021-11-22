//  Initialize Swiper
var swiper = new Swiper('.mySwiper', {
	slidesPerGroup: 1,
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},

	autoplay: {
		delay: 4000,
		disableOnInteraction: false,
	},
});
