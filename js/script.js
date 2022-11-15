new TypeIt('#welcomemsg', {
    strings: '<mark>Welcome to my Website! <br>' + 'Feel free to discover my projects below...</mark>',
    cursor: true,
    cursorChar: "|",
    cursorSpeed: 1000,
    breakLines: true,
    breakDelay: 750,
    speed: 75,
    startDelay: 250,
    nextStringDelay: 750,
    html: true,
    lifeLike: true,
    waitUntilVisible: true,
}).go();

$('#trees').css("background", `linear-gradient(${-0.3*document.getElementById('wym').getBoundingClientRect().top}deg, var(--blue) -10%, #000000 84%) no-repeat`)

$('#bcsot').hide();
$('#enablecss').hide();

function disableCss(){
    $('#stylesheet')[0].disabled = true;
    $('#disablecss').hide();
    $('#bcsot').show();
    $('#enablecss').show();
}

function enableCss(){
    $('#bcsot').hide();
    $('#enablecss').hide();
    $('#disablecss').show();
    $('#stylesheet')[0].disabled = false;
}

$(window).scroll(function () {
    const logodiv = document.getElementById("logodiv");
    const yPos = 0 - window.scrollY / 35;
    logodiv.style.top = 18 + yPos + "vw";

    let point = $('#logopoint');
    let img = $('#logoimg');
    let text = $('#logotext');
    let div = $('#logodiv');
    let pcframe = $('.pc-frame');
    let illustration = $('#illustrations');
    let contact = $('#contact');
    let wmsg = $('#welcomemsg');
    let trees = $('#trees');

    const logoDistFromTop = document.getElementById('logodiv').getBoundingClientRect().top;
    const y = window.scrollY;

    if (y < 20) {
        point.removeClass('point_trans');
        img.removeClass('img_trans');
        text.removeClass('logo_hide');
        div.removeClass('stop_top');
    } else if (logoDistFromTop <= 10) {
        point.addClass('point_trans');
        img.addClass('img_trans');
        text.addClass('logo_hide');
        div.addClass('stop_top');
    }

    trees.css("background", `linear-gradient(${-0.3*document.getElementById('wym').getBoundingClientRect().top}deg, var(--blue) -10%, #000000 84%) no-repeat`)

});

$.fn.isInViewport = function () {
    const elementTop = $(this).offset().top;
    const elementBottom = elementTop + $(this).outerHeight();

    const viewportTop = $(window).scrollTop();
    const viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('resize scroll', function () {
    $('#trees').each(function () {
        let div = $('#logodiv');

        if ($(this).isInViewport()) {
            div.removeClass('blk-bgd');
        } else {
            div.addClass('blk-bgd');
        }
    });
});

document.addEventListener("mousemove", smoothmove);

function smoothmove(e) {
    this.querySelectorAll('.moving-tree').forEach(layer => {
        const speed = layer.getAttribute('data-speed')

        const x = (window.innerWidth - e.pageX * speed) / 100
        const y = (window.innerHeight - e.pageY * speed) / 100

        layer.style.transform = `translateX(${x}px) translateY(${y}px)`
    })
}

window.addEventListener('load',function(){
    $("loader").hide();
})
