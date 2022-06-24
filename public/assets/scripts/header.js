const translate = document.querySelectorAll(".translate");
const translateX = document.querySelectorAll(".translateX");
// const big_title = document.querySelector(".big-title");
const header = document.querySelector("header");
// const shadow = document.querySelector(".shadow");
// const content = document.querySelector(".content");
const section = document.querySelector("section");
// const image_container = document.querySelector(".imgContainer");
// const opacity = document.querySelectorAll(".opacity");
// const border = document.querySelector(".border");

let header_height = header.offsetHeight;
let section_height = section.offsetHeight;

var latestKnownScrollY = 0, sectionY = 0, ticking = false;


function onScroll() {
    latestKnownScrollY = window.pageYOffset;
    sectionY = section.getBoundingClientRect();
    requestTick();
}

function update() {
    translate.forEach(element => {
        let speed = element.dataset.speed;
        element.style.transform = `translateY(${latestKnownScrollY * speed}px)`;
    });
    translateX.forEach(element => {
        let speed = element.dataset.speed;
        element.style.transform = `translate(${latestKnownScrollY * speed}px)`;
    });

    // opacity.forEach(element => {
    //     element.style.opacity = latestKnownScrollY / (sectionY.top + section_height);
    // })

    // big_title.style.opacity = - latestKnownScrollY / (header_height / 2) + 1;
    // shadow.style.height = `${latestKnownScrollY * 0.5 + 300}px`;

    // content.style.transform = `translateY(${latestKnownScrollY / (section_height + sectionY.top) * 50 - 50}px)`;
    // image_container.style.transform = `translateY(${latestKnownScrollY / (section_height + sectionY.top) * -50 + 50}px)`;

    // border.style.width = `${latestKnownScrollY / (sectionY.top + section_height) * 30}%`;

    ticking = false
}

function requestTick() {
    if (!ticking) {
        requestAnimationFrame(update);
        ticking = true;
    }
}

requestAnimationFrame(update);

window.addEventListener('scroll', onScroll, false);
