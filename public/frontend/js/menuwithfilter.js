let filtermenu = document.querySelector('.filter-menu');
let parentfilter = document.querySelector('.parent-filter-menu');
let closebtnfilter = document.querySelector('.close-btn-filter');
let MenuPageScorllClosed = document.querySelector('.MenuPageScorll ');
// showMenuPageHorinzental;
filtermenu.addEventListener('click', () => {
	parentfilter.classList.toggle('showfiltermenu');
	MenuPageScorllClosed.classList.remove('showMenuPageHorinzental');
});

closebtnfilter.addEventListener('click', () => {
	parentfilter.classList.remove('showfiltermenu');
});
