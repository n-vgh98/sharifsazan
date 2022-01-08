let arrow=document.querySelector('.arrow-function-scroll')
document.addEventListener("scroll", function(){
    let scrollArrow = window.scrollY;
    console.log(window.scrollY);
    if(scrollArrow >500){
arrow.classList.add('showArrowupscroll');
    }
    else if( scrollArrow<500){
        arrow.classList.remove('showArrowupscroll');
    }
    

})