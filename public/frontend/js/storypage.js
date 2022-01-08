const scrollContainer = document.querySelector('.main-story-page');

// let MenuPageScorll1 = document.querySelector('.MenuPageScorll');

scrollContainer.addEventListener('wheel', (evt) => {
	evt.preventDefault();
	scrollContainer.scrollLeft += evt.deltaY;
});
