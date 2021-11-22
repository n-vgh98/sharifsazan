let btnResponsiveMenu = document.querySelector('.btn-responsive-menu');
let parenetResMenu_withBtn = document.querySelector(
	'.parenet-res-menu-with-btn'
);

let = ulWrapperToggel = document.querySelector('.ul-wrapper-toggel');
let toggel = document.querySelectorAll('.toggel');

btnResponsiveMenu.addEventListener('click', () => {
	parenetResMenu_withBtn.classList.toggle('activeResMenu');
	btnResponsiveMenu.classList.toggle('showIconClose');
});

toggel.forEach((e) => {
	e.addEventListener('click', () => {
		e.nextElementSibling.classList.toggle('showToggel');
	});
});
