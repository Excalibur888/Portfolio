var works = [document.querySelector(".work3"), document.querySelector(".work2"), document.querySelector(".work1")/*, document.querySelector(".work2"), document.querySelector(".work1")*/];
var worksContent = document.querySelector("#illustrations");

var title = document.querySelector("#contact");


window.addEventListener('scroll', function () {
    let scroll = window.pageYOffset;
    if(scroll > 800 && scroll < 7000){
        worksContent.style.marginTop = "0";
        scaleWork(works[0], scroll, 100, 90);
        scaleWork(works[1], scroll, 110, 85);
        scaleWork(works[2], scroll, 120, 80);
        /*scaleWork(works[3], scroll, 130, 75);
        scaleWork(works[4], scroll, 140, 70);*/
    }

    $(window).width() > 1400 ? ( scroll > 6000 && scroll < 9500 ? ( title.style.marginRight = `${scroll}px` ) : ( title.style.marginRight = `0` ) ) : ( title.style.marginRight = `0` );
});

function scaleWork(work, scroll, firstScale, secondScale) {
    work.style.transform = (`scale(${(100 - scroll / firstScale) / secondScale})`);
}