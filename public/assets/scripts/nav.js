const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('nav ul');

menuToggle.addEventListener('click', function(){
    nav.classList.toggle('slide');
});

window.addEventListener('scroll', scrollTop);
function scrollTop(){
    // const scroll = document.getElementById('go-top');
    //viewport=160
    if(this.scrollY >= 260){
        $(".go-top").addClass('show-scroll');
    } else{
        $(".go-top").removeClass('show-scroll');
    }
}
