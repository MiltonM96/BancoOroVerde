const loginForm = document.querySelector('.container__form');
const lArrow = document.querySelector('#l-arrow');
const rArrow = document.querySelector('#r-arrow');

function addOpacity(arrow, n){
    arrow.style.opacity = n;
}
lArrow.addEventListener('click', ()=>{
    if(loginForm.classList.contains('still')){
        loginForm.classList.replace('still', 'slide')
        lArrow.classList.replace('fade-in','fade-out');
        rArrow.classList.replace('fade-out','fade-in');
    }else if(loginForm.classList.contains('reverse-slide')){
        loginForm.classList.replace('reverse-slide', 'slide');
        lArrow.classList.replace('fade-in','fade-out');
        rArrow.classList.replace('fade-out','fade-in');
    }else{
        return 0;
    }
});

rArrow.addEventListener('click', ()=>{
    if(loginForm.classList.contains('slide')){
        loginForm.classList.replace('slide', 'reverse-slide');
        lArrow.classList.replace('fade-out','fade-in');
        rArrow.classList.replace('fade-in','fade-out');

    }
});