let filtermenu = document.querySelector('.filter-menu');
let parentfilter = document.querySelector('.parent-filter-menu');
let closebtnfilter = document.querySelector('.close-btn-filter');
filtermenu.addEventListener('click', () => {
	parentfilter.classList.toggle('showfiltermenu');
});

closebtnfilter.addEventListener('click', () => {
	parentfilter.classList.remove('showfiltermenu');
});
