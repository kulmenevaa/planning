export default class Request {
    constructor() {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            statusCode: {
                422: function(errors) {
                    $.each(errors.responseJSON.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_tiny').addClass('is-invalid');
                    });
                    $('button[type="submit"]').removeAttr('disabled');
                    $.swal.fire({
                        title: 'Ошибка!',
                        text: errors.responseJSON.message,
                        icon: 'error',
                        showCloseButton: true,
                        showConfirmButton: false
                    })
                },
                404: function() {
                    alert('Неизвестная ошибка! 404')
                }
            }
        });
    }

    get(url) {
        return $.ajax({
            type: 'get',
            url: url,
            dataType: 'json',
        });
    }

    post(url, data) {
        $('button[type="submit"]').attr('disabled', 'disabled');
        return $.ajax({
            type: 'post',
            data: data,
            url: url,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
        })
    }

    delete(url) {
        return $.ajax({
            type: 'delete',
            url: url,
            dataType: 'json',
        });
    }
}