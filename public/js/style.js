$(function() {
    $('nav a[href^="/index.php' + location.pathname.split("/")[1] + '"]').addClass('active');
});

