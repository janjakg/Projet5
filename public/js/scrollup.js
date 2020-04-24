$(window).scroll(function() {
    //petite flèche pour faire un scrollup sur la page adminCrud, pour la liste des posts
    if ($(document).scrollTop() <= 400) {
        $("#scrollButton").fadeOut("fast");
    } else {
        $("#scrollButton").fadeIn();
    };
});
$("#scrollButton").click(function() {
    $("html, body").animate({ scrollTop: 0 }, 2500);
});