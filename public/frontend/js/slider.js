// JavaScript Document

var slideIndex = 1;
let aSlider;
let cSlider = true;    
    
showSlides(slideIndex);



    


function plusSlides(n) {
  
  showSlides(slideIndex += n);
}

function currentSlide(n) {
    
  showSlides(slideIndex = n);
}
function m1(){
    
    if(cSlider == true){
      cSlider = false;
      aSlider = setTimeout(m2 , 3000);   
      plusSlides(1);
    }
    
    
}    
    
function m2() {

    cSlider = true;
    
}    

function showSlides(n) {
     
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  aSlider = setTimeout(m1, 3000);  

     
}
