let contextMenu = $('#contextMenu');
if (document.addEventListener) {
    document.addEventListener('contextmenu', function (e) {
        contextMenu.css("display", "block");
        let menu = document.getElementById("contextMenu");
        menu.style.left = e.pageX - (menu.offsetWidth /2) + "px";
        menu.style.top = e.pageY + "px";
        e.preventDefault();
    }, false);
}

document.addEventListener("click", function() {
    if (contextMenu.css("display") === "block"){
        contextMenu.css("display", "none");
    }
});