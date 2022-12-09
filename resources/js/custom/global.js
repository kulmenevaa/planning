$(document).ready(function() {
    const mode = new $.components.Mode;

    // Switch Theme
    $('.switch-theme').on('click', function(e) {
        mode.toggle();
    });

    // Preloader 
    setInterval(function () {
        $('body').removeClass('loading');
    }, loadingTimer);
})