let Increment = document.querySelectorAll('.Increment');
let Decrement = document.querySelectorAll('.Decrement');
let Inputnumbs = document.querySelectorAll('.numb');
let boxOneSabadkharid = document.querySelectorAll('.box-one-sabadkharid');
let DeleteBoxSabadKharid = document.querySelectorAll('.DeleteBoxSabadKharid');

Increment.forEach((AllbtnsInc, indexBtns) => {
	AllbtnsInc.addEventListener('click', () => {
		Inputnumbs.forEach((AllInputs, IndexInputs) => {
			if (indexBtns === IndexInputs) {
				AllInputs.value++;
			}
		});
	});
});

Decrement.forEach((AllbtnsDec, indexDecBtns) => {
	AllbtnsDec.addEventListener('click', () => {
		Inputnumbs.forEach((AllInputs, IndexInputs) => {
			if (indexDecBtns === IndexInputs) {
				AllInputs.value--;
				if (AllInputs.value < 1) {
				AllInputs.value = 1;
			}
			}
			
		});
	});
});

DeleteBoxSabadKharid.forEach((DeletBtns, indexDeletbtns) => {
	DeletBtns.addEventListener('click', () => {
		boxOneSabadkharid.forEach((AllBoxesCart, IndexBoxesCart) => {
			if (indexDeletbtns === IndexBoxesCart) {
				AllBoxesCart.style.display = 'none';
			}
		});
	});
});
