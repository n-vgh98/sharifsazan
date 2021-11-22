let btnmorenews = document.querySelectorAll('.btn-more-news');

let textboxnews = document.querySelectorAll('.text-box-news');

btnmorenews.forEach((btns, indexbtn) => {
	btns.addEventListener('click', () => {
		textboxnews.forEach((txt, indextext) => {
			if (indexbtn == indextext) {
				txt.classList.toggle('showtextnews');
			}
		});
	});
});
