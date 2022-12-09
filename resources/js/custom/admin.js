$(document).ready(function() {
    const aside = new $.components.Aside;

    // Toggle aside
    $('.toggle-aside').on('click', function() {
        aside.toggle();
    });

    // Toggle sub-menu
    $('.toggle-sub-menu').on('click', function() {
        $(this).find('.rotate').toggleClass('rotate90');
        $(this).next('.sub-menu').toggle();
    });

    // Toggle profile-menu 
    $('.toggle-profile-menu').on('click', function() {
        $('.profile-menu').toggle();
    });

    // Close Alert
    $('.close-alert').on('click', function() {
        $('.alert').remove();
    });

    // Tabs transition
    $('ul.tabs-menu').on('click', 'li:not(.active)', function() {
        $(this).addClass('active').siblings()
        .removeClass('active').closest('div.tabs').find('div.tabs-content')
        .removeClass('active').eq($(this).index())
        .addClass('active');
    });

    // Remove Preview Image
    $(document).on('click', '.remove-preview', function() {
        $('.img-upload').removeAttr('src');
        $('.preview-image').toggle();
        $('.image-upload').toggle();
        $('.image-path').val('');
        $('#image_new').val('');
    });
});