let tinp = document.querySelectorAll('.tinp');

tinp.forEach((allinput) => {
	allinput.addEventListener('click', () => {
		allinput.classList.toggle('showborderinput');
		allinput.previousElementSibling.classList.remove('showborderinput');
	});
});
