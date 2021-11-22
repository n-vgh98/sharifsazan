let btnShowMenuHorinzentalpage = document.querySelector(
	'.btn-show-menuHorinzentalpage'
);
let MenuPageScorll = document.querySelector('.MenuPageScorll');
let toggelscmenu = document.querySelectorAll('.toggel-sc-menu');
let closepagemenusc = document.querySelector('.closedmenupagesc');

btnShowMenuHorinzentalpage.addEventListener('click', () => {
	MenuPageScorll.classList.toggle('showMenuPageHorinzental');
});


closepagemenusc.addEventListener('click', () => {
	MenuPageScorll.classList.remove('showMenuPageHorinzental');
});

toggelscmenu.forEach((e) => {
	e.addEventListener('click', () => {
		e.nextElementSibling.classList.toggle('showWrappersecpage');
	});
});
