// JavaScript Document
let togglekhadamat = document.querySelectorAll(".khadamat-toggle");
let khadamatwrapper = document.querySelector(".khadamat-wrapper");

togglekhadamat.forEach((Event)=>{
	Event.addEventListener('click',()=>{
		Event.nextElementSibling.classList.toggle('showwrapperkhadamat')
	})
})
