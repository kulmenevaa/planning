$(document).on('click','.popup_selector',function (event) {
    event.preventDefault();
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = '/elfinder/popup/';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl + updateID;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: '70%',
        height: '50%'
    });

});
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {
    $('#' + requestingField).val(filePath).trigger('change');
    $('.close-preview-image').remove();
    $('.image-upload').toggle();
    $('.preview-image').toggle();
    $('.preview-image').append('\
        <div class="close-preview-image remove-preview">\
            <i class="bx bx-x"></i>\
        </div>'
    );
    $('.img-upload').attr('src', '/' + filePath).trigger('change');
}

