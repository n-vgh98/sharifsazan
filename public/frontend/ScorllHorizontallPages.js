const scrollContainer = document.querySelector('.main-scorllsHorinzentalPages');

let MenuPageScorll1 = document.querySelector('.MenuPageScorll');

scrollContainer.addEventListener('wheel', (evt) => {
	evt.preventDefault();
	scrollContainer.scrollLeft += evt.deltaY;
});

// scrollContainer.addEventListener('scroll', (e) => {
//     MenuPageScorll1.style.display = "none"

// })
