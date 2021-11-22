// menu rahanemaye davat

$(document).ready(function () {
	$('#panel').hide();
	$('.parent-dropdown-menu-panel').click(function () {
		$('#panel').toggle(1000);
	});
});

//

let virayesh = document.querySelector('#parent-breadcrumb-section-virayesh');
let changePasword = document.querySelector('.parent-virayaesh-panel');

let Livirayeshpanel = document.querySelector('#virayesh-panel');
let BtnChangePasswordPanel = document.querySelector(
	'#btn-change-password-panel'
);

let AddTextLi = document.querySelector('.AddTextLi');
let sapcelipanel = document.querySelector('.sapcelipanel');
sapcelipanel.innerHTML = '';


Livirayeshpanel.addEventListener('click', () => {
	virayesh.classList.toggle('showViryesh');
	AddTextLi.textContent = 'ویرایش';
	sapcelipanel.innerHTML = '/';
	changePasword.classList.remove('showViryesh');
});

BtnChangePasswordPanel.addEventListener('click', () => {
	changePasword.classList.toggle('showViryesh');
    virayesh.classList.remove('showViryesh');
    	AddTextLi.textContent = 'تغیر رمز عبور';
		sapcelipanel.innerHTML = '/';
});
