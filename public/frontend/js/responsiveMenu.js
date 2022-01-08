let btnResponsiveMenu = document.querySelector('.btn-responsive-menu');
let parenetResMenu_withBtn = document.querySelector(
	'.parenet-res-menu-with-btn'
);

let navresmenubtn = document.querySelector('.nav-res-menu-btn');
let ulWrapperToggel = document.querySelector('.ul-wrapper-toggel');
let toggel = document.querySelectorAll('.toggel');

btnResponsiveMenu.addEventListener('click', () => {
	parenetResMenu_withBtn.classList.toggle('activeResMenu');
	btnResponsiveMenu.classList.toggle('showIconClose');
	document.body.classList.toggle('ignoreScorllforResmenu');
});

toggel.forEach((e) => {
	e.addEventListener('click', () => {
		e.nextElementSibling.classList.toggle('showToggel');
	});
});

document.addEventListener('scroll', () => {
	let wrapperresponsivmenu = document.querySelector(
		'.wrapper-responsive-menu'
	);

	let sy = window.scrollY;
	if (sy >= 50) {
		wrapperresponsivmenu.classList.add('scollresponsivemenu');
	} else if (sy < 50) {
		wrapperresponsivmenu.classList.remove('scollresponsivemenu');
	}
});
